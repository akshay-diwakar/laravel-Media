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
<div class="container" style="margin-top: 20px;">
<table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">User Name</th>
      <th scope="col">Role</th>
      
    </tr>
  </thead>
  <tbody>
  	@foreach($users as $user)
<tr>
	<td>{{$user->id}}</td>
    <td>{{$user->name}}</td>
    <td>
        @foreach($user->roles as $role)
            {{$role->name}}
        @endforeach
    </td>
</tr>
@endforeach
  </tbody>
</table>
</div>    


@endsection
