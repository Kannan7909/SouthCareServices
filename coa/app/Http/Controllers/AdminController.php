<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use Session;
use App\Models\Application;
use Illuminate\Support\Facades\DB;


class AdminController extends Controller
{
    //
    public function employeeList(){
          $loggedId = Session::get('userId');
          if($loggedId==""){
            return redirect()->route('sign.in');
        }
         $employee = Employee::find($loggedId); 
        // $employees = Employee::all();
         $employees = DB::table('employees')
         ->select('*')
         ->where('role','=',2)
         ->orderBy('employees.created_at','desc')
         ->get();
         return view('employeeList',compact('employee','employees'));
     }

     public function applicationList(){
        $loggedId = Session::get('userId');
        if($loggedId==""){
            return redirect()->route('sign.in');
        }
        $employee = Employee::find($loggedId); 
        $applications = DB::table('employees')
        ->select('*')
        ->join('applications','employees.id','=','applications.employee_id')
        ->orderBy('employees.created_at','desc')
        ->get();
     
       return view('applicationList',compact('employee','applications'));
   }
   public function trainingList(){
    $loggedId = Session::get('userId');
    if($loggedId==""){
        return redirect()->route('sign.in');
    }
    $employee = Employee::find($loggedId); 
    $trainings = DB::table('employees')
    ->select('*')
    ->join('trainings','employees.id','=','trainings.employee_id')
    ->orderBy('employees.created_at','desc')
    ->get();
 
   return view('trainingList',compact('employee','trainings'));
}
public function adminDashboard(){
    $loggedId = Session::get('userId');
    if($loggedId==""){
      return redirect()->route('sign.in');
  }
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
    $referenceApprovedPercentage = ($countReferenceApproved/$countUser)*100; 

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

   return view('adminDashboard',compact('employee','countUser','countTrainingRequest','countDBSRequest','countInductionRequest','applicationSubmittedPercentage','countApplicationSubmitted','applicationReviewedPercentage','countApplicationReviewed','applicationApprovedPercentage','countApplicationApproved','countTrainingSubmitted','trainingSubmittedPercentage','countTrainingReviewed','trainingReviewedPercentage','countTrainingApproved','trainingApprovedPercentage','countReferenceSubmitted','referenceSubmittedPercentage','countReferenceReviewed','referenceReviewedPercentage','countReferenceApproved','referenceApprovedPercentage','contractData','countHealthSubmitted','healthSubmittedPercentage','countHealthReviewed','healthReviewedPercentage','countHealthApproved','healthApprovedPercentage','countDBSSubmitted','DBSSubmittedPercentage','countDBSReviewed','DBSReviewedPercentage','countDBSApproved','DBSApprovedPercentage','countInductionConfirmed','inductionConfirmedPercentage','countInductionAttended','inductionAttenededPercentage','countInductionCancelled','inductionCancelledPercentage'));
}
public function filterCountUser(){
    $loggedId = Session::get('userId');
    if($loggedId==""){
      return redirect()->route('sign.in');
  }
  $employee = Employee::find($loggedId); 
  $from = request('from_date');
  $to = request('to_date');
  $countUser = DB::table('employees')
  ->where('role','2')
  ->where('created_at', '>=', $from)
  ->where('created_at', '<=', $to)
  ->count();
  return view('adminDashboard',compact('employee','countUser'));
}
}
