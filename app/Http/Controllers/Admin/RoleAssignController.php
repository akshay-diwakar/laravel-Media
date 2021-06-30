<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class RoleAssignController extends Controller
{
     public function add(Request $request)
     {
         $User = User::get();
         return view('AssignRole.add',compact('User'));
     }
}
