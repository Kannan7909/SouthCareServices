<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Induction;
use App\Models\InductionUser;
use App\Models\InductionOnline;
use App\Models\InductionUserOnline;
use Session;

use DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\InductionConfirmMail;
use App\Mail\InductionCancelMail;
use App\Mail\InductionRequestMail;
use App\Mail\InductionSubmittedMail;

class InductionController extends Controller
{
    //
    public function inductionTest(){
        $currDate = date('Y-m-d');
        return   $currDate;
    }
    public function induction(){
       // return "ss11ss";exit;
        // $inductionData = DB :: ('induction')->where('induction_date','>',  '2022-07-15');

        $currDate = date('Y-m-d');
        $induction_user_id = Session::get('userId');
        
        $inductionData = DB::table('induction_users')
       ->select('*')
       ->where('user_id','=',$induction_user_id)
       ->where('status','!=','cancelled')
       ->get();
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
         $checklist = $employee->induction_checklist;
       if(sizeof($inductionData) >0){
       
        $inductionData['flag'] = "0";
        //old
        /* foreach ($inductionData as $induction){
            $status = $induction->status;
            // if($status == 'Confirmed'){
            //   // $inductionData['result'] = "Your Request is under Review";
            // }
             if($status=='Confirmed'){
                $inductionData['result'] = "Your induction request has been confirmed. Please check your email for further updates.";
                           return view('induction',compact('inductionData','employee','profile','inductionStatus'));
            }else if($status=='no'){
                $inductionData['result'] = "Thank you for submitting. Your induction request is under review. Please check your email for further updates.";
                            return view('induction',compact('inductionData','employee','profile','inductionStatus'));
            }else if($status=='Attended'){
                $inductionData['result'] = "You have successfully attended the office induction. Please check your email for further updates.";
                            return view('induction',compact('inductionData','employee','profile','inductionStatus'));
            }else{
                $inductionData['result'] = "Your induction request has been cancelled.";
                return view('induction',compact('inductionData','employee','profile','inductionStatus'));
                            //return $inductionData;exit;
            }
        } */
        foreach ($inductionData as $induction){
            $status = $induction->status;
            // if($status == 'Confirmed'){
            //   // $inductionData['result'] = "Your Request is under Review";
            // }
             if($status=='Confirmed'){
                $inductionData['result'] = "Your induction request has been confirmed. Please check your email for further updates.";
                           return view('induction',compact('inductionData','employee','profile','inductionStatus'));
            }else if($status=='no'){
                $inductionData['result'] = "Thank you for submitting. Your induction request is under review. Please check your email for further updates.";
                            return view('induction',compact('inductionData','employee','profile','inductionStatus'));
            }else if($status=='Attended' && $checklist =='Pending'){
                $inductionData['flag'] = "2";
                $inductionData['result'] = "You have successfully attended the office induction.";
                            return view('induction',compact('inductionData','employee','profile','inductionStatus'));
            }else if($status=='Attended' && $checklist  !='Pending'){
                $inductionData['flag'] = "3";
                $inductionData['result'] = "Thank you for attending the induction program and submitting the induction checklist. ";
                            return view('induction',compact('inductionData','employee','profile','inductionStatus'));
            }else{
                $inductionData['result'] = "Your induction request has been cancelled.";
                return view('induction',compact('inductionData','employee','profile','inductionStatus'));
                            //return $inductionData;exit;
            }
        }
        // return $inductionData;exit;
        // return view('induction',compact('inductionData'));
       }else{
           
        $inductionData = DB::table('inductions')
             ->select('*')
             ->where('induction_date','>',$currDate)
             ->get();

             //$inductionData = [];
             $j = 0;
             foreach ($inductionData as $induction){

                $limit = $induction->limit;
                $id = $induction->id;
                //return $id;exit;
                $inductionUsers = DB::table('induction_users')
                ->where('induction_id','=',$id)
                ->where('status','!=','cancelled')
                ->count();
                if($inductionUsers >= $limit){
                    $induction->total = 'yes';
                }else{
                    $induction->total = 'no';
                }
                $j++;
             }

        $inductionData['flag'] = "1";
        $inductionData['result'] = "Success";
        //return $inductionData;exit;
        return view('induction',compact('inductionData','employee','profile','inductionStatus'));
        //return "tetsts";
       }
    }
     public function saveInductionInitial(Request $request){

    $time = $request->time;
    $date = $request->date;
    //return $date;exit;
        $date = date_create($date);
        $dateFormat = date_format($date,"Y-m-d");
        $time = request('time');
        
        $inductionData = DB::table('inductions')
        ->select('*')
        ->where('induction_date','=',$dateFormat)
        ->where('induction_time','=',$time)
        ->get();
       
        $id = $inductionData[0]->id;
        $limit = $inductionData[0]->limit;

        $inductionUser = DB::table('induction_users')
             ->select('*')
             ->where('induction_id','=',$id)
             ->get();

             if(sizeof($inductionUser) >=  $limit){
                $inductionData['flag'] = "0";
                $inductionData['result'] = "This slot is filled please chose another slot";
                return $inductionData;
                  exit;
             }else{
                 
                $induction_user_id = Session::get('userId');
                InductionUser::create([
                    'user_id' =>  $induction_user_id,
                    'induction_id' =>  $id,
                    'status' =>  'no'
                ]);
                
                $email = "info@southcareserviceuk.com";
         $mailData = [
             "date" => $dateFormat,
             "time" => $time,
    "url" => "https://coa.southcareserviceuk.com/"
];
        
        Mail::to($email)->send(new InductionRequestMail($mailData));
        
        $rowData =  DB::table('employees')
        ->select('*')
        ->where('id','=',$induction_user_id)
        ->get();
        $email = $rowData[0]->email;
        Mail::to($email)->send(new InductionSubmittedMail($mailData));
             }
             $inductionData['flag'] = "1";
            $inductionData['result'] = "Your indction date is on review";
            
            
            
            return redirect()->route('induction.employee');
            
            //return view('induction',compact('inductionData'));
           //redirect()->route('induction');
    }

