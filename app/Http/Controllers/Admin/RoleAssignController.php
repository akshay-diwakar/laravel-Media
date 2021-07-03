<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Models\User;
use App\Models\role;
use App\Models\RoleUser;

class RoleAssignController extends Controller
{
     public function add($user_id,Request $request,User $user)
     {
         dd($user);

        //  here by using this we can get id which is present in url
        $User_id = $request->route('user_id');
        $Role = role::get();
        
         return view('AssignRole.add',compact('User_id','Role','user'));
     }

     public function store($user_id,Request $request)
    {
        $data = $request->all();
        // here we are getting 
        $Role_id = $request->input('role');
        // dd($Role_id);
        // dd($data);the id of role which is getting inserted and assigning a variable to you.
        $User_id = $request->route('user_id');
        // dd($User_id);
        // dd($Role_id);
        // dd($data);
        $rules = array(
            'role' => 'required',
        );
        
        $validate = Validator::make($data,$rules);  
        if ($validate->fails()) {
            return redirect()->back()->withInput()->withErrors($validate);
        }
        else{
       
            $form_data = array(
                'user_id' => $User_id,
                'role_id' => $Role_id,
            );

            $RoleUser = RoleUser::create($form_data);
            
            return redirect('/Admin/users')->with('success');
        }       
    }

}
