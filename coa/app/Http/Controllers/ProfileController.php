<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
/* use App\Models\File;
use Illuminate\Support\Facades\Validator;*/
use Illuminate\Support\Facades\DB; 
use Session;
use App\Models\Employee;
use App\Models\Application;
use Illuminate\Support\Facades\Validator;
use App\Models\File;
use App\Models\Reference;
use App\Models\Dbsdata;
use App\Models\Training;
use App\Models\Education;
use App\Models\Work;
use Illuminate\Support\Facades\Mail;
use App\Mail\TrainingMail;
use App\Mail\TrainingReviewedMail;
use App\Mail\ApplicationApproveMail;
use App\Mail\ApplicationReviewedMail;
use App\Mail\ReferenceApprovedMail;
use App\Mail\ReferenceReviewedMail;
use App\Mail\DBSApprovedMail;
use App\Mail\DBSReviewedMail;
use App\Mail\ApplicationSubmittedMail;
use App\Mail\TrainingSubmittedMail;
use App\Mail\ReferenceSubmittedMail;
use App\Mail\DBSSubmittedMail;
use App\Mail\TrainingRequestMail;
use App\Mail\DBSRequestMail;
use App\Models\Health;
use App\Mail\HealthSubmittedMail;
use App\Mail\HealthReviewedMail;
use App\Mail\HealthApprovedMail;
use App\Models\Comment;
use App\Models\Bank;
use App\Mail\BankSubmittedMail;
use App\Mail\StarterSubmittedMail;
use App\Mail\DocumentUploadMail;
use App\Mail\BankReviewedMail;
use App\Mail\BankApprovedMail;
use App\Models\Starter;
use App\Mail\StarterReviewedMail;
use App\Mail\StarterApprovedMail;
use App\Models\StarterFile;
use App\Mail\ApplicationSubmittedAdminMail;
use App\Mail\TrainingSubmittedAdminMail;
use App\Mail\ReferenceSubmittedAdminMail;
use App\Mail\DBSSubmittedAdminMail;
use App\Mail\StarterSubmittedAdminMail;
use App\Mail\BankSubmittedAdminMail;
use App\Mail\HealthSubmittedAdminMail;
use App\Mail\ContractCommentAdminMail;
use App\Models\UserContract; 
use App\Mail\ContractSubmittedMail;  
use App\Mail\EmployeeContractSubmittedMail;
use App\Mail\ContractCommentUserMail;  
use App\Mail\ContractApprovedMail; 
use App\Mail\ContractReviewedMail;
use App\Models\InductionChecklist;
use App\Mail\ChecklistSubmittedMail;  
use App\Mail\ChecklistSubmittedAdminMail; 
use App\Mail\ChecklistApprovedMail; 

/* use Redirect;
use App\Models\Bank;
use App\Models\Test;
use App\Models\Starter;
use App\Models\Application;
use App\Models\Health; */

