@extends('layouts.app')

@if(session()->has('error'))
<div class="alert alert-danger alert-dismissable">
    <i class="fa fa-ban"></i>
    <button type="button" class="close" data-dismxiss="alert" aria-hidden="true">&times;</button>
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
        <form method="POST" action="{{ route('Admin.AssignPermission.edit-save') }}">
            <input type="hidden" name="Role_id" value="{{ $Role_id  }}"  /> 
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
                            <input type="checkbox" name="Permissions[]" value="PostAdd" {{is_array(old('Permissions',$role_data??[]))&&in_array('PostAdd',old('Permissions',$role_data??[]))?'checked':null}} />
                        </td> 
                        
                    <td class="examplelink">
                        <input type="checkbox" name="Permissions[]" value="PostView" {{is_array(old('Permissions',$role_data??[]))&&in_array('PostView',old('Permissions',$role_data??[]))?'checked':null}} />

                    </td>
                    <td class="examplelink">
                        <input type="checkbox" name="Permissions[]" value="PostEdit" {{is_array(old('Permissions',$role_data??[]))&&in_array('PostEdit',old('Permissions',$role_data??[]))?'checked':null}} />

                    </td>
                    <td class="examplelink">
                        <input type="checkbox" name="Permissions[]" value="PostDelete" {{is_array(old('Permissions',$role_data??[]))&&in_array('PostDelete',old('Permissions',$role_data??[]))?'checked':null}} />

                    </td>
              </tr>
              <tr id="Comment">
                    <th scope="row">
                        <input class="form-control" type="text" placeholder="Comments" readonly>
                        {{-- <input type="hidden" name="selected[]" value="User" onclick=""> --}}
                    </th>
              
                    <td class="examplelink">
                        <input type="checkbox" name="Permissions[]" value="CommentAdd" {{is_array(old('Permissions',$role_data??[]))&&in_array('CommentAdd',old('Permissions',$role_data??[]))?'checked':null}} />

                    </td>
                    <td class="examplelink">
                        <input type="checkbox" name="Permissions[]" value="CommentView" {{is_array(old('Permissions',$role_data??[]))&&in_array('CommentView',old('Permissions',$role_data??[]))?'checked':null}}>
                    </td>
                    
                    <td class="examplelink">
                        <input type="checkbox" name="Permissions[]" value="CommentEdit" {{is_array(old('Permissions',$role_data??[]))&&in_array('CommentEdit',old('Permissions',$role_data??[]))?'checked':null}}>
                    </td>
                    <td class="examplelink">
                        <input type="checkbox" name="Permissions[]" value="CommentDelete" {{is_array(old('Permissions',$role_data??[]))&&in_array('CommentDelete',old('Permissions',$role_data??[]))?'checked':null}}>
                    </td>
              </tr>
              <tr id="User">
                    <th scope="row">
                        <input class="form-control" type="text" placeholder="User" readonly>
                    </th>
                    <td class="examplelink">
                        <input type="checkbox" name="Permissions[]" value="UserAdd" {{is_array(old('Permissions',$role_data??[]))&&in_array('UserAdd',old('Permissions',$role_data??[]))?'checked':null}}>
                    </td>
                    <td class="examplelink">
                        <input type="checkbox" name="Permissions[]" value="UserView" {{is_array(old('Permissions',$role_data??[]))&&in_array('UserView',old('Permissions',$role_data??[]))?'checked':null}}>
                    </td>
                    <td class="examplelink">
                        <input type="checkbox" name="Permissions[]" value="UserEdit" {{is_array(old('Permissions',$role_data??[]))&&in_array('UserEdit',old('Permissions',$role_data??[]))?'checked':null}}>
                    </td>
                    <td class="examplelink">
                        <input type="checkbox" name="Permissions[]" value="UserDelete" {{is_array(old('Permissions',$role_data??[]))&&in_array('UserDelete',old('Permissions',$role_data??[]))?'checked':null}}>
                    </td>
              </tr>
            </tbody>
          </table>
            <input  type="submit" class="btn btn-primary" value="Submit"  />
        </form>
    </div>
 
@endsection