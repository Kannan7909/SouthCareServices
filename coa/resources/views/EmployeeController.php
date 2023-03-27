<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//Following by requirement
use App\Models\Employee;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\TestMail;
use App\Mail\UsernameMail;
use App\Mail\PasswordMail;
use DB;
use Auth;
use Session;

class EmployeeController extends Controller
{
    use AuthenticatesUsers;
    public function index(){
        return view('signin');
    }
    public function login(Request $request)
    {
        $input=['login_id'=>request('login'),'password'=>request('password')];
       /* dump($input);
       exit; */
        //dd(Auth::guard('employee')->attempt($input));
      // dd(auth()->guard('employee')->attempt($input));
        if(auth()->guard('employee')->attempt($input))
        {
            $loggedId = auth()->guard('employee')->id();
            Session::put('userId',$loggedId);

            $employee = Employee::find($loggedId);
            return view('profile',compact('employee')); 
/*             return view('employeeProfile',compact('employee')); 
 */           // return view('employeeProfile');
            
            /* 
            $loggedId = auth()->guard('employee')->id();
            Session::put('userId',$loggedId);

            $employee = Employee::find($loggedId);
            if($employee['email_verified'] == '1'){
                return view('employeeProfile');
            }
            else{
                return view('emailVerification',compact('loggedId'));  
            }
             */

             
            /* return redirect()->route('sign.in')
            ->with('success','Login Successful'); */
             //$employees = Employee::all();
             
            //selecting  
             /* $employees = DB::table('employees')
             ->select('*')
             ->where('employee_status','=','Active')
             ->get(); */


             //return $employees;
            //return view('employeeDetails',compact('employees'));  
           // return view('employeeDetails');
          // return view('emailVerification',compact('loggedId'));  
           
        }else{
    //dd($input);
    return redirect()->route('sign.in')
    ->with('error','Sorry! You have entered an invalid username or password');        }
    }
    public function createUser(){
        return view('userRegister');
    }
    public function saveUser(Request $request){

        $title = request('title');
        $surname = request('surname');
        $firstname = request('first_name');
        $posts = request('posts');
        $status = request('status');
        $address1 = request('address1');
        $address2 = request('address2');
        $postcode = request('postcode');
        $contact = request('contact');
        $uk_contact = request('uk_contact');
        $email = request('email');
        $login = request('login');
        $password = Hash::make(request('password'));
     
        /* $this->validate($request, [
            'password' => 'min:6|required_with:confirm|same:confirm',
            'confirm' => 'min:6'
            ]); */
        /* if(request('password') == request('confirm')){
        $password = Hash::make(request('password'));
        }else{
            return redirect()->route('create.user')
        ->with('success','Password Mismatch!');
        } */
        //dd($request->all());
        $result =  DB::table('employees')
        ->select('*')
        ->where('email','=',request('email'))
        ->get();
        
        if(sizeof($result)!=0){
            return "Email Already Exist";
        }else{
        Employee::create([
            'title' =>  $title,
            'surname' =>  $surname,
            'firstname' =>  $firstname,
            'posts' =>  $posts,
            'status' =>  $status,
            'address1' =>  $address1,
            'address2' =>  $address2,
            'postcode' =>  $postcode,
            'contact_no' =>  $contact,
            'uk_contact_no' =>  $uk_contact,
            'email' =>  $email,
            'login_id' =>  $login,
            'password' =>  $password
        ]);

//mailing
$mailData = [
    "name" => $firstname." ".$surname,
    "login_id" =>  $login,
    "password" => request('password'),
    "url" => "http://localhost/ExcellentCare/public"
];
Mail::to($email)->send(new TestMail($mailData));

//dd("Mail Sent Successfuly!");
return view('thanksMail');
      /*   return redirect()->route('create.user')
        ->with('success','New User Created Successfuly!'); */ 
}
    }
        
        public function employeeDetails(){
            $employees = Employee::all();
            return view('employeeDetails',compact('employees'));
        }

