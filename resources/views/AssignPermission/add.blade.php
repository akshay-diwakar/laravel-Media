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
        <form method="POST" action="{{ route('Admin.AssignPermission.save') }}">
            @if ($errors->any())
            <div class="alert alert-danger alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
          @endif
          @csrf 
        
        {{-- roles from roles table --}}
        <label>Assign Role </label>
	    <select class="form-select" aria-label="Default select example" name="Roles">
            <option selected disabled>Roles</option>
            @foreach ($Role as $roles)
                <option value="{{ $roles->id }}">{{ $roles->name }}</option>
            @endforeach
        </select>

        <table class="table" style="margin-top:20px;">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Add</th>
                <th scope="col">View</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
             </tr>
            </thead>
            <tbody>
              <tr class="Post">
                    <th scope="row">
                        <input class="form-control" type="text" placeholder="Posts" readonly>
                        <input type="hidden" name="Post" value="Post">
                    </th>
                    <td class="examplelink">
                        <input type="checkbox" name="Permission_Post[]" value="Add">
                    </td>
                    <td class="examplelink">
                        <input type="checkbox" name="Permission_Post[]" value="View">
                    </td>
                    <td class="examplelink">
                        <input type="checkbox" name="Permission_Post[]" value="Edit">
                    </td>
                    <td class="examplelink">
                        <input type="checkbox" name="Permission_Post[]" value="Delete">
                    </td>
              </tr>
              <tr id="Comment">
                    <th scope="row">
                        <input class="form-control" type="text" placeholder="Comments" readonly>
                       <input type="hidden" name="Comment" value="Comment">
                    </th>
                    <td class="examplelink">
                        <input type="checkbox" name="Permission_Comment[]" value="Add">
                    </td>
                    <td class="examplelink">
                        <input type="checkbox" name="Permission_Comment[]" value="View">
                    </td>
                    <td class="examplelink">
                        <input type="checkbox" name="Permission_Comment[]" value="Edit">
                    </td>
                    <td class="examplelink">
                        <input type="checkbox" name="Permission_Comment[]" value="Delete">
                    </td>
              </tr>
              <tr id="User">
                    <th scope="row">
                        <input class="form-control" type="text" placeholder="User" readonly>
                        <input type="hidden" name="User" value="User">
                    </th>
                    <td class="examplelink">
                        <input type="checkbox" name="Permission_User[]" value="Add">
                    </td>
                    <td class="examplelink">
                        <input type="checkbox" name="Permission_User[]" value="View">
                    </td>
                    <td class="examplelink">
                        <input type="checkbox" name="Permission_User[]" value="Edit">
                    </td>
                    <td class="examplelink">
                        <input type="checkbox" name="Permissions_User[]" value="Delete">
                    </td>
              </tr>
            </tbody>
          </table>
            <input  type="submit" class="btn btn-primary" value="Submit"  />
        </form>
    </div>
    

@endsection