    public function inductionPhase2(){

         $currDate = date('Y-m-d');
         
         $inductionData = DB::table('induction_user_onlines')
       ->select('*')
       ->where('user_id','=',170)
       ->where('status','!=','cancelled')
       ->get();

       if(sizeof($inductionData) >0){
       
        $inductionData['flag'] = "0";
        foreach ($inductionData as $induction){
            $status = $induction->status;
            // if($status == 'Confirmed'){
            //   // $inductionData['result'] = "Your Request is under Review";
            // }
            if($status=='Confirmed'){
                $inductionData['result'] = "Your Request is Confirmed";
                            return $inductionData;exit;
            }else if($status=='no'){
                $inductionData['result'] = "Your Request is under Review";
                            return $inductionData;exit;
            }else if($status=='Attended'){
                $inductionData['result'] = "Attended";
                            return $inductionData;exit;
            }else{
                $inductionData['result'] = "Cancelled";
                            return $inductionData;exit;
            }
        }
        
        // return $inductionData;exit;
        // return view('induction',compact('inductionData'));
       }else{
         
        $inductionData = DB::table('induction_onlines')
             ->select('*')
             ->where('induction_date','>',$currDate)
             ->get();
        $inductionData['flag'] = "1";
        $inductionData['result'] = "Success";
        return $inductionData; 
       }
    }
    public function saveInductionPhase2(Request $request){


        $time = $request->time;
        $date = $request->date;
        $date = date_create($date);
        $dateFormat = date_format($date,"Y-m-d");
        //$time = request('timePhase2');
        /* return   $dateFormat."=====".$time;
        exit; */
        
        $inductionData = DB::table('induction_onlines')
        ->select('*')
        ->where('induction_date','=',$dateFormat)
        ->where('induction_time','=',$time)
        ->get();
        /* return   $inductionData;
        exit; */
        $id = $inductionData[0]->id;
        $limit = $inductionData[0]->limit;

        $inductionUser = DB::table('induction_user_onlines')
             ->select('*')
             ->where('induction_id','=',$id)
             ->get();

             if(sizeof($inductionUser) >=  $limit){
                $inductionData['flag'] = "0";
                $inductionData['result'] = "This slot is filled please chose another slot";
                return $inductionData;
                  exit;
             }else{
                 
                $induction_user_id = Session::get('userId');
                InductionUserOnline::create([
                    'user_id' =>  $induction_user_id,
                    'induction_id' =>  $id,
                    'status' =>  'no'
                ]);
             }
             $inductionData['flag'] = "1";
            $inductionData['result'] = "Your indction date is on review";
            return $inductionData; 
    }