        public function editEmployee($employeeId){
            //return $employeeId;
           $employee = Employee::find(decrypt($employeeId));
           return view('employeeEdit',compact('employee')); 
        } 
        public function updateEmployee(){
            // return request()->all();
             $employeeId = decrypt(request('employee_id'));
             $employee = Employee::find($employeeId);
             $employee->update([
                 'title' => request('title'),
                 'surname' => request('surname'),
                 'firstname' => request('first_name'),
                 'posts' => request('posts'),
                 'status' => request('status'),
                 'address1' => request('address1'),
                 'address2' => request('address2'),
                 'postcode' => request('postcode'),
                 'contact_no' => request('contact'),
                 'uk_contact_no' => request('uk_contact'),
                 'email' => request('email'),
                 'login_id' => request('login'),
                 'password' => Hash::make(request('password'))
            ]);
            return redirect()->route('employee.details')
                 ->with('success','1 Record Updated Successfuly !!');
         } 
         public function deleteEmployee($employeeId){
            $employee = Employee::find(decrypt($employeeId));
            $employee->delete();
           return redirect()->route('employee.details')
                ->with('message','1 Record Deleted Successfuly !!');
        } 
      /*  public function searchEmployee(Request $request)
        {
            $output ="";
            $employee=Employee::where('surname', 'like', '%'.$request->search.'%')
            ->orWhere('firstname', 'like', '%'.$request->search.'%')
            ->orWhere('posts', 'like', '%'.$request->search.'%')
            ->orWhere('address1', 'like', '%'.$request->search.'%')
            ->orWhere('postcode', 'like', '%'.$request->search.'%')
            ->orWhere('contact_no', 'like', '%'.$request->search.'%')
            ->orWhere('uk_contact_no', 'like', '%'.$request->search.'%')
            ->orWhere('email', 'like', '%'.$request->search.'%')
            ->get();
            $total_row = $employee->count();
            if($total_row > 0)
            {
                foreach($employee as $employee)
                {
                    $output .= '
                    <tr>
                    <th scope="row">'.$employee->id.'</th>
                    <td>'.$employee->surname.'</td>
                    <td>'.$employee->firstname.'</td>
                    <td>'.$employee->posts.'</td>
                    <td style="width:20px">'.$employee->address1.'</td>
                    <td>'.$employee->postcode.'</td>
                    <td>'.$employee->contact_no.'</td>
                    <td>'.$employee->uk_contact_no.'</td>
                    <td>'.$employee->email.'</td>
                    <td>'.'
                    <a href="' . route('edit.employee', encrypt($employee->id)) . '" class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                        <a href="' . route('delete.employee', encrypt($employee->id)) . '" class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>
                    '.'</td>
                    </tr>
                    ';
                }
             }
             else
             {
                $output = '
                <tr>
                    <td align="center" colspan="10">No Data Found</td>
                </tr>
                ';
            }
            return response($output);
         } */
         public function forgotUsername(){
            return view('forgotUsername');
        }
         public function forgotPassword(){
            return view('forgotPassword');
        }
        public function usernameMail(Request $request) {
            $email = request('email');
            Session::put('userEmail',$email);
            $mailData = [
                "url" => "http://localhost/ExcellentCare/public/reset-username"
            ];
            Mail::to($email)->send(new UsernameMail($mailData));
            return view('emailSend');
        }
        public function resetUsername(){
            return view('resetUsername');
        }
        public function passwordMail(Request $request) {
            $email = request('email');
            Session::put('userEmail',$email);
            $mailData = [
                "url" => "http://localhost/ExcellentCare/public/reset-password"
            ];
            Mail::to($email)->send(new PasswordMail($mailData));
            return view('emailSend');
        }
        public function resetPassword(){
            return view('resetPassword');
        }
        public function newUsername(Request $request){
            $employee = Session::get('userEmail');
            $newUsername = request('login');
           // return $employee;
            /* $employee = Employee::find($employee);
            $employee->update([
                'login_id' => request('username'),
           ]); */
          $result= DB::table('employees')
            ->where('email', $employee)
            ->update(['login_id' => $newUsername ]);
          /*  if($result=1){
           return redirect()->route('new.username')
                ->with('success','Username Updated Successfuly !!');
           } */
           return view('changeUsernameSuccess');
        }
        public function newPassword(Request $request){
            $employee = Session::get('userEmail');
            $newPassword = request('password');
        
          
            /* $employee = Employee::find($employee);
            $employee->update([
                'login_id' => request('username'),
           ]); */
          $result= DB::table('employees')
            ->where('email', $employee)
            ->update(['password' => Hash::make($newPassword)]);
           /* if($result=1){
           return redirect()->route('new.password')
                ->with('success','Password Updated Successfuly !!');
           } */
           return view('changePasswordSuccess');
        }
        public function logOut(){
            Session::flush();
            return redirect()->route('sign.in');
        }
}