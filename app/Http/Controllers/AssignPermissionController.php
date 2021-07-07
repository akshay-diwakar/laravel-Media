<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use Validator;
use App\Models\role;
use App\Models\RolePermission;

class AssignPermissionController extends Controller
{
    public function index(Request $request)
    {
        $Role = role::get();
        $RolePermission  = RolePermission::get();
        return view('AssignPermission.index',compact('RolePermission','Role'));
    }

    public function add(Request $request)
    {
        $Role = role::get();
        return view('AssignPermission.add',compact('Role'));
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $rules = array(
           'Roles' => 'required',
        );

        $validate=Validator::make($data,$rules);
        if ($validate->fails()) {
            return redirect()->back()->withInput()->withErrors($validate);
        }
        else{
           
            $data = $request->all();
            
            // Post CheckBox
            if(in_array('PostAdd', $request->get('Permissions'))){
                $PostAdd = new RolePermission;
                $PostAdd->role_id = $request->Roles;
                $PostAdd->Item = 'Post';
                $PostAdd->Permission = 'Add';
                $PostAdd->save();
            }
            if(in_array('PostView', $request->get('Permissions'))){
                $PostView = new RolePermission;
                $PostView->role_id = $request->Roles;
                $PostView->Item = 'Post';
                $PostView->Permission = 'View';
                $PostView->save();
            }
            
            if(in_array('PostEdit', $request->get('Permissions'))){
                $PostEdit = new RolePermission;
                $PostEdit->role_id = $request->Roles;
                $PostEdit->Item = 'Post';
                $PostEdit->Permission = 'Edit';
                $PostEdit->save();
            }

            if(in_array('PostDelete', $request->get('Permissions'))){
                $PostDelete = new RolePermission;
                $PostDelete->role_id = $request->Roles;
                $PostDelete->Item = 'Post';
                $PostDelete->Permission = 'Delete';
                $PostDelete->save();
            }

            // Comment checkBox
            if(in_array('CommentAdd', $request->get('Permissions'))){
                $CommentAdd = new RolePermission;
                $CommentAdd->role_id = $request->Roles;
                $CommentAdd->Item = 'Comment';
                $CommentAdd->Permission = 'Add';
                $CommentAdd->save();
            }
            if(in_array('CommentView', $request->get('Permissions'))){
                $CommentView = new RolePermission;
                $CommentView->role_id = $request->Roles;
                $CommentView->Item = 'Comment';
                $CommentView->Permission = 'View';
                $CommentView->save();
            }
            if(in_array('CommentEdit', $request->get('Permissions'))){
                $CommentEdit = new RolePermission;
                $CommentEdit->role_id = $request->Roles;
                $CommentEdit->Item = 'Commment';
                $CommentEdit->Permission = 'Edit';
                $CommentEdit->save();
            }
            if(in_array('CommentDelete', $request->get('Permissions'))){
                $CommentDelete = new RolePermission;
                $CommentDelete->role_id = $request->Roles;
                $CommentDelete->Item = 'Comment';
                $CommentDelete->Permission = 'Delete';
                $CommentDelete->save();
            }


            // User CheckBox
            if(in_array('UserAdd', $request->get('Permissions'))){
                $UserAdd = new RolePermission;
                $UserAdd->role_id = $request->Roles;
                $UserAdd->Item = 'User';
                $UserAdd->Permission = 'Add';
                $UserAdd->save();
            }
            if(in_array('UserView', $request->get('Permissions'))){
                $UserView = new RolePermission;
                $UserView->role_id = $request->Roles;
                $UserView->Item = 'User';
                $UserView->Permission = 'View';
                $UserView->save();
            }
            if(in_array('UserEdit', $request->get('Permissions'))){
                $UserEdit = new RolePermission;
                $UserEdit->role_id = $request->Roles;
                $UserEdit->Item = 'User';
                $UserEdit->Permission = 'Edit';
                $UserEdit->save();
            }
            if(in_array('UserDelete', $request->get('Permissions'))){
                $UserDelete = new RolePermission;
                $UserDelete->role_id = $request->Roles;
                $UserDelete->Item = 'User';
                $UserDelete->Permission = 'Delete';
                $UserDelete->save();
            }
                    
                $Message = "successfully added";
                return redirect('/Admin/AssignPermission')->with('success',$Message);
            }   
        }    

         // $role_data = RolePermission::where(['role_id' => $role_id])->get();
        //    / dd($role_data->toArray());
           