    public function inductionPhase1Details(){

    $loggedId = Session::get('userId');
    if($loggedId==""){
            return redirect()->route('sign.in');
        }
    $employee = Employee::find($loggedId); 
        $inductionUserDetails = DB::table('inductions')
            ->join('induction_users', 'induction_users.induction_id', '=', 'inductions.id')
            ->join('employees', 'employees.id', '=', 'induction_users.user_id')
            ->select('inductions.*', 'induction_users.*','induction_users.id as induction_user_id','induction_users.status as induction_status', 'employees.*')
             ->orderBy('induction_users.id', 'desc')
            ->get();

             //return $inductionUserDetails;exit;

        return view('inductionPhase1details',compact('inductionUserDetails','employee'));
    }

    
    public function confirmInduction($inductionId){
        $inductionId = decrypt($inductionId);
        $inductionUser = InductionUser::find($inductionId);
       // return "helpp".$inductionUser;
        $inductionUser->update([
         'status' => 'Confirmed'
    ]);
    
    $inductionUserDetails = DB::table('inductions')
            ->join('induction_users', 'induction_users.induction_id', '=', 'inductions.id')
            ->join('employees', 'employees.id', '=', 'induction_users.user_id')
            ->select('inductions.*', 'induction_users.*','induction_users.id as induction_user_id','induction_users.status as induction_status', 'employees.*')
            ->where('induction_users.id','=',$inductionId)
            ->get();
   
    
        $email = $inductionUserDetails[0]->email;
         $mailData = [
             "date" => $inductionUserDetails[0]->induction_date,
             "time" => $inductionUserDetails[0]->induction_time,
    "url" => "https://coa.southcareserviceuk.com/"
];
        
        Mail::to($email)->send(new InductionConfirmMail($mailData));
        
    return redirect()->route('induction.phase1Details')
                 ->with('message','Updated Successfuly !!');
     }
 
     public function attendInduction($inductionId){
         $inductionId = decrypt($inductionId);
         $inductionUser = InductionUser::find($inductionId);
         $inductionUser->update([
          'status' => 'Attended'
     ]);
     return redirect()->route('induction.phase1Details')
                  ->with('message','Updated Successfuly !!');
      }
      
      public function cancelInduction($inductionId){
         $inductionId = decrypt($inductionId);
       //  return $inductionId;exit;
         $inductionUser = InductionUser::find($inductionId);
         $inductionUser->update([
          'status' => 'Cancelled'
     ]);
     
     $inductionUserDetails = DB::table('inductions')
            ->join('induction_users', 'induction_users.induction_id', '=', 'inductions.id')
            ->join('employees', 'employees.id', '=', 'induction_users.user_id')
            ->select('inductions.*', 'induction_users.*','induction_users.id as induction_user_id','induction_users.status as induction_status', 'employees.*')
            ->where('induction_users.id','=',$inductionId)
            ->get();
   
    
        $email = $inductionUserDetails[0]->email;
         $mailData = [
             "date" => $inductionUserDetails[0]->induction_date,
             "time" => $inductionUserDetails[0]->induction_time,
    "url" => "https://coa.southcareserviceuk.com/"
];
        
        Mail::to($email)->send(new InductionCancelMail($mailData));
     
     return redirect()->route('induction.phase1Details')
                  ->with('message','Updated Successfuly !!');
      }

