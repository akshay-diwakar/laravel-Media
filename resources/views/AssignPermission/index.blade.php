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
{{-- navbar for roles and permissions --}}
<div class="container">
    <a href="{{ route('Admin.AssignRole') }}">
        <button class="btn btn-dark">Roles</button>
    </a>
    <a href="{{ route('Admin.AssignItem') }}" style="margin-left:15px;">
        <button class="btn btn-info">Items</button>
    </a>
    <a href="{{ route('Admin.AddPermission') }}" style="margin-left:15px;">
        <button class="btn btn-secondary">Permissions</button>
    </a>

</div>
 @yield('add_roles')
 @endsection





    