class ProfileController extends Controller
{
    public function showDashboard(){
        $loggedId = Session::get('userId');
        if($loggedId==""){
            return redirect()->route('sign.in');
        }
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
        return view('profile',compact('employee','inductionStatus','profile','policy'));
    }
    public function showApplicationForm(){
        $loggedId = Session::get('userId');
        if($loggedId==""){
            return redirect()->route('sign.in');
        }
        $employee = Employee::find($loggedId);
        $currentStatus = $employee->application_status;
        $form = "Application Form";
        $path ="edit.application";

   $profile = DB::table('employees')
        ->select('file_type','file_type_additional','file_path','file_name')
        ->join('files','employees.id','=','files.employee_id')
        ->where('employees.id','=',$loggedId)
        ->where(function ($query) {
            $query->where('files.file_type','=','Profile Photo');             
        })
        ->get();
        
    $comments = DB::table('employees')     
  ->join('comments','employees.id','=','comments.employee_id')
  ->where('employees.id', '=',$loggedId )
  ->where('comments.comment_section', '=','Application' )
  ->orderBy('comments.created_at','desc')
  ->get();
   $inductionStatus = DB::table('induction_users')
    ->join('employees', 'employees.id', '=', 'induction_users.user_id')
    ->select('induction_users.*')
    ->where('employees.id', '=',$loggedId )
    ->orderBy('induction_users.created_at', 'DESC')
    ->get();
  if(sizeof($comments)!=0){
    $comment=  $comments[0]->comment;
    $admin=  $comments[0]->created_by;
  }else{
    $comment=  "Nil";
    $admin=  "Nil";
  }

    if($currentStatus=="Submitted"){
        $data = "You have submitted your ". $form.". We will let you know once the ". $form." is under review.";
        return view('currentStatus',compact('employee','data','form','path','profile','comment','admin','inductionStatus')); 
    }else if($currentStatus=="Under Review"){
        $data = "Your ". $form." is under review. We will let you know once the ". $form." is approved.";
        return view('currentStatus',compact('employee','data','form','path','profile','comment','admin','inductionStatus')); 
    }else if($currentStatus=="Approved"){
        $data = "Your ". $form." is approved.";
        return view('currentStatus',compact('employee','data','form','path','profile','comment','admin','inductionStatus')); 
    }else{
        return view('application',compact('employee','form','profile','inductionStatus'));
    }
    }
    public function saveApplication(Request $request){
        //return $request->all();

        $employee_id = Session::get('userId');
        $dob = request('birthday');
        $date_of_birth = date('Y-m-d',strtotime($dob));
        $marital_status = request('marital_status');
        $nationality = request('nationality');
        $have_ni = request('have_ni');
        $ni_number = request('ni_number');
        $ni_reference_number = request('ni_reference_number');
        $have_mnc = request('have_mnc');
        $mnc_pin = request('mnc_pin');
        $passport_no = request('passport_no');
        $place_of_issue = request('place_of_issue');
        $issue = request('issue_date');
        $issue_date = date('Y-m-d',strtotime($issue));
        $expiry = request('expiry_date');
        $expiry_date = date('Y-m-d',strtotime($expiry));
        $visa_status = request('visa_status');
        $other_note = request('other_note');
        $visa_expiry = request('visa_expiry_date');
        $visa_expiry_date = date('Y-m-d',strtotime($visa_expiry));
        $have_sharecode = request('have_sharecode');
        $sharecode = request('sharecode');
        $relative_name = request('relative_name');
        $relationship = request('relationship');
        $address1 = request('line_1');
        $address2 = request('line_2');
        $address3 = request('line_3');
        $postTown = request('post_town');
        $postcode = request('postcode');
        $relative_tel_code = request('relative_tel_code');
        $relative_tel = request('relative_tel');
        $relative_mobile_code = request('relative_mobile_code');
        $relative_mobile = request('relative_mobile');
        $relative_email = request('relative_email');
        $choose = request('choose');
        $gender = request('gender');
        $age = request('age');
        $disable = request('disable');
        $disability_note = request('disability_note');
        $service = request('service');
        $service_note = request('service_note');
        $offence = request('offence');
        $offence_note = request('offence_note');
        $disciplinary_procedure = request('disciplinary_procedure');
        $disciplinary_note = request('disciplinary_note');
        $criminal_offence = request('criminal_offence');
        $criminal_note = request('criminal_note');
        $agree_declaration = request('agree_declaration');
        $agree = request('agree');
        $signature = request('signature');
        $name = request('name');
        $date_sig = request('date');
        $date = date('Y-m-d',strtotime($date_sig));

       $success = Application::create([
            'employee_id' =>  $employee_id,
            'date_of_birth' =>  $date_of_birth,
            'marital_status' =>  $marital_status,
            'nationality' =>  $nationality,
            'have_ni' =>  $have_ni,
            'ni_number' =>  $ni_number,
            'ni_reference_number' =>  $ni_reference_number,
            'have_mnc' =>  $have_mnc,
            'mnc_pin' =>  $mnc_pin,
            'passport_no' =>  $passport_no,
            'place_of_issue' =>  $place_of_issue,
            'issue_date' =>  $issue_date,
            'expiry_date' =>  $expiry_date,
            'visa_status' =>  $visa_status,
            'other_note' =>  $other_note,
            'visa_expiry_date' =>  $visa_expiry_date,
            'have_sharecode' =>  $have_sharecode,
            'sharecode' =>  $sharecode,
            'relative_name' =>  $relative_name,
            'relationship' =>  $relationship,
            'address1' =>  $address1,
            'address2' =>  $address2,
            'address3' =>  $address3,
            'postTown' =>  $postTown,
            'postcode' =>  $postcode,
            'relative_tel_code' =>  $relative_tel_code,
            'relative_tel' =>  $relative_tel,
            'relative_mobile_code' =>  $relative_mobile_code,
            'relative_mobile' =>  $relative_mobile,
            'relative_email' =>  $relative_email,
            'choose' =>  $choose,
            'gender' =>  $gender,
            'age' =>  $age,
            'disable' =>  $disable,
            'disability_note' =>  $disability_note,
            'service' =>  $service,
            'service_note' =>  $service_note,
            'offence' =>  $offence,
            'offence_note' =>  $offence_note,
            'disciplinary_procedure' =>  $disciplinary_procedure,
            'disciplinary_note' =>  $disciplinary_note,
            'criminal_offence' =>  $criminal_offence,
            'criminal_note' =>  $criminal_note,
            'agree_declaration' =>  $agree_declaration,
            'agree' =>  $agree,
            'signature' =>  $signature,
            'name' =>  $name,
            'date' =>  $date,
        ]);
        if($success){
            $employee = Employee::find($employee_id);
            $employee->update([
                'application_status' => "Submitted"
           ]);
        }
        /* $employee = Employee::find($employee_id);
        return view('profile',compact('employee'));  */
        $mailData = [
         "url" => "https://coa.southcareserviceuk.com/",
         "name" => $employee->surname." ".$employee->firstname
        ];
         $rowData =  DB::table('employees')
        ->select('*')
        ->where('id','=',$employee_id)
        ->get();
        $email = $rowData[0]->email;
        Mail::to($email)->send(new ApplicationSubmittedMail($mailData));
        
        $adminEmail = "info@southcareserviceuk.com";
        Mail::to($adminEmail)->send(new ApplicationSubmittedAdminMail($mailData));  
        //return view('formSuccess');
        $profile = DB::table('employees')
            ->select('file_type','file_type_additional','file_path','file_name')
            ->join('files','employees.id','=','files.employee_id')
            ->where('employees.id','=',$employee_id)
            ->where(function ($query) {
                $query->where('files.file_type','=','Profile Photo');             
            })
            ->get();
        $inductionStatus = DB::table('induction_users')
        ->join('employees', 'employees.id', '=', 'induction_users.user_id')
        ->select('induction_users.*')
        ->where('employees.id', '=',$employee_id )
        ->orderBy('induction_users.created_at', 'DESC')
        ->get();
        return view('afterSubmitApplication',compact('employee','profile','inductionStatus'));
        
    }
    public function fileUpload(Request $request){
        $data = array();
      $validator = Validator::make($request->all(), [
/*          'file' => 'required|mimes:png,jpg,jpeg,csv,txt,pdf,docx|max:2048'
 */          'file' => 'required|mimes:png,jpg,jpeg,csv,txt,pdf,docx'
         ]);

      if ($validator->fails()) {

         $data['success'] = 0;
         $data['error'] = $validator->errors()->first('file');// Error response

      }else{
         if($request->file('file')) {

             $file = $request->file('file');
            
             $file_type= $request->file_type;
             $employeeId= $request->employeeId;
             $expiry_date= $request->expiry_date;


             $GLOBALS['type'] = $request->file_type;

             $file_type_additional= $request->file_type_additional;
             $userFile = DB::table('files')
             ->select('*')
             ->where('files.file_type','=',$GLOBALS['type'])
             ->where('files.employee_id','=',$employeeId)
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
             $saveFile->employee_id =Session::get('userId');
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
        $employee = Employee::find(Session::get('userId'));
        $mailData = [
            "url" => "https://coa.southcareserviceuk.com/",
            "name" => $employee->surname." ".$employee->firstname,
            "file" =>  $request->file_type
         ];
        $email = "info@southcareserviceuk.com";
       Mail::to($email)->send(new DocumentUploadMail($mailData));
      return response()->json($data);
   }
   public function saveEducation(Request $request){
   /*  $id = $_GET['id'];
    $study_place = $_GET['study_place'][1];
    $qualification = $_GET['qualification'];
    $qualified_date = $_GET['qualified_date'];
    return $study_place; */
/* dd($request->all());
 */
$itemlist = array();
$rowData=$request->get('itemlist'); 
$rowCount=count($rowData);

for($i=0;$i<$rowCount;$i++){
    $data= $rowData[$i]['study_place'];
$employee_id = Session::get('userId');
Education::create([
    'employee_id' =>  $employee_id,
    'study_place' => $rowData[$i]['study_place'],
    'qualification' =>   $rowData[$i]['qualification'],
    'qualified_date' =>    $rowData[$i]['qualified_date'],
    ]);
    }
}
public function saveWork(Request $request){
    $itemlist = array();
    $rowData=$request->get('itemlist'); 
    $rowCount=count($rowData);
    
    for($i=0;$i<$rowCount;$i++){
    $employee_id = Session::get('userId');
    Work::create([
        'employee_id' =>  $employee_id,
        'from' => $rowData[$i]['from'],
        'to' =>   $rowData[$i]['to'],
        'employer_name' =>    $rowData[$i]['employer_name'],
        'business_type' =>   $rowData[$i]['business_type'],
        'job_title' =>    $rowData[$i]['job_title'],
        ]);
        }
 }
public function showTrainingForm(){
    $loggedId = Session::get('userId');
    if($loggedId==""){
            return redirect()->route('sign.in');
        }
    $employee = Employee::find($loggedId);
    $currentStatus = $employee->training_status;
    $form = "Training Check";
    $path ="all.documents";
    $profile = DB::table('employees')
        ->select('file_type','file_type_additional','file_path','file_name')
        ->join('files','employees.id','=','files.employee_id')
        ->where('employees.id','=',$loggedId)
        ->where(function ($query) {
            $query->where('files.file_type','=','Profile Photo');             
        })
        ->get();
      $comments = DB::table('employees')     
    ->join('comments','employees.id','=','comments.employee_id')
    ->where('employees.id', '=',$loggedId )
    ->where('comments.comment_section', '=','Training' )
    ->orderBy('comments.created_at','desc')
    ->get();
      $inductionStatus = DB::table('induction_users')
        ->join('employees', 'employees.id', '=', 'induction_users.user_id')
        ->select('induction_users.*')
        ->where('employees.id', '=',$loggedId )
        ->orderBy('induction_users.created_at', 'DESC')
        ->get();
    if(sizeof($comments)!=0){
        $comment=  $comments[0]->comment;
        $admin=  $comments[0]->created_by;
      }else{
        $comment=  "Nil";
        $admin=  "Nil";
      }

    if($currentStatus=="Submitted"){
        $data = "You have submitted your ". $form.". We will let you know once the ". $form." is under review.";
        return view('currentStatus',compact('employee','data','form','path','profile','comment','admin','inductionStatus')); 
    }else if($currentStatus=="Requested"){
        $data = "You have requested ". $form.". Our team will get in touch with you soon.";
        return view('currentStatus',compact('employee','data','form','path','profile','comment','admin','inductionStatus')); 
    }else if($currentStatus=="Under Review"){
        $data = "Your ". $form." is under review. We will let you know once the ". $form." is approved.";
        return view('currentStatus',compact('employee','data','form','path','profile','comment','admin','inductionStatus')); 
    }else if($currentStatus=="Approved"){
        $data = "Your ". $form." is approved.";
        return view('currentStatus',compact('employee','data','form','path','profile','comment','admin','inductionStatus')); 
    }else{
    return view('training',compact('employee','profile','inductionStatus'));
    }
}
public function saveTraining(){
    $employee_id = Session::get('userId');
    $have_training = request('training');
    $documents = request('documents');
    $loggedId = Session::get('userId');
    if($loggedId==""){
            return redirect()->route('sign.in');
        }
    $employee = Employee::find($loggedId);
    if ($documents=="yes") {
        $upload_status="completed";
     }
     if ($documents=="no" || $documents=="") {
        $upload_status="pending";
     }
    
    
    /*  $result =  DB::table('trainings')
     ->select('*')
     ->where('employee_id','=',$employee_id)
     ->get();
     if(sizeof($result)!=0){
        Training::where('employee_id', $employee_id)->update([
            'employee_id' =>  $employee_id,
            'have_training' =>  $have_training, 
            'upload_status' =>  $upload_status,  
        ]);
        $result =  DB::table('trainings')
        ->select('*')
        ->where('upload_status','=',"pending")
        ->get();
    if(sizeof($result)!=0){
        $employee = Employee::find($employee_id);
        $employee->update([
            'training_status' => "Requested"
       ]);
      
        $mailData = [
         "url" => "https://coa.southcareserviceuk.com/",
         "name" => $employee->surname." ".$employee->firstname
        ];
         $email = "ecare246@gmail.com";
        Mail::to($email)->send(new TrainingRequestMail($mailData));
        //return view('requestSent');
        return view('afterRequestTraining',compact('employee'));
    }
 }  */
 
 
 if($documents=="yes"){
        $employee = Employee::find($employee_id);
        $employee->update([
            'training_status' => "Submitted"
       ]);
       $result =  DB::table('trainings')
     ->select('*')
     ->where('employee_id','=',$employee_id)
     ->get();
     if(sizeof($result)!=0){
        Training::where('employee_id', $employee_id)->update([
            'employee_id' =>  $employee_id,
            'have_training' =>  $have_training, 
            'upload_status' =>  $upload_status,  
        ]);
    }else{
       Training::create([
        'employee_id' =>  $employee_id,
        'have_training' =>  $have_training, 
        'upload_status' =>  $upload_status,  
    ]);
    }
       $mailData = [
         "url" => "https://coa.southcareserviceuk.com/",
         "name" => $employee->surname." ".$employee->firstname
        ];
         $rowData =  DB::table('employees')
        ->select('*')
        ->where('id','=',$employee_id)
        ->get();
        $email = $rowData[0]->email;
        Mail::to($email)->send(new TrainingSubmittedMail($mailData));
        
        $adminEmail = "info@southcareserviceuk.com";
        Mail::to($adminEmail)->send(new TrainingSubmittedAdminMail($mailData));  
        // return view('formSuccess');
       $profile = DB::table('employees')
        ->select('file_type','file_type_additional','file_path','file_name')
        ->join('files','employees.id','=','files.employee_id')
        ->where('employees.id','=',$employee_id)
        ->where(function ($query) {
            $query->where('files.file_type','=','Profile Photo');             
        })
        ->get();
        $inductionStatus = DB::table('induction_users')
            ->join('employees', 'employees.id', '=', 'induction_users.user_id')
            ->select('induction_users.*')
            ->where('employees.id', '=',$employee_id )
            ->orderBy('induction_users.created_at', 'DESC')
            ->get();
        return view('afterSubmitTraining',compact('employee','profile','inductionStatus'));
}else{
    $employee = Employee::find($employee_id);
    $employee->update([
        'training_status' => "Requested"
   ]);
   $result =  DB::table('trainings')
   ->select('*')
   ->where('employee_id','=',$employee_id)
   ->get();
   if(sizeof($result)!=0){
      Training::where('employee_id', $employee_id)->update([
          'employee_id' =>  $employee_id,
          'have_training' =>  $have_training, 
          'upload_status' =>  $upload_status,  
      ]);
  }else{
     Training::create([
      'employee_id' =>  $employee_id,
      'have_training' =>  $have_training, 
      'upload_status' =>  $upload_status,  
  ]);
  }
    $mailData = [
     "url" => "https://coa.southcareserviceuk.com/",
     "name" => $employee->surname." ".$employee->firstname
    ];
     $email = "info@southcareserviceuk.com";
    Mail::to($email)->send(new TrainingRequestMail($mailData));
    //return view('requestSent');
   $profile = DB::table('employees')
    ->select('file_type','file_type_additional','file_path','file_name')
    ->join('files','employees.id','=','files.employee_id')
    ->where('employees.id','=',$employee_id)
    ->where(function ($query) {
        $query->where('files.file_type','=','Profile Photo');             
    })
    ->get();
    $inductionStatus = DB::table('induction_users')
    ->join('employees', 'employees.id', '=', 'induction_users.user_id')
    ->select('induction_users.*')
    ->where('employees.id', '=',$employee_id )
    ->orderBy('induction_users.created_at', 'DESC')
    ->get();
    return view('afterRequestTraining',compact('employee','profile','inductionStatus'));
}
 if ($have_training=="no") {
        $employee = Employee::find($employee_id);
        $employee->update([
            'training_status' => "Requested"
       ]);
       $result =  DB::table('trainings')
     ->select('*')
     ->where('employee_id','=',$employee_id)
     ->get();
     if(sizeof($result)!=0){
        Training::where('employee_id', $employee_id)->update([
            'employee_id' =>  $employee_id,
            'have_training' =>  $have_training, 
            'upload_status' =>  $upload_status,  
        ]);
    }else{
       Training::create([
        'employee_id' =>  $employee_id,
        'have_training' =>  $have_training, 
        'upload_status' =>  $upload_status,  
    ]);
    }
       $mailData = [
         "url" => "https://coa.southcareserviceuk.com/",
          "name" => $employee->surname." ".$employee->firstname
        ];
         $email = "info@southcareserviceuk.com";
        Mail::to($email)->send(new TrainingRequestMail($mailData));
        //return view('requestSent');
 $profile = DB::table('employees')
        ->select('file_type','file_type_additional','file_path','file_name')
        ->join('files','employees.id','=','files.employee_id')
        ->where('employees.id','=',$employee_id)
        ->where(function ($query) {
            $query->where('files.file_type','=','Profile Photo');             
        })
        ->get();
        $inductionStatus = DB::table('induction_users')
        ->join('employees', 'employees.id', '=', 'induction_users.user_id')
        ->select('induction_users.*')
        ->where('employees.id', '=',$employee_id )
        ->orderBy('induction_users.created_at', 'DESC')
        ->get();
    return view('afterRequestTraining',compact('employee','profile','inductionStatus'));
    }
}
public function showReferenceForm(){
    $loggedId = Session::get('userId');
    if($loggedId==""){
            return redirect()->route('sign.in');
        }
    $employee = Employee::find($loggedId);
    $currentStatus = $employee->reference_status;
    $form = "Reference Check";
    $path ="edit.reference";

   $profile = DB::table('employees')
    ->select('file_type','file_type_additional','file_path','file_name')
    ->join('files','employees.id','=','files.employee_id')
    ->where('employees.id','=',$loggedId)
    ->where(function ($query) {
        $query->where('files.file_type','=','Profile Photo');             
    })
    ->get();
    $comments = DB::table('employees')     
    ->join('comments','employees.id','=','comments.employee_id')
    ->where('employees.id', '=',$loggedId )
    ->where('comments.comment_section', '=','Reference' )
    ->orderBy('comments.created_at','desc')
    ->get();
    $inductionStatus = DB::table('induction_users')
        ->join('employees', 'employees.id', '=', 'induction_users.user_id')
        ->select('induction_users.*')
        ->where('employees.id', '=',$loggedId )
        ->orderBy('induction_users.created_at', 'DESC')
        ->get();
    if(sizeof($comments)!=0){
        $comment=  $comments[0]->comment;
        $admin=  $comments[0]->created_by;
      }else{
        $comment=  "Nil";
        $admin=  "Nil";
      }
    if($currentStatus=="Submitted"){
        $data = "You have submitted your ". $form.". We will let you know once the ". $form." is under review.";
        return view('currentStatus',compact('employee','data','form','path','profile','comment','admin','inductionStatus')); 
    }else if($currentStatus=="Under Review"){
        $data = "Your ". $form." is under review. We will let you know once the ". $form." is approved.";
        return view('currentStatus',compact('employee','data','form','path','profile','comment','admin','inductionStatus')); 
    }else if($currentStatus=="Approved"){
        $data = "Your ". $form." is approved.";
        return view('currentStatus',compact('employee','data','form','path','profile','comment','admin','inductionStatus')); 
    }else{
    return view('reference',compact('employee','profile','inductionStatus'));
    }
}
public function saveReference(){
    
    $employee_id = Session::get('userId');
    $refer1_name = request('refer1_name');
    $refer2_name = request('refer2_name');
    $refer1_job = request('refer1_job');
    $refer2_job = request('refer2_job');
    $other_note1 = request('other_note1');
    $other_note2 = request('other_note2');
    $refer1_address = request('refer1_address');
    $refer2_address = request('refer2_address');
    $refer1_company = request('refer1_company');
    $refer2_company = request('refer2_company');
    $refer1_tel = request('refer1_tel');
    $refer2_tel = request('refer2_tel');
    $refer1_email = request('refer1_email');
    $refer2_email = request('refer2_email');
    $success = Reference::create([
        'employee_id' =>  $employee_id,
        'refer1_name' =>  $refer1_name,
        'refer2_name' =>  $refer2_name,
        'refer1_job' =>  $refer1_job,
        'refer2_job' =>  $refer2_job,
        'other_note1' =>  $other_note1,
        'other_note2' =>  $other_note2,
        'refer1_address' =>  $refer1_address,
        'refer2_address' =>  $refer2_address,
        'refer1_company' =>  $refer1_company,
        'refer2_company' =>  $refer2_company,
        'refer1_tel' =>  $refer1_tel,
        'refer2_tel' =>  $refer2_tel,
        'refer1_email' =>  $refer1_email,
        'refer2_email' =>  $refer2_email   
    ]);
    if($success){
        $employee = Employee::find($employee_id);
        $employee->update([
            'reference_status' => "Submitted"
       ]);
    }
  $mailData = [
         "url" => "https://coa.southcareserviceuk.com/",
          "name" => $employee->surname." ".$employee->firstname
        ];
         $rowData =  DB::table('employees')
        ->select('*')
        ->where('id','=',$employee_id)
        ->get();
        $email = $rowData[0]->email;
        Mail::to($email)->send(new ReferenceSubmittedMail($mailData));
        
         $adminEmail = "info@southcareserviceuk.com";
       Mail::to($adminEmail)->send(new ReferenceSubmittedAdminMail($mailData));  
    //return view('formSuccess');
     $profile = DB::table('employees')
    ->select('file_type','file_type_additional','file_path','file_name')
    ->join('files','employees.id','=','files.employee_id')
    ->where('employees.id','=',$employee_id)
    ->where(function ($query) {
        $query->where('files.file_type','=','Profile Photo');             
    })
    ->get();
     $inductionStatus = DB::table('induction_users')
    ->join('employees', 'employees.id', '=', 'induction_users.user_id')
    ->select('induction_users.*')
    ->where('employees.id', '=',$employee_id )
    ->orderBy('induction_users.created_at', 'DESC')
    ->get();
    return view('afterSubmitReference',compact('employee','profile','inductionStatus'));
    
}
public function showDbsCheck(){
    $loggedId = Session::get('userId');
    if($loggedId==""){
            return redirect()->route('sign.in');
        }
    $employee = Employee::find($loggedId);
    $currentStatus = $employee->dbs_status;
    $form = "DBS Check";
    //$path ="all.documents";
    $path ="edit.dbs";
   $profile = DB::table('employees')
    ->select('file_type','file_type_additional','file_path','file_name')
    ->join('files','employees.id','=','files.employee_id')
    ->where('employees.id','=',$loggedId)
    ->where(function ($query) {
        $query->where('files.file_type','=','Profile Photo');             
    })
    ->get();
      $comments = DB::table('employees')     
    ->join('comments','employees.id','=','comments.employee_id')
    ->where('employees.id', '=',$loggedId )
    ->where('comments.comment_section', '=','DBS' )
    ->orderBy('comments.created_at','desc')
    ->get();
    $inductionStatus = DB::table('induction_users')
        ->join('employees', 'employees.id', '=', 'induction_users.user_id')
        ->select('induction_users.*')
        ->where('employees.id', '=',$loggedId )
        ->orderBy('induction_users.created_at', 'DESC')
        ->get();
    if(sizeof($comments)!=0){
        $comment=  $comments[0]->comment;
        $admin=  $comments[0]->created_by;
      }else{
        $comment=  "Nil";
        $admin=  "Nil";
      }
    if($currentStatus=="Submitted"){
        $data = "You have submitted your ". $form.". We will let you know once the ". $form." is under review.";
        return view('currentStatus',compact('employee','data','form','path','profile','comment','admin','inductionStatus')); 
    }else if($currentStatus=="Requested"){
        $data = "You have requested ". $form.". Our team will get in touch with you soon.";
        return view('currentStatus',compact('employee','data','form','path','profile','comment','admin','inductionStatus')); 
    }else if($currentStatus=="Under Review"){
        $data = "Your ". $form." is under review. We will let you know once the ". $form." is approved.";
        return view('currentStatus',compact('employee','data','form','path','profile','comment','admin','inductionStatus')); 
    }else if($currentStatus=="Approved"){
        $data = "Your ". $form." is approved.";
        return view('currentStatus',compact('employee','data','form','path','profile','comment','admin','inductionStatus')); 
    }else{
    return view('dbsCheck',compact('employee','profile','inductionStatus'));
    }
}
public function saveDBS(){
    $employee_id = Session::get('userId');
    $have_dbs = request('dbs');
    $dbsNumber = request('dbsNumber');
    $result =  DB::table('dbsdatas')
    ->select('*')
    ->where('employee_id','=',$employee_id)
    ->get();
    if(sizeof($result)!=0){
        Dbsdata::where('employee_id', $employee_id)->update([
            'employee_id' =>  $employee_id,
            'have_dbs' =>  $have_dbs, 
            'dbsNumber' =>  $dbsNumber, 
        ]);
    }else{
    Dbsdata::create([
        'employee_id' =>  $employee_id,
        'have_dbs' =>  $have_dbs, 
        'dbsNumber' =>  $dbsNumber,  
    ]);
}
    $inductionStatus = DB::table('induction_users')
    ->join('employees', 'employees.id', '=', 'induction_users.user_id')
    ->select('induction_users.*')
    ->where('employees.id', '=',$employee_id )
    ->orderBy('induction_users.created_at', 'DESC')
    ->get();
 if ($have_dbs=="yes") {
    $employee = Employee::find($employee_id);
    $employee->update([
        'dbs_status' => "Submitted"
   ]);
   $mailData = [
    "url" => "https://coa.southcareserviceuk.com/",
    "name" => $employee->surname." ".$employee->firstname
];
    $rowData =  DB::table('employees')
        ->select('*')
        ->where('id','=',$employee_id)
        ->get();
        $email = $rowData[0]->email;
        Mail::to($email)->send(new DBSSubmittedMail($mailData));
        
         $adminEmail = "info@southcareserviceuk.com";
        Mail::to($adminEmail)->send(new DBSSubmittedAdminMail($mailData));  
    //return view('formSuccess');
   $profile = DB::table('employees')
        ->select('file_type','file_type_additional','file_path','file_name')
        ->join('files','employees.id','=','files.employee_id')
        ->where('employees.id','=',$employee_id)
        ->where(function ($query) {
            $query->where('files.file_type','=','Profile Photo');             
        })
        ->get();
    
    return view('afterSubmitDBS',compact('employee','profile','inductionStatus'));
 }
 if ($have_dbs=="no") {
    $employee = Employee::find($employee_id);
    $employee->update([
        'dbs_status' => "Requested"
   ]);
   $mailData = [
         "url" => "https://coa.southcareserviceuk.com/",
         "name" => $employee->surname." ".$employee->firstname
        ];
         $email = "info@southcareserviceuk.com";
        Mail::to($email)->send(new DBSRequestMail($mailData));
    //return view('requestSent');
   $profile = DB::table('employees')
    ->select('file_type','file_type_additional','file_path','file_name')
    ->join('files','employees.id','=','files.employee_id')
    ->where('employees.id','=',$employee_id)
    ->where(function ($query) {
        $query->where('files.file_type','=','Profile Photo');             
    })
    ->get();
    return view('afterRequestDBS',compact('employee','profile','inductionStatus'));
 }
}


    
    
    
//reference controller

public function referenceList(){
     $loggedId = Session::get('userId');
     if($loggedId==""){
            return redirect()->route('sign.in');
        }
    $employee = Employee::find($loggedId); 
    $referenceData = DB::table('references')
            ->join('employees', 'employees.id', '=', 'references.employee_id')
            ->select('references.*', 'employees.*')
            ->orderBy('employees.created_at','desc')
            ->get();
            //print_r($referenceList);
    return view('referenceList',compact('referenceData','employee'));
}

public function viewReferenceList($employeeId){
    $loggedId = Session::get('userId');
    if($loggedId==""){
            return redirect()->route('sign.in');
        }
    $loggedUser = Employee::find($loggedId); 
      $user = Employee::find(decrypt($employeeId));
   //$employee = Reference::find(decrypt($employeeId));
   $employee = Reference::where('employee_id', '=', decrypt($employeeId))->first();

   $referenceEmployee = DB::table('employees')    
         ->join('references','employees.id','=','references.employee_id')
         ->where('employees.id', '=',decrypt($employeeId) )
         ->get();
     $comments = DB::table('employees')     
  ->join('comments','employees.id','=','comments.employee_id')
  ->where('employees.id', '=',decrypt($employeeId) )
  ->where('comments.comment_section', '=','Reference' )
   ->whereNot('comments.comment', '=','Nil' )
   ->orderBy('comments.created_at','desc')
  ->get();
    Session::put('referenceUser',decrypt($employeeId));
    return view('viewReference',compact('employee','user','loggedUser','referenceEmployee','comments'));
}
public function updateReference(){
  $userId =  request('id');
   $referenceUser = Employee::find($userId);
        $referenceUser->update([
         'reference_status' => 'Approved'
    ]);
}



/*public function searchReference(Request $request){
    
     $output ="";
            $employee=DB::table('employees')
             ->where('employees.surname', 'like', '%'.$request->search.'%')
            ->orWhere('employees.firstname', 'like', '%'.$request->search.'%')
             ->orWhere('employees.login_id', 'like', '%'.$request->search.'%')
            ->orWhere('employees.email', 'like', '%'.$request->search.'%')
             ->join('references', 'references.employee_id', '=', 'employees.id')
             ->select('employees.*','references.*')
            ->get(); 
                
            //return $employee;exit;
            
            $total_row = $employee->count();
            if($total_row > 0)
            {
               
                foreach($employee as $employee)
                {
                    $output .= '
                    <tr>
                    <th scope="row">'.$employee->id.'</th>
                    <td>'.$employee->surname.' '.$employee->firstname.'</td>
                    <td>'.$employee->refer1_name.'</td>
                    <td>'.$employee->refer1_job.'</td>
                    <td>'.$employee->refer2_name.'</td>
                    <td>'.$employee->refer2_job.'</td>
                    <td>'.$employee->reference_status.'</td>
                    <td>'.'
                    <a href="' . route('view.reference',encrypt($employee->employee_id)) . '"class="btn btn-primary" title="View" data-toggle="tooltip">View<!-- <i class="fas fa-edit"> --></i></a>
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
  
}*/

    public function searchReference(Request $request){
             $output ="";
               $employee=DB::table('employees')
              ->join('references', 'employees.id', '=', 'references.employee_id')
              ->where('employees.surname', 'like', '%'.$request->search.'%')
             ->orWhere('employees.firstname', 'like', '%'.$request->search.'%')
              ->orWhere('employees.contact_no', 'like', '%'.$request->search.'%')
              ->orWhere('employees.uk_contact_no', 'like', '%'.$request->search.'%')
             ->orWhere('employees.email', 'like', '%'.$request->search.'%')
              ->orderBy('employees.created_at','desc')
              ->select('*')
             ->get();
    
            //return $employee;exit;
            $i=1;
            $total_row = $employee->count();
            if($total_row > 0)
            {
               
                foreach($employee as $employee)
                {
                    $output .= '
                    <tr>
                     <th scope="row">'.$i.'</th>
                     <td>'.$employee->firstname." ".$employee->surname.'</td>
                     <td>'.$employee->contact_no.'</td>
                     <td>'.$employee->uk_contact_no.'</td>
                     <td>'.$employee->email.'</td>
                    <td>'."Reference ".$employee->reference_status.'</td>
                    <td>'.'
                    <a href="' . route('view.reference',encrypt($employee->employee_id)) . '"class="btn btn-primary" title="View" data-toggle="tooltip">View<!-- <i class="fas fa-edit"> --></i></a>
                    '.'</td>
                    </tr>
                    ';
                    $i++;
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
  
}

//dbs contoller

public function dbsList(){
     $loggedId = Session::get('userId');
     if($loggedId==""){
            return redirect()->route('sign.in');
        }
    $employee = Employee::find($loggedId); 
    $dbsData = DB::table('dbsdatas')
            ->join('employees', 'employees.id', '=', 'dbsdatas.employee_id')
            ->select('dbsdatas.*', 'employees.*')
            ->orderBy('employees.created_at','desc')
            ->get();
            //return $dbsData;exit;
    return view('dbsList',compact('dbsData','employee'));
}

public function viewDBSList($employeeId){
    $loggedId = Session::get('userId');
    if($loggedId==""){
            return redirect()->route('sign.in');
        }
    $loggedUser = Employee::find($loggedId); 
    $user = Employee::find(decrypt($employeeId));
    Session::put('dbsUser',decrypt($employeeId));
    $userFile = DB::table('employees')
    ->select('*')
    ->join('files','employees.id','=','files.employee_id')
    ->where('employees.id','=',decrypt($employeeId))
    ->where(function ($query) {
    	$query->where('files.file_type','=','DBS')
    		->orWhere('files.file_type','=','UpdateFile');
    })
    ->get();
    
   $dbsEmployee = DB::table('dbsdatas')
            ->select('dbsdatas.*', 'employees.*')
            ->where('employees.id','=',decrypt($employeeId))
            ->join('employees', 'employees.id', '=', 'dbsdatas.employee_id')
            ->get();
    $dbsDoc = DB::table('employees')
    ->select('file_type','file_type_additional','file_path','file_name','expiry_date')
    ->join('files','employees.id','=','files.employee_id')
    ->where('employees.id','=',decrypt($employeeId))
    ->where(function ($query) {
        $query->where('files.file_type','=','DBS');              
    })
    ->get();
    $comments = DB::table('employees')     
      ->join('comments','employees.id','=','comments.employee_id')
      ->where('employees.id', '=',decrypt($employeeId) )
      ->where('comments.comment_section', '=','DBS' )
       ->whereNot('comments.comment', '=','Nil' )
       ->orderBy('comments.created_at','desc')
      ->get();
            //return $employee;exit;
    return view('viewDBS',compact('dbsEmployee','userFile','user','loggedUser','dbsDoc','comments'));
}

public function updateDBS(){
  $userId =  request('id');
   $dbsUser = Dbsdata::find($userId);
        $dbsUser->update([
         'dbs_status' => 'Approved'
    ]);
}

public function searchDBS(Request $request){
     $output ="";
     $employee=DB::table('employees')
              ->join('dbsdatas', 'employees.id', '=', 'dbsdatas.employee_id')
              ->where('employees.surname', 'like', '%'.$request->search.'%')
             ->orWhere('employees.firstname', 'like', '%'.$request->search.'%')
              ->orWhere('employees.contact_no', 'like', '%'.$request->search.'%')
              ->orWhere('employees.uk_contact_no', 'like', '%'.$request->search.'%')
             ->orWhere('employees.email', 'like', '%'.$request->search.'%')
              ->select('*')
              ->orderBy('employees.created_at','desc')
             ->get();
           
           /* $employee=DB::table('employees')
             ->where('employees.surname', 'like', '%'.$request->search.'%')
            ->orWhere('employees.firstname', 'like', '%'.$request->search.'%')
             ->orWhere('employees.login_id', 'like', '%'.$request->search.'%')
            ->orWhere('employees.email', 'like', '%'.$request->search.'%')
             ->join('dbsdatas', 'dbsdatas.employee_id', '=', 'employees.id')
             ->select('employees.*','dbsdatas.*')
            ->get(); */
                
            //return $employee;exit;
             $i=1;
            $total_row = $employee->count();
            if($total_row > 0)
            {
               
                foreach($employee as $employee)
                {
                    $output .= '
                    <tr>
                   <th scope="row">'.$i.'</th>
                     <td>'.$employee->firstname." ".$employee->surname.'</td>
                     <td>'.$employee->contact_no.'</td>
                     <td>'.$employee->uk_contact_no.'</td>
                     <td>'.$employee->email.'</td>
                    <td>'."DBS ".$employee->dbs_status.'</td>
                    <td>'.'
                    <a href="' . route('view.dbs',encrypt($employee->employee_id)) . '"class="btn btn-primary" title="View" data-toggle="tooltip">View<!-- <i class="fas fa-edit"> --></i></a>
                    '.'</td>
                    </tr>
                    ';
                    $i++;
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
  
}
public function approveApplication(Request $request){
    $employee_id = Session::get('applicationUser');
    $employee = Employee::find($employee_id);
    $comment_section= $request->get('comment_section'); 
    $comment = $request->get('comment'); 
    $email = $request->get('email'); 
    $created_by = $request->get('created_by'); 
    $employee->update([
        'application_status' => "Approved"
   ]);
  /*  Application::where('employee_id', $employee_id)->update([
    'application_comments' =>  $comments
]); */

   Comment::create([
    'employee_id' =>  $employee_id,
    'comment_section' => $comment_section,
    'comment' =>  $comment,
    'created_by' =>  $created_by
]);
$mailData = [
    "url" => "https://coa.southcareserviceuk.com/",
    "comment" =>  $comment
];
Mail::to($email)->send(new ApplicationApproveMail($mailData));
 }
 public function reviewApplication(Request $request){
    $employee_id = Session::get('applicationUser');
    $employee = Employee::find($employee_id);
    $comment_section= $request->get('comment_section'); 
    $comment = $request->get('comment'); 
    $email = $request->get('email'); 
    $created_by = $request->get('created_by'); 
    $employee->update([
        'application_status' => "Under Review"
   ]);
   Comment::create([
    'employee_id' =>  $employee_id,
    'comment_section' => $comment_section,
    'comment' =>  $comment,
    'created_by' =>  $created_by
]);
   /* Application::where('employee_id', $employee_id)->update([
    'application_comments' =>  $comments
]); */
$mailData = [
    "url" => "https://coa.southcareserviceuk.com/",
    "comment" =>  $comment
];
Mail::to($email)->send(new ApplicationReviewedMail($mailData));
   
 }
public function approveTraining(Request $request){
    $employee_id = Session::get('trainingUser');
    $employee = Employee::find($employee_id);
    $comment_section= $request->get('comment_section'); 
    $comment = $request->get('comment'); 
    $email = $request->get('email'); 
    $created_by = $request->get('created_by'); 
    $employee->update([
        'training_status' => "Approved"
   ]);
   Comment::create([
    'employee_id' =>  $employee_id,
    'comment_section' => $comment_section,
    'comment' =>  $comment,
    'created_by' =>  $created_by
]);
/*    Training::where('employee_id', $employee_id)->update([
    'training_comments' =>  $comments
]); */
$mailData = [
    "url" => "https://coa.southcareserviceuk.com/",
    "comment" =>  $comment
];
Mail::to($email)->send(new TrainingMail($mailData));
 }
 public function reviewTraining(Request $request){
    $employee_id = Session::get('trainingUser');
    $employee = Employee::find($employee_id);
    $email = $request->get('email'); 
    $comment_section= $request->get('comment_section'); 
    $comment = $request->get('comment'); 
    $email = $request->get('email'); 
    $created_by = $request->get('created_by'); 
    $employee->update([
        'training_status' => "Under Review",
        "comment" =>  $comment
   ]);
   Comment::create([
    'employee_id' =>  $employee_id,
    'comment_section' => $comment_section,
    'comment' =>  $comment,
    'created_by' =>  $created_by
]);
/*    Training::where('employee_id', $employee_id)->update([
    'training_comments' =>  $comments
]); */

$mailData = [
    "url" => "https://coa.southcareserviceuk.com/",
    "comment" =>  $comment
];
Mail::to($email)->send(new TrainingReviewedMail($mailData));   
 }
 
 public function approveReference(Request $request){
    $employee_id = Session::get('referenceUser');
    $employee = Employee::find($employee_id);
    $comment_section= $request->get('comment_section'); 
    $comment = $request->get('comment'); 
    $email = $request->get('email'); 
    $created_by = $request->get('created_by'); 
    $employee->update([
        'reference_status' => "Approved"
   ]);
   Comment::create([
    'employee_id' =>  $employee_id,
    'comment_section' => $comment_section,
    'comment' =>  $comment,
    'created_by' =>  $created_by
]);
$mailData = [
    "url" => "https://coa.southcareserviceuk.com/",
    "comment" =>  $comment
];
Mail::to($email)->send(new ReferenceApprovedMail($mailData));
 }
 public function reviewReference(Request $request){
    $employee_id = Session::get('referenceUser');
    $employee = Employee::find($employee_id);
    $comment_section= $request->get('comment_section'); 
    $comment = $request->get('comment'); 
    $email = $request->get('email'); 
    $created_by = $request->get('created_by'); 
    $employee->update([
        'reference_status' => "Under Review"
   ]);
   Comment::create([
    'employee_id' =>  $employee_id,
    'comment_section' => $comment_section,
    'comment' =>  $comment,
    'created_by' =>  $created_by
]);
$mailData = [
    "url" => "https://coa.southcareserviceuk.com/",
    "comment" =>  $comment
];
Mail::to($email)->send(new ReferenceReviewedMail($mailData));

   
 }
 
 public function approveDBS(Request $request){
    $employee_id = Session::get('dbsUser');
    $employee = Employee::find($employee_id);
    $comment_section= $request->get('comment_section'); 
    $comment = $request->get('comment'); 
    $email = $request->get('email'); 
    $created_by = $request->get('created_by'); 
    $employee->update([
        'dbs_status' => "Approved"
   ]);
   Comment::create([
    'employee_id' =>  $employee_id,
    'comment_section' => $comment_section,
    'comment' =>  $comment,
    'created_by' =>  $created_by
]);
$mailData = [
    "url" => "https://coa.southcareserviceuk.com/",
    "comment" =>  $comment
];
Mail::to($email)->send(new DBSApprovedMail($mailData));
 }
 public function reviewDBS(Request $request){
    $employee_id = Session::get('dbsUser');
    $employee = Employee::find($employee_id);
    $comment_section= $request->get('comment_section'); 
    $comment = $request->get('comment'); 
    $email = $request->get('email'); 
    $created_by = $request->get('created_by'); 
    $employee->update([
        'dbs_status' => "Under Review"
   ]);
   Comment::create([
    'employee_id' =>  $employee_id,
    'comment_section' => $comment_section,
    'comment' =>  $comment,
    'created_by' =>  $created_by
]);
$mailData = [
    "url" => "https://coa.southcareserviceuk.com/",
    "comment" =>  $comment
];
Mail::to($email)->send(new DBSReviewedMail($mailData));

   
 }

 public function allDocuments(){


    $user = Employee::find(Session::get('userId'));
    $employeeId = Session::get('userId');
    Session::put('trainingUser',$employeeId);

    $allDoc = DB::table('employees')
/*         ->select('applications.*','employees.*')
*/     
    ->join('files','employees.id','=','files.employee_id')
    ->where('employees.id', '=',$employeeId )
    ->get();

    $applicationDoc = DB::table('employees')
    ->select('file_type','file_type_additional','file_path','file_name','expiry_date')
    ->join('files','employees.id','=','files.employee_id')
    ->where('employees.id','=',$employeeId)
    ->where(function ($query) {
        $query->where('files.file_type','=','Passport')
        ->orWhere('files.file_type','=','BRP')
          ->orWhere('files.file_type','=','Right To Work');              
    })
    ->get();

    $trainingDoc = DB::table('employees')
    ->select('file_type','file_type_additional','file_path','file_name','expiry_date')
    ->join('files','employees.id','=','files.employee_id')
    ->where('employees.id','=',$employeeId)
    ->where(function ($query) {
        $query->where('files.file_type','=','Moving and Handling')
        ->orWhere('files.file_type','=','Safeguarding Adults')
          ->orWhere('files.file_type','=','Health and Safety')
          ->orWhere('files.file_type','=','Food and Hygiene')
          ->orWhere('files.file_type','=','First Aid/ Basic Life Support')
          ->orWhere('files.file_type','=','COSHH')
          ->orWhere('files.file_type','=','Fire Safety')
          ->orWhere('files.file_type','=','Challenging Behavior')
          ->orWhere('files.file_type','=','Epilepsy')
          ->orWhere('files.file_type','=','Dementia')
          ->orWhere('files.file_type','=','Mental Capacity Act')
          ->orWhere('files.file_type','=','Infection Prevention Control')
          ->orWhere('files.file_type','=','Learning Disabilities')
          ->orWhere('files.file_type','=','Care Certificate')   
          ->orWhere('files.file_type_additional','like','Training%');              
    })
    ->get();

    $additionalDoc = DB::table('employees')
    ->select('file_type','file_type_additional','file_path','file_name','expiry_date')
    ->join('files','employees.id','=','files.employee_id')
    ->where('employees.id','=',$employeeId)
    ->where(function ($query) {
        $query->where('files.file_type_additional','like','Additional%');              
    })
    ->get();

    $educationDoc = DB::table('employees')
    ->select('file_type','file_type_additional','file_path','file_name','expiry_date')
    ->join('files','employees.id','=','files.employee_id')
    ->where('employees.id','=',$employeeId)
    ->where(function ($query) {
        $query->where('files.file_type_additional','like','Education%');              
    })
    ->get();

    $workDoc = DB::table('employees')
    ->select('file_type','file_type_additional','file_path','file_name','expiry_date')
    ->join('files','employees.id','=','files.employee_id')
    ->where('employees.id','=',$employeeId)
    ->where(function ($query) {
        $query->where('files.file_type_additional','like','Work%');              
    })
    ->get();

    $dbsDoc = DB::table('employees')
    ->select('file_type','file_type_additional','file_path','file_name','expiry_date')
    ->join('files','employees.id','=','files.employee_id')
    ->where('employees.id','=',$employeeId)
    ->where(function ($query) {
        $query->where('files.file_type','=','DBS')
        ->orWhere('files.file_type','=','UpdateFile');              
    })
    ->get();


$profile = DB::table('employees')
    ->select('file_type','file_type_additional','file_path','file_name')
    ->join('files','employees.id','=','files.employee_id')
    ->where('employees.id','=',$employeeId)
    ->where(function ($query) {
        $query->where('files.file_type','=','Profile Photo');             
    })
    ->get();
    
      $p45Doc = DB::table('employees')
    ->select('file_type','file_type_additional','file_path','file_name','expiry_date')
    ->join('files','employees.id','=','files.employee_id')
    ->where('employees.id','=',$employeeId)
    ->where(function ($query) {
        $query->where('files.file_type','=','P45');
    })
    ->get();
        
        $inductionStatus = DB::table('induction_users')
        ->join('employees', 'employees.id', '=', 'induction_users.user_id')
        ->select('induction_users.*')
        ->where('employees.id', '=',$employeeId )
        ->orderBy('induction_users.created_at', 'DESC')
        ->get();



$loggedId = Session::get('userId');
if($loggedId==""){
            return redirect()->route('sign.in');
        }
  $loggedUser = Employee::find($loggedId); 
    return view('allDocument',compact('applicationDoc','trainingDoc','user','loggedUser','additionalDoc','educationDoc','workDoc','dbsDoc','profile','p45Doc','inductionStatus')); 
 } 
 public function showHealth(){
    $loggedId = Session::get('userId');
    if($loggedId==""){
            return redirect()->route('sign.in');
        }
    $employee = Employee::find($loggedId);
    $currentStatus = $employee->health_status;
        $form = "Health Check";
        $path ="edit.health";

    $profile = DB::table('employees')
        ->select('file_type','file_type_additional','file_path','file_name')
        ->join('files','employees.id','=','files.employee_id')
        ->where('employees.id','=',$loggedId)
        ->where(function ($query) {
            $query->where('files.file_type','=','Profile Photo');             
        })
        ->get();
          $inductionStatus = DB::table('induction_users')
        ->join('employees', 'employees.id', '=', 'induction_users.user_id')
        ->select('induction_users.*')
        ->where('employees.id', '=',$loggedId )
        ->orderBy('induction_users.created_at', 'DESC')
        ->get();
    $comments = DB::table('employees')     
        ->join('comments','employees.id','=','comments.employee_id')
        ->where('employees.id', '=',$loggedId )
        ->where('comments.comment_section', '=','Health' )
        ->orderBy('comments.created_at','desc')
        ->get();
        if(sizeof($comments)!=0){
            $comment=  $comments[0]->comment;
            $admin=  $comments[0]->created_by;
          }else{
            $comment=  "Nil";
            $admin=  "Nil";
          }
    if($currentStatus=="Submitted"){
        $data = "You have submitted your ". $form.". We will let you know once the ". $form." is under review.";
        return view('currentStatus',compact('employee','data','form','path','profile','comment','admin','inductionStatus')); 
    }else if($currentStatus=="Under Review"){
        $data = "Your ". $form." is under review. We will let you know once the ". $form." is approved.";
        return view('currentStatus',compact('employee','data','form','path','profile','comment','admin','inductionStatus')); 
    }else if($currentStatus=="Approved"){
        $data = "Your ". $form." is approved.";
        return view('currentStatus',compact('employee','data','form','path','profile','comment','admin','inductionStatus')); 
    }else{
        return view('health',compact('employee','form','profile','inductionStatus'));
    }
}
public function saveHealth(){
    $loggedId = Session::get('userId');
    if($loggedId==""){
            return redirect()->route('sign.in');
        }
    $employee = Employee::find($loggedId);

    $employee_id = Session::get('userId');
    $gp_name = request('gp_name');
    $gp_country_code = request('gp_country_code');
    $gp_mobile = request('gp_mobile');
    $address1 = request('line_1');
    $address2 = request('line_2');
    $address3 = request('line_3');
    $postTown = request('post_town');
    $postcode = request('postcode');
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
    $disabled_note = request('disabled_note');
    $benefit = request('benefit');
    $absent = request('absent');
    $pregnant = request('pregnant');
    $pregnant_note = request('pregnant_note');
    $additional = request('additional');

    $success =  Health::create([
        'employee_id' =>  $employee_id,
        'gp_name' =>  $gp_name,
        'gp_country_code' =>  $gp_country_code,
        'gp_mobile' =>  $gp_mobile,
        'address1' =>  $address1,
        'address2' =>  $address2,
        'address3' =>  $address3,
        'postTown' =>  $postTown,
        'postcode' =>  $postcode,
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
        'disabled_note' =>  $disabled_note,
        'benefit' =>  $benefit,
        'absent' =>  $absent,
        'pregnant' =>  $pregnant,
        'pregnant_note' =>  $pregnant_note,
        'additional' =>  $additional
    ]);

     if($success){
        $employee = Employee::find($employee_id);
        $employee->update([
            'health_status' => "Submitted"
       ]);
    }
  $mailData = [
         "url" => "https://coa.southcareserviceuk.com/",
         "name" => $employee->surname." ".$employee->firstname
        ];
         $rowData =  DB::table('employees')
        ->select('*')
        ->where('id','=',$employee_id)
        ->get();
        $email = $rowData[0]->email;
        Mail::to($email)->send(new HealthSubmittedMail($mailData));
        
        $adminEmail = "info@southcareserviceuk.com";
        Mail::to($adminEmail)->send(new HealthSubmittedAdminMail($mailData)); 
         $profile = DB::table('employees')
        ->select('file_type','file_type_additional','file_path','file_name')
        ->join('files','employees.id','=','files.employee_id')
        ->where('employees.id','=',$employee_id)
        ->where(function ($query) {
            $query->where('files.file_type','=','Profile Photo');             
        })
        ->get();
        $inductionStatus = DB::table('induction_users')
        ->join('employees', 'employees.id', '=', 'induction_users.user_id')
        ->select('induction_users.*')
        ->where('employees.id', '=',$employee_id )
        ->orderBy('induction_users.created_at', 'DESC')
        ->get();
    return view('afterSubmitHealth',compact('employee','profile','inductionStatus')); 
}

public function healthList(){
    $loggedId = Session::get('userId');
    if($loggedId==""){
            return redirect()->route('sign.in');
        }
   $employee = Employee::find($loggedId); 
   $healthData = DB::table('healths')
           ->join('employees', 'employees.id', '=', 'healths.employee_id')
           ->select('healths.*', 'employees.*')
           ->orderBy('employees.created_at','desc')
           ->get();
           //print_r($referenceList);
   return view('healthList',compact('healthData','employee'));
}

public function viewHealthList($employeeId){
    $loggedId = Session::get('userId');
    if($loggedId==""){
            return redirect()->route('sign.in');
        }
    $loggedUser = Employee::find($loggedId); 
      $user = Employee::find(decrypt($employeeId));
      Session::put('healthUser',decrypt($employeeId));
   //$employee = Reference::find(decrypt($employeeId));
   $employee = Health::where('employee_id', '=', decrypt($employeeId))->first();
   $healthEmployee = DB::table('healths')
            ->select('healths.*', 'employees.*')
            ->where('employees.id','=',decrypt($employeeId))
            ->join('employees', 'employees.id', '=', 'healths.employee_id')
            ->get();
    $comments = DB::table('employees')     
    ->join('comments','employees.id','=','comments.employee_id')
    ->where('employees.id', '=',decrypt($employeeId) )
    ->where('comments.comment_section', '=','Health' )
     ->whereNot('comments.comment', '=','Nil' )
     ->orderBy('comments.created_at','desc')
    ->get();
    Session::put('healtheUser',decrypt($employeeId));
    return view('viewHealth',compact('employee','user','loggedUser','healthEmployee','comments'));
}
    public function testTable(){
       /*  $loggedId = Session::get('userId');
        $employee = Employee::find($loggedId); */
        return view('tableTest');
    }

    public function approveHealth(Request $request){
        $employee_id = Session::get('healthUser');
        $employee = Employee::find($employee_id);
         $comment_section= $request->get('comment_section'); 
        $comment = $request->get('comment'); 
        $email = $request->get('email'); 
        $created_by = $request->get('created_by'); 
        $employee->update([
            'health_status' => "Approved"
       ]);
       Comment::create([
        'employee_id' =>  $employee_id,
        'comment_section' => $comment_section,
        'comment' =>  $comment,
        'created_by' =>  $created_by
    ]);
      /*  Application::where('employee_id', $employee_id)->update([
        'application_comments' =>  $comments
    ]); */
     $mailData = [
        "url" => "https://coa.southcareserviceuk.com/",
        "comment" =>  $comment
    ];
    Mail::to($email)->send(new HealthApprovedMail($mailData)); 
     }
     public function reviewHealth(Request $request){
        $employee_id = Session::get('healthUser');
        $employee = Employee::find($employee_id);
        $comment_section= $request->get('comment_section'); 
        $comment = $request->get('comment'); 
        $email = $request->get('email'); 
        $created_by = $request->get('created_by'); 
        $employee->update([
            'health_status' => "Under Review"
       ]);
       Comment::create([
        'employee_id' =>  $employee_id,
        'comment_section' => $comment_section,
        'comment' =>  $comment,
        'created_by' =>  $created_by
    ]);
       /* Application::where('employee_id', $employee_id)->update([
        'application_comments' =>  $comments
    ]); */
     $mailData = [
        "url" => "https://coa.southcareserviceuk.com/",
        "comment" =>  $comment
    ];
    Mail::to($email)->send(new HealthReviewedMail($mailData)); 
       
     }
     
     public function searchHealth(Request $request){
        $output ="";
          $employee=DB::table('employees')
         ->join('healths', 'employees.id', '=', 'healths.employee_id')
         ->where('employees.surname', 'like', '%'.$request->search.'%')
        ->orWhere('employees.firstname', 'like', '%'.$request->search.'%')
         ->orWhere('employees.contact_no', 'like', '%'.$request->search.'%')
         ->orWhere('employees.uk_contact_no', 'like', '%'.$request->search.'%')
        ->orWhere('employees.email', 'like', '%'.$request->search.'%')
         ->select('*')
         ->orderBy('employees.created_at','desc')
        ->get();

       //return $employee;exit;
       $i=1;
       $total_row = $employee->count();
       if($total_row > 0)
       {
          
           foreach($employee as $employee)
           {
               $output .= '
               <tr>
                <th scope="row">'.$i.'</th>
                <td>'.$employee->firstname." ".$employee->surname.'</td>
                <td>'.$employee->contact_no.'</td>
                <td>'.$employee->uk_contact_no.'</td>
                <td>'.$employee->email.'</td>
               <td>'."Health ".$employee->health_status.'</td>
               <td>'.'
               <a href="' . route('view.health',encrypt($employee->employee_id)) . '"class="btn btn-primary" title="View" data-toggle="tooltip">View<!-- <i class="fas fa-edit"> --></i></a>
               '.'</td>
               </tr>
               ';
               $i++;
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

}

public function showBankDetails(){
    $loggedId = Session::get('userId');
    if($loggedId==""){
            return redirect()->route('sign.in');
        }
    if($loggedId==""){
        return redirect()->route('sign.in');
    }
    $employee = Employee::find($loggedId);
    $profile = DB::table('employees')
    ->select('file_type','file_type_additional','file_path','file_name')
    ->join('files','employees.id','=','files.employee_id')
    ->where('employees.id','=',$loggedId)
    ->where(function ($query) {
        $query->where('files.file_type','=','Profile Photo');             
    })
    ->get();
     $inductionStatus = DB::table('induction_users')
    ->join('employees', 'employees.id', '=', 'induction_users.user_id')
    ->select('induction_users.*')
    ->where('employees.id', '=',$loggedId )
    ->orderBy('induction_users.created_at', 'DESC')
    ->get();
    $currentStatus = $employee->bank_status;
    $form = "Bank Form";
    $path ="edit.bank";
    $comments = DB::table('employees')     
    ->join('comments','employees.id','=','comments.employee_id')
    ->where('employees.id', '=',$loggedId )
    ->where('comments.comment_section', '=','Bank' )
    ->orderBy('comments.created_at','desc')
    ->get();
    if(sizeof($comments)!=0){
      $comment=  $comments[0]->comment;
      $admin=  $comments[0]->created_by;
    }else{
      $comment=  "Nil";
      $admin=  "Nil";
    }
    if($currentStatus=="Submitted"){
        $data = "You have submitted your ". $form.". We will let you know once the ". $form." is under review.";
        return view('currentStatus',compact('employee','data','form','path','profile','comment','inductionStatus')); 
    }else if($currentStatus=="Under Review"){
        $data = "Your ". $form." is under review. We will let you know once the ". $form." is approved.";
        return view('currentStatus',compact('employee','data','form','path','profile','comment','inductionStatus')); 
    }else if($currentStatus=="Approved"){
        $data = "Your ". $form." is approved.";
        return view('currentStatus',compact('employee','data','form','path','profile','comment','inductionStatus')); 
    }else{
        return view('bank',compact('employee','form','profile','inductionStatus'));
    }
}

public function saveBank(){
    $employee_id = Session::get('userId');
    if($employee_id==""){
        return redirect()->route('sign.in');
    }
    $bank_name = request('bank_name');
    $sort_code = request('sort_code');
    $account_no = request('account_no');
    $account_holder = request('account_holder');
    $address1 = request('line_1');
    $address2 = request('line_2');
    $address3 = request('line_3');
    $postTown = request('post_town');
    $postcode = request('postcode');
    $success =  Bank::create([
        'employee_id' =>  $employee_id,
        'bank_name' =>  $bank_name,
        'sort_code' =>  $sort_code,
        'account_no' =>  $account_no,
        'account_holder' =>  $account_holder,
        'address1' =>  $address1,
        'address2' =>  $address2,
        'address3' =>  $address3,
        'postTown' =>  $postTown,
        'postcode' =>  $postcode
    ]);

     if($success){
        $employee = Employee::find($employee_id);
        $employee->update([
            'bank_status' => "Submitted"
        ]);
    }
    $mailData = [
        "url" => "https://coa.southcareserviceuk.com/",
        "name" => $employee->surname." ".$employee->firstname
       ];
        $rowData =  DB::table('employees')
       ->select('*')
       ->where('id','=',$employee_id)
       ->get();
       $email = $rowData[0]->email;
       Mail::to($email)->send(new BankSubmittedMail($mailData));  
       
       $adminEmail = "info@southcareserviceuk.com";
       Mail::to($adminEmail)->send(new BankSubmittedAdminMail($mailData));  
       $profile = DB::table('employees')
            ->select('file_type','file_type_additional','file_path','file_name')
            ->join('files','employees.id','=','files.employee_id')
            ->where('employees.id','=',$employee_id)
            ->where(function ($query) {
                $query->where('files.file_type','=','Profile Photo');             
            })
            ->get();
        $inductionStatus = DB::table('induction_users')
        ->join('employees', 'employees.id', '=', 'induction_users.user_id')
        ->select('induction_users.*')
        ->where('employees.id', '=',$loggedId )
        ->orderBy('induction_users.created_at', 'DESC')
        ->get();
        return view('afterSubmitBank',compact('employee','profile','inductionStatus'));
}
public function showStarterChecklist(){
    $loggedId = Session::get('userId');
    if($loggedId==""){
        return redirect()->route('sign.in');
    }
    $employee = Employee::find($loggedId);
    $application = Application::where('employee_id', '=', $loggedId)->first();
    $profile = DB::table('employees')
    ->select('file_type','file_type_additional','file_path','file_name')
    ->join('files','employees.id','=','files.employee_id')
    ->where('employees.id','=',$loggedId)
    ->where(function ($query) {
        $query->where('files.file_type','=','Profile Photo');             
    })
    ->get();
     $inductionStatus = DB::table('induction_users')
    ->join('employees', 'employees.id', '=', 'induction_users.user_id')
    ->select('induction_users.*')
    ->where('employees.id', '=',$loggedId )
    ->orderBy('induction_users.created_at', 'DESC')
    ->get();
    $currentStatus = $employee->starter_status;
    $starterChecklist = $employee->starterChecklist;
    if($starterChecklist=="Upload"){
    $form = "Starter Checklist";
    $path ="all.documents";
    $comments = DB::table('employees')     
    ->join('comments','employees.id','=','comments.employee_id')
    ->where('employees.id', '=',$loggedId )
    ->where('comments.comment_section', '=','Starter' )
    ->orderBy('comments.created_at','desc')
    ->get();
    if(sizeof($comments)!=0){
      $comment=  $comments[0]->comment;
      $admin=  $comments[0]->created_by;
    }else{
      $comment=  "Nil";
      $admin=  "Nil";
    }
    if($currentStatus=="Submitted"){
        $data = "You have submitted your ". $form.". We will let you know once the ". $form." is under review.";
        return view('currentStatus',compact('employee','data','form','path','profile','comment','inductionStatus')); 
    }else if($currentStatus=="Under Review"){
        $data = "Your ". $form." is under review. We will let you know once the ". $form." is approved.";
        return view('currentStatus',compact('employee','data','form','path','profile','comment','inductionStatus')); 
    }else if($currentStatus=="Approved"){
        $data = "Your ". $form." is approved.";
        return view('currentStatus',compact('employee','data','form','path','profile','comment','inductionStatus')); 
    }else{
        return view('starterChecklist',compact('employee','form','profile','application','inductionStatus'));
    }
}elseif($starterChecklist=="Form"){
    $form = "Starter Checklist";
    $path ="edit.starterForm";
    $comments = DB::table('employees')     
    ->join('comments','employees.id','=','comments.employee_id')
    ->where('employees.id', '=',$loggedId )
    ->where('comments.comment_section', '=','Starter' )
    ->orderBy('comments.created_at','desc')
    ->get();
    if(sizeof($comments)!=0){
      $comment=  $comments[0]->comment;
      $admin=  $comments[0]->created_by;
    }else{
      $comment=  "Nil";
      $admin=  "Nil";
    }
    if($currentStatus=="Submitted"){
        $data = "You have submitted your ". $form.". We will let you know once the ". $form." is under review.";
        return view('currentStatus',compact('employee','data','form','path','profile','comment','inductionStatus')); 
    }else if($currentStatus=="Under Review"){
        $data = "Your ". $form." is under review. We will let you know once the ". $form." is approved.";
        return view('currentStatus',compact('employee','data','form','path','profile','comment','inductionStatus')); 
    }else if($currentStatus=="Approved"){
        $data = "Your ". $form." is approved.";
        return view('currentStatus',compact('employee','data','form','path','profile','comment','inductionStatus')); 
    }else{
        return view('starterChecklist',compact('employee','form','profile','application','inductionStatus'));
    }
}else{
    return view('starterChecklist',compact('employee','profile','application','inductionStatus'));
}
}
public function saveStarter(){
    $employee_id = Session::get('userId');
    if($employee_id==""){
        return redirect()->route('sign.in');
    }
    $employee = Employee::find($employee_id);
        $employee->update([
        'starter_status' => "Submitted",
        'starterChecklist' => "Upload"

    ]);
    $result =  DB::table('starter_files')
    ->select('*')
    ->where('employee_id','=',$employee_id)
    ->get();
    if(sizeof($result)!=0){
        StarterFile::where('employee_id', $employee_id)->update([
            'employee_id' =>  $employee_id
        ]);
    }else{
        StarterFile::create([
        'employee_id' =>  $employee_id
    ]);
}
    $mailData = [
        "url" => "https://coa.southcareserviceuk.com/",
        "name" => $employee->surname." ".$employee->firstname
       ];
        $rowData =  DB::table('employees')
       ->select('*')
       ->where('id','=',$employee_id)
       ->get();
       $email = $rowData[0]->email;
       Mail::to($email)->send(new StarterSubmittedMail($mailData));  
       
       $adminEmail = "info@southcareserviceuk.com";
       Mail::to($adminEmail)->send(new StarterSubmittedAdminMail($mailData));  
       $profile = DB::table('employees')
            ->select('file_type','file_type_additional','file_path','file_name')
            ->join('files','employees.id','=','files.employee_id')
            ->where('employees.id','=',$employee_id)
            ->where(function ($query) {
                $query->where('files.file_type','=','Profile Photo');             
            })
            ->get();
         $inductionStatus = DB::table('induction_users')
            ->join('employees', 'employees.id', '=', 'induction_users.user_id')
            ->select('induction_users.*')
            ->where('employees.id', '=',$employee_id )
            ->orderBy('induction_users.created_at', 'DESC')
            ->get();
        return view('afterSubmitStarter',compact('employee','profile','inductionStatus'));
}
    public function bankList(){
        $loggedId = Session::get('userId');
        if($loggedId==""){
            return redirect()->route('sign.in');
        }
    $employee = Employee::find($loggedId); 
    $bankData = DB::table('banks')
            ->join('employees', 'employees.id', '=', 'banks.employee_id')
            ->select('banks.*', 'employees.*')
            ->orderBy('employees.created_at','desc')
            ->get();
            //print_r($referenceList);
    return view('bankList',compact('bankData','employee'));
    }
public function searchBank(Request $request){
        $output ="";
          $employee=DB::table('employees')
         ->join('banks', 'employees.id', '=', 'banks.employee_id')
         ->where('employees.surname', 'like', '%'.$request->search.'%')
        ->orWhere('employees.firstname', 'like', '%'.$request->search.'%')
         ->orWhere('employees.contact_no', 'like', '%'.$request->search.'%')
         ->orWhere('employees.uk_contact_no', 'like', '%'.$request->search.'%')
        ->orWhere('employees.email', 'like', '%'.$request->search.'%')
         ->select('*')
         ->orderBy('employees.created_at','desc')
        ->get();

       //return $employee;exit;
       $i=1;
       $total_row = $employee->count();
       if($total_row > 0)
       {
          
           foreach($employee as $employee)
           {
               $output .= '
               <tr>
                <th scope="row">'.$i.'</th>
                <td>'.$employee->firstname." ".$employee->surname.'</td>
                <td>'.$employee->contact_no.'</td>
                <td>'.$employee->uk_contact_no.'</td>
                <td>'.$employee->email.'</td>
               <td>'."Bank ".$employee->bank_status.'</td>
               <td>'.'
               <a href="' . route('view.bank',encrypt($employee->employee_id)) . '"class="btn btn-primary" title="View" data-toggle="tooltip">View<!-- <i class="fas fa-edit"> --></i></a>
               '.'</td>
               </tr>
               ';
               $i++;
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

}
public function viewBankList($employeeId){
    $loggedId = Session::get('userId');
    if($loggedId==""){
        return redirect()->route('sign.in');
    }
    $loggedUser = Employee::find($loggedId); 
      $user = Employee::find(decrypt($employeeId));
      Session::put('bankUser',decrypt($employeeId));
   //$employee = Reference::find(decrypt($employeeId));
   $employee = Bank::where('employee_id', '=', decrypt($employeeId))->first();
   $bankEmployee = DB::table('banks')
            ->select('banks.*', 'employees.*')
            ->where('employees.id','=',decrypt($employeeId))
            ->join('employees', 'employees.id', '=', 'banks.employee_id')
            ->get();
    $comments = DB::table('employees')     
    ->join('comments','employees.id','=','comments.employee_id')
    ->where('employees.id', '=',decrypt($employeeId) )
    ->where('comments.comment_section', '=','Bank' )
    ->whereNot('comments.comment', '=','Nil' )
    ->orderBy('comments.created_at','desc')
    ->get(); 
    Session::put('bankUser',decrypt($employeeId));
    return view('viewBank',compact('employee','user','loggedUser','bankEmployee','comments'));
}
        public function approveBank(Request $request){
            $employee_id = Session::get('bankUser');
            $employee = Employee::find($employee_id);
            $comment_section= $request->get('comment_section'); 
            $comment = $request->get('comment'); 
            $email = $request->get('email'); 
            $created_by = $request->get('created_by'); 
            $employee->update([
                'bank_status' => "Approved"
        ]);
        Comment::create([
            'employee_id' =>  $employee_id,
            'comment_section' => $comment_section,
            'comment' =>  $comment,
            'created_by' =>  $created_by
        ]);
        /*  Application::where('employee_id', $employee_id)->update([
            'application_comments' =>  $comments
        ]); */
        $mailData = [
            "url" => "https://coa.southcareserviceuk.com/",
            "comment" =>  $comment
        ];
        Mail::to($email)->send(new BankApprovedMail($mailData)); 
        }
        public function reviewBank(Request $request){
            $employee_id = Session::get('bankUser');
            $employee = Employee::find($employee_id);
            $comment_section= $request->get('comment_section'); 
            $comment = $request->get('comment'); 
            $email = $request->get('email'); 
            $created_by = $request->get('created_by'); 
            $employee->update([
                'bank_status' => "Under Review"
        ]);
        Comment::create([
            'employee_id' =>  $employee_id,
            'comment_section' => $comment_section,
            'comment' =>  $comment,
            'created_by' =>  $created_by
        ]);
        /* Application::where('employee_id', $employee_id)->update([
            'application_comments' =>  $comments
        ]); */
        $mailData = [
            "url" => "https://coa.southcareserviceuk.com/",
            "comment" =>  $comment
        ];
        Mail::to($email)->send(new BankReviewedMail($mailData)); 
        
        }
        
        public function saveStarterForm(Request $request){
            $employee_id = Session::get('userId');
            if($employee_id==""){
                return redirect()->route('sign.in');
            }
            $insurance = request('insurance');
            $start_date = request('start_date');
            $statementA  = request('statementA');
            $statementB  = request('statementB');
            $statementC  = request('statementC');
            $loan = request('loan');
            $is_complete = request('completed');
            $is_debit = request('debit');
            $loan_plan = request('loan_plan');
            $pg_loan = request('pg_loan');
            $is_pg_complete = request('pg_complete');
            $pg_debit = request('pg_debit');
            $signature = request('signature');
            $full_name = request('full_name');
            $date = request('date');
            $success =  Starter::create([
                'employee_id' =>  $employee_id,
                'insurance' =>  $insurance,
                'start_date' =>  $start_date,
                'statementA' => $statementA,
                'statementB' => $statementB,
                'statementC' => $statementC,
                'loan' =>  $loan,
                'is_complete' =>  $is_complete,
                'is_debit' =>  $is_debit,
                'loan_plan' =>  $loan_plan,
                'pg_loan' =>  $pg_loan,
                'is_pg_complete' =>  $is_pg_complete,
                'pg_debit' =>  $pg_debit,
                'signature' =>  $signature,
                'full_name' =>  $full_name,
                'date' =>  $date
            ]);
            if($success){
            $employee = Employee::find($employee_id);
                $employee->update([
                'starter_status' => "Submitted",
                'starterChecklist' => "Form"
            ]);
        }
            $mailData = [
                "url" => "https://coa.southcareserviceuk.com/",
                 "name" => $employee->surname." ".$employee->firstname
               ];
                $rowData =  DB::table('employees')
               ->select('*')
               ->where('id','=',$employee_id)
               ->get();
               $email = $rowData[0]->email;
               Mail::to($email)->send(new StarterSubmittedMail($mailData)); 
               
               $adminEmail = "info@southcareserviceuk.com";
               Mail::to($adminEmail)->send(new StarterSubmittedAdminMail($mailData)); 
               $profile = DB::table('employees')
                    ->select('file_type','file_type_additional','file_path','file_name')
                    ->join('files','employees.id','=','files.employee_id')
                    ->where('employees.id','=',$employee_id)
                    ->where(function ($query) {
                        $query->where('files.file_type','=','Profile Photo');             
                    })
                    ->get();
            $inductionStatus = DB::table('induction_users')
            ->join('employees', 'employees.id', '=', 'induction_users.user_id')
            ->select('induction_users.*')
            ->where('employees.id', '=',$employee_id )
            ->orderBy('induction_users.created_at', 'DESC')
            ->get();
                return view('afterSubmitStarter',compact('employee','profile','inductionStatus'));
        }

        
        public function starterList(){
            $loggedId = Session::get('userId');
            if($loggedId==""){
                return redirect()->route('sign.in');
            }
        $employee = Employee::find($loggedId); 
        $starterForm = DB::table('starters')
        ->join('employees', 'employees.id', '=', 'starters.employee_id')
        ->select('starters.*', 'employees.*')
        ->orderBy('employees.created_at','desc')
        ->get();
        $starterFile = DB::table('starter_files')
        ->join('employees', 'employees.id', '=', 'starter_files.employee_id')
        ->select('starter_files.*', 'employees.*')
        ->orderBy('employees.created_at','desc')
        ->get();
        $merged = $starterFile->merge($starterForm);
         $starterData = $merged->all();
         
                //print_r($referenceList);
        return view('starterList',compact('starterData','employee'));
        }
        public function viewStarterList($employeeId){
            $loggedId = Session::get('userId');
            if($loggedId==""){
                return redirect()->route('sign.in');
            }
            $loggedUser = Employee::find($loggedId); 
              $user = Employee::find(decrypt($employeeId));
              Session::put('starterUser',decrypt($employeeId));
           //$employee = Reference::find(decrypt($employeeId));
           $employee = Starter::where('employee_id', '=', decrypt($employeeId))->first();
           
           $starterEmployee = DB::table('starters')
                    ->select('starters.*', 'employees.*')
                    ->where('employees.id','=',decrypt($employeeId))
                    ->join('employees', 'employees.id', '=', 'starters.employee_id')
                    ->get();
            $userFile = DB::table('employees')
            ->select('*')
            ->join('files','employees.id','=','files.employee_id')
            ->where('employees.id','=',decrypt($employeeId))
            ->where(function ($query) {
                $query->where('files.file_type','=','P45');
            })
            ->get();
            $comments = DB::table('employees')     
            ->join('comments','employees.id','=','comments.employee_id')
            ->where('employees.id', '=',decrypt($employeeId) )
            ->where('comments.comment_section', '=','Starter' )
            ->whereNot('comments.comment', '=','Nil' )
            ->orderBy('comments.created_at','desc')
            ->get(); 
            Session::put('starterUser',decrypt($employeeId));
            return view('viewStarter',compact('employee','user','loggedUser','starterEmployee','comments','userFile'));
        }
        public function approveStarter(Request $request){
            $employee_id = Session::get('starterUser');
            $employee = Employee::find($employee_id);
            $comment_section= $request->get('comment_section'); 
            $comment = $request->get('comment'); 
            $email = $request->get('email'); 
            $created_by = $request->get('created_by'); 
            $employee->update([
                'starter_status' => "Approved"
        ]);
        Comment::create([
            'employee_id' =>  $employee_id,
            'comment_section' => $comment_section,
            'comment' =>  $comment,
            'created_by' =>  $created_by
        ]);
        /*  Application::where('employee_id', $employee_id)->update([
            'application_comments' =>  $comments
        ]); */
        $mailData = [
            "url" => "https://coa.southcareserviceuk.com/",
            "comment" =>  $comment
        ];
        Mail::to($email)->send(new StarterApprovedMail($mailData)); 
        }
        public function reviewStarter(Request $request){
            $employee_id = Session::get('starterUser');
            $employee = Employee::find($employee_id);
            $comment_section= $request->get('comment_section'); 
            $comment = $request->get('comment'); 
            $email = $request->get('email'); 
            $created_by = $request->get('created_by'); 
            $employee->update([
                'starter_status' => "Under Review"
        ]);
        Comment::create([
            'employee_id' =>  $employee_id,
            'comment_section' => $comment_section,
            'comment' =>  $comment,
            'created_by' =>  $created_by
        ]);
        /* Application::where('employee_id', $employee_id)->update([
            'application_comments' =>  $comments
        ]); */
        $mailData = [
            "url" => "https://coa.southcareserviceuk.com/",
            "comment" =>  $comment
        ];
        Mail::to($email)->send(new StarterReviewedMail($mailData)); 
        
        }
     public function commentContractUser(Request $request){
        $loggedId = Session::get('userId');
        $comment_section= $request->get('comment_section'); 
        $comment = $request->get('comment'); 
        $created_by = $request->get('created_by'); 
     
    Comment::create([
        'employee_id' =>  $loggedId,
        'comment_section' => $comment_section,
        'comment' =>  $comment,
        'created_by' =>  $created_by
    ]);
    Employee::where('id', $loggedId)
        ->update([
             'employee_contract' => "Commented"
         ]);
     $result =  DB::table('user_contracts')
     ->select('*')
     ->where('employee_id','=',$loggedId)
     ->get();
     if(sizeof($result)!=0){
        UserContract::where('employee_id', $loggedId)->update([
            'action' =>  "Commented"
        ]);
    }else{
       UserContract::create([
        'employee_id' =>  $loggedId,
        'action' =>  "Commented"
    ]);
    }
    $employee = Employee::find($loggedId); 
    $mailData = [
       "url" => "https://coa.southcareserviceuk.com/",
       "name" => $employee->surname." ".$employee->firstname,
       "comment" =>  $comment
      ];
      $email = "info@southcareserviceuk.com";
      Mail::to($email)->send(new ContractCommentAdminMail($mailData));
    }
    public function afterCommentContract(Request $request){
        $loggedId = Session::get('userId');
        $employee = Employee::find($loggedId); 
        $profile = DB::table('employees')
        ->select('file_type','file_type_additional','file_path','file_name')
        ->join('files','employees.id','=','files.employee_id')
        ->where('employees.id','=',$loggedId)
        ->where(function ($query) {
            $query->where('files.file_type','=','Profile Photo');             
        })
        ->get();
        return view('afterCommentEmployeeContract',compact('employee','profile'));
    }
    public function submitContractUser(Request $request){
        $loggedId = Session::get('userId');
        $name= $request->get('name'); 
        $signature = $request->get('signature'); 
        $date = $request->get('date'); 
     
    Employee::where('id', $loggedId)
        ->update([
             'employee_contract' => "Submitted"
         ]);
     $result =  DB::table('user_contracts')
     ->select('*')
     ->where('employee_id','=',$loggedId)
     ->get();
     if(sizeof($result)!=0){
        UserContract::where('employee_id', $loggedId)->update([
            'employee_id' =>  $loggedId,
            'name' =>  $name,
            'signature' =>  $signature,
            'date' =>  $date,
            'action' =>  "Submitted"
        ]);
    }else{
       UserContract::create([
        'employee_id' =>  $loggedId,
        'name' =>  $name,
        'signature' =>  $signature,
        'date' =>  $date,
        'action' =>  "Submitted"
    ]);
}
    $employee = Employee::find($loggedId); 
    $mailData = [
       "url" => "https://coa.southcareserviceuk.com/",
       "name" => $employee->surname." ".$employee->firstname,
      ];
      $rowData =  DB::table('employees')
      ->select('*')
      ->where('id','=',$loggedId)
      ->get();
      $email = $rowData[0]->email;
      Mail::to($email)->send(new ContractSubmittedMail($mailData));
      $email = "info@southcareserviceuk.com";
      Mail::to($email)->send(new EmployeeContractSubmittedMail($mailData));
    }
    public function afterSubmitContract(Request $request){
        $loggedId = Session::get('userId');
        $employee = Employee::find($loggedId); 
        $profile = DB::table('employees')
        ->select('file_type','file_type_additional','file_path','file_name')
        ->join('files','employees.id','=','files.employee_id')
        ->where('employees.id','=',$loggedId)
        ->where(function ($query) {
            $query->where('files.file_type','=','Profile Photo');             
        })
        ->get();
        return view('afterSubmitEmployeeContract',compact('employee','profile'));
    }
     public function contractList(){
            $loggedId = Session::get('userId');
            if($loggedId==""){
               return redirect()->route('sign.in');
           }
           $employee = Employee::find($loggedId); 
           /* $contractData = DB::table('employees')
           ->where('employees.employee_contract', '=', 'Agreed')
           ->orderBy('employees.updated_at','desc')
           ->get();           */ 
           $contractData = DB::table('employees')
            ->join('user_contracts','employees.id','=','user_contracts.employee_id')
           /* ->where('user_contracts.action', '=', 'Submitted')
           ->orWhere('user_contracts.action', '=', 'Commented') */
           ->select('user_contracts.*', 'employees.*')
           ->orderBy('user_contracts.updated_at','desc')
           ->get();
           return view('contractList',compact('employee','contractData'));
       }
        public function viewContractList($employeeId){
        $loggedId = Session::get('userId');
        if($loggedId==""){
            return redirect()->route('sign.in');
        }
        $loggedUser = Employee::find($loggedId); 
          $user = Employee::find(decrypt($employeeId));
          Session::put('contractUser',decrypt($employeeId));
       //$employee = Reference::find(decrypt($employeeId));
       $employee = UserContract::where('employee_id', '=', decrypt($employeeId))->first();
       $contractEmployee = DB::table('user_contracts')
                ->select('user_contracts.*', 'employees.*')
                ->where('employees.id','=',decrypt($employeeId))
                ->join('employees', 'employees.id', '=', 'user_contracts.employee_id')
                ->get();
        $comments = DB::table('employees')     
        ->join('comments','employees.id','=','comments.employee_id')
        ->where('comments.employee_id', '=',decrypt($employeeId) )
        ->where(function ($query) {
            $query->where('comments.comment_section','=','ContractUser')
                ->orWhere('comments.comment_section','=','ContractAdmin');
        })
        ->whereNot('comments.comment', '=','Nil' )
        ->orderBy('comments.created_at','desc')
        ->get(); 
        return view('viewContract',compact('employee','user','loggedUser','contractEmployee','comments'));
    }
    public function approveContract(Request $request){
        $employee_id = Session::get('contractUser');
        $employee = Employee::find($employee_id);
        /* $comment_section= $request->get('comment_section'); 
        $comment = $request->get('comment'); 
        $created_by = $request->get('created_by');  */
        $email = $request->get('email'); 
        Employee::where('id', $employee_id)
        ->update([
             'employee_contract' => "Approved"
         ]);
         UserContract::where('employee_id', $employee_id)->update([
            'action' =>  "Approved"
        ]);
/*     Comment::create([
        'employee_id' =>  $employee_id,
        'comment_section' => $comment_section,
        'comment' =>  $comment,
        'created_by' =>  $created_by
    ]); */
    /*  Application::where('employee_id', $employee_id)->update([
        'application_comments' =>  $comments
    ]); */
    $mailData = [
        "url" => "https://coa.southcareserviceuk.com/",
        "name" => $employee->surname." ".$employee->firstname,
    ];
    Mail::to($email)->send(new ContractApprovedMail($mailData)); 
    }
    public function commentContractAdmin(Request $request){
        $loggedId = Session::get('userId');
        $employee_id = Session::get('contractUser');
        $comment_section= $request->get('comment_section'); 
        $comment = $request->get('comment'); 
        $created_by = $request->get('created_by'); 
        $email = $request->get('email'); 
    Comment::create([
        'employee_id' =>  $employee_id,
        'comment_section' => $comment_section,
        'comment' =>  $comment,
        'created_by' =>  $created_by
    ]);
    Employee::where('id', $employee_id)
        ->update([
             'employee_contract' => "Commented"
         ]);
     $result =  DB::table('user_contracts')
     ->select('*')
     ->where('employee_id','=',$employee_id)
     ->get();
     if(sizeof($result)!=0){
        UserContract::where('employee_id', $employee_id)->update([
            'action' =>  "Commented"
        ]);
    }else{
       UserContract::create([
        'employee_id' =>  $employee_id,
        'action' =>  "Commented"
    ]);
    }
    $employee = Employee::find($employee_id); 
    $mailData = [
       "url" => "https://coa.southcareserviceuk.com/",
       "name" => $employee->surname." ".$employee->firstname,
       "comment" =>  $comment
      ];
      Mail::to($email)->send(new ContractCommentUserMail($mailData));
    }
    public function reviewContract(Request $request){
        $employee_id = Session::get('contractUser');
        $employee = Employee::find($employee_id);
        $comment_section= $request->get('comment_section'); 
        $comment = $request->get('comment'); 
        $email = $request->get('email'); 
        $created_by = $request->get('created_by'); 
        $employee->update([
            'employee_contract' => "Under Review"
    ]);
    UserContract::where('employee_id', $employee_id)->update([
        'action' =>  "Under Review"
    ]);
    Comment::create([
        'employee_id' =>  $employee_id,
        'comment_section' => $comment_section,
        'comment' =>  $comment,
        'created_by' =>  $created_by
    ]);
    /* Application::where('employee_id', $employee_id)->update([
        'application_comments' =>  $comments
    ]); */
    $mailData = [
        "url" => "https://coa.southcareserviceuk.com/",
        "comment" =>  $comment
    ];
    Mail::to($email)->send(new ContractReviewedMail($mailData)); 
    
    }
    public function inductionChecklist(){
        $loggedId = Session::get('userId');
        if($loggedId==""){
            return redirect()->route('sign.in');
        }
        $employee = Employee::find($loggedId);
        $currentStatus = $employee->induction_checklist;
        $form = "Induction Checklist";
        $path ="induction.checklist";

        $profile = DB::table('employees')
        ->select('file_type','file_type_additional','file_path','file_name')
        ->join('files','employees.id','=','files.employee_id')
        ->where('employees.id','=',$loggedId)
        ->where(function ($query) {
            $query->where('files.file_type','=','Profile Photo');             
        })
        ->get();
        $inductionStatus = DB::table('induction_users')
        ->join('employees', 'employees.id', '=', 'induction_users.user_id')
        ->select('induction_users.*')
        ->where('employees.id', '=',$loggedId )
        ->orderBy('induction_users.created_at', 'DESC')
        ->get();
/*       $comments = DB::table('employees')     
      ->join('comments','employees.id','=','comments.employee_id')
      ->where('employees.id', '=',$loggedId )
      ->where('comments.comment_section', '=','Application' )
      ->orderBy('comments.created_at','desc')
      ->get();
      if(sizeof($comments)!=0){
        $comment=  $comments[0]->comment;
        $admin=  $comments[0]->created_by;
      }else{
        $comment=  "Nil";
        $admin=  "Nil";
      }
*/$comment=  "Nil";
    if($currentStatus=="Submitted"){
        $data = "You have submitted your ". $form.". We will let you know once the ". $form." is Approved.";
        return view('currentStatus',compact('employee','data','form','path','comment','profile','inductionStatus')); 
    }else if($currentStatus=="Approved"){
        $data = "Your ". $form." is approved.";
        return view('currentStatus',compact('employee','data','form','path','comment','profile','inductionStatus')); 
    }else{
        return view('inductionChecklist',compact('employee','profile','inductionStatus'));
    } 
    }
    public function saveInduction(Request $request){
        $loggedId = Session::get('userId');
        if($loggedId==""){
            return redirect()->route('sign.in');
        }
        $employee = Employee::find($loggedId);
        $created_by=$employee->firstname." ".$employee->surname;

        $employee_id = Session::get('userId');
        $history = request('history');
        $philosophy = request('philosophy');
        $personality = request('personality');
        $organisation = request('organisation');
        $handbook = request('handbook');
        $contacts = request('contacts');
        $policy = request('policy');
        $opportunity = request('opportunity');
        $workplace = request('workplace');
        $statement = request('statement');
        $salary = request('salary');
        $sick = request('sick');
        $duty = request('duty');
        $uniform = request('uniform');
        $availability = request('availability');
        $time = request('time');
        $transportation = request('transportation');
        $mobile = request('mobile');
        $protection = request('protection');
        $complaints = request('complaints');
        $trainings = request('trainings');
        $hygiene = request('hygiene');
        $agree = request('agree_submit');
        $signature = request('signature');
        $name = request('name');
        $date = request('date');
        $induction_checklist_comments = request('induction_checklist_comments'); 
        
        $result =  DB::table('induction_checklists')
        ->select('*')
        ->where('employee_id','=',$employee_id)
        ->get();
        if(sizeof($result)!=0){
            $success= InductionChecklist::where('employee_id', $employee_id)->update([
                'employee_id' =>  $employee_id,
                'history' =>  $history,
                'philosophy' =>  $philosophy,
                'personality' =>  $personality,
                'organisation' =>  $organisation,
                'handbook' =>  $handbook,
                'contacts' =>  $contacts,
                'policy' =>  $policy,
                'opportunity' =>  $opportunity,
                'workplace' =>  $workplace,
                'statement' =>  $statement,
                'salary' =>  $salary,
                'sick' =>  $sick,
                'duty' =>  $duty,
                'uniform' =>  $uniform,
                'availability' =>  $availability,
                'time' =>  $time,
                'transportation' =>  $transportation,
                'mobile' =>  $mobile,
                'protection' =>  $protection,
                'complaints' =>  $complaints,
                'trainings' =>  $trainings,
                'hygiene' =>  $hygiene,
                'agree' =>  $agree,
                'signature' =>  $signature,
                'name' =>  $name,
                'date' =>  $date,
            ]);
        }else{
        $success = InductionChecklist::create([
            'employee_id' =>  $employee_id,
            'history' =>  $history,
            'philosophy' =>  $philosophy,
            'personality' =>  $personality,
            'organisation' =>  $organisation,
            'handbook' =>  $handbook,
            'contacts' =>  $contacts,
            'policy' =>  $policy,
            'opportunity' =>  $opportunity,
            'workplace' =>  $workplace,
            'statement' =>  $statement,
            'salary' =>  $salary,
            'sick' =>  $sick,
            'duty' =>  $duty,
            'uniform' =>  $uniform,
            'availability' =>  $availability,
            'time' =>  $time,
            'transportation' =>  $transportation,
            'mobile' =>  $mobile,
            'protection' =>  $protection,
            'complaints' =>  $complaints,
            'trainings' =>  $trainings,
            'hygiene' =>  $hygiene,
            'agree' =>  $agree,
            'signature' =>  $signature,
            'name' =>  $name,
            'date' =>  $date,
        ]);
    }
    if($success){
        $employee = Employee::find($employee_id);
        $employee->update([
            'induction_checklist' => "Submitted"
       ]);
    }
    $comments = DB::table('employees')     
    ->join('comments','employees.id','=','comments.employee_id')
    ->where('employees.id', '=',$employee_id )
    ->where('comments.comment_section', '=','InductionChecklist' )
    ->get();
    if(sizeof($comments)!=0){
        Comment::where('employee_id', $employee_id)
            -> where('comment_section', "InductionChecklist")
            ->update([
            'employee_id' =>  $employee_id,
            'comment_section' => "InductionChecklist",
            'comment' =>  $induction_checklist_comments,
            'created_by' =>  $created_by
        ]);
    }else{
        Comment::create([
            'employee_id' =>  $employee_id,
            'comment_section' => "InductionChecklist",
            'comment' =>  $induction_checklist_comments,
            'created_by' =>  $created_by
        ]);
        }
        $profile = DB::table('employees')
            ->select('file_type','file_type_additional','file_path','file_name')
            ->join('files','employees.id','=','files.employee_id')
            ->where('employees.id','=',$employee_id)
            ->where(function ($query) {
                $query->where('files.file_type','=','Profile Photo');             
            })
            ->get();
        $inductionStatus = DB::table('induction_users')
        ->join('employees', 'employees.id', '=', 'induction_users.user_id')
        ->select('induction_users.*')
        ->where('employees.id', '=',$employee_id )
        ->orderBy('induction_users.created_at', 'DESC')
        ->get();
         $mailData = [
            "url" => "https://coa.southcareserviceuk.com/",
            "name" => $employee->surname." ".$employee->firstname,
            "comment" =>  $induction_checklist_comments
           ];
            $rowData =  DB::table('employees')
           ->select('*')
           ->where('id','=',$employee_id)
           ->get();
           $email = $rowData[0]->email;
           Mail::to($email)->send(new ChecklistSubmittedMail($mailData));
   
           $adminEmail = "info@southcareserviceuk.com";
           Mail::to($adminEmail)->send(new ChecklistSubmittedAdminMail($mailData));
        return view('afterSubmitInductionChecklist',compact('employee','profile','inductionStatus'));
    }
     public function checklistList(){
        $loggedId = Session::get('userId');
        if($loggedId==""){
           return redirect()->route('sign.in');
       }
       $employee = Employee::find($loggedId); 
       $checklistData = DB::table('employees')
        ->join('induction_checklists','employees.id','=','induction_checklists.employee_id')
       ->select('induction_checklists.*', 'employees.*')
       ->orderBy('induction_checklists.updated_at','desc')
       ->get();
       return view('checklistList',compact('employee','checklistData'));
   }
   public function viewChecklist($employeeId){
    $loggedId = Session::get('userId');
    if($loggedId==""){
        return redirect()->route('sign.in');
    }
    $loggedUser = Employee::find($loggedId); 
      $user = Employee::find(decrypt($employeeId));
      Session::put('checklistUser',decrypt($employeeId));
   //$employee = Reference::find(decrypt($employeeId));
   $employee = InductionChecklist::where('employee_id', '=', decrypt($employeeId))->first();
   $checklistEmployee = DB::table('induction_checklists')
            ->select('induction_checklists.*', 'employees.*')
            ->where('employees.id','=',decrypt($employeeId))
            ->join('employees', 'employees.id', '=', 'induction_checklists.employee_id')
            ->get();
    $comments = DB::table('employees')     
    ->join('comments','employees.id','=','comments.employee_id')
    ->where('comments.employee_id', '=',decrypt($employeeId) )
    ->where(function ($query) {
        $query->where('comments.comment_section','=','InductionChecklist');
    })
    ->whereNot('comments.comment', '=','Nil' )
    ->orderBy('comments.created_at','desc')
    ->get(); 
    return view('viewChecklist',compact('employee','user','loggedUser','checklistEmployee','comments'));
}
    public function approveChecklist(Request $request){
        $employee_id = Session::get('checklistUser');
        $employee = Employee::find($employee_id);
        $comment_section= $request->get('comment_section'); 
        $comment = $request->get('comment'); 
        $email = $request->get('email'); 
        $created_by = $request->get('created_by'); 
        $employee->update([
            'induction_checklist' => "Approved"
    ]);
    Comment::create([
        'employee_id' =>  $employee_id,
        'comment_section' => $comment_section,
        'comment' =>  $comment,
        'created_by' =>  $created_by
    ]);
    $mailData = [
        "url" => "https://coa.southcareserviceuk.com/",
        "name" => $employee->surname." ".$employee->firstname,
        "comment" =>  $comment
       ];
        $rowData =  DB::table('employees')
       ->select('*')
       ->where('id','=',$employee_id)
       ->get();
       $email = $rowData[0]->email;
       Mail::to($email)->send(new ChecklistApprovedMail($mailData));
    }

public function finalCheck(){
        $loggedId = Session::get('userId');
        if($loggedId==""){
          return redirect()->route('sign.in');
      }
        $employee = Employee::find($loggedId); 
        // $employees = Employee::all();
         $employees = DB::table('employees')
         ->join('induction_users','employees.id','=','induction_users.user_id')
         ->select('*')
         ->where('role','=',2)
         ->where('employees.application_status','=','Approved')
         ->where('employees.training_status','=','Approved')
         ->where('employees.health_status','=','Approved')
         ->where('employees.dbs_status','=','Approved')
         ->where('employees.reference_status','=','Approved')
         ->where('employees.bank_status','=','Approved')
         ->where('employees.starter_status','=','Approved')
         ->where('employee_contract','=','Approved')
         ->where('induction_users.status','=','Attended')
         ->orderBy('employees.created_at','desc')
         ->get();
         return view('finalCheckList',compact('employee','employees'));
    }
    public function viewFinalCheck($employeeId){
        Session::put('finalCheckUser',decrypt($employeeId));
        $loggedId = Session::get('userId');
        if($loggedId==""){
            return redirect()->route('sign.in');
        }
        $loggedUser = Employee::find($loggedId); 
          $user = Employee::find(decrypt($employeeId));
       $employee = Employee::find(decrypt($employeeId));
    
    
          $inductionStatus = DB::table('induction_users')
          ->join('employees', 'employees.id', '=', 'induction_users.user_id')
          ->select('induction_users.*')
          ->where('employees.id', '=',decrypt($employeeId) )
          ->orderBy('induction_users.created_at', 'DESC')
          ->get();
        return view('viewFinalCheck',compact('employee','user','loggedUser','inductionStatus'));
    }
    public function approveFinalCheck(Request $request){
        $loggedId = Session::get('userId');
        if($loggedId==""){
            return redirect()->route('sign.in');
        }
        $loggedUser = Employee::find($loggedId); 
       // $employeeId = request('employee_id');
        $employee_id = Session::get('finalCheckUser');
        //$final_check = request('final_check');
        $employee = Employee::find($employee_id);
        $employee->update([
                'final_check' => "Approved"
        ]); 

    }
    public function disApproveFinalCheck(Request $request){
        $loggedId = Session::get('userId');
        if($loggedId==""){
            return redirect()->route('sign.in');
        }
        $loggedUser = Employee::find($loggedId); 
       // $employeeId = request('employee_id');
        $employee_id = Session::get('finalCheckUser');
        //$final_check = request('final_check');
        $employee = Employee::find($employee_id);
        $employee->update([
                'final_check' => "Pending"
        ]); 

    }
}







    
    
 

