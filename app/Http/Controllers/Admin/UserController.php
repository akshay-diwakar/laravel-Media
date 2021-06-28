<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\role;
use App\Models\UserRole;

class UserController extends Controller
{
    public function index(Request $request)
    { 
       $this->authorize('isAdmin'); 
      //  dd($this);
       $User = User::get();
       $Role = role::get();
    //    $UserRole = UserRole::get(); 
       return view('Admin.User.index',compact('User'));  
    }
}
