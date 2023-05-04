@extends('layouts.base')
@section('body')
<h1>{{$user->name}}</h1>
<div class="table-responsive">
<table class="table table-striped table-hover">
    <thead>
      <tr>
        <th>Admin ID</th>
        <th>Admin Name</th>
        
        <th>Admin Email</th>
        <th>Admin Password</th>
        </tr>
    </thead>
    <tbody>
    <tr>
      <td>{{$user->id}}</td>
      <td>{{$user->name}}</td>
      
      <td>{{$user->email}}</td>
      <td>{{$user->password}}</td>
      </tr>
    </tbody>
  </table>
</div>
<a href="{{url()->previous()}}" class="btn btn-default" role="button">Back</a>
</div>
@endsection