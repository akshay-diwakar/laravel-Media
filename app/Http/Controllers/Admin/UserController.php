<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\role;
use App\Models\RoleUser;
use Validator;
use DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(Request $request)
    { 
        // https://www.itsolutionstuff.com/post/laravel-eager-loading-with-selected-columns-exampleexample.html
       $User = User::with('roles:name')->get();
        // dd($User);
       $Role = role::get();
       return view('Admin.User.index',compact('User'));  
    }

    public function add(Request $request)
    {
      return view('Admin.User.add');
    }

    public function store(Request $request)
    {
         
        $data = $request->all();
        $rules = array(
            'name' => 'required',    
            'email' => 'required',
            'password' => 'required',
            'password_confirmation' => 'required',
        );
        $validate = Validator::make($data,$rules);  
        if ($validate->fails()) {
            return redirect()->back()->withInput()->withErrors($validate);
        }
        else{
       
            $form_data = array(
                'name' => $data['name'], 
                'email' =>$data['email'],
                'password' => Hash::make($data['password']),
            );

            $User = User::create($form_data);
            // $Message = "successfully added";
            return redirect('/Admin/users')->with('success');
        }       
    }

    public function edit(Request $request)
    {
        $User = User::find($request->id);
        return view('Admin.User.edit',compact('User'));
    }

    public function update(Request $request)
    {
        $data = $request->all();
        
        $User = User::find($data['User_id']);
        $rules = array(
            'name' => 'required',    
            'email' => 'required',
            'password' => 'required',
            'password_confirmation' => 'required',
        );

        $validate=Validator::make($data,$rules);
         
        if ($validate->fails()) {
             return redirect()->back()->withInput()->withErrors($validate);
        }
        else{
            $form_data = array(
             'name' => @$data['name'] ? $data['name'] : $User->name,
             'email' => @$data['email'] ? $data['email'] : $User->email, 
             'password' => @$data['password'] ? $data['password'] : $User->password, 
            );

             $User->update($form_data);
            //  $Message = "update successfully";
             return redirect('/Admin/users')->with('success');
        }
    }

    public function destroy($id)
    {
        $User = User::findOrFail($id);
        $User->delete();
        return redirect()->back()->with('success','User deleted successfully');
    }

}
