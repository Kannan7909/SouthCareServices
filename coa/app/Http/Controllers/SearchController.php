<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Employee;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\TestMail;
use Illuminate\Support\Facades\DB;
use Auth;
use Session;
class SearchController extends Controller
{
    //
    public function searchEmployee(Request $request)
        {
            $output ="";
            $employee=Employee::where('surname', 'like', '%'.$request->search.'%')
            ->orWhere('firstname', 'like', '%'.$request->search.'%')
             ->orWhere('login_id', 'like', '%'.$request->search.'%')
             ->orWhere('postcode', 'like', '%'.$request->search.'%')
            ->orWhere('posts', 'like', '%'.$request->search.'%')
            /*->orWhere('address1', 'like', '%'.$request->search.'%')
            ->orWhere('postcode', 'like', '%'.$request->search.'%')*/
            ->orWhere('contact_no', 'like', '%'.$request->search.'%')
            ->orWhere('uk_contact_no', 'like', '%'.$request->search.'%') 
            ->orWhere('email', 'like', '%'.$request->search.'%')
            ->orderBy('employees.created_at','desc')
            ->get();
            $total_row = $employee->count();
            if($total_row > 0)
            {
               $i=1;
                foreach($employee as $employee)
                {
                    $output .= '
                    <tr>
                    <th scope="row">'.$i.'</th>
                    <td>'.$employee->firstname." ".$employee->surname.'</td>
                    <td>'.$employee->postcode.'</td>
                    <td>'.$employee->posts.'</td>
                    <td>'.$employee->contact_no.'</td>
                    <td>'.$employee->uk_contact_no.'</td>
                    <td>'.$employee->email.'</td>
                    <td>'.'
                    <a href="' . route('view.user', encrypt($employee->id)) . '"class="btn btn-primary" title="View" data-toggle="tooltip">View<!-- <i class="fas fa-edit"> --></i></a>
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
         public function searchBankDetails(Request $request)
         {
             $output ="";
           
             $employee=Employee::where('surname', 'like', '%'.$request->search.'%')
             ->orWhere('firstname', 'like', '%'.$request->search.'%')
            /*  ->orWhere('posts', 'like', '%'.$request->search.'%')
             ->orWhere('address1', 'like', '%'.$request->search.'%')
             ->orWhere('postcode', 'like', '%'.$request->search.'%')
             ->orWhere('contact_no', 'like', '%'.$request->search.'%')
             ->orWhere('uk_contact_no', 'like', '%'.$request->search.'%') */
             ->orWhere('bank', 'like', '%'.$request->search.'%')
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
                     <td>'.$employee->created_at.'</td>
                     <td>'.$employee->login_id.'</td>
                     <td>'.$employee->email.'</td>
                     <td>'.$employee->bank.'</td>
                     <td>'.'
                     <a href="' . route('edit.bank', encrypt($employee->id)) . '" class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
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
          }
 
          public function searchStarterDetails(Request $request)
          {
              $output ="";
              $employee=Employee::where('surname', 'like', '%'.$request->search.'%')
              ->orWhere('firstname', 'like', '%'.$request->search.'%')
             /*  ->orWhere('posts', 'like', '%'.$request->search.'%')
              ->orWhere('address1', 'like', '%'.$request->search.'%')
              ->orWhere('postcode', 'like', '%'.$request->search.'%')
              ->orWhere('contact_no', 'like', '%'.$request->search.'%')
              ->orWhere('uk_contact_no', 'like', '%'.$request->search.'%') */
              ->orWhere('starter_verified', 'like', '%'.$request->search.'%')
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
                      <td>'.$employee->created_at.'</td>
                      <td>'.$employee->login_id.'</td>
                      <td>'.$employee->email.'</td>
                      <td>'.$employee->starter_verified.'</td>
                      <td>'.'
                      <a href="' . route('edit.starterChecklist', encrypt($employee->id)) . '" class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
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
           }
           public function searchHealthDetails(Request $request)
          {
              $output ="";
              $employee=Employee::where('surname', 'like', '%'.$request->search.'%')
              ->orWhere('firstname', 'like', '%'.$request->search.'%')
             /*  ->orWhere('posts', 'like', '%'.$request->search.'%')
              ->orWhere('address1', 'like', '%'.$request->search.'%')
              ->orWhere('postcode', 'like', '%'.$request->search.'%')
              ->orWhere('contact_no', 'like', '%'.$request->search.'%')
              ->orWhere('uk_contact_no', 'like', '%'.$request->search.'%') */
              ->orWhere('health_verified', 'like', '%'.$request->search.'%')
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
                      <td>'.$employee->created_at.'</td>
                      <td>'.$employee->login_id.'</td>
                      <td>'.$employee->email.'</td>
                      <td>'.$employee->health_verified.'</td>
                      <td>'.'
                      <a href="' . route('edit.healthQuestionnaire', encrypt($employee->id)) . '" class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
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
           }
           public function searchApplicationDetails(Request $request)
           {
               $output ="";
               $employee=Employee::where('surname', 'like', '%'.$request->search.'%')
               ->orWhere('firstname', 'like', '%'.$request->search.'%')
                ->orWhere('posts', 'like', '%'.$request->search.'%')
              /* ->orWhere('address1', 'like', '%'.$request->search.'%')
               ->orWhere('postcode', 'like', '%'.$request->search.'%')
               ->orWhere('contact_no', 'like', '%'.$request->search.'%')
               ->orWhere('uk_contact_no', 'like', '%'.$request->search.'%') */
               ->orWhere('application_verified', 'like', '%'.$request->search.'%')
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
                       <td>'.$employee->created_at.'</td>
                       <td>'.$employee->login_id.'</td>
                       <td>'.$employee->email.'</td>
                       <td>'.$employee->application_verified.'</td>
                       <td>'.'
                       <a href="' . route('edit.application', encrypt($employee->id)) . '" class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
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
            }

             
          public function searchApplication(Request $request)
          {
              $output ="";
              $employee=DB::table('employees')
             ->join('applications', 'employees.id', '=', 'applications.employee_id')
             ->where('employees.surname', 'like', '%'.$request->search.'%')
            ->orWhere('employees.firstname', 'like', '%'.$request->search.'%')
             ->orWhere('employees.contact_no', 'like', '%'.$request->search.'%')
             ->orWhere('employees.uk_contact_no', 'like', '%'.$request->search.'%')
            ->orWhere('employees.email', 'like', '%'.$request->search.'%')
             ->select('*')
             ->orderBy('employees.created_at','desc')
            ->get();
             
              $total_row = $employee->count();
              if($total_row > 0)
              {
                $i=1;
                  foreach($employee as $employee)
                  {
                      $output .= '
                      <tr>
                      <th scope="row">'.$i.'</th>
                      <td>'.$employee->firstname." ".$employee->surname.'</td>
                      <td>'.$employee->contact_no.'</td>
                      <td>'.$employee->uk_contact_no.'</td>
                      <td>'.$employee->email.'</td>
                      <td>'."Application ".$employee->application_status.'</td>
                      <td>'.'
                      <a href="' . route('view.application', encrypt($employee->employee_id)) . '"class="btn btn-primary" title="View" data-toggle="tooltip">View<!-- <i class="fas fa-edit"> --></i></a>
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
           public function searchTraining(Request $request)
           {
               $output ="";
               $employee=DB::table('employees')
              ->join('trainings', 'employees.id', '=', 'trainings.employee_id')
              ->where('employees.surname', 'like', '%'.$request->search.'%')
             ->orWhere('employees.firstname', 'like', '%'.$request->search.'%')
              ->orWhere('employees.contact_no', 'like', '%'.$request->search.'%')
              ->orWhere('employees.uk_contact_no', 'like', '%'.$request->search.'%')
             ->orWhere('employees.email', 'like', '%'.$request->search.'%')
              ->select('*')
              ->orderBy('employees.created_at','desc')
             ->get();
              
               $total_row = $employee->count();
               if($total_row > 0)
               {
                 $i=1;
                   foreach($employee as $employee)
                   {
                       $output .= '
                       <tr>
                       <th scope="row">'.$i.'</th>
                       <td>'.$employee->firstname." ".$employee->surname.'</td>
                       <td>'.$employee->contact_no.'</td>
                       <td>'.$employee->uk_contact_no.'</td>
                       <td>'.$employee->email.'</td>
                       <td>'."Training ".$employee->training_status.'</td>
                       <td>'.'
                       <a href="' . route('view.application', encrypt($employee->employee_id)) . '"class="btn btn-primary" title="View" data-toggle="tooltip">View<!-- <i class="fas fa-edit"> --></i></a>
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
 
  public function filterEmployee(Request $request)
    {
        $output ="";
        $data = array();
        $column = $request->get('column'); 
        $status = $request->get('status'); 
        $text = explode("_",$column);
        $currentStatus = ucfirst($text[0])." ".ucfirst($status);
        $employee =  DB::table('employees')
        ->select('*')
        ->where($column,'=',$status)
        ->orderBy('employees.created_at','desc')
        ->get();
        $total_row =count($employee);
        if($total_row > 0)
               {
                $i=1;
                   foreach($employee as $employee)
                   {
                       $output .= '
                       <tr>
                       <th scope="row">'.$i.'</th>
                       <td>'.$employee->surname.'</td>
                       <td>'.$employee->firstname.'</td>
                       <td>'.$employee->contact_no.'</td>
                       <td>'.$employee->uk_contact_no.'</td>
                       <td>'.$employee->email.'</td>
                       <td>'.$currentStatus.'</td>
                       <td>'.'
                       <a href="' . route('view.user', encrypt($employee->id)) . '" class="btn btn-primary" title="View" data-toggle="tooltip">View<!-- <i class="fas fa-edit"> --></i></a>
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

    public function filterApplication(Request $request)
    {
        $output ="";
        $data = array();
        $column = $request->get('column'); 
        $status = $request->get('status'); 
        $text = explode("_",$column);
        $currentStatus = ucfirst($text[0])." ".ucfirst($status);
        $employee =  DB::table('employees')
        ->select('*')
        ->where($column,'=',$status)
        ->orderBy('employees.created_at','desc')
        ->get();
       
        $total_row =count($employee);
        if($total_row > 0)
               {
                $i=1;
                foreach($employee as $employee)
                {
                if($employee->application_status=="Pending"){
                    $output .= '
                       <tr>
                       <th scope="row">'.$i.'</th>
                       <td>'.$employee->firstname." ".$employee->surname.'</td>
                       <td>'.$employee->contact_no.'</td>
                       <td>'.$employee->uk_contact_no.'</td>
                       <td>'.$employee->email.'</td>
                       <td>'.$currentStatus.'</td>
                       <td>'."NIL".'</td>
                       </tr>
                       ';
                       $i++;
                }else{
                   
                       $output .= '
                       <tr>
                       <th scope="row">'.$i.'</th>
                       <td>'.$employee->firstname." ".$employee->surname.'</td>
                       <td>'.$employee->contact_no.'</td>
                       <td>'.$employee->uk_contact_no.'</td>
                       <td>'.$employee->email.'</td>
                       <td>'.$currentStatus.'</td>
                       <td>'.'
                       <a href="' . route('view.application', encrypt($employee->id)) . '" class="btn btn-primary" title="View" data-toggle="tooltip">View<!-- <i class="fas fa-edit"> --></i></a>
                       '.'</td>
                       </tr>
                       ';
                       $i++;
                   }
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
      
          public function filterTraining(Request $request)
    {
        $output ="";
        $data = array();
        $column = $request->get('column'); 
        $status = $request->get('status'); 
        $text = explode("_",$column);
        $currentStatus = ucfirst($text[0])." ".ucfirst($status);
        $employee =  DB::table('employees')
        ->select('*')
        ->where($column,'=',$status)
        ->orderBy('employees.created_at','desc')
        ->get();
        $total_row =count($employee);
        if($total_row > 0)
               {
                $i=1;
                   foreach($employee as $employee)
                   {
                    if($employee->training_status=="Pending" || $employee->training_status=="Requested"){
                        $output .= '
                           <tr>
                           <th scope="row">'.$i.'</th>
                           <td>'.$employee->firstname." ".$employee->surname.'</td>
                           <td>'.$employee->contact_no.'</td>
                           <td>'.$employee->uk_contact_no.'</td>
                           <td>'.$employee->email.'</td>
                           <td>'.$currentStatus.'</td>
                           <td>'."NIL".'</td>
                           </tr>
                           ';
                           $i++;
                    }else{
                       $output .= '
                       <tr>
                       <th scope="row">'.$i.'</th>
                       <td>'.$employee->firstname." ".$employee->surname.'</td>
                       <td>'.$employee->contact_no.'</td>
                       <td>'.$employee->uk_contact_no.'</td>
                       <td>'.$employee->email.'</td>
                       <td>'.$currentStatus.'</td>
                       <td>'.'
                       <a href="' . route('view.training', encrypt($employee->id)) . '" class="btn btn-primary" title="View" data-toggle="tooltip">View<!-- <i class="fas fa-edit"> --></i></a>
                       '.'</td>
                       </tr>
                       ';
                       $i++;
                   }
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
          public function filterReference(Request $request)
    {
        $output ="";
        $data = array();
        $column = $request->get('column'); 
        $status = $request->get('status'); 
        $text = explode("_",$column);
        $currentStatus = ucfirst($text[0])." ".ucfirst($status);
        $employee =  DB::table('employees')
        ->select('*')
        ->where($column,'=',$status)
        ->orderBy('employees.created_at','desc')
        ->get();
        $total_row =count($employee);
        if($total_row > 0)
               {
                $i=1;
                   foreach($employee as $employee)
                   {
                        if($employee->reference_status=="Pending"){
                            $output .= '
                            <tr>
                            <th scope="row">'.$i.'</th>
                            <td>'.$employee->firstname." ".$employee->surname.'</td>
                            <td>'.$employee->contact_no.'</td>
                            <td>'.$employee->uk_contact_no.'</td>
                            <td>'.$employee->email.'</td>
                            <td>'.$currentStatus.'</td>
                            <td>'."NIL".'</td>
                            </tr>
                            ';
                            $i++;
                        }else{
                       $output .= '
                       <tr>
                       <th scope="row">'.$i.'</th>
                       <td>'.$employee->firstname." ".$employee->surname.'</td>
                       <td>'.$employee->contact_no.'</td>
                       <td>'.$employee->uk_contact_no.'</td>
                       <td>'.$employee->email.'</td>
                       <td>'.$currentStatus.'</td>
                       <td>'.'
                       <a href="' . route('view.reference', encrypt($employee->id)) . '" class="btn btn-primary" title="View" data-toggle="tooltip">View<!-- <i class="fas fa-edit"> --></i></a>
                       '.'</td>
                       </tr>
                       ';
                       $i++;
                   }
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
      
          public function filterDBS(Request $request)
    {
        $output ="";
        $data = array();
        $column = $request->get('column'); 
        $status = $request->get('status'); 
        $text = explode("_",$column);
        $currentStatus = ucfirst($text[0])." ".ucfirst($status);
        $employee =  DB::table('employees')
        ->select('*')
        ->where($column,'=',$status)
        ->orderBy('employees.created_at','desc')
        ->get();
        $total_row =count($employee);
        if($total_row > 0)
               {
                $i=1;
                   foreach($employee as $employee)
                   {
                    if($employee->dbs_status=="Pending"){
                        $output .= '
                        <tr>
                        <th scope="row">'.$i.'</th>
                        <td>'.$employee->firstname." ".$employee->surname.'</td>
                        <td>'.$employee->contact_no.'</td>
                        <td>'.$employee->uk_contact_no.'</td>
                        <td>'.$employee->email.'</td>
                        <td>'.$currentStatus.'</td>
                        <td>'."NIL".'</td>
                        </tr>
                        ';
                        $i++;
                    }else{
                       $output .= '
                       <tr>
                       <th scope="row">'.$i.'</th>
                       <td>'.$employee->firstname." ".$employee->surname.'</td>
                       <td>'.$employee->contact_no.'</td>
                       <td>'.$employee->uk_contact_no.'</td>
                       <td>'.$employee->email.'</td>
                       <td>'.$currentStatus.'</td>
                       <td>'.'
                       <a href="' . route('view.dbs', encrypt($employee->id)) . '" class="btn btn-primary" title="View" data-toggle="tooltip">View<!-- <i class="fas fa-edit"> --></i></a>
                       '.'</td>
                       </tr>
                       ';
                       $i++;
                   }
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

      public function filterHealth(Request $request)
    {
        $output ="";
        $data = array();
        $column = $request->get('column'); 
        $status = $request->get('status'); 
        $text = explode("_",$column);
        $currentStatus = ucfirst($text[0])." ".ucfirst($status);
        $employee =  DB::table('employees')
        ->select('*')
        ->where($column,'=',$status)
        ->orderBy('employees.created_at','desc')
        ->get();
        $total_row =count($employee);
        if($total_row > 0)
               {
                $i=1;
                   foreach($employee as $employee)
                   {
                    if($employee->health_status=="Pending"){
                        $output .= '
                        <tr>
                        <th scope="row">'.$i.'</th>
                        <td>'.$employee->firstname." ".$employee->surname.'</td>
                        <td>'.$employee->contact_no.'</td>
                        <td>'.$employee->uk_contact_no.'</td>
                        <td>'.$employee->email.'</td>
                        <td>'.$currentStatus.'</td>
                        <td>'."NIL".'</td>
                        </tr>
                        ';
                        $i++;
                    }else{
                       $output .= '
                       <tr>
                       <th scope="row">'.$i.'</th>
                       <td>'.$employee->firstname." ".$employee->surname.'</td>
                       <td>'.$employee->contact_no.'</td>
                       <td>'.$employee->uk_contact_no.'</td>
                       <td>'.$employee->email.'</td>
                       <td>'.$currentStatus.'</td>
                       <td>'.'
                       <a href="' . route('view.health', encrypt($employee->id)) . '" class="btn btn-primary" title="View" data-toggle="tooltip">View<!-- <i class="fas fa-edit"> --></i></a>
                       '.'</td>
                       </tr>
                       ';
                       $i++;
                   }
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

      public function filterBank(Request $request)
      {
          $output ="";
          $data = array();
          $column = $request->get('column'); 
          $status = $request->get('status'); 
          $text = explode("_",$column);
          $currentStatus = ucfirst($text[0])." ".ucfirst($status);
          $employee =  DB::table('employees')
          ->select('*')
          ->where($column,'=',$status)
          ->orderBy('employees.created_at','desc')
          ->get();
         
          $total_row =count($employee);
          if($total_row > 0)
                 {
                  $i=1;
                  foreach($employee as $employee)
                  {
                  if($employee->bank_status=="Pending"){
                      $output .= '
                         <tr>
                         <th scope="row">'.$i.'</th>
                         <td>'.$employee->firstname." ".$employee->surname.'</td>
                         <td>'.$employee->contact_no.'</td>
                         <td>'.$employee->uk_contact_no.'</td>
                         <td>'.$employee->email.'</td>
                         <td>'.$currentStatus.'</td>
                         <td>'."NIL".'</td>
                         </tr>
                         ';
                         $i++;
                  }else{
                     
                         $output .= '
                         <tr>
                         <th scope="row">'.$i.'</th>
                         <td>'.$employee->firstname." ".$employee->surname.'</td>
                         <td>'.$employee->contact_no.'</td>
                         <td>'.$employee->uk_contact_no.'</td>
                         <td>'.$employee->email.'</td>
                         <td>'.$currentStatus.'</td>
                         <td>'.'
                         <a href="' . route('view.bank', encrypt($employee->id)) . '" class="btn btn-primary" title="View" data-toggle="tooltip">View<!-- <i class="fas fa-edit"> --></i></a>
                         '.'</td>
                         </tr>
                         ';
                         $i++;
                     }
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
      
        public function filterStarter(Request $request)
        {
            $output ="";
            $data = array();
            $column = $request->get('column'); 
            $status = $request->get('status'); 
            $text = explode("_",$column);
            $currentStatus = ucfirst($text[0])." ".ucfirst($status);
            $employee =  DB::table('employees')
            ->select('*')
            ->where($column,'=',$status)
            ->orderBy('employees.created_at','desc')
            ->get();
            $total_row =count($employee);
            if($total_row > 0)
                   {
                    $i=1;
                       foreach($employee as $employee)
                       {
                        if($employee->starter_status=="Pending"){
                            $output .= '
                            <tr>
                            <th scope="row">'.$i.'</th>
                            <td>'.$employee->firstname." ".$employee->surname.'</td>
                            <td>'.$employee->contact_no.'</td>
                            <td>'.$employee->uk_contact_no.'</td>
                            <td>'.$employee->email.'</td>
                            <td>'.$currentStatus.'</td>
                            <td>'."NIL".'</td>
                            </tr>
                            ';
                            $i++;
                        }else{
                           $output .= '
                           <tr>
                           <th scope="row">'.$i.'</th>
                           <td>'.$employee->firstname." ".$employee->surname.'</td>
                           <td>'.$employee->contact_no.'</td>
                           <td>'.$employee->uk_contact_no.'</td>
                           <td>'.$employee->email.'</td>
                           <td>'.$currentStatus.'</td>
                           <td>'.'
                           <a href="' . route('view.starter', encrypt($employee->id)) . '" class="btn btn-primary" title="View" data-toggle="tooltip">View<!-- <i class="fas fa-edit"> --></i></a>
                           '.'</td>
                           </tr>
                           ';
                           $i++;
                       }
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
          public function searchStarter(Request $request)
          {
              $output ="";
              $employeeStarterForm=DB::table('employees')
             ->join('starters', 'employees.id', '=', 'starters.employee_id')
             ->where('employees.surname', 'like', '%'.$request->search.'%')
            ->orWhere('employees.firstname', 'like', '%'.$request->search.'%')
             ->orWhere('employees.contact_no', 'like', '%'.$request->search.'%')
             ->orWhere('employees.uk_contact_no', 'like', '%'.$request->search.'%')
            ->orWhere('employees.email', 'like', '%'.$request->search.'%')
             ->select('*')
             ->orderBy('employees.created_at','desc')
            ->get();
            $employeeStarterFile=DB::table('employees')
             ->join('starter_files', 'employees.id', '=', 'starter_files.employee_id')
             ->where('employees.surname', 'like', '%'.$request->search.'%')
            ->orWhere('employees.firstname', 'like', '%'.$request->search.'%')
             ->orWhere('employees.contact_no', 'like', '%'.$request->search.'%')
             ->orWhere('employees.uk_contact_no', 'like', '%'.$request->search.'%')
            ->orWhere('employees.email', 'like', '%'.$request->search.'%')
             ->select('*')
             ->orderBy('employees.created_at','desc')
            ->get();
            $employee = $employeeStarterFile->merge($employeeStarterForm);
            //$employee = $merged->all();
              $total_row = $employee->count();
              if($total_row > 0)
              {
                $i=1;
                  foreach($employee as $employee)
                  {
                      $output .= '
                      <tr>
                      <th scope="row">'.$i.'</th>
                      <td>'.$employee->firstname." ".$employee->surname.'</td>
                      <td>'.$employee->contact_no.'</td>
                      <td>'.$employee->uk_contact_no.'</td>
                      <td>'.$employee->email.'</td>
                      <td>'."Starter ".$employee->starter_status.'</td>
                      <td>'.'
                      <a href="' . route('view.starter', encrypt($employee->employee_id)) . '"class="btn btn-primary" title="View" data-toggle="tooltip">View<!-- <i class="fas fa-edit"> --></i></a>
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

           public function filterContract(Request $request)
           {
               $output ="";
               $data = array();
               $column = $request->get('column'); 
               $currentStatus = ucfirst($request->get('status')); 
               $employee =  DB::table('employees')
               ->select('*')
               ->where($column,'=',$currentStatus)
               ->orderBy('employees.created_at','desc')
               ->get();
               $total_row =count($employee);
               if($total_row > 0)
                      {
                       $i=1;
                          foreach($employee as $employee)
                          {
                           if($employee->employee_contract=="Pending"){
                               $output .= '
                               <tr>
                               <th scope="row">'.$i.'</th>
                               <td>'.$employee->firstname." ".$employee->surname.'</td>
                               <td>'.$employee->contact_no.'</td>
                               <td>'.$employee->uk_contact_no.'</td>
                               <td>'.$employee->email.'</td>
                               <td>'."Contract ".$currentStatus.'</td>
                               <td>'."NIL".'</td>
                               </tr>
                               ';
                               $i++;
                           }else{
                              $output .= '
                              <tr>
                              <th scope="row">'.$i.'</th>
                              <td>'.$employee->firstname." ".$employee->surname.'</td>
                              <td>'.$employee->contact_no.'</td>
                              <td>'.$employee->uk_contact_no.'</td>
                              <td>'.$employee->email.'</td>
                              <td>'."Contract ".$currentStatus.'</td>
                              <td>'.'
                              <a href="' . route('view.contract', encrypt($employee->id)) . '" class="btn btn-primary" title="View" data-toggle="tooltip">View<!-- <i class="fas fa-edit"> --></i></a>
                              '.'</td>
                              </tr>
                              ';
                              $i++;
                          }
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
             public function searchContract(Request $request)
          {
              $output ="";
            $employee=DB::table('employees')
            ->join('user_contracts', 'employees.id', '=', 'user_contracts.employee_id')
            ->where('employees.surname', 'like', '%'.$request->search.'%')
           ->orWhere('employees.firstname', 'like', '%'.$request->search.'%')
            ->orWhere('employees.contact_no', 'like', '%'.$request->search.'%')
            ->orWhere('employees.uk_contact_no', 'like', '%'.$request->search.'%')
           ->orWhere('employees.email', 'like', '%'.$request->search.'%')
            ->select('*')
            ->orderBy('employees.created_at','desc')
           ->get();
            //$employee = $merged->all();
              $total_row = $employee->count();
              if($total_row > 0)
              {
                $i=1;
                  foreach($employee as $employee)
                  {
                      $output .= '
                      <tr>
                      <th scope="row">'.$i.'</th>
                      <td>'.$employee->firstname." ".$employee->surname.'</td>
                      <td>'.$employee->contact_no.'</td>
                      <td>'.$employee->uk_contact_no.'</td>
                      <td>'.$employee->email.'</td>
                      <td>'."Contract ".$employee->employee_contract.'</td>
                      <td>'.'
                      <a href="' . route('view.contract', encrypt($employee->employee_id)) . '"class="btn btn-primary" title="View" data-toggle="tooltip">View<!-- <i class="fas fa-edit"> --></i></a>
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
           public function filterChecklist(Request $request)
           {
               $output ="";
               $data = array();
               $column = $request->get('column'); 
               $status = $request->get('status'); 
               $text = explode("_",$column);
               //$currentStatus = ucfirst($text[0])." ".ucfirst($status);
               $currentStatus = "Checklist"." ".ucfirst($status);
               /* $employee =  DB::table('employees')
               ->select('*')
               ->where($column,'=',$status)
               ->orderBy('employees.created_at','desc')
               ->get(); */
               $employee = DB::table('induction_users')
               ->join('employees', 'employees.id', '=', 'induction_users.user_id')
               ->select('*')
               ->where('employees.induction_checklist','=',$status)
               ->where('induction_users.status','=','Attended')
               ->orderBy('employees.created_at','desc')
               ->get();
               $total_row =count($employee);
               if($total_row > 0)
                      {
                       $i=1;
                          foreach($employee as $employee)
                          {
                           if($employee->induction_checklist=="Pending"){
                               $output .= '
                               <tr>
                               <th scope="row">'.$i.'</th>
                               <td>'.$employee->firstname." ".$employee->surname.'</td>
                               <td>'.$employee->contact_no.'</td>
                               <td>'.$employee->uk_contact_no.'</td>
                               <td>'.$employee->email.'</td>
                               <td>'.$currentStatus.'</td>
                               <td>'."NIL".'</td>
                               </tr>
                               ';
                               $i++;
                           }else{
                              $output .= '
                              <tr>
                              <th scope="row">'.$i.'</th>
                              <td>'.$employee->firstname." ".$employee->surname.'</td>
                              <td>'.$employee->contact_no.'</td>
                              <td>'.$employee->uk_contact_no.'</td>
                              <td>'.$employee->email.'</td>
                              <td>'.$currentStatus.'</td>
                              <td>'.'
                              <a href="' . route('view.checklist', encrypt($employee->id)) . '" class="btn btn-primary" title="View" data-toggle="tooltip">View<!-- <i class="fas fa-edit"> --></i></a>
                              '.'</td>
                              </tr>
                              ';
                              $i++;
                          }
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
             public function searchChecklist(Request $request)
             {
                 $output ="";
               $employee=DB::table('employees')
               ->join('induction_checklists', 'employees.id', '=', 'induction_checklists.employee_id')
               ->where('employees.surname', 'like', '%'.$request->search.'%')
              ->orWhere('employees.firstname', 'like', '%'.$request->search.'%')
               ->orWhere('employees.contact_no', 'like', '%'.$request->search.'%')
               ->orWhere('employees.uk_contact_no', 'like', '%'.$request->search.'%')
              ->orWhere('employees.email', 'like', '%'.$request->search.'%')
               ->select('*')
               ->orderBy('induction_checklists.created_at','desc')
              ->get();
               //$employee = $merged->all();
                 $total_row = $employee->count();
                 if($total_row > 0)
                 {
                   $i=1;
                     foreach($employee as $employee)
                     {
                         $output .= '
                         <tr>
                         <th scope="row">'.$i.'</th>
                         <td>'.$employee->firstname." ".$employee->surname.'</td>
                         <td>'.$employee->contact_no.'</td>
                         <td>'.$employee->uk_contact_no.'</td>
                         <td>'.$employee->email.'</td>
                         <td>'."Contract ".$employee->employee_contract.'</td>
                         <td>'.'
                         <a href="' . route('view.checklist', encrypt($employee->employee_id)) . '"class="btn btn-primary" title="View" data-toggle="tooltip">View<!-- <i class="fas fa-edit"> --></i></a>
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
              public function searchStaffList(Request $request)
              {
                  $output ="";
                $employee=DB::table('workers')
                ->where('workers.name', 'like', '%'.$request->search.'%')
               ->orWhere('workers.contact_tel', 'like', '%'.$request->search.'%')
                ->orWhere('workers.mobile_no', 'like', '%'.$request->search.'%')
               ->orWhere('workers.email', 'like', '%'.$request->search.'%')
                ->select('*')
                ->orderBy('workers.created_at','desc')
               ->get();
                //$employee = $merged->all();
                  $total_row = $employee->count();
                  if($total_row > 0)
                  {
                    $i=1;
                      foreach($employee as $employee)
                      {
                          $output .= '
                          <tr>
                          <th scope="row">'.$i.'</th>
                          <td>'.$employee->name.'</td>
                          <td>'.$employee->contact_tel.'</td>
                          <td>'.$employee->mobile_no.'</td>
                          <td>'.$employee->email.'</td>
                          <td>'.$employee->staff_status." Staff".'</td>
                          <td>'.'
                          <a href="' . route('edit.staff', encrypt($employee->id)) . '"class="btn btn-primary" title="Edit" data-toggle="tooltip">Edit<!-- <i class="fas fa-edit"> --></i></a>
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
               public function filterStaffList(Request $request)
           {
               $output ="";
               $data = array();
               $column = $request->get('column'); 
               $status = $request->get('status'); 
               $employee = DB::table('workers')
               ->select('*')
               ->where('workers.staff_status','=',$status)
               ->orderBy('workers.created_at','desc')
               ->get();
               $total_row =count($employee);
               if($total_row > 0)
                      {
                       $i=1;
                          foreach($employee as $employee)
                          {
                              $output .= '
                              <tr>
                              <th scope="row">'.$i.'</th>
                              <td>'.$employee->name.'</td>
                              <td>'.$employee->contact_tel.'</td>
                              <td>'.$employee->mobile_no.'</td>
                              <td>'.$employee->email.'</td>
                              <td>'.$employee->staff_status." Staff".'</td>
                              <td>'.'
                              <a href="' . route('edit.staff', encrypt($employee->id)) . '" class="btn btn-primary" title="Edit" data-toggle="tooltip">Edit<!-- <i class="fas fa-edit"> --></i></a>
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
public function searchFinalCheck(Request $request)
          {
            $output ="";
            $employee=DB::table('employees')
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
            ->where('employees.surname', 'like', '%'.$request->search.'%')
           ->orWhere('employees.firstname', 'like', '%'.$request->search.'%')
            ->orWhere('employees.contact_no', 'like', '%'.$request->search.'%')
            ->orWhere('employees.uk_contact_no', 'like', '%'.$request->search.'%')
           ->orWhere('employees.email', 'like', '%'.$request->search.'%')
            ->select('*')
            ->orderBy('employees.created_at','desc')
           ->get();
            //$employee = $merged->all();
              $total_row = $employee->count();
              if($total_row > 0)
              {
                $i=1;
                  foreach($employee as $employee)
                  {
                      $output .= '
                      <tr>
                      <th scope="row">'.$i.'</th>
                      <td>'.$employee->firstname." ".$employee->surname.'</td>
                      <td>'.$employee->contact_no.'</td>
                      <td>'.$employee->uk_contact_no.'</td>
                      <td>'.$employee->email.'</td>
                      <td>'."Final Check ".$employee->final_check.'</td>
                      <td>'.'
                      <a href="' . route('view.finalCheck', encrypt($employee->user_id)) . '"class="btn btn-primary" title="View" data-toggle="tooltip">View<!-- <i class="fas fa-edit"> --></i></a>
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
}
