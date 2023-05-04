
@extends('layouts.master')
@section('content')
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <h1>Sign Up</h1>
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <p>{{ $error }}</p> 
                    @endforeach
                </div>
            @endif
             <form id="submit" class="" action="#" method="post"  enctype='multipart/form-data'>
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group">
                    <label for="fname">First Name: </label>
                    <input type="text" name="fname" id="fname" class="form-control">
                </div>
                <div class="form-group">
                    <label for="lname">Last Name: </label>
                    <input type="text" name="lname" id="lname" class="form-control">
                </div>
                <div class="form-group">
                    <label for="address">Address: </label>
                    <input type="text" name="address" id="address" class="form-control">
                </div>
                <div class="form-group">
                    <label for="contact">Contact: </label>
                    <input type="text" name="contact" id="contact" class="form-control">
                </div>

                <div class="form-group">
                    <label for="email">Email: </label>
                    <input type="text" name="email" id="email" class="form-control">
                </div>
                <div class="form-group">
                    <label for="password">Password: </label>
                    <input type="password" name="password" id="password" class="form-control">
                </div>
                <div class="form-group">
                    <label for="adopterimage">Adopter Image: </label>
                    <input type="file" name="adopterimage" id="adopterimage" class="form-control">
                </div>
                   <input id="submit" type="submit" value="Sign Up" class="btn btn-primary">
             </form>
        </div>
    </div>
@endsection   