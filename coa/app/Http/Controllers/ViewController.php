<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use Illuminate\Support\Facades\DB;
use App\Models\Education;
use Session;


class ViewController extends Controller
{
    public function viewUser($employeeId){
        $employee = Employee::find(decrypt($employeeId));
        
        $application = DB::table('employees')   
                ->join('applications','employees.id','=','applications.employee_id')
                ->where('employees.id', '=',(decrypt($employeeId) ))
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

         $trainingDoc = DB::table('employees')
    ->select('file_type','file_type_additional','file_path','file_name','expiry_date')
    ->join('files','employees.id','=','files.employee_id')
    ->where('employees.id','=',decrypt($employeeId))
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
    $inductionStatus = DB::table('induction_users')
    ->join('employees', 'employees.id', '=', 'induction_users.user_id')
    ->select('induction_users.*')
    ->where('employees.id', '=',decrypt($employeeId) )
    ->orderBy('induction_users.created_at','desc')
    ->get();

        $loggedId = Session::get('userId');
        if($loggedId==""){
            return redirect()->route('sign.in');
        }
        $loggedUser = Employee::find($loggedId); 
        return view('viewUser',compact('employee','loggedUser','application','dbsEmployee','dbsDoc','trainingDoc','inductionStatus')); 
     } 
     public function viewApplication($employeeId){
          $userFile = DB::table('employees')
    ->select('*')
    ->join('files','employees.id','=','files.employee_id')
    ->where('employees.id','=',decrypt($employeeId))
    ->where(function ($query) {
    	$query->where('files.file_type','=','Passport')
    		->orWhere('files.file_type','=','BRP')
          ->orWhere('files.file_type','=','Right To Work')
          ->orwhere('files.file_type_additional','like','Education%')
          ->orwhere('files.file_type_additional','like','Work%');                           
    })
    ->get();
        $employeeId = decrypt($employeeId);
        Session::put('applicationUser',$employeeId);
        $education = DB::table('education')
        ->select('*')
        ->where('employee_id','=',$employeeId)
        ->get();
        $work = DB::table('works')
        ->select('*')
        ->where('employee_id','=',$employeeId)
        ->get();
        $employee = DB::table('employees')
/*         ->select('applications.*','employees.*')
 */     
        ->join('applications','employees.id','=','applications.employee_id')
        ->where('employees.id', '=',$employeeId )
        ->get();
        
         $brpDoc = DB::table('employees')
        ->select('file_type','file_type_additional','file_path','file_name','expiry_date')
        ->join('files','employees.id','=','files.employee_id')
        ->where('employees.id','=',$employeeId)
        ->where(function ($query) {
            $query->where('files.file_type','=','BRP');              
        })
        ->get();
        
         $comments = DB::table('employees')     
                ->join('comments','employees.id','=','comments.employee_id')
                ->where('employees.id', '=',$employeeId )
                ->where('comments.comment_section', '=','Application' )
                 ->whereNot('comments.comment', '=','Nil' )
                 ->orderBy('comments.created_at','desc')
                ->get();

 $loggedId = Session::get('userId');
 if($loggedId==""){
            return redirect()->route('sign.in');
        }
    $user = Employee::find($loggedId); 
        return view('viewApplication',compact('employee','education','work','userFile','user','brpDoc','comments')); 
     } 
     public function viewTraining($employeeId){
      $user = Employee::find(decrypt($employeeId));
      $employeeId = decrypt($employeeId);
      Session::put('trainingUser',$employeeId);

      $employee = DB::table('employees')
/*         ->select('applications.*','employees.*')
*/     
      ->join('files','employees.id','=','files.employee_id')
      ->where('employees.id', '=',$employeeId )
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
      $trainingEmployee = DB::table('employees')
/*         ->select('applications.*','employees.*')
*/     
      ->join('trainings','employees.id','=','trainings.employee_id')
      ->where('employees.id', '=',$employeeId )
      ->get();

    $comments = DB::table('employees')     
      ->join('comments','employees.id','=','comments.employee_id')
      ->where('employees.id', '=',$employeeId )
      ->where('comments.comment_section', '=','Training' )
       ->whereNot('comments.comment', '=','Nil' )
       ->orderBy('comments.created_at','desc')
      ->get();

 $loggedId = Session::get('userId');
 if($loggedId==""){
            return redirect()->route('sign.in');
        }
    $loggedUser = Employee::find($loggedId); 
      return view('viewTraining',compact('employee','user','loggedUser','trainingEmployee','comments')); 
   } 
}