      public function inductionPhase2Details(){
        $inductionUserDetails = DB::table('induction_onlines')
        ->join('induction_user_onlines', 'induction_user_onlines.induction_id', '=', 'induction_onlines.id')
        ->join('employees', 'employees.id', '=', 'induction_user_onlines.user_id')
        ->select('induction_onlines.*', 'induction_user_onlines.*','induction_user_onlines.id as induction_user_id', 'induction_user_onlines.status as induction_status','employees.*')
        ->get();

    return view('inductionPhase2details',compact('inductionUserDetails'));
      }
      public function confirmInductionPhase2($inductionId){
        $inductionId = decrypt($inductionId);
        $inductionUser = InductionUserOnline::find($inductionId);
        $inductionUser->update([
         'status' => 'Confirmed'
    ]);
    return redirect()->route('induction.phase2Details')
                 ->with('message','Updated Successfuly !!');
     }
 
     public function attendInductionPhase2($inductionId){
         $inductionId = decrypt($inductionId);
         $inductionUser = InductionUserOnline::find($inductionId);
         $inductionUser->update([
          'status' => 'Attended'
     ]);
     return redirect()->route('induction.phase2Details')
                  ->with('message','Updated Successfuly !!');
      }
      
       public function cancelInductionPhase2($inductionId){
         $inductionId = decrypt($inductionId);
         $inductionUser = InductionUserOnline::find($inductionId);
         $inductionUser->update([
          'status' => 'Cancelled'
     ]);
     return redirect()->route('induction.phase2Details')
                  ->with('message','Updated Successfuly !!');
      }
      
      
      
      public function addInductionPhase1(){
           $loggedId = Session::get('userId');
           if($loggedId==""){
            return redirect()->route('sign.in');
        }
    $employee = Employee::find($loggedId); 
        return view('addInduction-Phase1',compact('employee')); 
      }
      public function addInductionPhase2(){
        return view('addInduction-Phase2'); 
      }

      public function addInductionPhase1Save(Request $request){

        $date = date_create(request('inductionDate1'));
        $dateFormat = date_format($date,"Y-m-d");
        $time = request('inductionTime1');
        $limit = request('inductionLimit1');

        //return $time;exit;
        
        $inductionData = DB::table('inductions')
        ->select('*')
        ->where('induction_date','=',$dateFormat)
        ->where('induction_time','=',$time)
        ->get();

        //return sizeof($inductionData);exit;

        if(sizeof($inductionData) ==  0){
        
        induction::create([
            'induction_date' =>  $dateFormat,
            'induction_time' =>  $time,
            'limit' =>  $limit
        ]);
        return redirect()->route('induction.addphase1')
        ->with('message','Updated Successfuly !!');
    }else{
        return redirect()->route('induction.addphase1')
        ->with('message','Time zone already exists !!');
    }
    }

