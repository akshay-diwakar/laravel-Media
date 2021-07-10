@extends('AssignPermission.index')
@section('add_roles')
<div class="container" style="margin-top:100px; border:3px solid blue; border-radius:10px;">
    <div class="container" style="margin-top:20px; margin-bottom:20px;">
        <a href="{{ route('Admin.AssignRole.Add') }}">
            <button class="btn btn-primary">Add Roles</button>
        </a>
    </div>

    <div class="container">
        <table class="table" style="margin-top:20px;">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($Role as $roles)
                  <tr>
                      <td>{{ $roles->id }}</td>
                      <td>{{ $roles->name }}</td>
                      <td>
                        <a href="{{ route('Admin.AssignPermission.add') }}">
                          <i class="fas fa-edit" aria-hidden="true"></i>
                        </a>
                      </td>
                  </tr>    
              @endforeach
            </tbody>
          </table>
    </div>
</div>   
@endsection