<?php

namespace App\Http\Controllers;

use Input;
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

    // public function store(Request $request)
    // {
    //     $data = $request->all();
        
    //     $rules = array(
    //        'Roles' => 'required',
    //     );
    //     $validate=Validator::make($data,$rules);
    //     if ($validate->fails()) {
    //         return redirect()->back()->withInput()->withErrors($validate);
    //     }
    //     else{
        

    //             $data_Post = $request->input('Permission_Post');
    //             if (is_array($request->get('Permission_Post'))) {
    //                 foreach($data_Post as $s){
    //                     RolePermission::create([
    //                     'role_id' => $request->Roles,
    //                     'Item' => $request->Post,
    //                     'Permission' => $s
    //                     ]);
    //                 }
    //             }
    //             $data_Comment = $request->input('Permission_Comment');
    //             if (is_array($request->get('Permission_Comment'))) {
    //                 foreach($data_Comment as $s){
    //                     RolePermission::create([
    //                     'role_id' => $request->Roles,
    //                     'Item' => $request->Comment,
    //                     'Permission' => $s
    //                     ]);
    //                 }
    //             }
    //             $data_User = $request->input('Permission_User');
    //             if (is_array($request->get('Permission_User'))) {
    //                 foreach($data_User as $s){
    //                     RolePermission::create([
    //                     'role_id' => $request->Roles,
    //                     'Item' => $request->User,
    //                     'Permission' => $s
    //                     ]);
    //                 }
    //             }

                    

    //             return redirect('/Admin/AssignPermission')->with('success');

    //         }
  

    //     }

           
        // public function edit($role_id,Request $request)
        // {
        //     $Role_id = $request->route('role_id');
            
        //     $role_data = RolePermission::where(['role_id' => $role_id])->get()->map(function ($role){
        //         return $role->Item.$role->Permission;
        //     })->toArray();
        //     // dd($role_data);
            
        //     return view('AssignPermission.edit',compact('role_data','Role_id'));
        // }
     
    //  public function update(Request $request){
        //  $data = $request->all();
        //  dd($data);
        // $delete_id = RolePermission::Where(['role_id' => $request->Role_id])->Delete();
        
        // $data_Post = $request->input('Permission_Post');
        //         if (is_array($request->get('Permission_Post'))) {
        //             foreach($data_Post as $s){
        //                 RolePermission::create([
        //                 'role_id' => $request->Role_id,
        //                 'Item' => $request->Post,
        //                 'Permission' => $s
        //                 ]);
        //             }
        //         }


        //         $data_Comment = $request->input('Permission_Comment');
        //         if (is_array($request->get('Permission_Comment'))) {
        //             foreach($data_Comment as $s){
        //                 RolePermission::create([
        //                 'role_id' => $request->Role_id,
        //                 'Item' => $request->Comment,
        //                 'Permission' => $s
        //                 ]);
        //             }
        //         }
        //         $data_User = $request->input('Permission_User');
        //         if (is_array($request->get('Permission_User'))) {
        //             foreach($data_User as $s){
        //                 RolePermission::create([
        //                 'role_id' => $request->Role_id,
        //                 'Item' => $request->User,
        //                 'Permission' => $s
        //                 ]);
        //             }
        //         } 

    //       return redirect('/Admin/AssignPermission');
    //   }
        
        public function destroy($id)
        {
            $RolePermission = RolePermission::findOrFail($id);
            $RolePermission->delete();
            return redirect()->back()->with('success','deleted successfully');
        }   
}


