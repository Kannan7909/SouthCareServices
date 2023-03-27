<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Models\Employee;
use Illuminate\Support\Facades\DB; 
use App\Models\Department;
use App\Models\Role;
use App\Models\Worker;
use Illuminate\Support\Facades\Hash;
use Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Validator;
use App\Models\Privilege;




class AdminManagementController extends Controller
{
    //
    use AuthenticatesUsers;

    public function addUsers(){
        $loggedId = Session::get('userId');
        if($loggedId==""){
            return redirect()->route('sign.in');
        }
        $loggedUser = Employee::find($loggedId); 
         $profile = DB::table('employees')
         ->select('file_type','file_type_additional','file_path','file_name')
         ->join('files','employees.id','=','files.employee_id')
         ->where('employees.id','=',$loggedId)
         ->where(function ($query) {
             $query->where('files.file_type','=','Profile Photo');             
         })
         ->get();
         $users = DB::table('employees')     
         ->where('employees.role', '=',2 )
         ->get();
         $departments = Department::all();
         //$roles = Role::all();
         return view('addUsers',compact('loggedUser','profile','users','departments'));
    }
    public function deleteUsers(){
        $loggedId = Session::get('userId');
        if($loggedId==""){
            return redirect()->route('sign.in');
        }
        $loggedUser = Employee::find($loggedId); 
         $profile = DB::table('employees')
         ->select('file_type','file_type_additional','file_path','file_name')
         ->join('files','employees.id','=','files.employee_id')
         ->where('employees.id','=',$loggedId)
         ->where(function ($query) {
             $query->where('files.file_type','=','Profile Photo');             
         })
         ->get();
         $staffs = DB::table('workers')     
         ->get();
         return view('deleteUsers',compact('loggedUser','profile','staffs'));
    }
    public function addRoles(){
        $loggedId = Session::get('userId');
        if($loggedId==""){
            return redirect()->route('sign.in');
        }
        $loggedUser = Employee::find($loggedId); 
         $profile = DB::table('employees')
         ->select('file_type','file_type_additional','file_path','file_name')
         ->join('files','employees.id','=','files.employee_id')
         ->where('employees.id','=',$loggedId)
         ->where(function ($query) {
             $query->where('files.file_type','=','Profile Photo');             
         })
         ->get();
         $departments = Department::all();
         return view('addDepartmentRole',compact('loggedUser','profile','departments'));
    }
    public function saveDepartment(Request $request){
        $department_name = request('department');
        $success = Department::create([
            'department_name' =>  $department_name
        ]);
        if($success){
            return back()->with('success','Saved Successfully!');
        }
    }
    public function saveRole(Request $request){
        $department_id= request('department');
        $role_name = request('role_name');
        $success = Role::create([
            'department_id' =>  $department_id,
            'role_name' =>  $role_name
        ]);
        if($success){
            return back()->with('success','Saved Successfully!');
        }
    }
    public function saveUsers(Request $request){
        $name= request('name');
        $department_id= request('department');
        $role_id = request('role');
        $address= request('address');
        $postcode = request('postcode');
        $country_code_contact= request('country_code_contact');
        $contact_tel = request('contact_tel');
        $country_code_mobile= request('country_code_mobile');
        $mobile_no = request('mobile_no');
        $email= request('email');
        $username = request('username');
        $password = Hash::make(request('password'));
       $success = Worker::create([
            'name' =>  $name,
            'department_id' =>  $department_id,
            'role_id' =>  $role_id,
            'address' =>  $address,
            'postcode' =>  $postcode,
            'country_code_contact' =>  $country_code_contact,
            'contact_tel' =>  $contact_tel,
            'country_code_mobile' =>  $country_code_mobile,
            'mobile_no' =>  $mobile_no,
            'email' =>  $email,
            'login_id' =>  $username,
            'password' =>  $password
        ]); 
        $latest = Worker::latest()->first();
        $employee_id = $latest->id;
        $view_user= request('view_user');
        $edit_user= request('edit_user');
        $delete_user = request('delete_user');
        $upload_user= request('upload_user');
        $download_user = request('download_user');
        $view_application= request('view_application');
        $edit_application = request('edit_application');
        $delete_application= request('delete_application');
        $upload_application = request('upload_application');
        $download_application= request('download_application');
        $view_training = request('view_training');
        $edit_training= request('edit_training');
        $delete_training= request('delete_training');
        $upload_training = request('upload_training');
        $download_training= request('download_training');
        $view_reference = request('view_reference');
        $edit_reference = request('edit_reference');
        $delete_reference = request('delete_reference');
        $upload_reference  = request('upload_reference');
        $download_reference = request('download_reference');
        $view_health = request('view_health');
        $edit_health = request('edit_health');
        $delete_health = request('delete_health');
        $upload_health  = request('upload_health');
        $download_health = request('download_health');
        $view_bank = request('view_bank');
        $edit_bank= request('edit_bank');
        $delete_bank = request('delete_bank');
        $upload_bank= request('upload_bank');
        $download_bank = request('download_bank');
        $view_dbs= request('view_dbs');
        $edit_dbs = request('edit_dbs');
        $delete_dbs= request('delete_dbs');
        $upload_dbs= request('upload_dbs');
        $download_dbs= request('download_dbs');
        $view_bank = request('view_bank');
        $edit_bank= request('edit_bank');
        $delete_bank = request('delete_bank');
        $upload_bank= request('upload_bank');
        $download_bank = request('download_bank');
        $view_starter= request('view_starter');
        $edit_starter = request('edit_starter');
        $delete_starter= request('delete_starter');
        $upload_starter = request('upload_starter');
        $download_starter= request('download_starter');
        $view_contract = request('view_contract');
        $edit_contract= request('edit_contract');
        $delete_contract = request('delete_contract');
        $upload_contract= request('upload_contract');
        $download_contract = request('download_contract'); 
        $view_induction = request('view_induction');
        $edit_induction= request('edit_induction');
        $delete_induction = request('delete_induction');
        $upload_induction= request('upload_induction');
        $download_induction = request('download_induction'); 
        $terms_condition = request('terms_condition');
        $email_template= request('email_template');
        $contract_content = request('contract_content');
        $pay_rates= request('pay_rates');
        $department_role = request('department_role'); 
        $add_staff = request('add_staff');
        $view_edit= request('view_edit');
        $delete_deactivate = request('delete_deactivate'); 

        Privilege::create([
            'employee_id' =>  $employee_id,
            'view_user' =>  $view_user,
            'edit_user' =>  $edit_user,
            'delete_user' =>  $delete_user,
            'upload_user' =>  $upload_user,
            'download_user' =>  $download_user,
            'view_application' =>  $view_application,
            'edit_application' =>  $edit_application,
            'delete_application' =>  $delete_application,
            'upload_application' =>  $upload_application,
            'download_application' =>  $download_application,
            'view_training' =>  $view_training,
            'edit_training' =>  $edit_training,
            'delete_training' =>  $delete_training,
            'upload_training' =>  $upload_training,
            'download_training' =>  $download_training,
            'view_reference' =>  $view_reference,
            'edit_reference' =>  $edit_reference,
            'delete_reference' =>  $delete_reference,
            'upload_reference' =>  $upload_reference,
            'download_reference' =>  $download_reference,
            'view_health' =>  $view_health,
            'edit_health' =>  $edit_health,
            'delete_health' =>  $delete_health,
            'upload_health' =>  $upload_health,
            'download_health' =>  $download_health,
            'view_dbs' =>  $view_dbs,
            'edit_dbs' =>  $edit_dbs,
            'delete_dbs' =>  $delete_dbs,
            'upload_dbs' =>  $upload_dbs,
            'download_dbs' =>  $download_dbs,
            'view_bank' =>  $view_bank,
            'edit_bank' =>  $edit_bank,
            'delete_bank' =>  $delete_bank,
            'upload_bank' =>  $upload_bank,
            'download_bank' =>  $download_bank,
            'view_starter' =>  $view_starter,
            'edit_starter' =>  $edit_starter,
            'delete_starter' =>  $delete_starter,
            'upload_starter' =>  $upload_starter,
            'download_starter' =>  $download_starter,
            'view_contract' =>  $view_contract,
            'edit_contract' =>  $edit_contract,
            'delete_contract' =>  $delete_contract,
            'upload_contract' =>  $upload_contract,
            'download_contract' =>  $download_contract,
            'view_induction' =>  $view_induction,
            'edit_induction' =>  $edit_induction,
            'delete_induction' =>  $delete_induction,
            'upload_induction' =>  $upload_induction,
            'download_induction' =>  $download_induction,
            'terms_condition' =>  $terms_condition,
            'email_template' =>  $email_template,
            'contract_content' =>  $contract_content,
            'pay_rates' =>  $pay_rates,
            'department_role' =>  $department_role,
            'add_staff' =>  $add_staff,
            'view_edit' =>  $view_edit,
            'delete_deactivate' =>  $delete_deactivate
        ]); 
        if($success){
            return back()->with('success','Saved Successfully!');
        }
    }
    public function index(){
        return view('signinStaff');
    }
    public function loginStaff(Request $request)
    {
        $input=['login_id'=>request('login'),'password'=>request('password')];
       /* dump($input);
       exit; */
        //dd(Auth::guard('worker')->attempt($input));
    }
    public function getRole(Request $request){
        $department_id = request('department');
        $roles = DB::table('roles')     
        ->where('roles.department_id', '=',$department_id )
        ->get();
        return response()->json($roles);
    }
    public function staffList(){
        $loggedId = Session::get('userId');
        if($loggedId==""){
           return redirect()->route('sign.in');
       }
       $employee = Employee::find($loggedId); 
       $staffData = Worker::all();
       return view('staffList',compact('employee','staffData'));
   }
   public function editStaff($employeeId) {
    $loggedId = Session::get('userId');
    Session::put('staffId',decrypt($employeeId));
    if($loggedId==""){
        return redirect()->route('sign.in');
    }
    $employee = Employee::find($loggedId);
    $workers = Worker::find(decrypt($employeeId));
    $departments = Department::all();
    $workerDepartment = DB::table('departments')     
        ->where('departments.id', '=',$workers->department_id )
        ->get();
    $workerRole = DB::table('roles')     
    ->where('roles.id', '=',$workers->role_id )
    ->get();
    $workerPrivilege = DB::table('privileges')     
    ->where('privileges.employee_id', '=', decrypt($employeeId))
    ->get();
    return view('editStaff',compact('employee','departments','workers','workerDepartment','workerRole','workerPrivilege'));
}
public function editDepartment() {
    $loggedId = Session::get('userId');
    if($loggedId==""){
        return redirect()->route('sign.in');
    }
    $departments = Department::all();
    $department= request('department');
    $new_department= request('new_department');
    $department = Department::find($department);
            $department->update([
                'department_name' => $new_department
           ]);
    return back()->with('success','Saved Successfully!');
    }
    public function editRole() {
        $loggedId = Session::get('userId');
        if($loggedId==""){
            return redirect()->route('sign.in');
        }
        $department_id= request('department_name');
        $role= request('role');
        $new_role= request('new_role');
         DB::table('roles')
            ->where('id', $department_id)
            ->update(['role_name' => $new_role]); 
        return back()->with('success','Saved Successfully!');
        }
        public function deleteDepartment() {
            $loggedId = Session::get('userId');
            if($loggedId==""){
                return redirect()->route('sign.in');
            }
            $departments = Department::all();
            $department= request('department');
            Department::where('id',$department)->delete();
            Role::where('department_id',$department)->delete();
            return back()->with('success','Deleted Successfully!');
            }
        public function deleteRole() {
            $loggedId = Session::get('userId');
            if($loggedId==""){
                return redirect()->route('sign.in');
            }
            $department_id= request('delete_department');
            $role= request('delete_role');
            Role::where('id',$role)
            ->where('department_id',$department_id)
            ->delete();
            return back()->with('success','Deleted Successfully!');
            }
            public function updateUsers(){
                $name= request('name');
                $department_id= request('department');
                $role_id = request('role');
                $address= request('address');
                $postcode = request('postcode');
                $country_code_contact= request('country_code_contact');
                $contact_tel = request('contact_tel');
                $country_code_mobile= request('country_code_mobile');
                $mobile_no = request('mobile_no');
                $email= request('email');
                $username = request('username');
                $employee_id = Session::get('staffId');
                $worker = Worker::where('id', '=', $employee_id)->first();
                if(request('password') == ""){
                    $new_password = $worker->password;
                }else{
                    $new_password = request('password');
                }
                $password = Hash::make($new_password);
              
               $success = $worker->Update([
                    'name' =>  $name,
                    'department_id' =>  $department_id,
                    'role_id' =>  $role_id,
                    'address' =>  $address,
                    'postcode' =>  $postcode,
                    'country_code_contact' =>  $country_code_contact,
                    'contact_tel' =>  $contact_tel,
                    'country_code_mobile' =>  $country_code_mobile,
                    'mobile_no' =>  $mobile_no,
                    'email' =>  $email,
                    'login_id' =>  $username,
                    'password' =>  $password
                ]); 
                $view_user= request('view_user');
                $edit_user= request('edit_user');
                $delete_user = request('delete_user');
                $upload_user= request('upload_user');
                $download_user = request('download_user');
                $view_application= request('view_application');
                $edit_application = request('edit_application');
                $delete_application= request('delete_application');
                $upload_application = request('upload_application');
                $download_application= request('download_application');
                $view_training = request('view_training');
                $edit_training= request('edit_training');
                $delete_training= request('delete_training');
                $upload_training = request('upload_training');
                $download_training= request('download_training');
                $view_reference = request('view_reference');
                $edit_reference = request('edit_reference');
                $delete_reference = request('delete_reference');
                $upload_reference  = request('upload_reference');
                $download_reference = request('download_reference');
                $view_health = request('view_health');
                $edit_health = request('edit_health');
                $delete_health = request('delete_health');
                $upload_health  = request('upload_health');
                $download_health = request('download_health');
                $view_bank = request('view_bank');
                $edit_bank= request('edit_bank');
                $delete_bank = request('delete_bank');
                $upload_bank= request('upload_bank');
                $download_bank = request('download_bank');
                $view_dbs= request('view_dbs');
                $edit_dbs = request('edit_dbs');
                $delete_dbs= request('delete_dbs');
                $upload_dbs= request('upload_dbs');
                $download_dbs= request('download_dbs');
                $view_bank = request('view_bank');
                $edit_bank= request('edit_bank');
                $delete_bank = request('delete_bank');
                $upload_bank= request('upload_bank');
                $download_bank = request('download_bank');
                $view_starter= request('view_starter');
                $edit_starter = request('edit_starter');
                $delete_starter= request('delete_starter');
                $upload_starter = request('upload_starter');
                $download_starter= request('download_starter');
                $view_contract = request('view_contract');
                $edit_contract= request('edit_contract');
                $delete_contract = request('delete_contract');
                $upload_contract= request('upload_contract');
                $download_contract = request('download_contract'); 
                $view_induction = request('view_induction');
                $edit_induction= request('edit_induction');
                $delete_induction = request('delete_induction');
                $upload_induction= request('upload_induction');
                $download_induction = request('download_induction'); 
                $terms_condition = request('terms_condition');
                $email_template= request('email_template');
                $contract_content = request('contract_content');
                $pay_rates= request('pay_rates');
                $department_role = request('department_role'); 
                $add_staff = request('add_staff');
                $view_edit= request('view_edit');
                $delete_deactivate = request('delete_deactivate'); 
                
                $employee_id = Session::get('staffId');
                $privilege = Privilege::where('employee_id', '=', $employee_id)->first();

                $privilege->Update([
                    'employee_id' =>  $employee_id,
                    'view_user' =>  $view_user,
                    'edit_user' =>  $edit_user,
                    'delete_user' =>  $delete_user,
                    'upload_user' =>  $upload_user,
                    'download_user' =>  $download_user,
                    'view_application' =>  $view_application,
                    'edit_application' =>  $edit_application,
                    'delete_application' =>  $delete_application,
                    'upload_application' =>  $upload_application,
                    'download_application' =>  $download_application,
                    'view_training' =>  $view_training,
                    'edit_training' =>  $edit_training,
                    'delete_training' =>  $delete_training,
                    'upload_training' =>  $upload_training,
                    'download_training' =>  $download_training,
                    'view_reference' =>  $view_reference,
                    'edit_reference' =>  $edit_reference,
                    'delete_reference' =>  $delete_reference,
                    'upload_reference' =>  $upload_reference,
                    'download_reference' =>  $download_reference,
                    'view_health' =>  $view_health,
                    'edit_health' =>  $edit_health,
                    'delete_health' =>  $delete_health,
                    'upload_health' =>  $upload_health,
                    'download_health' =>  $download_health,
                    'view_dbs' =>  $view_dbs,
                    'edit_dbs' =>  $edit_dbs,
                    'delete_dbs' =>  $delete_dbs,
                    'upload_dbs' =>  $upload_dbs,
                    'download_dbs' =>  $download_dbs,
                    'view_bank' =>  $view_bank,
                    'edit_bank' =>  $edit_bank,
                    'delete_bank' =>  $delete_bank,
                    'upload_bank' =>  $upload_bank,
                    'download_bank' =>  $download_bank,
                    'view_starter' =>  $view_starter,
                    'edit_starter' =>  $edit_starter,
                    'delete_starter' =>  $delete_starter,
                    'upload_starter' =>  $upload_starter,
                    'download_starter' =>  $download_starter,
                    'view_contract' =>  $view_contract,
                    'edit_contract' =>  $edit_contract,
                    'delete_contract' =>  $delete_contract,
                    'upload_contract' =>  $upload_contract,
                    'download_contract' =>  $download_contract,
                    'view_induction' =>  $view_induction,
                    'edit_induction' =>  $edit_induction,
                    'delete_induction' =>  $delete_induction,
                    'upload_induction' =>  $upload_induction,
                    'download_induction' =>  $download_induction,
                    'terms_condition' =>  $terms_condition,
                    'email_template' =>  $email_template,
                    'contract_content' =>  $contract_content,
                    'pay_rates' =>  $pay_rates,
                    'department_role' =>  $department_role,
                    'add_staff' =>  $add_staff,
                    'view_edit' =>  $view_edit,
                    'delete_deactivate' =>  $delete_deactivate
                ]); 
                if($success){
                    return back()->with('success','Updated Successfully!');
                }
            }
            public function getName(Request $request){
                $user= $request->get('user');
                $name = DB::table('workers')     
                ->where('workers.id', '=',$user )
                ->get();
                return response()->json($name[0]);
            }
            public function deactivateStaff(Request $request) {
                $loggedId = Session::get('userId');
                if($loggedId==""){
                    return redirect()->route('sign.in');
                }
                $user= $request->get('user');
                $staff = Worker::find($user);
                $staff->update([
                    'staff_status' => "Inactive"
               ]);
                return back()->with('success','Deactivated Successfully!');
                }
            public function deleteStaff(Request $request) {
                $loggedId = Session::get('userId');
                if($loggedId==""){
                    return redirect()->route('sign.in');
                }
                $user= $request->get('user');
                Worker::where('id',$user)
                ->delete();
                return back()->with('success','Deleted Successfully!');
                }
            public function activateStaff(Request $request) {
                $loggedId = Session::get('userId');
                if($loggedId==""){
                    return redirect()->route('sign.in');
                }
                $user= $request->get('user');
                $staff = Worker::find($user);
                $staff->update([
                    'staff_status' => "Activ"
               ]);
                return back()->with('success','Activated Successfully!');
                }
}
