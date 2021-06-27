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
    <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">User Name</th>
            <th scope="col">email</th>
            <th scope="col">Role</th>
            <th scope="col">Action</th>
         </tr>
        </thead>
        <tbody>
          @foreach ($User as $Users)
              <tr>
                  <td>{{$Users->id}}</td>
                  <td>{{$Users->name}}</td>
                  <td>{{$Users->email}}</td>

              </tr>
          @endforeach
        </tbody>
      </table>
</div>    
@endsection