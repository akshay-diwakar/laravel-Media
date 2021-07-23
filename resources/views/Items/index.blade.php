@extends('AssignPermission.index')
@section('add_roles')
<div class="container" style="margin-top:100px; border:3px solid blue; border-radius:10px;">
    <div class="container" style="margin-top:20px; margin-bottom:20px;">
        <a href="{{ route('Admin.AssignItem.Add') }}">
            <button class="btn btn-primary">Add Items</button>
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
                @foreach ($Item as $items)
                  <tr>
                      <td>{{ $items->id }}</td>
                      <td>{{ $items->name }}</td>
                      <td class="row">
                        <a href="{{ URL('/Admin/AssignItem/edit/')}}/{{$items->id}} ">
                          <i class="fas fa-edit fa-2x" aria-hidden="true"></i>
                        </a>
                          <form method="POST" action="{{ route('Admin.AssignItem.delete',$items->id) }}">
                            @method('delete')
                            @csrf
                            
                              <i class="far fa-trash-alt fa-2x"></i>
                            
                          </form>
                      </td>
                  </tr>    
              @endforeach
              
            </tbody>
          </table>
    </div>
</div>   
@endsection