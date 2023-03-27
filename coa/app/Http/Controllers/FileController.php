<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\File;
use Illuminate\Support\Facades\Validator;
use App\Models\Employee;
use Illuminate\Support\Facades\DB;
use Session;
use Redirect;


class FileController extends Controller
{
    public function passportUpload(Request $request){
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
             $filename = "Passport".'_'.time().'_'.$file->getClientOriginalName();

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
             $saveFile->file_name = "Passport".'_'.$file->getClientOriginalName();
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

   public function brpUpload(Request $request){
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
         $filename = "brp".'_'.time().'_'.$file->getClientOriginalName();

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
         $saveFile->file_name = "brp".'_'.$file->getClientOriginalName();
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

public function dbsUpload(Request $request){
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
         $filename = "dbs".'_'.time().'_'.$file->getClientOriginalName();

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
         $saveFile->file_name = "dbs".'_'.$file->getClientOriginalName();
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

public function trainingUpload(Request $request){
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
         $filename = "training".'_'.time().'_'.$file->getClientOriginalName();

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
         $saveFile->file_name = "training".'_'.$file->getClientOriginalName();
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

public function rightUpload(Request $request){
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
         $filename = "right".'_'.time().'_'.$file->getClientOriginalName();

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
         $saveFile->file_name = "right".'_'.$file->getClientOriginalName();
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

public function documentsDetails(){
    /*  $employees = DB::table('employees')
     ->select('*')
     ->join('files','employees.id','=','files.employee_id')
     ->get(); 
      $fileUser = File::all();*/
     $employees = DB::table(DB::raw('(SELECT distinct employee_id from files) AS F'))
     ->join('employees','F.employee_id','=','employees.id')
     ->get();
     return view('documentsDetails',compact('employees'));    
 }
 public function editDocuments($employeeId){
     //$employee = File::find(decrypt($employeeId));
     $employee = DB::table('files')
     ->where('employee_id','=',decrypt($employeeId))
     ->get();
     //return $employee;
     return view('editDocument',compact('employee')); 
 }
 public function fileView(){
    return "ttt";  
}

}
