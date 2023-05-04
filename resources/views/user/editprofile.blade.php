@extends('layouts.base')
@section('body')
<div class="container">
  <h2>Update Admin</h2>
  {!! Form::model($user,['method'=>'POST','route' => ['update.admin',$user->id], 'files' => true]) !!}
  @csrf
    <div class="row">
        <div class="col-md-4"></div>
          <div class="form-group col-md-4">
             {!!Form::label('Admin Name:')!!}
             {!! Form::text('name',$user->name,array('class' => 'form-control')) !!}
         </div>
    </div>

    <div class="row">
        <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            {!!Form::label('Admin Email:')!!}
            {!! Form::text('email',$user->email,array('class' => 'form-control')) !!}
         </div>
    </div>

    <div class="row">
        <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            {!!Form::label('Admin Role:')!!}
            {!! Form::text('role',$user->role,array('class' => 'form-control')) !!}
        </div>
    </div>

  <div class="row">
      <div class="col-md-4"></div>
        <div class="form-group col-md-4" style="margin-top:60px">
            <button type="submit" class="btn btn-primary">Update</button>
             <a href="{{url()->previous()}}" class="btn btn-default" role="button">Cancel</a>
      </div>
    </div> 

  </div>     
{!! Form::close() !!}
@endsection