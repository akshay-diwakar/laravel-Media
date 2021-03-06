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
<div class="container">
  <a href="{{ route('Admin.AssignPermission')}}" >
    <button class="btn btn-dark">Roles & Permissions</button>
  </a>
  <a href="{{ route('Admin.User.add')}} " style="margin-left:20px;">
    <button class="btn btn-primary">Add Users</button> 
  </a>
  
  <a href="{{ route('Admin.RolesGiven') }}" style="margin-left:20px;">
    <button class="btn btn-success">Assigend Role To Users</button> 
  </a>
</div>

<div class="container" style="margin-top:10px;">
    <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">User Name</th>
            <th scope="col">email</th>
            
            <th scope="col">Assign Role</th>
            <th scope="col">Action</th>
         </tr>
        </thead>
        <tbody>
          @foreach ($User as $Users)
              <tr>
                  <td>{{ $Users->id }}</td>
                  <td>{{ $Users->name }}</td>
                  <td>{{ $Users->email }}</td>
                  <td>
                     <a href="{{ url( 'Admin/' . $Users->id.'/AssignRole/add') }}">
                        <button class="btn btn-info">Assign Role</button>
                     </a>
                  </td>    
                  <td class="row">
                        <a href="{{URL('/Admin/users/edit/')}}/{{$Users->id}}" > 
                           <button class="btn btn-secondary">Edit</button>
                        </a>
                        <form method="POST" action="{{ route('Admin.User.delete',$Users->id) }}" >
                          @method('Delete')
                          @csrf
                          <button style="margin-left: 2px;" class="btn btn-danger">
                              Delete
                          </button>
                      </form>
                  </td>
              </tr>
          @endforeach
        </tbody>
      </table>
</div>    
@endsection

