@extends('layouts.app')
@section('content')

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

<div class="container">
    <section style="margin-top:30px;">
        <form method="post" action="{{ route('Admin.AssignPermission.save')}}" enctype="multipart/form-data">
          
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
           
            <div class="form-group">
                    <label> Assign Roles</label>
                    <select style="margin-left: 10px;" class="form-select" aria-label="Default Select Role" name="Roles">
                        <option selected disabled>Roles</option>
                        @foreach ($roles as $role)
                            <option value="{{$role->id}}">{{$role->name}}</option>
                        @endforeach 
                    </select>
            </div>
            <table class="table table-striped">
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

                    <!-- <input name="textbox1" id="textbox1" type="text" />
                    <input name="buttonExecute" onclick="execute(document.getElementById('textbox1').value)" type="button" value="Execute" /> -->
                    <tr id="post">
                        <th class="col-md-6">
                            <input class="form-control" type="text" name="Items[]"  value="Post" readonly>
                            <input type="hidden" name="selected[]" value="post" onclick="getValue()"> 
                        </th>
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="PostAdd" name="Permissions[]">
                            </div>
                        </td>
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="PostView" name="Permissions[]">
                            </div>
                        </td>
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="PostEdit" name="Permissions[]">
                            </div>
                        </td>
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Delete" name="Permissions[]">
                            </div>
                        </td>
                    </tr>
                  <tr>
                    <th class="col-md-6" id="Comments" >
                        <input class="form-control" type="text" name="Items[]"  value="Comments" readonly>
                        <input type="hidden" name="selected[]" value="comment" onclick="getValue()"> 
                        {{-- <input type="hidden" name="selected[]" value="post" onclick="getValue()">  --}}

                    </th>
                   <td>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="CommentAdd" name="Permissions[]">
                        </div>
                    </td>
                    <td>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="CommentView" name="Permissions[]">
                            
                        </div>
                    </td>
                    <td>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="CommentEdit" name="Permissions[]">
                    </div>
                </td>
                <td>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="Delete" name="Permissions[]">
                    </div>
                </td> 
                  </tr>
                  <tr>
                    <th class="col-md-6" id="Users">
                        <input class="form-control" type="text" name="Items[]"  value="User" readonly>
                        <input type="hidden" name="selected[]" value="user" onclick="getValue()"> 

                    </th>
                    <td>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="UserAdd" name="Permissions[]">
                        </div>
                    </td>
                    <td>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="UserView" name="Permissions[]">
                        </div>
                    </td>
                    <td>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="UserEdit" name="Permissions[]">
                        </div>
                    </td>
                    <td>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Delete" name="Permissions[]">
                        </div>
                    </td>
                  </tr>
                </tbody>
              </table>  

              <div style="margin-top:5px; margin-left:1030px;">
                  <input type="submit" class="btn btn-primary" value="Submit">
              </div>
        </form>
    </section>
</div>


<script type="text/javascript">
    function getValue(){
        var id = document.getElementById("post");
        alert($id);
    }
</script> 
@endsection

