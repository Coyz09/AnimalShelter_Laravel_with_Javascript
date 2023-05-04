@extends('layouts.personnelprofilebase')
@section('body')
 @if (Auth::check() && auth()->user()->role == 'personnel')
<h1>{{$personnel->personnel_Fname}}</h1>
<div  class="container">
<div class="table-responsive">
<table class="table table-striped table-hover">
    <thead>
      <tr>
        <th>Personnel ID</th>
        <th>Personnel First Name</th>      
        <th>Personnel Last Name</th>
        <th>Personnel Job</th>
        <th>Personnel Contact</th>
        <th>Personnel Image</th>
        <th>Edit</th>
        </tr>
    </thead>
    <tbody>
    <tr>
      <td>{{$personnel->id}}</td>
      <td>{{$personnel->personnel_Fname}}</td>
      
      <td>{{$personnel->personnel_Lname}}</td>
      <td>{{$personnel->personnel_Job}}</td>
      <td>{{$personnel->personnel_Contact}}</td>
       <td><img src="{{asset($personnel->img)}}" width="75"> </td>
      <td align="center"><a href="#"><i class="fa fa-pencil-square-o" aria-hidden="true" style="font-size:24px" ></a></i></td>
      </tr>

    </tbody>
  </table>
</div>


</div>
</div>

 @endif
 @endsection
 