    public function addInductionPhase2Save(Request $request){

        //return "phase2";exit;
        $date = date_create(request('inductionDate2'));
        $dateFormat = date_format($date,"Y-m-d");
        $time = request('inductionTime2');
        $limit = request('inductionLimit2');

        $inductionData = DB::table('inductions')
        ->select('*')
        ->where('induction_date','=',$dateFormat)
        ->where('induction_time','=',$time)
        ->get();
        
        InductionOnline::create([
            'induction_date' =>  $dateFormat,
            'induction_time' =>  $time,
            'limit' =>  $limit
        ]);
        return redirect()->route('induction.addphase2')
        ->with('message','Updated Successfuly !!');
    }
      
      
      public function searchInduction(Request $request){

        $search = $request->search;
        $output ="";
            $employee=DB::table('employees')
             ->join('induction_users', 'employees.id', '=', 'induction_users.user_id')
             ->join('inductions', 'induction_users.induction_id', '=', 'inductions.id')
             ->where('employees.surname', 'like', '%'.$request->search.'%')
            ->orWhere('employees.firstname', 'like', '%'.$request->search.'%')
             ->orWhere('employees.login_id', 'like', '%'.$request->search.'%')
            ->orWhere('employees.email', 'like', '%'.$request->search.'%')
             ->select('employees.*','induction_users.*','induction_users.id as induction_user_id','induction_users.status as induction_user_status','inductions.*')
              ->orderBy('induction_users.id', 'desc')
            ->get(); 
            
            //print_r($employee);
            
            $total_row = $employee->count();
            if($total_row > 0)
            {
               $j =1;
                foreach($employee as $employee)
                {
                    if($employee->induction_user_status == "no"){
                        
                        $status = 'Pending';
                         $column = '<a  href="' . route('confirm.induction', encrypt($employee->induction_user_id)) . '"class="btn btn-primary" title="View" data-toggle="tooltip">Confirm Session<!-- <i class="fas fa-edit"> --></i></a>
                    <a href="' . route('cancel.induction', encrypt($employee->induction_user_id)) . '"class="btn btn-primary" title="View" data-toggle="tooltip">Cancel Session<!-- <i class="fas fa-edit"> --></i></a>';

                    }else if($employee->induction_user_status == "Confirmed"){
                       
                        $status = $employee->induction_user_status;
                        $column = '<a  href="' . route('attend.induction', encrypt($employee->induction_user_id)) . '"class="btn btn-primary" title="View" data-toggle="tooltip">Attended Session<!-- <i class="fas fa-edit"> --></i></a>
                    <a href="' . route('cancel.induction', encrypt($employee->induction_user_id)) . '"class="btn btn-primary" title="View" data-toggle="tooltip">Cancel Session<!-- <i class="fas fa-edit"> --></i></a>';

                    }else if($employee->induction_user_status == "cancelled"){
                       
                    $status = $employee->induction_user_status;
                    $column = 'Session Cancelled';
                   

                    }else{
                        
                        $status = $employee->induction_user_status;
                        $column = 'Session Attended';

                    }
                    
                    $output .= '
                    <tr>
                    <th scope="row">'.$j.'</th>
                    <td>'.$employee->firstname.' '.$employee->surname.'</td>
                    <td>'.$employee->induction_date.'</td>
                    <td>'.$employee->induction_time.'</td>
                    <td>'.$status.'</td>
                    <td>'.$column.'</td>
                    </tr>
                    ';
                    $j++;
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
    
    
    public function inductionList(){
         $loggedId = Session::get('userId');
         if($loggedId==""){
            return redirect()->route('sign.in');
        }
    $employee = Employee::find($loggedId); 
        $currDate = date('Y-m-d');
        
        // $inductionData = DB::table('inductions')
        //      ->select('*')
        //      ->where('induction_date','>',$currDate)
        //      ->get();
        
          $inductionData = DB::table('inductions')
             ->select('*') 
             ->orderBy('inductions.id', 'desc')
             ->get();
             
        for($i =0;$i<sizeof($inductionData);$i++){
            if($inductionData[$i]->induction_date  <= $currDate){
                $inductionData[$i]->status = "yes";
            }else{
                $inductionData[$i]->status = "no";
            }
            $inductionId = $inductionData[$i]->id;
            $inductionlist = InductionUser::where('induction_id', $inductionId)->get();
            $inductionCount = $inductionlist->count();
            $inductionData[$i]->seat = $inductionCount;
        }
             
       // return $inductionData;exit;
          
          return view('inductionList',compact('inductionData','employee'));
            
          }
          
          public function deleteIndction($inductionId){
        
            $employee = Induction::find(decrypt($inductionId));
            $employee->delete();
           return redirect()->route('induction.list')
                ->with('message','1 Record Deleted Successfuly !!');
            
          }
          
          
           public function searchInductionList(Request $request){

        $search = $request->search;
        $output ="";
            $employee=DB::table('employees')
             ->join('induction_users', 'employees.id', '=', 'induction_users.user_id')
             ->join('inductions', 'induction_users.induction_id', '=', 'inductions.id')
             ->where('employees.surname', 'like', '%'.$request->search.'%')
            ->orWhere('employees.firstname', 'like', '%'.$request->search.'%')
             ->orWhere('employees.login_id', 'like', '%'.$request->search.'%')
            ->orWhere('employees.email', 'like', '%'.$request->search.'%')
             ->select('employees.*','induction_users.*','induction_users.status as induction_user_status','inductions.*')
            ->get(); 
            
            //print_r($employee);
            
            $total_row = $employee->count();
            if($total_row > 0)
            {
               $j =1;
                foreach($employee as $employee)
                {
                    if($employee->induction_user_status == "no"){
                        
                        $status = 'Pending';
                         $column = '<a  href="' . route('confirm.induction', encrypt($employee->user_id)) . '"class="btn btn-primary" title="View" data-toggle="tooltip">Confirm Session<!-- <i class="fas fa-edit"> --></i></a>
                    <a href="' . route('cancel.induction', encrypt($employee->user_id)) . '"class="btn btn-primary" title="View" data-toggle="tooltip">Cancel Session<!-- <i class="fas fa-edit"> --></i></a>';

                    }else if($employee->induction_user_status == "Confirmed"){
                       
                        $status = $employee->induction_user_status;
                        $column = '<a  href="' . route('attend.induction', encrypt($employee->user_id)) . '"class="btn btn-primary" title="View" data-toggle="tooltip">Attended Session<!-- <i class="fas fa-edit"> --></i></a>
                    <a href="' . route('cancel.induction', encrypt($employee->user_id)) . '"class="btn btn-primary" title="View" data-toggle="tooltip">Cancel Session<!-- <i class="fas fa-edit"> --></i></a>';

                    }else if($employee->induction_user_status == "cancelled"){
                       
                    $status = $employee->induction_user_status;
                    $column = 'Session Cancelled';
                   

                    }else{
                        
                        $status = $employee->induction_user_status;
                        $column = 'Session Attended';

                    }
                    
                    $output .= '
                    <tr>
                    <th scope="row">'.$j.'</th>
                    <td>'.$employee->surname.' '.$employee->firstname.'</td>
                    <td>'.$employee->induction_date.'</td>
                    <td>'.$employee->induction_time.'</td>
                    <td>'.$status.'</td>
                    <td>'.$column.'</td>
                    </tr>
                    ';
                    $j++;
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
    
    public function filterInduction(Request $request)
    {
        $output ="";
        $data = array();
        $status = $request->get('status'); 
         $employee=DB::table('employees')
             ->join('induction_users', 'employees.id', '=', 'induction_users.user_id')
             ->join('inductions', 'induction_users.induction_id', '=', 'inductions.id')
             ->where('induction_users.status', '=',$status)
             ->select('employees.*','induction_users.*','induction_users.id as induction_user_id','induction_users.status as induction_user_status','inductions.*')
             ->orderBy('induction_users.id', 'desc')
            ->get(); 
        
       // return $employee;exit;
        $total_row =count($employee);
        if($total_row > 0)
            {
               $j =1;
                foreach($employee as $employee)
                {
                    if($employee->induction_user_status == "no"){
                        
                        $status = 'Pending';
                         $column = '<a  href="' . route('confirm.induction', encrypt($employee->induction_user_id)) . '"class="btn btn-primary" title="View" data-toggle="tooltip">Confirm Session<!-- <i class="fas fa-edit"> --></i></a>
                    <a href="' . route('cancel.induction', encrypt($employee->induction_user_id)) . '"class="btn btn-primary" title="View" data-toggle="tooltip">Cancel Session<!-- <i class="fas fa-edit"> --></i></a>';

                    }else if($employee->induction_user_status == "Confirmed"){
                       
                        $status = $employee->induction_user_status;
                        $column = '<a  href="' . route('attend.induction', encrypt($employee->induction_user_id)) . '"class="btn btn-primary" title="View" data-toggle="tooltip">Attended Session<!-- <i class="fas fa-edit"> --></i></a>
                    <a href="' . route('cancel.induction', encrypt($employee->induction_user_id)) . '"class="btn btn-primary" title="View" data-toggle="tooltip">Cancel Session<!-- <i class="fas fa-edit"> --></i></a>';

                    }else if($employee->induction_user_status == "cancelled"){
                       
                    $status = $employee->induction_user_status;
                    $column = 'Session Cancelled';
                   

                    }else{
                        
                        $status = $employee->induction_user_status;
                        $column = 'Session Attended';

                    }
                    
                    $output .= '
                    <tr>
                    <th scope="row">'.$j.'</th>
                    <td>'.$employee->firstname.' '.$employee->surname.'</td>
                    <td>'.$employee->induction_date.'</td>
                    <td>'.$employee->induction_time.'</td>
                    <td>'.$status.'</td>
                    <td>'.$column.'</td>
                    </tr>
                    ';
                    $j++;
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
    
}
