<?php
namespace App\Http\Controllers;

use Input;
use DB;
use Illuminate\Http\Request;
use Validator;
use App\Models\role;
use App\Models\RolePermission;
use App\Models\Item;
use App\Models\Permission;

class AssignPermissionController extends Controller
{
    public function index(Request $request)
    {
        $Role = role::get();
        
        return view('AssignPermission.index',compact('Role'));
    }

    public function add($Role_id,Request $request)
    {
        $role_data = RolePermission::where(['role_id' => $Role_id])->get()->map(function ($role){
            $item_id = $role->Item_id;
            $item_data = Item::where(['id' => $item_id])->get();
            foreach($item_data as $item){
                    $data = $item->name;
            }
            return $data.$role->permission_id;
        })->toArray();

        $Items = Item::all();
        $Permissions = Permission::all();
        $Role = Role::Find($Role_id);
        return view('AssignPermission.add',compact('Role','Items','Permissions','role_data'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $data = RolePermission::where(['role_id'=> $request->role_id])->delete();
        
        foreach ($request->Permissions as $item) {
            $item_id = $item['id'];
            if(!empty ($item['data'])){

                foreach ($item['data'] as $key => $value) {
                    // dd($value);
                    $RolePermission = new RolePermission;
                    $RolePermission->role_id = $request->role_id;
                    $RolePermission->Item_id = $item_id;
                    $RolePermission->permission_id = $value;
                    $RolePermission->save();
                }
            }
            
        }
        return redirect('/Admin/AssignPermission')->with('success');
  

    }

      
        
        public function destroy($id)
        {
            $RolePermission = RolePermission::findOrFail($id);
            $RolePermission->delete();
            return redirect()->back()->with('success','deleted successfully');
        }   
}


