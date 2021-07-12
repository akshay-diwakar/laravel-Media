<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Permission;
use Validator;

class PermissionController extends Controller
{
    public function index(Request $request)
    {
        $Permission = Permission::all();
        return view('Permission.index',compact('Permission'));
    }

    public function create(Request $request)
    {
        return view('Permission.add');
    }

    public function store(Request $request)
    {
        $data = $request->all();
            
        $rules = array(
           'PermissionName' => 'required' ,
        );

        $validate=Validator::make($data,$rules);
        
        if ($validate->fails()) {
            return redirect()->back()->withInput()->withErrors($validate);
        }
        else{
           
            $form_data = array(
               'name' => $data['PermissionName'],
            );
        //    dd($form_data);
           $Permission = Permission::create($form_data);
           
           return redirect('/Admin/AddPermission')->with('success');
        }
    }

    public function edit($id,Request $request)
    {
        $Permission = Permission::find($request->id);
        return view('Permission.edit',compact('Permission'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function update(Request $request)
    {
        $data = $request->all();
        
        $Permission = Permission::find($data['Permission_id']);
        $rules = array(
            'PermissionName' => 'required',
        );

        $validate=Validator::make($data,$rules);
         
        if ($validate->fails()) {
             return redirect()->back()->withInput()->withErrors($validate);
        }
        else{
            $form_data = array(
             'name' => @$data['PermissionName'] ? $data['PermissionName'] : $Permission->name, 
            );

             $Permission->update($form_data);
            //  $Message = "update successfully";
             return redirect()->route('Admin.AddPermission')->with('success');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Permission = Permission::findOrFail($id);
        $Permission->delete();
        return redirect()->back()->with('success','deleted successfully');
    }
}
