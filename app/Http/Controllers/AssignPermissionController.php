<?php

namespace App\Http\Controllers;
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
        // dd($data);
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
           
           foreach($request->RolePermission as $key=>$RolePermissions ){
            $form_data = array(
                'role_id' => $data['Roles'],
                'Item' => $data['Items'],
                'permission'  => $data['Permissions'],
            );
           }
           
        //     }
        //    dd($form_data);
           $RolePermission = RolePermission::create($form_data);
           $Message = "successfully added";
           return redirect('/Admin/users')->with('success',$Message);
        }   
    }

}
