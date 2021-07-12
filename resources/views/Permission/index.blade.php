@extends('AssignPermission.index')
@section('add_roles')
<div class="container" style="margin-top:100px; border:3px solid blue; border-radius:10px;">
    <div class="container" style="margin-top:20px; margin-bottom:20px;">
        <a href="{{ route('Admin.AddPermission.Add') }}">
            <button class="btn btn-primary">Add Permissions</button>
        </a>
    </div>

    <div class="container">
        <table class="table" style="margin-top:20px;">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Permission Name</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($Permission as $Permissions)
                  <tr>
                    <td>{{ $Permissions->id }}</td>
                    <td>{{ $Permissions->name }}</td>
                    <td>
                        <a href="{{URL('/Admin/AddPermission/edit/')}}/{{$Permissions->id}}">
                            <button class="btn btn-dark">Edit</button>
                        </a>
                        <form method="POST" action="{{ route('Admin.AddPermission.delete' , $Permissions->id) }}">
                          @method('delete')
                          @csrf
                           <button class="btn btn-danger">Delete</button>
                        </form>
                    </td>

                  </tr>
              @endforeach
            </tbody>
          </table>
    </div>
</div>   
@endsection