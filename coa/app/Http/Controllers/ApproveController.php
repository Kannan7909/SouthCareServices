<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\File;
use Illuminate\Support\Facades\Validator;
use App\Models\Employee;
use Illuminate\Support\Facades\DB;
use Session;
use Redirect;
use App\Models\Starter;
use App\Models\Application;
use App\Models\Health;


class ApproveController extends Controller
{
    public function documentStatus(){
        $loggedId = Session::get('userId');
        $employee = Employee::find($loggedId);
        $affected = DB::table('employees')->where('id', '=', $loggedId)->update(array('document_verified' => "processing"));
        $documentStatus['result'] = "Please Wait! Your Document Verification Under Processing....";
        return $documentStatus;
     }
     public function approveDocuments($employeeId){
        $employeeId = decrypt($employeeId);
        $affected = DB::table('employees')->where('id', '=', $employeeId)->update(array('document_verified' => "approved"));
        return redirect()->route('documents.details');
     
     }
     public function bankStatus(){
         $loggedId = Session::get('userId');
        $employee = Employee::find($loggedId);
     /*    $affected = DB::table('employees')->where('id', '=', $loggedId)->update(array('bank' => "processing", 'forms_verified' => 1
     )); */
        $affected = DB::table('employees')->where('id', '=', $loggedId)->update(array('bank' => "processing"));
        $bankStatus['result'] = "Please Wait! Your Bank Details Verification Under Processing.... ";
        return $bankStatus; 
     }
     public function approveBank($employeeId){
        $employeeId = decrypt($employeeId);
       // $affected = DB::table('employees')->where('id', '=', $employeeId)->update(array('bank' => "approved", 'forms_verified' => 1));
       $is_complete = Employee::find($employeeId); 
       $forms_verified = $is_complete->forms_verified;
      if($forms_verified==4){
       $affected = DB::table('employees')->where('id', '=', $employeeId)->update(array('bank' => "approved"));
      }else{
        $affected = DB::table('employees')->where('id', '=', $employeeId)->update(array('bank' => "approved", 'forms_verified' => 1));
      }
       
       return redirect()->route('bank.details');
     
     }
     public function starterStatus(){
        $loggedId = Session::get('userId');
       $employee = Employee::find($loggedId);
       $affected = DB::table('employees')->where('id', '=', $loggedId)->update(array('starter_verified' => "processing"));
       $starterStatus['result'] = "Please Wait! Your Starter Details Verification Under Processing.... ";
       return $starterStatus; 
    }
    public function approveStarter($employeeId){
        $rowId = decrypt($employeeId);
        $starterUser = Starter::find($rowId);
        $employeeId = $starterUser->employee_id; 
       // $affected = DB::table('employees')->where('id', '=', $employeeId)->update(array('starter_verified' => "approved", 'forms_verified' => 2));
       
       $is_complete = Employee::find($employeeId); 
        $forms_verified = $is_complete->forms_verified;
       if($forms_verified==4){
        $affected = DB::table('employees')->where('id', '=', $employeeId)->update(array('starter_verified' => "approved"));
       }else{
         $affected = DB::table('employees')->where('id', '=', $employeeId)->update(array('starter_verified' => "approved", 'forms_verified' => 2));
       }
       return redirect()->route('starterChecklist.details');
     
     }
     public function healthStatus(){
        $loggedId = Session::get('userId');
       $employee = Employee::find($loggedId);
       $affected = DB::table('employees')->where('id', '=', $loggedId)->update(array('health_verified' => "processing"));
       $healthStatus['result'] = "Please Wait! Your Health Questionnaire Verification Under Processing.... ";
       return $healthStatus; 
    }
    public function approveHealth($employeeId){
         $rowId = decrypt($employeeId);
         $starterUser = Health::find($rowId);
         $employeeId = $starterUser->employee_id; 
       // $affected = DB::table('employees')->where('id', '=', $employeeId)->update(array('health_verified' => "approved", 'forms_verified' => 3));
       $is_complete = Employee::find($employeeId); 
       $forms_verified = $is_complete->forms_verified;
      if($forms_verified==4){
       $affected = DB::table('employees')->where('id', '=', $employeeId)->update(array('health_verified' => "approved"));
      }else{
        $affected = DB::table('employees')->where('id', '=', $employeeId)->update(array('health_verified' => "approved", 'forms_verified' => 3));
      }
       
       return redirect()->route('healthQuestionnaire.details');
     
     }
     public function applicationStatus(){
        $loggedId = Session::get('userId');
       $employee = Employee::find($loggedId);
       $affected = DB::table('employees')->where('id', '=', $loggedId)->update(array('application_verified' => "processing"));
       $applicationStatus['result'] = "Please Wait! Your Application Verification Under Processing.... ";
       return $applicationStatus; 
    }
    public function approveApplication($employeeId){
      $rowId = decrypt($employeeId);
      $starterUser = Application::find($rowId);
      $employeeId = $starterUser->employee_id; 
        $affected = DB::table('employees')->where('id', '=', $employeeId)->update(array('application_verified' => "approved", 'forms_verified' => 4));
        return redirect()->route('application.details');
     
     }
}
