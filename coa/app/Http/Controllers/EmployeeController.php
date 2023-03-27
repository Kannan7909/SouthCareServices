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
use Illuminate\Support\Facades\Validator;
use App\Models\File;
use App\Mail\UserRegisterMail;

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
            
              $inductionStatus = DB::table('induction_users')
            ->join('employees', 'employees.id', '=', 'induction_users.user_id')
            ->select('induction_users.*')
            ->where('employees.id', '=',$loggedId )
            ->orderBy('induction_users.created_at', 'DESC')
            ->get();
            
            $profile = DB::table('employees')
            ->select('file_type','file_type_additional','file_path','file_name')
            ->join('files','employees.id','=','files.employee_id')
            ->where('employees.id','=',$loggedId)
            ->where(function ($query) {
                $query->where('files.file_type','=','Profile Photo');             
            })
            ->get();
            
             $policy = DB::table('templates')     
            ->where('templates.template_section', '=','Policy' )
            ->get();
           // return view('profile',compact('employee')); 
            $role= $employee->role;
            if($role==2){
            return view('profile',compact('employee','inductionStatus','profile','policy')); 
            }else{
                // $employees = Employee::all();
                $employees = DB::table('employees')
                ->select('*')
                ->where('role','=',2)
                ->get();
                //return view('employeeList',compact('employees','employee','profile'));
                $employee = Employee::find($loggedId); 
                $employee = Employee::find($loggedId); 
               $countUser = Employee::where('role','2')->count(); 
               $countTrainingRequest = Employee::where('role','2')
                                       ->where('training_status','Requested')
                                       ->count(); 
               $countDBSRequest = Employee::where('role','2')
                                       ->where('dbs_status','Requested')
                                       ->count(); 
                $countInductionRequest = DB::table('induction_users')
                ->join('employees', 'employees.id', '=', 'induction_users.user_id')
                ->select('induction_users.*')
                ->where('induction_users.status', '=','no' )
                ->orderBy('induction_users.created_at', 'DESC')
                ->count();
                $countApplicationSubmitted = Employee::where('role','2')
                                       ->where('application_status','Submitted')
                                       ->count(); 
                $applicationSubmittedPercentage = ($countApplicationSubmitted/$countUser)*100;               
                $countApplicationReviewed = Employee::where('role','2')
                ->where('application_status','Under Review')
                ->count(); 
                $applicationReviewedPercentage = ($countApplicationReviewed/$countUser)*100;               
                $countApplicationApproved = Employee::where('role','2')
                ->where('application_status','Approved')
                ->count(); 
                $applicationApprovedPercentage = ($countApplicationApproved/$countUser)*100; 
                
                $countTrainingSubmitted = Employee::where('role','2')
                ->where('training_status','Submitted')
                ->count(); 
                $trainingSubmittedPercentage = ($countTrainingSubmitted/$countUser)*100;               
                $countTrainingReviewed = Employee::where('role','2')
                ->where('training_status','Under Review')
                ->count(); 
                $trainingReviewedPercentage = ($countTrainingReviewed/$countUser)*100;               
                $countTrainingApproved = Employee::where('role','2')
                ->where('training_status','Approved')
                ->count(); 
                $trainingApprovedPercentage = ($countTrainingApproved/$countUser)*100; 
            
                $countReferenceSubmitted = Employee::where('role','2')
                ->where('reference_status','Submitted')
                ->count(); 
                $referenceSubmittedPercentage = ($countReferenceSubmitted/$countUser)*100;               
                $countReferenceReviewed = Employee::where('role','2')
                ->where('reference_status','Under Review')
                ->count(); 
                $referenceReviewedPercentage = ($countReferenceReviewed/$countUser)*100;               
                $countReferenceApproved = Employee::where('role','2')
                ->where('reference_status','Approved')
                ->count(); 
                $contractData = DB::table('employees')
                ->join('user_contracts','employees.id','=','user_contracts.employee_id')
                ->select('user_contracts.*', 'employees.*')
                ->orderBy('user_contracts.updated_at','desc')
                ->take(5)
                ->get();
                $countHealthSubmitted = Employee::where('role','2')
                                       ->where('health_status','Submitted')
                                       ->count(); 
                $healthSubmittedPercentage = ($countHealthSubmitted/$countUser)*100;               
                $countHealthReviewed = Employee::where('role','2')
                ->where('health_status','Under Review')
                ->count(); 
                $healthReviewedPercentage = ($countHealthReviewed/$countUser)*100;               
                $countHealthApproved = Employee::where('role','2')
                ->where('health_status','Approved')
                ->count(); 
                $healthApprovedPercentage = ($countHealthApproved/$countUser)*100; 
                
                $countDBSSubmitted = Employee::where('role','2')
                ->where('dbs_status','Submitted')
                ->count(); 
                $DBSSubmittedPercentage = ($countDBSSubmitted/$countUser)*100;               
                $countDBSReviewed = Employee::where('role','2')
                ->where('dbs_status','Under Review')
                ->count(); 
                $DBSReviewedPercentage = ($countDBSReviewed/$countUser)*100;               
                $countDBSApproved = Employee::where('role','2')
                ->where('dbs_status','Approved')
                ->count(); 
                $DBSApprovedPercentage = ($countDBSApproved/$countUser)*100; 
                         
                $countInductionConfirmed = DB::table('induction_users')
                ->join('employees', 'employees.id', '=', 'induction_users.user_id')
                ->select('induction_users.*')
                ->where('induction_users.status', '=','Confirmed' )
                ->orderBy('induction_users.created_at', 'DESC')
                ->count();
                $inductionConfirmedPercentage = ($countInductionConfirmed/$countUser)*100;               
                 $countInductionAttended = DB::table('induction_users')
                ->join('employees', 'employees.id', '=', 'induction_users.user_id')
                ->select('induction_users.*')
                ->where('induction_users.status', '=','Attended' )
                ->orderBy('induction_users.created_at', 'DESC')
                ->count();
                $inductionAttenededPercentage = ($countInductionAttended/$countUser)*100; 
                $countInductionCancelled = DB::table('induction_users')
                ->join('employees', 'employees.id', '=', 'induction_users.user_id')
                ->select('induction_users.*')
                ->where('induction_users.status', '=','Cancelled' )
                ->orderBy('induction_users.created_at', 'DESC')
                ->count();
                $inductionCancelledPercentage = ($countInductionCancelled/$countUser)*100;
                $referenceApprovedPercentage = ($countReferenceApproved/$countUser)*100; 
                            return view('adminDashboard',compact('employee','profile','countUser','countTrainingRequest','countDBSRequest','countInductionRequest','applicationSubmittedPercentage','countApplicationSubmitted','applicationReviewedPercentage','countApplicationReviewed','applicationApprovedPercentage','countApplicationApproved','countTrainingSubmitted','trainingSubmittedPercentage','countTrainingReviewed','trainingReviewedPercentage','countTrainingApproved','trainingApprovedPercentage','countReferenceSubmitted','referenceSubmittedPercentage','countReferenceReviewed','referenceReviewedPercentage','countReferenceApproved','referenceApprovedPercentage','contractData','countHealthSubmitted','healthSubmittedPercentage','countHealthReviewed','healthReviewedPercentage','countHealthApproved','healthApprovedPercentage','countDBSSubmitted','DBSSubmittedPercentage','countDBSReviewed','DBSReviewedPercentage','countDBSApproved','DBSApprovedPercentage','countInductionConfirmed','inductionConfirmedPercentage','countInductionAttended','inductionAttenededPercentage','countInductionCancelled','inductionCancelledPercentage'));
                        }

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
        $kitchen_assistant = request('kitchen_assistant');
        $domestic_Care = request('domestic_Care');
        $care_assistant = request('care_assistant');
        $living_Care = request('living_Care');
        $address1 = request('line_1');
        $address2 = request('line_2');
        $address3 = request('line_3');
        $postTown = request('post_town');
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
            'kitchen_assistant' =>  $kitchen_assistant,
            'domestic_Care' =>  $domestic_Care,
            'care_assistant' =>  $care_assistant,
            'living_Care' =>  $living_Care,
            'address1' =>  $address1,
            'address2' =>  $address2,
            'address3' =>  $address3,
            'postTown' =>  $postTown,
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
    "url" => "https://coa.southcareserviceuk.com/"
];
Mail::to($email)->send(new TestMail($mailData));

