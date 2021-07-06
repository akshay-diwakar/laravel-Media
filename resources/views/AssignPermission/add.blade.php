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
                    </th>
                    <td class="examplelink">
                        <input type="checkbox" name="Permissions[]" value="PostAdd">
                    </td>
                    <td class="examplelink">
                        <input type="checkbox" name="Permissions[]" value="PostView">
                    </td>
                    <td class="examplelink">
                        <input type="checkbox" name="Permissions[]" value="PostEdit">
                    </td>
                    <td class="examplelink">
                        <input type="checkbox" name="Permissions[]" value="PostDelete">
                    </td>
              </tr>
              <tr id="Comment">
                    <th scope="row">
                        <input class="form-control" type="text" placeholder="Comments" readonly>
                        {{-- <input type="hidden" name="selected[]" value="User" onclick=""> --}}
                    </th>
                    <td class="examplelink">
                        <input type="checkbox" name="Permissions[]" value="CommentAdd">
                    </td>
                    <td class="examplelink">
                        <input type="checkbox" name="Permissions[]" value="CommentView">
                    </td>
                    <td class="examplelink">
                        <input type="checkbox" name="Permissions[]" value="CommentEdit">
                    </td>
                    <td class="examplelink">
                        <input type="checkbox" name="Permissions[]" value="CommentDelete">
                    </td>
              </tr>
              <tr id="User">
                    <th scope="row">
                        <input class="form-control" type="text" placeholder="User" readonly>
                    </th>
                    <td class="examplelink">
                        <input type="checkbox" name="Permissions[]" value="UserAdd">
                    </td>
                    <td class="examplelink">
                        <input type="checkbox" name="Permissions[]" value="UserView">
                    </td>
                    <td class="examplelink">
                        <input type="checkbox" name="Permissions[]" value="UserEdit">
                    </td>
                    <td class="examplelink">
                        <input type="checkbox" name="Permissions[]" value="UserDelete">
                    </td>
              </tr>
            </tbody>
          </table>
            <input  type="submit" class="btn btn-primary" value="Submit"  />
        </form>
    </div>
    
{{-- <script type="text/javascript">
        function getValue(){
            var id = document.getElementById("post");
            alert($id);
        }
</script>  --}}

@endsection