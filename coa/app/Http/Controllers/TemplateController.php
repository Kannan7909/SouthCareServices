<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Session;
use Illuminate\Support\Facades\DB; 
use App\Models\Employee;
use App\Models\Template;
use App\Models\Contract;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContractSubmittedMail;
use App\Mail\EmployeeContractSubmittedMail;
use App\Mail\PayContractSentMail;
use App\Mail\PayContractUpdateMail;



class TemplateController extends Controller
{
    //
    public function policyTemplate(){
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
         return view('policyTemplate',compact('loggedUser','profile'));
     }

     public function savePolicy(Request $request){
        $heading= $request->get('heading'); 
        $template_section= $request->get('template_section'); 
        $template = $request->get('template'); 
        $policy = DB::table('templates')     
        ->where('templates.template_section', '=','Policy' )
        ->get();
        if(sizeof($policy)==0){
        Template::create([
            'heading' => $heading,
            'template_section' => $template_section,
            'template' =>  $template,
        ]);
    }else{
        Template::where('template_section', 'Policy')
       ->update([
           'heading' => $heading,
           'template_section' => $template_section,
           'template' => $template
        ]);
    }
     }
     public function getPolicy(Request $request){
        $loggedId = Session::get('userId');
        if($loggedId==""){
            return redirect()->route('sign.in');
        }
        $loggedUser = Employee::find($loggedId); 
        $policy = DB::table('templates')     
        ->where('templates.template_section', '=','Policy' )
        ->get();
        return response()->json($policy[0]);
     }

     public function emailTemplate(){
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
         return view('emailTemplate',compact('loggedUser','profile'));
     }

