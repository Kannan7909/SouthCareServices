<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\File;
use Illuminate\Support\Facades\Validator;
use App\Models\Employee;
use Illuminate\Support\Facades\DB;
use Session;
use Redirect;
use App\Models\Bank;
use App\Models\Test;
use App\Models\Starter;
use App\Models\Application;
use App\Models\Health;



class ProfileController extends Controller
{
    public function index(){
        $loggedId = Session::get('userId');
        $employee = Employee::find($loggedId);
        return view('employeeProfile',compact('employee')); 
    }
    public function fileUpload(Request $request){
        $data = array();
      $validator = Validator::make($request->all(), [
         'file' => 'required|mimes:png,jpg,jpeg,csv,txt,pdf,docx|max:2048'
      ]);

      if ($validator->fails()) {

         $data['success'] = 0;
         $data['error'] = $validator->errors()->first('file');// Error response

      }else{
         if($request->file('file')) {

             $file = $request->file('file');
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
             $saveFile->employee_id =Session::get('userId');
             //$saveFile->file_name = "Passport".'_'.$file->getClientOriginalName();
             $saveFile->file_name = $file->getClientOriginalName();
             $saveFile->file_path = $filepath;
             $saveFile->save();
       
             // Response
             $data['success'] = 1;
             $data['message'] = 'Uploaded Successfully!';
             $data['filepath'] = $filepath;
             $data['extension'] = $extension;
         }else{
             // Response
             $data['success'] = 2;
             $data['message'] = 'File not uploaded.'; 
         }
      }

      return response()->json($data);
   }
   /*  public function employeeInduction(){
        return view('employeeInduction');
    } */
    public function emailVerify(){
        return view('thanksMail');
    } 
    public function confirmAccount(Request $request){
        $loggedId = request('loggedId');
        $employee = Employee::find($loggedId);
        $affected = DB::table('employees')->where('id', '=', $loggedId)->update(array('email_verified' => 1));
        return view('employeeProfile');
    } 
    public function adminPanel(){
        return view('adminPanel');  
        //return view('adminPanelTest');
    }
    public function saveBank(Request $request){
        $employee_id = Session::get('userId');
        $title = request('title');
        $surname = request('surname');
        $forename = request('forename');
        $address = request('address');
        $postcode = request('postcode');
        $tel = request('tel');
        $mobile = request('mobile');
        $email = request('email');
        $bank = request('bank');
        $bank_address = request('bank_address');
        $sort_code = request('sort_code');
        $account = request('account');
        $account_holder = request('account_holder');

        Bank::create([
            'employee_id' =>  $employee_id,
            'title' =>  $title,
            'surname' =>  $surname,
            'forename' =>  $forename,
            'address' =>  $address,
            'postcode' =>  $postcode,
            'tel_no' =>  $tel,
            'mobile_no' =>  $mobile,
            'email' =>  $email,
            'bank_name' =>  $bank,
            'bank_address' =>  $bank_address,
            'sort_code' =>  $sort_code,
            'account_no' =>  $account,
            'account_holder' =>  $account_holder
        ]);
        $employee = Employee::find($employee_id);
        return view('employeeProfile',compact('employee')); 
        
    }
    public function saveStarter(){
        $employee_id = Session::get('userId');
        $last_name = request('last_name');
        $first_name = request('first_name');
        $gender = request('gender');
        $birthday = request('birthday');
        $address = request('address');
        $insurance = request('insurance');
        $start_date = request('start_date');
        $statement = join(',',request('statement'));
        $loan = request('loan');
        $is_complete = request('is_complete');
        $is_debit = request('is_debit');
        $loan_type = request('loan_type');
        $pg_loan = request('pg_loan');
        $is_pg_complete = request('is_pg_complete');
        $pg_debit = request('pg_debit');
        $signature = request('signature');
        $full_name = request('full_name');
        $date = request('date');

        Starter::create([
            'employee_id' =>  $employee_id,
            'lastname' =>  $last_name,
            'firstname' =>  $first_name,
            'gender' =>  $gender,
            'birthday' =>  $birthday,
            'address' =>  $address,
            'insurance' =>  $insurance,
            'start_date' =>  $start_date,
            'statement' =>  $statement,
            'loan' =>  $loan,
            'is_complete' =>  $is_complete,
            'is_debit' =>  $is_debit,
            'loan_type' =>  $loan_type,
            'pg_loan' =>  $pg_loan,
            'is_pg_complete' =>  $is_pg_complete,
            'pg_debit' =>  $pg_debit,
            'signature' =>  $signature,
            'full_name' =>  $full_name,
            'date' =>  $date,
        ]);
        $employee = Employee::find($employee_id);
        return view('employeeProfile',compact('employee')); 
        
    }
    public function saveHealth(){
        $employee_id = Session::get('userId');
        $posts = request('posts');
        $surname = request('surname');
        $first_name = request('first_name');
        $address = request('address');
        $postcode = request('postcode');
        $tel_no = request('tel_no');
        $mobile_no = request('mobile_no');
        $gp_contact = request('gp_contact');
        $depression = request('depression');
        $depression_note = request('depression_note');
        $epilepsy = request('epilepsy');
        $epilepsy_note = request('epilepsy_note');
        $ailment = request('ailment');
        $ailment_note = request('ailment_note');
        $spinal = request('spinal');
        $spinal_note = request('spinal_note');
        $arthritis = request('arthritis');
        $arthritis_note = request('arthritis_note');
        $heart = request('heart');
        $heart_note = request('heart_note');
        $kidney = request('kidney');
        $kidney_note = request('kidney_note');
        $diabetes = request('diabetes');
        $diabetes_note = request('diabetes_note');
        $skin = request('skin');
        $skin_note = request('skin_note');
        $medication = request('medication');
        $alcohol = request('alcohol');
        $tobacco = request('tobacco');
        $disabled = request('disabled');
        $benefit = request('benefit');
        $absent = request('absent');
        $pregnant = request('pregnant');
        $additional = request('additional');
        $signature = request('signature');
        $full_name = request('full_name');
        $date = request('date');

        Health::create([
            'employee_id' =>  $employee_id,
            'posts' =>  $posts,
            'surname' =>  $surname,
            'first_name' =>  $first_name,
            'address' =>  $address,
            'postcode' =>  $postcode,
            'tel_no' =>  $tel_no,
            'mobile_no' =>  $mobile_no,
            'gp_contact' =>  $gp_contact,
            'depression' =>  $depression,
            'depression_note' =>  $depression_note,
            'epilepsy' =>  $epilepsy,
            'epilepsy_note' =>  $epilepsy_note,
            'ailment' =>  $ailment,
            'ailment_note' =>  $ailment_note,
            'spinal' =>  $spinal,
            'spinal_note' =>  $spinal_note,
            'arthritis' =>  $arthritis,
            'arthritis_note' =>  $arthritis_note,
            'heart' =>  $heart,
            'heart_note' =>  $heart_note,
            'kidney' =>  $kidney,
            'kidney_note' =>  $kidney_note,
            'diabetes' =>  $diabetes,
            'diabetes_note' =>  $diabetes_note,
            'skin' =>  $skin,
            'skin_note' =>  $skin_note,
            'medication' =>  $medication,
            'alcohol' =>  $alcohol,
            'tobacco' =>  $tobacco,
            'disabled' =>  $disabled,
            'benefit' =>  $benefit,
            'absent' =>  $absent,
            'pregnant' =>  $pregnant,
            'additional' =>  $additional,
            'signature' =>  $signature,
            'full_name' =>  $full_name,
            'date' =>  $date,
        ]);
        $employee = Employee::find($employee_id);
        return view('employeeProfile',compact('employee')); 
     
        
    }
    public function saveApplication(){
        $employee_id = Session::get('userId');
        $posts = request('posts');
        $title = request('title');
        $surname = request('surname');
        $firstname = request('first_name');
        $date_of_birth = request('birthday');
        $marital_status = request('marital_status');
        $nationality = request('nationality');
        $ni_number = request('ni_number');
        $address = request('address');
        $postcode = request('postcode');
        $tel_no = request('tel_no');
        $mobile_no = request('mobile_no');
        $email = request('email');
        $passport_no = request('passport_no');
        $place_of_issue = request('place_of_issue');
        $issue_date = request('issue_date');
        $expiry_date = request('expiry_date');
        $visa_status = request('visa_status');
        $visa_expiry_date = request('visa_expiry_date');
        $course = request('course');
        $relative_name = request('relative_name');
        $relationship = request('relationship');
        $relative_address = request('relative_address');
        $relative_tel = request('relative_tel');
        $relative_mobile = request('relative_mobile');
        $relative_email = request('relative_email');
        $study_place = request('study_place');
        $qualification = request('qualification');
        $qualified_date = request('qualified_date');
        $course_name = request('course_name');
        $date_attended = request('date_attended');
        $course_expiry_date = request('course_expiry_date');
        $details = request('details');
        $from = request('from');
        $to = request('to');
        $employer_name = request('employer_name');
        $business_type = request('business_type');
        $job_title = request('job_title');
        $refer1_name = request('refer1_name');
        $refer2_name = request('refer2_name');
        $refer1_job = request('refer1_job');
        $refer2_job = request('refer2_job');
        $refer1_relation = request('refer1_relation');
        $refer2_relation = request('refer2_relation');
        $refer1_address = request('refer1_address');
        $refer2_address = request('refer2_address');
        $refer1_company = request('refer1_company');
        $refer2_company = request('refer2_company');
        $refer1_tel = request('refer1_tel');
        $refer2_tel = request('refer2_tel');
        $refer1_email = request('refer1_email');
        $refer2_email = request('refer2_email');
        $choose = request('choose');
        $gender = request('gender');
        $age = request('age');
        $disable = request('disable');
        $disability_details = request('disability_details');
        $service = request('service');
        $offence = request('offence');
        $disciplinary_procedure = request('disciplinary_procedure');
        $criminal_offence = request('criminal_offence');
        $agree = request('agree');
        $notes = request('notes');
        $signature = request('signature');
        $name = request('name');
        $date = request('date');

        Application::create([
            'employee_id' =>  $employee_id,
            'posts' =>  $posts,
            'title' =>  $title,
            'surname' =>  $surname,
            'firstname' =>  $firstname,
            'date_of_birth' =>  $date_of_birth,
            'marital_status' =>  $marital_status,
            'nationality' =>  $nationality,
            'ni_number' =>  $ni_number,
            'address' =>  $address,
            'postcode' =>  $postcode,
            'tel_no' =>  $tel_no,
            'mobile_no' =>  $mobile_no,
            'email' =>  $email,
            'passport_no' =>  $passport_no,
            'place_of_issue' =>  $place_of_issue,
            'issue_date' =>  $issue_date,
            'expiry_date' =>  $expiry_date,
            'visa_status' =>  $visa_status,
            'visa_expiry_date' =>  $visa_expiry_date,
            'course' =>  $course,
            'relative_name' =>  $relative_name,
            'relationship' =>  $relationship,
            'relative_address' =>  $relative_address,
            'relative_tel' =>  $relative_tel,
            'relative_mobile' =>  $relative_mobile,
            'relative_email' =>  $relative_email,
            'study_place' =>  $study_place,
            'qualification' =>  $qualification,
            'qualified_date' =>  $qualified_date,
            'course_name' =>  $course_name,
            'date_attended' =>  $date_attended,
            'course_expiry_date' =>  $course_expiry_date,
            'details' =>  $details,
            'from' =>  $from,
            'to' =>  $to,
            'employer_name' =>  $employer_name,
            'business_type' =>  $business_type,
            'job_title' =>  $job_title,
            'refer1_name' =>  $refer1_name,
            'refer2_name' =>  $refer2_name,
            'refer1_job' =>  $refer1_job,
            'refer2_job' =>  $refer2_job,
            'refer1_relation' =>  $refer1_relation,
            'refer2_relation' =>  $refer2_relation,
            'refer1_address' =>  $refer1_address,
            'refer2_address' =>  $refer2_address,
            'refer1_company' =>  $refer1_company,
            'refer2_company' =>  $refer2_company,
            'refer1_tel' =>  $refer1_tel,
            'refer2_tel' =>  $refer2_tel,
            'refer1_email' =>  $refer1_email,
            'refer2_email' =>  $refer2_email,
            'choose' =>  $choose,
            'gender' =>  $gender,
            'age' =>  $age,
            'disable' =>  $disable,
            'disability_details' =>  $disability_details,
            'service' =>  $service,
            'offence' =>  $offence,
            'disciplinary_procedure' =>  $disciplinary_procedure,
            'criminal_offence' =>  $criminal_offence,
            'agree' =>  $agree,
            'notes' =>  $notes,
            'signature' =>  $signature,
            'name' =>  $name,
            'date' =>  $date,
        ]);
        $employee = Employee::find($employee_id);
        return view('employeeProfile',compact('employee')); 
        
    }
    public function inductionChecklist(){
        return view('inductionChecklist');
    }
    public function bankDetails(){
       /*  $employees = DB::table('employees')
        ->select('*')
        ->join('banks','employees.id','=','banks.employee_id')
        ->get(); */
        $employees = DB::table(DB::raw('(SELECT distinct employee_id from banks) AS B'))
        ->join('employees','B.employee_id','=','employees.id')
        ->get();
        $bankUser = Bank::all();
        //return view('bankDetails',compact('bankUser', 'employees'));
        return view('bankDetails',compact('employees'));
    }
    public function editBank($employeeId){
       $employee = Bank::find(decrypt($employeeId));
       return view('editBank',compact('employee')); 
    } 
    public function starterChecklistDetails(){
        $employees = DB::table('employees')
        ->select('*')
        ->join('starters','employees.id','=','starters.employee_id')
        ->get();
        $starterUser = Starter::all();
/*         return view('starterChecklistDetails',compact('starterUser', 'employees'));
 */ 
        return view('starterChecklistDetails',compact('employees'));
    }
    public function editStarterChecklist($employeeId){
        $employee = Starter::find(decrypt($employeeId));
        return view('editStarterChecklist',compact('employee')); 
     }
     public function healthQuestionnaireDetails(){
        $employees = DB::table('employees')
        ->select('*')
        ->join('healths','employees.id','=','healths.employee_id')
        ->get();
        $healthUser = Health::all();
       // return view('healthQuestionnaireDetails',compact('healthUser', 'employees'));
        return view('healthQuestionnaireDetails',compact('employees'));
    }
    public function editHealthQuestionnaire($employeeId){
        $employee = Health::find(decrypt($employeeId));
        return view('editHealthQuestionnaire',compact('employee')); 
     }
     public function applicationDetails(){
        $employees = DB::table('employees')
        ->select('*')
        ->join('applications','employees.id','=','applications.employee_id')
        ->get();
        $applicationUser = Application::all();
        //return view('applicationFormDetails',compact('applicationUser', 'employees'));
        return view('applicationFormDetails',compact('employees'));
    }
    public function editApplication($employeeId){
        $employee = Application::find(decrypt($employeeId));
        return view('editApplication',compact('employee')); 
     }
     public function updateBank(){
        // return request()->all();
         $employeeId = decrypt(request('employee_id'));
         $employee = Bank::find($employeeId);
         $employee->update([

        'title' => request('title'),
        'surname' => request('surname'),
        'forename' => request('forename'),
        'address' => request('address'),
        'postcode' => request('postcode'),
        'tel_no' => request('tel_no'),
        'mobile_no' => request('mobile_no'),
        'email' => request('email'),
        'bank_name' => request('bank_name'),
        'sort_code' => request('sort_code'),
        'account_no' => request('account_no'),
        'account_holder' => request('account_holder'),
        ]);
        return redirect()->route('edit.bank',encrypt($employee->id))
             ->with('success','1 Record Updated Successfuly !!');
     } 
     public function updateStarter(){
        // return request()->all();
         $employeeId = decrypt(request('employee_id'));
         $employee = Starter::find($employeeId);
        /*  return request('gender');
         exit; */
         $employee->update([

        'last_name' => request('last_name'),
        'first_name' => request('first_name'),
        'gender' => request('gender'),
        'birthday' => request('birthday'),
        'address' => request('address'),
        'insurance' => request('insurance'),
        'start_date' => request('start_date'),
        'statement' => join(',',request('statement')),
        'loan' => request('loan'),
        'is_complete' => request('is_complete'),
        'is_debit' => request('is_debit'),
        'loan_type' => request('loan_type'),
        'pg_loan' => request('pg_loan'),
        'is_pg_complete' => request('is_pg_complete'),
        'pg_debit' => request('pg_debit'),
        'signature' => request('signature'),
        'full_name' => request('full_name'),
        'date' => request('date'),
        ]);
        return redirect()->route('edit.starterChecklist',encrypt($employee->id))
             ->with('success','1 Record Updated Successfuly !!');
     } 
     public function updateHealth(){
        // return request()->all();
         $employeeId = decrypt(request('employee_id'));
         $employee = Health::find($employeeId);
         
         $employee->update([
        'posts' => request('posts'),
        'surname' => request('surname'),
        'first_name' => request('first_name'),
        'address' => request('address'),
        'postcode' => request('postcode'),
        'tel_no' => request('tel_no'),
        'mobile_no' => request('mobile_no'),
        'gp_contact' => request('gp_contact'),
        'depression' => request('depression'),
        'depression_note' => request('depression_note'),
        'epilepsy' => request('epilepsy'),
        'epilepsy_note' => request('epilepsy_note'),
        'ailment' => request('ailment'),
        'ailment_note' => request('ailment_note'),
        'spinal' => request('spinal'),
        'spinal_note' => request('spinal_note'),
        'arthritis' => request('arthritis'),
        'arthritis_note' => request('arthritis_note'),
        'heart' => request('heart'),
        'heart_note' => request('heart_note'),
        'kidney' => request('kidney'),
        'kidney_note' => request('kidney_note'),
        'diabetes' => request('diabetes'),
        'diabetes_note' => request('diabetes_note'),
        'skin' => request('skin'),
        'skin_note' => request('skin_note'),
        'medication' => request('medication'),
        'alcohol' => request('alcohol'),
        'tobacco' => request('tobacco'),
        'disabled' => request('disabled'),
        'absent' => request('absent'),
        'pregnant' => request('pregnant'),
        'additional' => request('additional'),
        'signature' => request('signature'),
        'full_name' => request('full_name'),
        'date' => request('date'),
        ]);
        return redirect()->route('edit.healthQuestionnaire',encrypt($employee->id))
             ->with('success','1 Record Updated Successfuly !!');
     } 
     public function updateApplication(){
        // return request()->all();
         $employeeId = decrypt(request('employee_id'));
         $employee = Application::find($employeeId);
         
         $employee->update([
        'posts' => request('posts'),
        'title' => request('title'),
        'surname' => request('surname'),
        'firstname' => request('firstname'),
        'date_of_birth' => request('date_of_birth'),
        'marital_status' => request('marital_status'),
        'nationality' => request('nationality'),
        'ni_number' => request('ni_number'),
        'address' => request('address'),
        'postcode' => request('postcode'),
        'tel_no' => request('tel_no'),
        'mobile_no' => request('mobile_no'),
        'email' => request('email'),
        'passport_no' => request('passport_no'),
        'place_of_issue' => request('place_of_issue'),
        'issue_date' => request('issue_date'),
        'expiry_date' => request('expiry_date'),
        'visa_status' => request('visa_status'),
        'visa_expiry_date' => request('visa_expiry_date'),
        'course' => request('course'),
        'relative_name' => request('relative_name'),
        'relationship' => request('relationship'),
        'relative_address' => request('relative_address'),
        'relative_tel' => request('relative_tel'),
        'relative_mobile' => request('relative_mobile'),
        'relative_email' => request('relative_email'),
        'study_place' => request('study_place'),
        'qualification' => request('qualification'),
        'qualified_date' => request('qualified_date'),
        'course_name' => request('course_name'),
        'date_attended' => request('date_attended'),
        'course_expiry_date' => request('course_expiry_date'),
        'details' => request('details'),
        'from' => request('from'),
        'to' => request('to'),
        'employer_name' => request('employer_name'),

        'business_type' => request('business_type'),
        'job_title' => request('job_title'),
        'refer1_name' => request('refer1_name'),
        'refer2_name' => request('refer2_name'),
        'refer1_job' => request('refer1_job'),
        'refer2_job' => request('refer2_job'),
        'refer1_relation' => request('refer1_relation'),
        'refer2_relation' => request('refer2_relation'),
        'refer1_address' => request('refer1_address'),
        'refer2_address' => request('refer2_address'),
        'refer1_company' => request('refer1_company'),
        'refer2_company' => request('refer2_company'),
        'refer1_tel' => request('refer1_tel'),
        'refer2_tel' => request('refer2_tel'),
        'refer1_email' => request('refer1_email'),
        'refer2_email' => request('refer2_email'),
        'choose' => request('choose'),
        'gender' => request('gender'),
        'age' => request('age'),
        'disable' => request('disable'),
        'disability_details' => request('disability_details'),
        'service' => request('service'),
        'offence' => request('offence'),
        'disciplinary_procedure' => request('disciplinary_procedure'),
        'criminal_offence' => request('criminal_offence'),
        'agree' => request('agree'),
        'notes' => request('notes'),
        'signature' => request('signature'),
        'name' => request('name'),
        'date' => request('date'),
        ]);
        return redirect()->route('edit.application',encrypt($employee->id))
             ->with('success','1 Record Updated Successfuly !!');
     } 
    }
