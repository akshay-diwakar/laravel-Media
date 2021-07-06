@extends('layouts.app')

@if(session()->has('error'))
<div class="alert alert-danger alert-dismissable">
    <i class="fa fa-ban"></i>
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    &nbsp; {{ session()->get('error') }}
</div>
@endif

@if(session()->has('success'))
<div class="alert alert-success alert-dismissable">
    <i class="fa fa-check"></i>
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    &nbsp;{{ session()->get('success') }}
</div>
@endif
@section('content')
   <div class="container" style="margin-top: 10px;">
       <div class="container">
           <a href="{{ route('Admin.AssignPermission.add') }}">
               <button class="btn btn-primary">Add Permission</button>
           </a>
       </div>   
            <table class="table"  style="margin-top: 20px;">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Role</th>
                    <th scope="col">Item</th>
                    <th scope="col">Permission</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
                <tbody>
                    @foreach ($RolePermission as $AssignedRole)
                    <tr>
                        <th scope="row">{{ $AssignedRole->id }}</th>
                        <td>{{ $AssignedRole->roles->name }}</td>
                        <td>{{ $AssignedRole->Item }}</td>
                        <td>{{ $AssignedRole->Permission }}</td>
                        <td> 
                            <a href="">
                                <button class="btn btn-info">Edit</button>
                            </a>
                            <a href="">
                                <button class="btn btn-danger">Delete</button>
                            </a>
                        </td>     
                    </tr>
                    @endforeach
                </tbody>
            </table>
   </div>

@endsection