$adminEmail = "info@southcareserviceuk.com";
Mail::to($adminEmail)->send(new UserRegisterMail($mailData)); 
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
                "url" => "https://coa.southcareserviceuk.com/reset-username"
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
                "url" => "https://coa.southcareserviceuk.com/reset-password"
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
        public function emailCheck(Request $request){
            $val = array();
            $rowData=$request->get('val'); 
            $result =  DB::table('employees')
            ->select('*')
            ->where('email','=',$rowData)
            ->get();
             $resultStaff =  DB::table('workers')
            ->select('*')
            ->where('email','=',$rowData)
            ->get();
            //return $rowData;
             if(sizeof($result)!=0 || sizeof($resultStaff)!=0){
                $msg="Sorry! Email Already Exist.";
                return $msg;
            } 
           
        }
        public function usernameCheck(Request $request){
            $val = array();
            $rowData=$request->get('val'); 
            $result =  DB::table('employees')
            ->select('*')
            ->where('login_id','=',$rowData)
            ->get();
            $resultStaff =  DB::table('workers')
            ->select('*')
            ->where('login_id','=',$rowData)
            ->get();
            //return $rowData;
             if(sizeof($result)!=0 || sizeof($resultStaff)!=0){
                $msg="Sorry! Username Already Exist.";
                return $msg;
            } 
           
        }
         public function profilePhoto(Request $request){
            $data = array();
          $validator = Validator::make($request->all(), [
    /*          'file' => 'required|mimes:png,jpg,jpeg,csv,txt,pdf,docx|max:2048'
     */          'file' => 'required|mimes:png,jpg,jpeg'
             ]);
    
          if ($validator->fails()) {
    
             $data['success'] = 0;
             $data['error'] = $validator->errors()->first('file');// Error response
    
          }else{
             if($request->file('file')) {
    
                 $file = $request->file('file');
                
                 $file_type= $request->file_type;
                 
                 $employee = Employee::latest()->first();

                 $employeeId= $employee->id;
                 
                 $expiry_date= $request->expiry_date;
    
                 $GLOBALS['type'] = $request->file_type;

                 $file_type_additional= $request->file_type_additional;
                 $userFile = DB::table('files')
                 ->select('*')
                 ->where('files.file_type','=',$GLOBALS['type'])
                 ->where('files.employee_id','=',$employee->id+1)
                 ->delete();
                 
                 //$filename = "Passport".'_'.time().'_'.$file->getClientOriginalName();
                 $filename = time().'_'.$file->getClientOriginalName();
                 // File extension
                 $extension = $file->getClientOriginalExtension();
    
                 // File upload location
                 $location = 'files';
    
                 // Upload file
                 $file->move($location,$filename);
                 
                 // File path
                 $filepath = url('files/'.$filename);
                
                 // Save to File table
                 $value = Session::get('key');
    
                 $saveFile = new File();
                 $saveFile->employee_id = $employeeId+1;
                 //$saveFile->file_name = "Passport".'_'.$file->getClientOriginalName();
                 $saveFile->file_name = $file->getClientOriginalName();
                 $saveFile->file_path = $filepath;
                 $saveFile->file_type = $file_type;
                 $saveFile->file_type_additional = $file_type_additional;
                 $saveFile->expiry_date = $expiry_date;
                 $saveFile->save();
           
                 // Response
                 $data['success'] = 1;
                 $data['message'] = 'Uploaded Successfully!';
                 $data['filepath'] = $filepath;
                 $data['filetype'] = $userFile;
                 $data['extension'] = $extension;
             }else{
                 // Response
                 $data['success'] = 2;
                 $data['message'] = 'File not uploaded.'; 
             }
          }
    
          return response()->json($data);
       }
       
       public function updatePhoto(Request $request){
        $data = array();
      $validator = Validator::make($request->all(), [
/*          'file' => 'required|mimes:png,jpg,jpeg,csv,txt,pdf,docx|max:2048'
 */          'file' => 'required|mimes:png,jpg,jpeg'
         ]);

      if ($validator->fails()) {

         $data['success'] = 0;
         $data['error'] = $validator->errors()->first('file');// Error response

      }else{
         if($request->file('file')) {

             $file = $request->file('file');
            
             $file_type= $request->file_type;
             
             $employee = Employee::latest()->first();

             $employeeId= $employee->id;
             
             $expiry_date= $request->expiry_date;

             $GLOBALS['type'] = $request->file_type;

             $file_type_additional= $request->file_type_additional;

             $loggedId = Session::get('userId');

             $userFile = DB::table('files')
             ->select('*')
             ->where('files.file_type','=',$GLOBALS['type'])
             ->where('files.employee_id','=',$loggedId)
             ->delete();
             
             //$filename = "Passport".'_'.time().'_'.$file->getClientOriginalName();
             $filename = time().'_'.$file->getClientOriginalName();
             // File extension
             $extension = $file->getClientOriginalExtension();

             // File upload location
             $location = 'files';

             // Upload file
             $file->move($location,$filename);
             
             // File path
             $filepath = url('files/'.$filename);
            
             // Save to File table
             $value = Session::get('key');

             $saveFile = new File();
             $saveFile->employee_id = $loggedId;
             //$saveFile->file_name = "Passport".'_'.$file->getClientOriginalName();
             $saveFile->file_name = $file->getClientOriginalName();
             $saveFile->file_path = $filepath;
             $saveFile->file_type = $file_type;
             $saveFile->file_type_additional = $file_type_additional;
             $saveFile->expiry_date = $expiry_date;
             $saveFile->save();
       
             // Response
             $data['success'] = 1;
             $data['message'] = 'Uploaded Successfully!';
             $data['filepath'] = $filepath;
             $data['filetype'] = $userFile;
             $data['extension'] = $extension;
         }else{
             // Response
             $data['success'] = 2;
             $data['message'] = 'File not uploaded.'; 
         }
      }

      return response()->json($data);
   }
    public function policyAgree(Request $request){
    $employee_id = Session::get('userId');
    $employee = Employee::find($employee_id);
    $employee->update([
        'policy_agree' => "yes"
   ]);
}
}