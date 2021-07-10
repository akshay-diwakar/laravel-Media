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
              {{-- <tr class="Post">
                    <th scope="row">
                        <input class="form-control" type="text" placeholder="Posts" readonly>
                    </th>
                    
                        <td class="examplelink">
                            <input type="hidden" name="post" value="Post">
                            <input type="checkbox" name="Permissions[]" value="Add" {{is_array(old('Permissions',$role_data??[]))&&in_array('PostAdd',old('Permissions',$role_data??[]))?'checked':null}} />
                        </td> 
                        
                    <td class="examplelink">
                        <input type="checkbox" name="Permissions[]" value="View" {{is_array(old('Permissions',$role_data??[]))&&in_array('PostView',old('Permissions',$role_data??[]))?'checked':null}} />

                    </td>
                    <td class="examplelink">
                        <input type="checkbox" name="Permissions[]" value="Edit" {{is_array(old('Permissions',$role_data??[]))&&in_array('PostEdit',old('Permissions',$role_data??[]))?'checked':null}} />
                    </td>
                    <td class="examplelink">
                        <input type="checkbox" name="Permisisons[]" value="Delete" {{is_array(old('Permissions',$role_data??[]))&&in_array('PostDelete',old('Permissions',$role_data??[]))?'checked':null}} />

                    </td>
              </tr> --}}
              <tr class="Post">
                <th scope="row">
                    <input class="form-control" type="text" placeholder="Posts" readonly>
                    <input type="hidden" name="Post" value="Post">
                </th>
                <td class="examplelink">
                    {{-- <input type="checkbox" name="Permission_Post[]" value="Add"     {{ ( $role_data['Permission_Post'] === true ? ' checked' : '') }}> --}}
                    <input type="checkbox" name="Permission_Post[]" value="Add" {{is_array(old('Permission_Post',$role_data??[]))&&in_array('PostAdd',old('Permission_Post',$role_data??[]))?'checked':null}}>
                </td>
                <td class="examplelink">
                    <input type="checkbox" name="Permission_Post[]" value="View" {{is_array(old('Permission_Post',$role_data??[]))&&in_array('PostView',old('Permission_Post',$role_data??[]))?'checked':null}}>
                </td>
                <td class="examplelink">
                    <input type="checkbox" name="Permission_Post[]" value="Edit" {{is_array(old('Permission_Post',$role_data??[]))&&in_array('PostEdit',old('Permission_Post',$role_data??[]))?'checked':null}}>
                </td>
                <td class="examplelink">
                    <input type="checkbox" name="Permission_Post[]" value="Delete" {{is_array(old('Permission_Post',$role_data??[]))&&in_array('PostDelete',old('Permission_Post',$role_data??[]))?'checked':null}}>
                </td>
          </tr> 
          
          
          <tr id="Comment">
                <th scope="row">
                    <input class="form-control" type="text" placeholder="Comments" readonly>
                   <input type="hidden" name="Comment" value="Comment">
                </th>
                <td class="examplelink">
                    <input type="checkbox" name="Permission_Comment[]" value="Add" {{is_array(old('Permission_Comment',$role_data??[]))&&in_array('CommentAdd',old('Permission_Comment',$role_data??[]))?'checked':null}}>
                </td>
                <td class="examplelink">
                    <input type="checkbox" name="Permission_Comment[]" value="View" {{is_array(old('Permission_Comment',$role_data??[]))&&in_array('CommentView',old('Permission_Comment',$role_data??[]))?'checked':null}}>
                </td>
                <td class="examplelink">
                    <input type="checkbox" name="Permission_Comment[]" value="Edit" {{is_array(old('Permission_Comment',$role_data??[]))&&in_array('CommentEdit',old('Permission_Comment',$role_data??[]))?'checked':null}}>
                </td>
                <td class="examplelink">
                    <input type="checkbox" name="Permission_Comment[]" value="Delete"  {{is_array(old('Permission_Comment',$role_data??[]))&&in_array(' CommentDelete',old('Permission_Comment',$role_data??[]))?'checked':null}} >
                </td>
          </tr>
               {{-- <tr id="Comment">
                    <th scope="row">
                        <input class="form-control" type="text" placeholder="Comments" readonly>
                        <input type="hidden" name="selected[]" value="User" onclick="">
                     </th> 
              
                    <td class="examplelink">
                        <input type="hidden" value="Comment">
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
              </tr>   --}}

              <tr id="User">
                <th scope="row">
                    <input class="form-control" type="text" placeholder="User" readonly>
                    <input type="hidden" name="User" value="User">
                </th>
                <td class="examplelink">
                    <input type="checkbox" name="Permission_User[]" value="Add"  {{is_array(old('Permission_User',$role_data??[]))&&in_array('UserAdd',old('Permission_User',$role_data??[]))?'checked':null}}>
                </td>
                <td class="examplelink">
                    <input type="checkbox" name="Permission_User[]" value="View"  {{is_array(old('Permission_User',$role_data??[]))&&in_array('UserView',old('Permission_User',$role_data??[]))?'checked':null}}>
                </td>
                <td class="examplelink">
                    <input type="checkbox" name="Permission_User[]" value="Edit"  {{is_array(old('Permission_User',$role_data??[]))&&in_array('UserEdit',old('Permission_User',$role_data??[]))?'checked':null}}>
                </td>
                <td class="examplelink">
                    <input type="checkbox" name="Permission_User[]" value="Delete"  {{is_array(old('Permission_User',$role_data??[]))&&in_array('UserDelete',old('Permission_User',$role_data??[]))?'checked':null}}>
                </td>
          </tr>
              {{-- <tr id="User">
                    <th scope="row">
                        <input class="form-control" type="text" placeholder="User" readonly>
                    </th>
                    <td class="examplelink">
                        <input type="hidden" value="User">
                        <input type="checkbox" name="Permissions[]" value="Add" {{is_array(old('Permissions',$role_data??[]))&&in_array('UserAdd',old('Permissions',$role_data??[]))?'checked':null}}>
                    </td>
                    <td class="examplelink">
                        <input type="checkbox" name="Permissions[]" value="View" {{is_array(old('Permissions',$role_data??[]))&&in_array('UserView',old('Permissions',$role_data??[]))?'checked':null}}>
                    </td>
                    <td class="examplelink">
                        <input type="checkbox" name="Permissions[]" value="Edit" {{is_array(old('Permissions',$role_data??[]))&&in_array('UserEdit',old('Permissions',$role_data??[]))?'checked':null}}>
                    </td>
                    <td class="examplelink">
                        <input type="checkbox" name="Permissions[]" value="Delete" {{is_array(old('Permissions',$role_data??[]))&&in_array('UserDelete',old('Permissions',$role_data??[]))?'checked':null}}>
                    </td>
              </tr> --}}
            </tbody>
          </table>
            <input  type="submit" class="btn btn-primary" value="Submit"  />
        </form>
    </div>
 
@endsection