     public function saveEmail(Request $request){
        $template_section= $request->get('template_section'); 
        $template = $request->get('template'); 
        $email = DB::table('templates')     
        ->where('templates.template_section', '=',$template_section )
        ->get();
        if(sizeof($email)==0){
        Template::create([
            'template_section' => $template_section,
            'template' =>  $template,
        ]);
    }else{
        Template::where('template_section', $template_section)
       ->update([
           'template' => $template
        ]);
    }
     }
     public function getEmail(Request $request){
        $loggedId = Session::get('userId');
        if($loggedId==""){
            return redirect()->route('sign.in');
        }
        $loggedUser = Employee::find($loggedId);
        $template_section= $request->get('template_section');  
        $email = DB::table('templates')     
        ->where('templates.template_section', '=',$template_section )
        ->get();
        return response()->json($email[0]->template);
     }
     public function contractTemplate(){
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
         return view('contractTemplate',compact('loggedUser','profile'));
     }
     /* public function saveContract(Request $request){
        $template = $request->get('template'); 
        $user = $request->get('user'); 
        $weekday = $request->get('weekday'); 
        $weekend = $request->get('weekend'); 
        $contract = DB::table('contracts')     
        ->where('contracts.employee_id', '=',$user )
        ->get();
        if(sizeof($contract)==0){
        Contract::create([
            'template' => $template,
            'employee_id' =>  $user,
            'weekday_rate' =>  $weekday,
            'weekend_rate' =>  $weekend
        ]);
        Employee::where('id', $user)
       ->update([
            'employee_contract' => "Sent"
        ]);
    }else{
        Contract::where('employee_id', $user)
       ->update([
            'template' => $template,
            'employee_id' =>  $user,
            'weekday_rate' =>  $weekday,
            'weekend_rate' =>  $weekend
        ]);
        Employee::where('id', $user)
       ->update([
            'employee_contract' => "Sent"
        ]);
    }
     } */
     public function saveContract(Request $request){
        $template_section= $request->get('template_section'); 
        $template = $request->get('template'); 
        $contract = DB::table('templates')     
        ->where('templates.template_section', '=',$template_section )
        ->get();
        if(sizeof($contract)==0){
        Template::create([
            'template_section' => $template_section,
            'template' =>  $template,
        ]);
    }else{
        Template::where('template_section', $template_section)
       ->update([
           'template' => $template
        ]);
    }
     }
     public function getContract(Request $request){
        $loggedId = Session::get('userId');
        if($loggedId==""){
            return redirect()->route('sign.in');
        }
        $loggedUser = Employee::find($loggedId);
        $template_section= $request->get('template_section');  
        $contract = DB::table('templates')     
        ->where('templates.template_section', '=',$template_section )
        ->get();
        return response()->json($contract[0]->template);
     }
  /*    public function getContract(Request $request){
        $loggedId = Session::get('userId');
        if($loggedId==""){
            return redirect()->route('sign.in');
        }
        $loggedUser = Employee::find($loggedId);
        $user= $request->get('user');
        $contract = DB::table('contracts')     
        ->where('contracts.employee_id', '=',$user )
        ->get();
        return response()->json($contract[0]);
     } */
     public function ContractForm(){
        $loggedId = Session::get('userId');
        if($loggedId==""){
            return redirect()->route('sign.in');
        }
        $loggedUser = Employee::find($loggedId); 
        $employee = Employee::find($loggedId);
         $profile = DB::table('employees')
         ->select('file_type','file_type_additional','file_path','file_name')
         ->join('files','employees.id','=','files.employee_id')
         ->where('employees.id','=',$loggedId)
         ->where(function ($query) {
             $query->where('files.file_type','=','Profile Photo');             
         })
         ->get();
         $contract = DB::table('contracts')     
         ->where('contracts.employee_id', '=', $loggedId)
         ->get();
         $content = DB::table('templates')     
         ->where('templates.template_section', '=',"Indroduction1" )
         ->orWhere('templates.template_section', '=',"Indroduction2" )
         ->orWhere('templates.template_section', '=',"Indroduction3" )
         ->orWhere('templates.template_section', '=',"Trainings" )
         ->orWhere('templates.template_section', '=',"Termination1" )
         ->orWhere('templates.template_section', '=',"Termination2" )
         ->orWhere('templates.template_section', '=',"end" )
         ->get();
         $currentStatus = $employee->employee_contract;
         $form = "Employee Contract Form";
         $path ="employee.contractForm";
         /* $comments = DB::table('employees')     
        ->join('comments','employees.id','=','comments.employee_id')
        ->where('employees.id', '=',$loggedId )
        ->where('comments.comment_section', '=','ContractUser' )
        ->orderBy('comments.created_at','desc')
        ->get();
        $commentAdmin = DB::table('employees')     
        ->join('comments','employees.id','=','comments.employee_id')
        ->where('employees.id', '=',$loggedId )
        ->where('comments.comment_section', '=','ContractAdmin' )
        ->orderBy('comments.created_at','desc')
        ->get();
        if(sizeof($comments)!=0){
        $comment=  $comments[0]->comment;
        }else{
        $comment=  "Nil";
        }
        if(sizeof($commentAdmin)!=0){
        $commentAdmin=  $commentAdmin[0]->comment;
        }else{
        $commentAdmin=  "Nil";
        } */
        $comments = DB::table('employees')     
            ->join('comments','employees.id','=','comments.employee_id')
            ->where('employees.id', '=',$loggedId )
            ->where(function ($query) {
                $query->where('comments.comment_section','=','ContractUser')
                    ->orWhere('comments.comment_section','=','ContractAdmin');
            })
            ->whereNot('comments.comment', '=','Nil' )
            ->orderBy('comments.created_at','desc')
            ->get();
        $user_contract = DB::table('user_contracts')     
        ->where('user_contracts.employee_id', '=', $loggedId)
        ->get();
        $inductionStatus = DB::table('induction_users')
        ->join('employees', 'employees.id', '=', 'induction_users.user_id')
        ->select('induction_users.*')
        ->where('employees.id', '=',$loggedId )
        ->orderBy('induction_users.created_at', 'DESC')
        ->get();
         if($currentStatus=="Commented"){
            $status="Commented";
            $data = "You have commented on your ". $form.". We will let you know once admin reviews your comment.";
            return view('currentStatus',compact('employee','data','form','path','profile','comments','status'));
         }else if($currentStatus=="Submitted"){
            $status="Submitted";
            $data = "You have submitted your ". $form.". We will let you know once the ". $form." is under review.";
            return view('currentStatus',compact('employee','data','form','path','profile','comments','status'));
         }else if($currentStatus=="Under Review"){
            $status="Under Review";
            //$data = "Your ". $form." is under review. We will let you know once the ". $form." is approved.";
            $data = "Your JobsPlus Employee Contract is under review. Please see the Admin's comment and check your email for further updates.";
            return view('currentStatus',compact('employee','data','form','path','profile','comments','status'));
         }else if($currentStatus=="Approved"){
            $status="Approved";
            $data = "Your ". $form." is approved.";
             return view('currentStatus',compact('employee','data','form','path','profile','comments','status','content','contract','user_contract'));
         }else{
        $comments = DB::table('employees')     
        ->join('comments','employees.id','=','comments.employee_id')
        ->where('employees.id', '=',$loggedId )
        ->where(function ($query) {
            $query->where('comments.comment_section','=','ContractUser')
                ->orWhere('comments.comment_section','=','ContractAdmin');
        })
        ->whereNot('comments.comment', '=','Nil' )
        ->orderBy('comments.created_at','desc')
        ->get(); 
         return view('contractForm',compact('loggedUser','profile','contract','content','comments','inductionStatus'));
         }
     }
     /* public function saveContractForm(Request $request){
        $loggedId = Session::get('userId');
        $profile = DB::table('employees')
        ->select('file_type','file_type_additional','file_path','file_name')
        ->join('files','employees.id','=','files.employee_id')
        ->where('employees.id','=',$loggedId)
        ->where(function ($query) {
            $query->where('files.file_type','=','Profile Photo');             
        })
        ->get();
        Employee::where('id', $loggedId)
        ->update([
             'employee_contract' => "Agreed"
         ]);
         $employee = Employee::find($loggedId); 
         $mailData = [
            "url" => "https://coa.southcareserviceuk.com/",
            "name" => $employee->surname." ".$employee->firstname
           ];
            $rowData =  DB::table('employees')
           ->select('*')
           ->where('id','=',$loggedId)
           ->get();
           $email = $rowData[0]->email;
           Mail::to($email)->send(new ContractSubmittedMail($mailData));
           $email = "info@southcareserviceuk.com";
           Mail::to($email)->send(new EmployeeContractSubmittedMail($mailData));
         return view('afterSubmitEmployeeContract',compact('employee','profile'));
     } */
     public function getPosts(Request $request){
        $loggedId = Session::get('userId');
        if($loggedId==""){
            return redirect()->route('sign.in');
        }
        $loggedUser = Employee::find($loggedId);
        $user= $request->get('user');
        $rate = DB::table('employees')
        ->select('*')
        ->join('contracts','employees.id','=','contracts.employee_id')
        ->where('employees.id','=',$user)
        ->get();
        $posts = DB::table('employees')     
        ->where('employees.id', '=',$user )
        ->get();
        if(sizeof($rate)==0){
        return response()->json($posts[0]);
        }else{
        return response()->json($rate[0]);
     }
    }
     public function payRateTemplate(){
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
         ->select('employees.id','employees.login_id')
         ->join('induction_users','employees.id','=','induction_users.user_id')
         ->where('employees.role','=',2)
         ->where('employees.application_status','=','Approved')
         ->where('employees.training_status','=','Approved')
         ->where('employees.health_status','=','Approved')
         ->where('employees.dbs_status','=','Approved')
         ->where('employees.reference_status','=','Approved')
         ->where('employees.bank_status','=','Approved')
         ->where('employees.starter_status','=','Approved')
         ->where('induction_users.status','=','Attended')
         ->get();
         return view('payRateTemplate',compact('loggedUser','profile','users'));
     }
     public function savePayRate(Request $request){
        $user= $request->get('user');   
        $commencement_date= $request->get('commencement_date');
        $weekday_longday_type1= $request->get('weekday_longday_type1'); 
        $weekday_night_type1 = $request->get('weekday_night_type1'); 
        $bank_holiday_type1= $request->get('bank_holiday_type1'); 
        $weekend_longday_type1 = $request->get('weekend_longday_type1'); 
        $weekend_night_type1= $request->get('weekend_night_type1'); 
        $weekday_longday_type2 = $request->get('weekday_longday_type2'); 
        $weekend_longday_type2 = $request->get('weekend_longday_type2'); 
        $bank_holiday_type2= $request->get('bank_holiday_type2');
        $kitchen_weekday_longday= $request->get('kitchen_weekday_longday'); 
        $kitchen_weekday_night = $request->get('kitchen_weekday_night'); 
        $kitchen_bank_holiday= $request->get('kitchen_bank_holiday'); 
        $kitchen_weekend_longday = $request->get('kitchen_weekend_longday'); 
        $kitchen_weekend_night= $request->get('kitchen_weekend_night'); 
        $domestic_weekday_longday = $request->get('domestic_weekday_longday'); 
        $domestic_weekday_night = $request->get('domestic_weekday_night'); 
        $domestic_bank_holiday= $request->get('domestic_bank_holiday');
        $domestic_weekend_longday= $request->get('domestic_weekend_longday'); 
        $domestic_weekend_night = $request->get('domestic_weekend_night'); 
        $care_weekday_longday= $request->get('care_weekday_longday'); 
        $care_weekday_night = $request->get('care_weekday_night'); 
        $care_bank_holiday= $request->get('care_bank_holiday'); 
        $care_weekend_longday= $request->get('care_weekend_longday'); 
        $care_weekend_night= $request->get('care_weekend_night'); 
        $living_weekday_longday = $request->get('living_weekday_longday'); 
        $living_weekday_night = $request->get('living_weekday_night'); 
        $living_bank_holiday= $request->get('living_bank_holiday'); 
        $living_weekend_longday = $request->get('living_weekend_longday'); 
        $living_weekend_night= $request->get('living_weekend_night');
        
        $contract = DB::table('contracts')     
        ->where('contracts.employee_id', '=',$user )
        ->get();
        if(sizeof($contract)==0){
            Contract::create([
                'employee_id' =>  $user,
                'commencement_date' =>  $commencement_date,
                'weekday_longday_type1' =>  $weekday_longday_type1,
                'weekday_night_type1' =>  $weekday_night_type1,
                'bank_holiday_type1' =>  $bank_holiday_type1,
                'weekend_longday_type1' =>  $weekend_longday_type1,
                'weekend_night_type1' =>  $weekend_night_type1,
                'weekday_longday_type2' =>  $weekday_longday_type2,
                'weekend_longday_type2' =>  $weekend_longday_type2,
                'bank_holiday_type2' =>  $bank_holiday_type2,
                'kitchen_weekday_longday' =>  $kitchen_weekday_longday,
                'kitchen_weekday_night' =>  $kitchen_weekday_night,
                'kitchen_bank_holiday' =>  $kitchen_bank_holiday,
                'kitchen_weekend_longday' =>  $kitchen_weekend_longday,
                'kitchen_weekend_night' =>  $kitchen_weekend_night,
                'domestic_weekday_longday' =>  $domestic_weekday_longday,
                'domestic_weekday_night' =>  $domestic_weekday_night,
                'domestic_bank_holiday' =>  $domestic_bank_holiday,
                'domestic_weekend_longday' =>  $domestic_weekend_longday,
                'domestic_weekend_night' =>  $domestic_weekend_night,
                'care_weekday_longday' =>  $care_weekday_longday,
                'care_weekday_night' =>  $care_weekday_night,
                'care_bank_holiday' =>  $care_bank_holiday,
                'care_weekend_longday' =>  $care_weekend_longday,
                'care_weekend_night' =>  $care_weekend_night,
                'living_weekday_longday' =>  $living_weekday_longday,
                'living_weekday_night' =>  $living_weekday_night,
                'living_bank_holiday' =>  $living_bank_holiday,
                'living_weekend_longday' =>  $living_weekend_longday,
                'living_weekend_night' =>  $living_weekend_night
                ]);  
                Employee::where('id', $user)
       ->update([
            'employee_contract' => "Sent"
        ]);
        $employee = Employee::find($user);
         $mailData = [
            "url" => "https://coa.southcareserviceuk.com/",
            "name" => $employee->surname." ".$employee->firstname
        ];
            $rowData =  DB::table('employees')
                ->select('*')
                ->where('id','=',$user)
                ->get();
                $email = $rowData[0]->email;
                Mail::to($email)->send(new payContractSentMail($mailData));      
        }else{   
        Contract::where('contracts.employee_id', $user)
       ->update([
        'employee_id' =>  $user,
        'commencement_date' =>  $commencement_date,
        'weekday_longday_type1' =>  $weekday_longday_type1,
        'weekday_night_type1' =>  $weekday_night_type1,
        'bank_holiday_type1' =>  $bank_holiday_type1,
        'weekend_longday_type1' =>  $weekend_longday_type1,
        'weekend_night_type1' =>  $weekend_night_type1,
        'weekday_longday_type2' =>  $weekday_longday_type2,
        'weekend_longday_type2' =>  $weekend_longday_type2,
        'bank_holiday_type2' =>  $bank_holiday_type2,
        'kitchen_weekday_longday' =>  $kitchen_weekday_longday,
        'kitchen_weekday_night' =>  $kitchen_weekday_night,
        'kitchen_bank_holiday' =>  $kitchen_bank_holiday,
        'kitchen_weekend_longday' =>  $kitchen_weekend_longday,
        'kitchen_weekend_night' =>  $kitchen_weekend_night,
        'domestic_weekday_longday' =>  $domestic_weekday_longday,
        'domestic_weekday_night' =>  $domestic_weekday_night,
        'domestic_bank_holiday' =>  $domestic_bank_holiday,
        'domestic_weekend_longday' =>  $domestic_weekend_longday,
        'domestic_weekend_night' =>  $domestic_weekend_night,
        'care_weekday_longday' =>  $care_weekday_longday,
        'care_weekday_night' =>  $care_weekday_night,
        'care_bank_holiday' =>  $care_bank_holiday,
        'care_weekend_longday' =>  $care_weekend_longday,
        'care_weekend_night' =>  $care_weekend_night,
        'living_weekday_longday' =>  $living_weekday_longday,
        'living_weekday_night' =>  $living_weekday_night,
        'living_bank_holiday' =>  $living_bank_holiday,
        'living_weekend_longday' =>  $living_weekend_longday,
        'living_weekend_night' =>  $living_weekend_night
        ]);
        Employee::where('id', $user)
        ->update([
             'employee_contract' => "Sent"
         ]);
         $employee = Employee::find($user);
         $mailData = [
            "url" => "https://coa.southcareserviceuk.com/",
            "name" => $employee->surname." ".$employee->firstname
        ];
            $rowData =  DB::table('employees')
                ->select('*')
                ->where('id','=',$user)
                ->get();
                $email = $rowData[0]->email;
                Mail::to($email)->send(new payContractUpdateMail($mailData));
     }
    }
    public function employeeContractForm(Request $request){
        $loggedId = Session::get('userId');
        if($loggedId==""){
            return redirect()->route('sign.in');
        }
        $loggedUser = Employee::find($loggedId); 
        $employee = Employee::find($loggedId);
         $profile = DB::table('employees')
         ->select('file_type','file_type_additional','file_path','file_name')
         ->join('files','employees.id','=','files.employee_id')
         ->where('employees.id','=',$loggedId)
         ->where(function ($query) {
             $query->where('files.file_type','=','Profile Photo');             
         })
         ->get();
         $contract = DB::table('contracts')     
         ->where('contracts.employee_id', '=', $loggedId)
         ->get();
         $content = DB::table('templates')     
         ->where('templates.template_section', '=',"Indroduction1" )
         ->orWhere('templates.template_section', '=',"Indroduction2" )
         ->orWhere('templates.template_section', '=',"Indroduction3" )
         ->orWhere('templates.template_section', '=',"Trainings" )
         ->orWhere('templates.template_section', '=',"Termination1" )
         ->orWhere('templates.template_section', '=',"Termination2" )
         ->orWhere('templates.template_section', '=',"end" )
         ->get();
         $comments = DB::table('employees')     
        ->join('comments','employees.id','=','comments.employee_id')
        ->where('employees.id', '=',$loggedId )
        ->where(function ($query) {
            $query->where('comments.comment_section','=','ContractUser')
                ->orWhere('comments.comment_section','=','ContractAdmin');
        })
        ->whereNot('comments.comment', '=','Nil' )
        ->orderBy('comments.created_at','desc')
        ->get(); 
        return view('contractForm',compact('loggedUser','profile','contract','content','comments'));
    }
}
