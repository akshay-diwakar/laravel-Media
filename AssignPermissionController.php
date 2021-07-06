<?php

namespace App\Http\Controllers;
use DB;
use Validator;
use Illuminate\Http\Request;
use App\Models\role;
use App\Models\RolePermission;

class AssignPermissionController extends Controller
{
    public function index(Request $request)
    {
        $roles = role::get();
        return view('AssignPermission.index',compact('roles'));
    }

    public function add(Request $request)
    {
        $roles = role::get();
        return view('AssignPermission.add',compact('roles'));
    }

    public function store(Request $request)
    {
        
        $data = $request->all();
        // dd($request);
        // $Items_array = serialize($request['Items[]']);
        // dd($data);   
        // dd($Items_array);
        $rules = array(
           'Roles' => 'required' ,
           'Items.*' =>'required',
        );

        $validate=Validator::make($data,$rules);
        
        if ($validate->fails()) {
            return redirect()->back()->withInput()->withErrors($validate);
        }
        else{
            // dd($request->all(['Permissions']));
            $data = $request->all();


                // User ChackBox

            if(in_array('PostAdd', $request->get('Permissions'))){
                $PostAdd = new RolePermission;
                $PostAdd->Item = 'PostAdd';
                $PostAdd->Role_id = $request->Roles;
                $PostAdd->Permissions = 1;
                $PostAdd->save();
            }
            if(in_array('PostView', $request->get('Permissions'))){
                $PostView = new RolePermission;
                $PostView->Item = 'PostView';
                $PostView->Role_id = $request->Roles;
                $PostView->Permissions = 1;
                $PostView->save();
            }
            if(in_array('PostEdit', $request->get('Permissions'))){
                $dataEdit = new RolePermission;
                $dataEdit->Item = 'PostEdit';
                $dataEdit->Role_id = $request->Roles;
                $dataEdit->Permissions = 1;
                $dataEdit->save();
            }

                // Comment chackBox
            if(in_array('CommentAdd', $request->get('Permissions'))){
                $PostAdd = new RolePermission;
                $PostAdd->Item = 'CommentAdd';
                $PostAdd->Role_id = $request->Roles;
                $PostAdd->Permissions = 1;
                $PostAdd->save();
            }
            if(in_array('CommentView', $request->get('Permissions'))){
                $PostView = new RolePermission;
                $PostView->Item = 'CommentView';
                $PostView->Role_id = $request->Roles;
                $PostView->Permissions = 1;
                $PostView->save();
            }
            if(in_array('CommentEdit', $request->get('Permissions'))){
                $dataEdit = new RolePermission;
                $dataEdit->Item = 'CommmentEdit';
                $dataEdit->Role_id = $request->Roles;
                $dataEdit->Permissions = 1;
                $dataEdit->save();
            }


            // User ChackBox
            if(in_array('UserAdd', $request->get('Permissions'))){
                $PostAdd = new RolePermission;
                $PostAdd->Item = 'UserAdd';
                $PostAdd->Role_id = $request->Roles;
                $PostAdd->Permissions = 1;
                $PostAdd->save();
            }
            if(in_array('UserView', $request->get('Permissions'))){
                $PostView = new RolePermission;
                $PostView->Item = 'UserView';
                $PostView->Role_id = $request->Roles;
                $PostView->Permissions = 1;
                $PostView->save();
            }
            if(in_array('UserEdit', $request->get('Permissions'))){
                $dataEdit = new RolePermission;
                $dataEdit->Item = 'UserEdit';
                $dataEdit->Role_id = $request->Roles;
                $dataEdit->Permissions = 1;
                $dataEdit->save();
            }
            // if(){
            //     return 'redit';
            // }else{
            //     return "not edit";
            // }
         
           
            // dd($dataItem);
            $Message = "successfully added";
               return redirect('/Admin/users')->with('success',$Message);

        }
    }

}