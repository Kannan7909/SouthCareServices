<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//Following by requirement
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class UserController extends Controller
{
    public function index(){
        return view('userlogin');
    }
    public function login(Request $request)
    {
        $input=['email'=>request('email'),'password'=>request('password')];
        if(auth()->attempt($input))
        {
             $userId = Auth::id();
            //return $userId; 
             $result= DB::table('users')
            ->select('name')    
            ->where('id','=',$userId)->get();
            $result = $result[0] -> name; 
            return view('userprivilege',compact('result')); 
        }else{
            return "Login Failed";
        }
    }
    public function savePrivileges(Request $request)
    {
        if(!empty($request->input('privilege')))
        {
            $userId = Auth::id();
            $checkbox = join(',',$request->input('privilege'));
            $data = [
                ['user_id'=>$userId, 'module_id'=> $checkbox]
            ];
            DB::table('privileges')->insert($data);
        }else{
            $checkbox='';
        }
        dd($checkbox);
    } 
    public function userDetails(){
       // $users = DB::table('users')->get();
        $users = User::all();
        return view('userDetails',compact('users'));
    }
     public function editUser($uId){
         //return $uId;
        $user = User::find(decrypt($uId));
        return view('editUser',compact('user')); 
     } 
     public function updateUser(){
       // return request()->all();
        $uId = decrypt(request('user_id'));
        $user = User::find($uId);
        $user->update([
            'name' => request('name'),
            'email' => request('email')
       ]);
       return redirect()->route('user.details')
            ->with('message','User Updated Successfuly !!');
    } 
    public function deleteUser($uId){
         $user = User::find(decrypt($uId));
         $user->delete();
        return redirect()->route('user.details')
             ->with('message','User Deleted Successfuly !!');
     } 
     public function createUser(){
       return view('userRegister');
    } 
}
