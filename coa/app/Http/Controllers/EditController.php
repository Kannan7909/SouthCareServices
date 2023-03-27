<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\DB;
use App\Models\Employee;
use App\Models\Application;
use App\Models\Reference;
use Illuminate\Support\Facades\Hash;
use App\Models\Health;
use Illuminate\Support\Facades\Mail;
use App\Mail\HealthSubmittedMail;
use App\Mail\ApplicationSubmittedMail;
use App\Models\Education;
use App\Models\Work;
use App\Models\File;
use Illuminate\Support\Facades\Validator;
use App\Models\Dbsdata;
use App\Mail\DBSSubmittedMail;
use App\Mail\ApplicationEditedMail;
use App\Mail\DBSEditedMail;
use App\Mail\ReferenceSubmittedMail;
use App\Mail\ReferenceEditedMail;
use App\Mail\HealthEditedMail;
use App\Models\Bank;
use App\Mail\BankEditedMail;
use App\Mail\ProfileEditedMail;
use App\Mail\ProfileUpdatedMail;
use App\Mail\ApplicationUpdatedMail;
use App\Mail\DBSUpdatedMail;
use App\Mail\ReferenceUpdatedMail;
use App\Mail\HealthUpdatedMail;
use App\Mail\BankUpdatedMail;
use App\Models\Starter;
use App\Mail\StarterEditedMail;
use App\Mail\StarterUpdatedMail;







class EditController extends Controller
{
    //
    public function editProfile() {
        $loggedId = Session::get('userId');
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
        return view('editProfile',compact('employee','profile','inductionStatus'));
    }
    public function editApplication() {
        $loggedId = Session::get('userId');
        if($loggedId==""){
            return redirect()->route('sign.in');
        }
        $employee = Employee::find($loggedId);
        //$application = Application::find($loggedId);
        $application = Application::where('employee_id', '=', $loggedId)->first();

        $userFile = DB::table('employees')
        ->select('file_type','file_path')
        ->join('files','employees.id','=','files.employee_id')
        ->where('employees.id','=',$loggedId)
        ->where(function ($query) {
            $query->where('files.file_type','=','Passport')
            ->orWhere('files.file_type','=','BRP')
              ->orWhere('files.file_type','=','Right To Work');              
        })
        ->get();
       
        $education = DB::table('employees')
        ->select('study_place','qualification','qualified_date')
        ->join('education','employees.id','=','education.employee_id')
        ->where('employees.id','=',$loggedId)
        ->get();

        $educationDoc = DB::table('employees')
        ->select('file_type','file_type_additional','file_path','file_name')
        ->join('files','employees.id','=','files.employee_id')
        ->where('employees.id','=',$loggedId)
        ->where(function ($query) {
            $query->where('files.file_type','like','Education%');              
        })
        ->get();
        $work = DB::table('employees')
        ->select('from','to','employer_name','business_type','job_title')
        ->join('works','employees.id','=','works.employee_id')
        ->where('employees.id','=',$loggedId)
        ->get();

        $profile = DB::table('employees')
        ->select('file_type','file_type_additional','file_path','file_name')
        ->join('files','employees.id','=','files.employee_id')
        ->where('employees.id','=',$loggedId)
        ->where(function ($query) {
            $query->where('files.file_type','=','Profile Photo');             
        })
        ->get();

        $brpExpiry = DB::table('employees')
        ->select('file_type','file_type_additional','file_path','file_name','expiry_date')
        ->join('files','employees.id','=','files.employee_id')
        ->where('employees.id','=',$loggedId)
        ->where(function ($query) {
            $query->where('files.file_type','=','BRP');              
        })
        ->get();
        $inductionStatus = DB::table('induction_users')
        ->join('employees', 'employees.id', '=', 'induction_users.user_id')
        ->select('induction_users.*')
        ->where('employees.id', '=',$loggedId )
        ->orderBy('induction_users.created_at', 'DESC')
        ->get();
        return view('editApplication',compact('employee','application','userFile','education','work','educationDoc','profile','brpExpiry','inductionStatus'));
    }
    public function viewProgress() {
        $loggedId = Session::get('userId');
        if($loggedId==""){
            return redirect()->route('sign.in');
        }
        $employee = Employee::find($loggedId);
        return view('progressBar',compact('employee'));
    }

