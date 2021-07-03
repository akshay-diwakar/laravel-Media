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
                    <tr>
                        <th class="col-md-6">
                            <input class="form-control" type="text" name="Items"  value="Post" readonly>
                        </th>
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Add" name="Permissions[Post][]">
                            </div>
                        </td>
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="View" name="Permissions[Post][]">
                            </div>
                        </td>
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Edit" name="Permissions[Post][]">
                            </div>
                        </td>
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Delete" name="Permissions[Post][]">
                            </div>
                        </td>
                    </tr>
                  <tr>
                    <th class="col-md-6">
                        <input class="form-control" type="text" name="Items"  value="Comments" readonly>
                    </th>
                   <td>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Add" name="Permissions[Comments][]">
                        </div>
                    </td>
                    <td>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="View" name="Permissions[Post][]">
                        </div>
                    </td>
                    <td>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="Edit" name="Permissions[Comments][]">
                    </div>
                </td>
                <td>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="Delete" name="Permissions[Comments][]">
                    </div>
                </td> 
                  </tr>
                  <tr>
                    <th class="col-md-6">
                        <input class="form-control" type="text" name="Items"  value="User" readonly>
                    </th>
                    <td>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Add" name="Permissions[User][]">
                        </div>
                    </td>
                    <td>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="View" name="Permissions[User][]">
                        </div>
                    </td>
                    <td>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Edit" name="Permissions[User][]">
                        </div>
                    </td>
                    <td>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Delete" name="Permissions[User][]">
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
@endsection