        public function edit($role_id,Request $request)
        {
            $Role_id = $request->route('role_id');
            
            $role_data = RolePermission::where(['role_id' => $role_id])->get()->map(function ($role){
                return $role->Item.$role->Permission;
            })->toArray();
            
            return view('AssignPermission.edit',compact('role_data','Role_id'));
        }

        public function update(Request $request)
        {
            $data = $request->all();
            // dd($data);
            // $RolePermission = RolePermission::find($data['Role_id']);
            // dd($RolePermission);
    
            // $validate=Validator::make($data)
                // $data = $request->all();
            
            // Post CheckBox
            if(in_array('PostAdd', $request->get('Permissions'))){
                $PostAdd = new RolePermission;
                $PostAdd->role_id = $request->Role_id;
                $PostAdd->Item = 'Post';
                $PostAdd->Permission = 'Add';
                $PostAdd->save();
            }
            if(in_array('PostView', $request->get('Permissions'))){
                $PostView = new RolePermission;
                $PostView->role_id = $request->Role_id;
                $PostView->Item = 'Post';
                $PostView->Permission = 'View';
                $PostView->save();
            }
            
            if(in_array('PostEdit', $request->get('Permissions'))){
                $PostEdit = new RolePermission;
                $PostEdit->role_id = $request->Role_id;
                $PostEdit->Item = 'Post';
                $PostEdit->Permission = 'Edit';
                $PostEdit->save();
            }

            if(in_array('PostDelete', $request->get('Permissions'))){
                $PostDelete = new RolePermission;
                $PostDelete->role_id = $request->Role_id;
                $PostDelete->Item = 'Post';
                $PostDelete->Permission = 'Delete';
                $PostDelete->save();
            }

            // Comment checkBox
            if(in_array('CommentAdd', $request->get('Permissions'))){
                $CommentAdd = new RolePermission;
                $CommentAdd->role_id = $request->Role_id;
                $CommentAdd->Item = 'Comment';
                $CommentAdd->Permission = 'Add';
                $CommentAdd->save();
            }
            if(in_array('CommentView', $request->get('Permissions'))){
                $CommentView = new RolePermission;
                $CommentView->role_id = $request->Role_id;
                $CommentView->Item = 'Comment';
                $CommentView->Permission = 'View';
                $CommentView->save();
            }
            if(in_array('CommentEdit', $request->get('Permissions'))){
                $CommentEdit = new RolePermission;
                $CommentEdit->role_id = $request->Role_id;
                $CommentEdit->Item = 'Commment';
                $CommentEdit->Permission = 'Edit';
                $CommentEdit->save();
            }
            if(in_array('CommentDelete', $request->get('Permissions'))){
                $CommentDelete = new RolePermission;
                $CommentDelete->role_id = $request->Role_id;
                $CommentDelete->Item = 'Comment';
                $CommentDelete->Permission = 'Delete';
                $CommentDelete->save();
            }


            // User CheckBox
            if(in_array('UserAdd', $request->get('Permissions'))){
                $UserAdd = new RolePermission;
                $UserAdd->role_id = $request->Role_id;
                $UserAdd->Item = 'User';
                $UserAdd->Permission = 'Add';
                $UserAdd->save();
            }
            if(in_array('UserView', $request->get('Permissions'))){
                $UserView = new RolePermission;
                $UserView->role_id = $request->Role_id;
                $UserView->Item = 'User';
                $UserView->Permission = 'View';
                $UserView->save();
            }
            if(in_array('UserEdit', $request->get('Permissions'))){
                $UserEdit = new RolePermission;
                $UserEdit->role_id = $request->Role_id;
                $UserEdit->Item = 'User';
                $UserEdit->Permission = 'Edit';
                $UserEdit->save();
            }
            if(in_array('UserDelete', $request->get('Permissions'))){
                $UserDelete = new RolePermission;
                $UserDelete->role_id = $request->Role_id;
                $UserDelete->Item = 'User';
                $UserDelete->Permission = 'Delete';
                $UserDelete->save();
            }
                    
                $Message = "successfully added";
                return redirect('/Admin/AssignPermission')->with('success',$Message);
            
     }   
        
        
        public function destroy($id)
        {
            $RolePermission = RolePermission::findOrFail($id);
            $RolePermission->delete();
            return redirect()->back()->with('success','deleted successfully');
        }   
}