    public function updateApplication(){
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
        $address1 = request('address1');
        $address2 = request('address2');
        $address3 = request('address3');
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
        $loggedId = Session::get('userId');
        if($loggedId==""){
            return redirect()->route('sign.in');
        }
        //$employee = Application::find(Session::get('userId'));
        $employee = Application::where('employee_id', '=', $loggedId)->first();

        $success = $employee->Update([
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
        Mail::to($email)->send(new ApplicationEditedMail($mailData));
       
        $adminEmail = "info@southcareserviceuk.com";
        Mail::to($adminEmail)->send(new ApplicationUpdatedMail($mailData));  
        //return view('formSuccess');

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
        return view('afterEditApplication',compact('employee','profile','inductionStatus'));
   
        
    }
    public function editReference() {
        $loggedId = Session::get('userId');
        if($loggedId==""){
            return redirect()->route('sign.in');
        }
        $employee = Employee::find($loggedId);
        //$reference = Reference::find($loggedId);
        $reference = Reference::where('employee_id', '=', $loggedId)->first();
        $profile = DB::table('employees')
        ->select('file_type','file_type_additional','file_path','file_name')
        ->join('files','employees.id','=','files.employee_id')
        ->where('employees.id','=',$loggedId)
        ->where(function ($query) {
            $query->where('files.file_type','=','Profile Photo');             
        })
        ->get();
        return view('editReference',compact('employee','reference','profile'));
    }
 
    public function updateReference() {
        $loggedId = Session::get('userId');
        if($loggedId==""){
            return redirect()->route('sign.in');
        }
        $employee = Employee::find($loggedId);
        //$reference = Reference::find($loggedId);
        $reference = Reference::where('employee_id', '=', $loggedId)->first();
        $reference->update([
            'refer1_name' => request('refer1_name'),
            'refer1_job' => request('refer1_job'),
            'other_note1' => request('other_note1'),
            'refer1_address' => request('refer1_address'),
            'refer1_company' => request('refer1_company'),
            'refer1_tel' => request('refer1_tel'),
            'refer1_email' => request('refer1_email'),
            'refer2_name' => request('refer2_name'),
            'refer2_job' => request('refer2_job'),
            'other_note2' => request('other_note2'),
            'refer2_address' => request('refer2_address'),
            'refer2_company' => request('refer2_company'),
            'refer2_tel' => request('refer2_tel'),
            'refer2_email' => request('refer2_email')
       ]);
       $referenceUser = Employee::find($loggedId);
        $referenceUser->update([
         'reference_status' => 'Submitted'
    ]);
    $mailData = [
        "url" => "https://coa.southcareserviceuk.com/",
        "name" => $employee->surname." ".$employee->firstname
       ];
        $rowData =  DB::table('employees')
       ->select('*')
       ->where('id','=',$loggedId)
       ->get();
       $email = $rowData[0]->email; 
       Mail::to($email)->send(new ReferenceEditedMail($mailData));
      
       $adminEmail = "info@southcareserviceuk.com";
       Mail::to($adminEmail)->send(new ReferenceUpdatedMail($mailData));  

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
        return view('afterEditReference',compact('employee','profile','inductionStatus'));
    }

    public function updateProfile() {
        $loggedId = Session::get('userId');
        if($loggedId==""){
            return redirect()->route('sign.in');
        }
        $employee = Employee::find($loggedId);
        $employee->update([
            'title' => request('title'),
            'surname' => request('surname'),
            'firstname' => request('first_name'),
            'posts' => request('posts'),
            'kitchen_assistant' => request('kitchen_assistant'),
            'domestic_Care' => request('domestic_Care'),
            'care_assistant' => request('care_assistant'),
            'living_Care' => request('living_Care'),
            'status' => request('status'),
            'address1' => request('address1'),
            'address2' => request('address2'),
            'address3' => request('address3'),
            'postTown' => request('post_town'),
            'postcode' => request('postcode'),
            'contact_no' => request('contact'),
            'country_code' => request('country_code_whatsapp'),
            'uk_contact_no' => request('uk_contact'),
            'email' => request('email'),
            'login_id' => request('login'),
/*             'password' => Hash::make(request('password'))
 */       ]);
       /* $referenceUser = Employee::find($loggedId);
        $referenceUser->update([
         'reference_status' => 'Submitted'
    ]); */
    $profile = DB::table('employees')
            ->select('file_type','file_type_additional','file_path','file_name')
            ->join('files','employees.id','=','files.employee_id')
            ->where('employees.id','=',$loggedId)
            ->where(function ($query) {
                $query->where('files.file_type','=','Profile Photo');             
            })
            ->get();
            $mailData = [
                "url" => "https://coa.southcareserviceuk.com/",
                "name" => $employee->surname." ".$employee->firstname
               ];
                $rowData =  DB::table('employees')
               ->select('*')
               ->where('id','=',$loggedId)
               ->get();
               $email = $rowData[0]->email;

               Mail::to($email)
               ->cc(['samthomaskb08@gmail.com'])
               ->send(new ProfileEditedMail($mailData));
              
               $adminEmail = "info@southcareserviceuk.com";
               Mail::to($adminEmail)->send(new ProfileUpdatedMail($mailData));
               $inductionStatus = DB::table('induction_users')
                ->join('employees', 'employees.id', '=', 'induction_users.user_id')
                ->select('induction_users.*')
                ->where('employees.id', '=',$loggedId )
                ->orderBy('induction_users.created_at', 'DESC')
                ->get(); 
        return view('afterEditProfile',compact('employee','profile','inductionStatus'));
    }
    public function editHealth() {
        $loggedId = Session::get('userId');
        if($loggedId==""){
            return redirect()->route('sign.in');
        }
        $employee = Employee::find($loggedId);
        //$health = Health::find($loggedId);
        $health = Health::where('employee_id', '=', $loggedId)->first();
        /* $health =  DB::table('healths')
        ->select('*')
        ->where('employee_id','=',$loggedId)
        ->get(); */
        $profile = DB::table('employees')
        ->select('file_type','file_type_additional','file_path','file_name')
        ->join('files','employees.id','=','files.employee_id')
        ->where('employees.id','=',$loggedId)
        ->where(function ($query) {
            $query->where('files.file_type','=','Profile Photo');             
        })
        ->get();
        return view('editHealth',compact('employee','health','profile'));
    }
    public function updateHealth() {
        $loggedId = Session::get('userId');
        if($loggedId==""){
            return redirect()->route('sign.in');
        }
        $employee = Health::find($loggedId);
        //$health = Health::find($loggedId);
        $health = Health::where('employee_id', '=', $loggedId)->first();
        $success = $health->update([
            'gp_name' => request('gp_name'),
            'gp_country_code' => request('gp_country_code'),
            'gp_mobile' => request('gp_mobile'),
            'address1' => request('address1'),
            'address2' => request('address2'),
            'address3' => request('address3'),
            'postTown' => request('post_town'),
            'postcode' => request('postcode'),
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
            'disabled_note' => request('disabled_note'),
            'benefit' => request('benefit'),
            'absent' => request('absent'),
            'pregnant' => request('pregnant'),
            'pregnant_note' => request('pregnant_note'),
            'additional' => request('additional')
       ]);
       if($success){
       $employee = Employee::find($loggedId);
        $employee->update([
         'health_status' => 'Submitted'
    ]);
}
    $mailData = [
        "url" => "https://coa.southcareserviceuk.com/",
        "name" => $employee->surname." ".$employee->firstname
       ];
        $rowData =  DB::table('employees')
       ->select('*')
       ->where('id','=',$loggedId)
       ->get();
       $email = $rowData[0]->email;
       Mail::to($email)->send(new HealthEditedMail($mailData));
      
       $adminEmail = "info@southcareserviceuk.com";
       Mail::to($adminEmail)->send(new HealthUpdatedMail($mailData));  

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
        return view('afterEditHealth',compact('employee','profile','inductionStatus'));
    }
    
    public function updateEducation(Request $request) {
        $loggedId = Session::get('userId');
        if($loggedId==""){
            return redirect()->route('sign.in');
        }
        Education::where('employee_id', $loggedId)->delete();
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

         public function updateWork(Request $request) {
            $loggedId = Session::get('userId');
            if($loggedId==""){
                return redirect()->route('sign.in');
            }
            Work::where('employee_id', $loggedId)->delete();
            $itemlist = array();
            $rowData=$request->get('itemlist'); 
            $rowCount=count($rowData);
    
            for($i=0;$i<$rowCount;$i++){
                //$data= $rowData[$i]['study_place'];
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

            public function fileUpdate(Request $request){
                $loggedId = Session::get('userId');
                if($loggedId==""){
                    return redirect()->route('sign.in');
                }
                File::where('employee_id', $loggedId)
                ->where('file_type', 'Additional 1')
                        ->delete();
                
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
                     $file_type_additional= $request->file_type_additional;
                     
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
        
           public function editDBS() {
            $loggedId = Session::get('userId');
            if($loggedId==""){
                return redirect()->route('sign.in');
            }
            $employee = Employee::find($loggedId);
            //$reference = Reference::find($loggedId);
            $dbs = Dbsdata::where('employee_id', '=', $loggedId)->first();

            $dbsDoc = DB::table('employees')
            ->select('file_type','file_type_additional','file_path','file_name')
            ->join('files','employees.id','=','files.employee_id')
            ->where('employees.id','=',$loggedId)
            ->where(function ($query) {
                $query->where('files.file_type','=','DBS');            
            })
            ->get();

            $updateServiceDoc = DB::table('employees')
            ->select('file_type','file_type_additional','file_path','file_name')
            ->join('files','employees.id','=','files.employee_id')
            ->where('employees.id','=',$loggedId)
            ->where(function ($query) {
                $query->where('files.file_type','=','UpdateFile');            
            })
            ->get();
            $profile = DB::table('employees')
            ->select('file_type','file_type_additional','file_path','file_name')
            ->join('files','employees.id','=','files.employee_id')
            ->where('employees.id','=',$loggedId)
            ->where(function ($query) {
                $query->where('files.file_type','=','Profile Photo');             
            })
            ->get();
            $dbsExpiry = DB::table('employees')
            ->select('file_type','file_type_additional','file_path','file_name','expiry_date')
            ->join('files','employees.id','=','files.employee_id')
            ->where('employees.id','=',$loggedId)
            ->where(function ($query) {
                $query->where('files.file_type','=','DBS');              
            })
            ->get();
            $inductionStatus = DB::table('induction_users')
            ->join('employees', 'employees.id', '=', 'induction_users.user_id')
            ->select('induction_users.*')
            ->where('employees.id', '=',$loggedId )
            ->orderBy('induction_users.created_at', 'DESC')
            ->get();
            return view('editDBS',compact('employee','dbs','dbsDoc','updateServiceDoc','profile','dbsExpiry','inductionStatus'));
        }
        public function updateDBS(Request $request) {
            $loggedId = Session::get('userId');
            if($loggedId==""){
                return redirect()->route('sign.in');
            }
            $employee = Dbsdata::where('employee_id', '=', $loggedId)->first();
            $dbsNumber = request('dbsNumber');
        
            $success = $employee->Update([
                'employee_id' =>  $loggedId,
                'dbsNumber' =>  $dbsNumber,
            ]);
            if($success){
                $employee = Employee::find($loggedId);
                $employee->update([
                    'dbs_status' => "Submitted"
               ]);
            }
            $mailData = [
                "url" => "https://coa.southcareserviceuk.com/",
                "name" => $employee->surname." ".$employee->firstname
            ];
            $rowData =  DB::table('employees')
            ->select('*')
            ->where('id','=',$loggedId)
            ->get();
            $email = $rowData[0]->email;
            Mail::to($email)->send(new DBSEditedMail($mailData));

            $adminEmail = "info@southcareserviceuk.com";
        Mail::to($adminEmail)->send(new DBSUpdatedMail($mailData));
        //return view('formSuccess');
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
        return view('afterEditDBS',compact('employee','profile','inductionStatus'));      
             }

        public function editBank() {
        $loggedId = Session::get('userId');
        if($loggedId==""){
            return redirect()->route('sign.in');
        }
        $employee = Employee::find($loggedId);
        //$reference = Reference::find($loggedId);
        $bank = Bank::where('employee_id', '=', $loggedId)->first();
        $profile = DB::table('employees')
        ->select('file_type','file_type_additional','file_path','file_name')
        ->join('files','employees.id','=','files.employee_id')
        ->where('employees.id','=',$loggedId)
        ->where(function ($query) {
            $query->where('files.file_type','=','Profile Photo');             
        })
        ->get();
        return view('editBank',compact('employee','bank','profile'));
    }
    
    public function updateBank() {
        $loggedId = Session::get('userId');
        if($loggedId==""){
            return redirect()->route('sign.in');
        }
        $employee = Employee::find($loggedId);
        $bank = Bank::where('employee_id', '=', $loggedId)->first();
        $bank->update([
            'bank_name' => request('bank_name'),
            'sort_code' => request('sort_code'),
            'account_no' => request('account_no'),
            'account_holder' => request('account_holder'),
            'address1' => request('address1'),
            'address2' => request('address2'),
            'address3' => request('address3'),
            'postTown' => request('postTown'),
            'postcode' => request('postcode'),
       ]);
       $bankUser = Employee::find($loggedId);
        $bankUser->update([
         'bank_status' => 'Submitted'
    ]);
    $mailData = [
        "url" => "https://coa.southcareserviceuk.com/",
        "name" => $employee->surname." ".$employee->firstname
       ];
        $rowData =  DB::table('employees')
       ->select('*')
       ->where('id','=',$loggedId)
       ->get();
       $email = $rowData[0]->email; 
       Mail::to($email)->send(new BankEditedMail($mailData));
      
       $adminEmail = "info@southcareserviceuk.com";
       Mail::to($adminEmail)->send(new BankUpdatedMail($mailData));  

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
        return view('afterEditBank',compact('employee','profile','inductionStatus'));
    }
    public function editStarterForm() {
        $loggedId = Session::get('userId');
        if($loggedId==""){
            return redirect()->route('sign.in');
        }
        $employee = Employee::find($loggedId);
        $starter = Starter::where('employee_id', '=', $loggedId)->first();
        $application = Application::where('employee_id', '=', $loggedId)->first();
        /* $health =  DB::table('healths')
        ->select('*')
        ->where('employee_id','=',$loggedId)
        ->get(); */
        
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
        return view('editStarterForm',compact('employee','starter','profile','application','inductionStatus'));
    }
    public function updateStarterForm() {
        $loggedId = Session::get('userId');
        if($loggedId==""){
            return redirect()->route('sign.in');
        }
        $employee = Employee::find($loggedId);
        $starter = Starter::where('employee_id', '=', $loggedId)->first();
        $starter->update([
            'insurance' => request('insurance'),
            'start_date' => request('start_date'),
            'statementA' => request('statementA'),
            'statementB' => request('statementB'),
            'statementC' => request('statementC'),
            'loan' => request('loan'),
            'is_complete' => request('completed'),
            'is_debit' => request('debit'),
            'loan_type' => request('loan_type'),
            'pg_loan' => request('pg_loan'),
            'is_pg_complete' => request('pg_complete'),
            'pg_debit' => request('pg_debit'),
            'signature' => request('signature'),
            'full_name' => request('full_name'),
            'date' => request('date'),
            ]);
        $starterUser = Employee::find($loggedId);
        $starterUser->update([
         'starter_status' => 'Submitted'
    ]);
    $mailData = [
        "url" => "https://coa.southcareserviceuk.com/",
        "name" => $employee->surname." ".$employee->firstname
       ];
        $rowData =  DB::table('employees')
       ->select('*')
       ->where('id','=',$loggedId)
       ->get();
       $email = $rowData[0]->email; 
       Mail::to($email)->send(new StarterEditedMail($mailData));
      
       $adminEmail = "info@southcareserviceuk.com";
       Mail::to($adminEmail)->send(new StarterUpdatedMail($mailData));  

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
        return view('afterEditStarter',compact('employee','profile','inductionStatus'));
    }
}

