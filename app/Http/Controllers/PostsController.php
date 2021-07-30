<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Storage;
use Auth;
use DB;
use App\Models\Post;
use App\Models\User;
use App\Models\role;
use App\Models\Comments;
use App\Models\Item;
use App\ModelS\Permission;
use App\Models\RolePermission;  
use App\Models\RoleUser;

class PostsController extends Controller
{
    

    public function index(Request $request)
    {
      
      
        // $RoleUser = RoleUser::where('user_id','=',Auth::id())->select('user_id','role_id')->get();
      $RoleUser = RoleUser::where('user_id','=', Auth::id())->get(['user_id','role_id']);
      // dd($RoleUser);
      
      $roleid = $RoleUser->pluck('role_id')->first();
      // dd($roleid);


        $role_permissions = RolePermission::
                              where('role_permissions.role_id',$roleid)
                              ->select('Item_id','role_id','permission_id')
                              ->get();  

          $Role = role::with('items')->get();
          // $Item_Assigned_To_Role =  $Role->items->id;                      
          // dd($Item_Assigned_To_Role);
// 
          $role_id = $role_permissions->pluck('role_id');
          $Item_id = $role_permissions->pluck('Item_id');
          $permission_id = $role_permissions->pluck('permission_id');                

// dd($permission_id);

  


      // dd($RoleUser);
      // dd(Auth::id());

      // $User = User::get();
      // // dd($User);
      // foreach ($User as $user ) {
      //   // dd($user);
      //     foreach ($user->roles as $roles) {
      //       dd($user->roles);
      //   }  
      // }
      
      // $Post =  Post::get();
      // foreach ($Post as $Posts) {
      //     foreach ($Posts->User as $iser ) {
      //       dd($Posts->User->id);
      //     }
      // }

//       $Role = Role::with('items','permissions')->get();

        // // dd($Role);
        $RoleUser = RoleUser::where('user_id','=',Auth::id())->select('user_id','role_id')->get();

        $AssignedRole = $RoleUser->pluck('role_id')->first();
        // dd/($AssignedRole);
        // $AssignedRoleId = Auth::user()->roles->first()->id;
        // dd($AssignedRoleId);
        $role_permissions = RolePermission::
                              where('role_permissions.role_id',$AssignedRole)
                              ->select('role_id','Item_id','permission_id')
                              ->get();  
 
                 // dd($role_permissions);
        // 
        $role_id = $role_permissions->pluck('role_id');
        $Item_id = $role_permissions->pluck('Item_id');
      
          $Count = count($Item_id);
      // dd($Count);
      // for ($i=0; $i <$Count ; $i++) { 
      //     dump($Item::where(  ));
      //   }  
        $permission_id = $role_permissions->pluck('permission_id');                
        
        // dd(Auth::user()->roles->first()->id);

        // $Item = Item::where('id','=',$Item_id)->get();
        

        // $role_permissions->search(function ($role_permissions, $key) {
        //   return $role_permissions->role_id ==  && $item->Item_id==? && $item->permission_id==?;
        // });


        // $Permission = Permission::where('id','=',$permission_id)->get();
        // dd($Permission);             
        // foreach ($ as $key => $value) {
        //   # code...
        // }


        // $permission_arr = RolePermission::where('item_id', $item->id)
        //     ->where('role_id', $role_id)
        //     ->pluck('permission_id')
        //     ->toArray();
                        // dd($role_permissions == true);
        //   if(Auth::user()->roles->first()->id && $role_permissions == true){ 
        //     return $next($request);
        // }
        // else
        // {
        //    return redirect('/access-denied');
        // }












        // $AssignedRoleId = Auth::user()->roles->first()->id;
        // dd($AssignedRoleId);
        // $AssignedItemToRole = role::find($AssignedRoleId)->with('items')->get();
        // dd($AssignedItemToRole);
       $RolePermission = RolePermission::where('role_id','1')->get();
      

        $post = Post::get();
        $User = User::get();
        $Comment = Comments::get();
        return view('Posts.index',compact('post','Comment'));
    }

    public function add(Request $request)
    {
        return view('Posts.add');    
    }

    public function store(Request $request)
    {

        $data = $request->all();
        // dd($request->Image);

        $User =  Auth::user()->id;
        
        $rules = array(
           'postname' => 'required' ,
           'description' =>'required',
           'Image' =>  'required|image|mimes:jpeg,png,jpg|max:8192',
        );

        $validate=Validator::make($data,$rules);
        
        if ($validate->fails()) {
            return redirect()->back()->withInput()->withErrors($validate);
        }
        else{
           
           $path =   Storage::disk('local')->put('public',$request->file('Image'));
          
           $form_data = array(
               'title' => $data['postname'],
               'description' => $data['description'],
               'Image'  => $path,
               'user_id' => $User,
           );
        //    dd($form_data);
           $Posts = Post::create($form_data);
           // $Message = "successfully added";
           return redirect('/Admin/Posts')->with('success');
        }   
    }

      public function edit(Request $request,Post $post)
      {
              
          $Posts = Post::find($request->id);
         
         return view('Posts.edit',compact('Posts'));
      }


      public function update(Request $request)
      {
        $data = $request->all();
        // dd($data);
        $Post = Post::find($data['Post_id']);
        $rules = array(
            'postname' => 'required' ,
            'description' =>'required',
            'Image' =>  'required|image|mimes:jpeg,png,jpg|max:8192',
         );
 
         $validate=Validator::make($data,$rules);
         
         if ($validate->fails()) {
             return redirect()->back()->withInput()->withErrors($validate);
         }
         else{
            
            $path =   Storage::disk('local')->put('public',$request->file('Image'));
            $form_data = array(
             'title' => @$data['postname'] ? $data['postname'] : $Post->title, 
             'description' => @$data['description'] ? $data['description'] : $Post->description,
              'Image' =>$path,  
            );

            $Post->update($form_data);
             // $Message = "update successfully";
             return redirect('/Admin/Posts')->with('success');
            }
      }    

    public function destroy($id)
    {
             
        $Post = Post::findOrFail($id);
        $Post->delete();
        return redirect()->back()->with('success');
    }

}
