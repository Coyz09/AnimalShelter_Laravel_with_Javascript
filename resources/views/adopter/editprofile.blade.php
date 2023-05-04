@extends('layouts.adopterprofilebase')
@section('body')
<div class="content">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <h1>Update Profile</h1>
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <p>{{ $error }}</p> 
                    @endforeach
                </div>
            @endif
             <img src="{{asset($adopter->img)}}" width=150>
             <form id="update-form" class="" action="#" method="post"  enctype='multipart/form-data'>
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group">
                    <label for="adopter_Fname">First Name: </label>
                    <input type="text" name="adopter_Fname" id="adopter_Fname" class="form-control" value ="{{ $adopter->adopter_Fname }}">
                </div>
                <div class="form-group">
                    <label for="adopter_Lname">Last Name: </label>
                    <input type="text" name="adopter_Lname" id="adopter_Lname" class="form-control"  value ="{{ $adopter->adopter_Lname }}">
                </div>
                <div class="form-group">
                    <label for="adopter_Address">Address: </label>
                    <input type="text" name="adopter_Address" id="adopter_Address" class="form-control"  value ="{{ $adopter->adopter_Address }}">
                </div>
                <div class="form-group">
                    <label for="adopter_Contact">Contact: </label>
                    <input type="text" name="adopter_Contact" id="adopter_Contact" class="form-control"  value ="{{ $adopter->adopter_Contact }}">
                </div>

                <div class="form-group">
                    <label for="adopter_Email">Email: </label>
                    <input type="text" name="adopter_Email" id="adopter_Email" class="form-control" value ="{{ $adopter->adopter_Email}}">
                </div>
                <div class="form-group">
                    <label for="img">Adopter Image: </label>
                    <input type="file" name="img" id="img" class="form-control" value ="{{ $adopter->img}}">
                </div>

               {{--   <input type="hidden"  id="id" name="id" value=""> --}}

                 <input type="hidden" name="id" value="{{ $adopter->id }}" id="adopterid">
                   <input id="update-btn" type="submit" value="Update" class="btn btn-primary">
                  <a href="{{url()->previous()}}" class="btn btn-default" role="button">Cancel</a>
             </form>

        </div>
    </div>
  </div>
  
 <div class="modal fade" id="myModal" role="dialog" style="display:none">
    <div class="modal-dialog modal-lg" >
        <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Register Adopter</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="alert alert-danger" style="display:none"></div>
                <form id="cform" method="post" action="#" >
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="form-group"> 
                        <label for="fname" class="control-label">First name</label>
                        <input type="text" class="form-control " id="fname" name="adopter_Fname" value="{{old('adopter_Fname')}}" ></text>
                        @if($errors->has('adopter_Fname'))
                            <small>{{ $errors->first('adopter_Fname') }}</small>
                        @endif
                    </div> 
                    <div class="form-group"> 
                        <label for="lname" class="control-label">Last Name</label>
                        <input type="text" class="form-control " id="lname" name="adopter_Lname" value="{{old('adopter_Lname')}}">
                        @if($errors->has('adopter_Lname'))
                        <small>{{ $errors->first('adopter_Lname') }}</small>
                        @endif
                    </div>

                    <div class="form-group"> 
                        <label for="address" class="control-label">Address</label>
                        <input type="text" class="form-control" id="address" name="adopter_Address" value="{{old('adopter_Address')}}">
                        @if($errors->has('adopter_Address'))
                        <small>{{ $errors->first('adopter_Address') }}</small>
                        @endif
                    </div>

                    
                    <div class="form-group"> 
                        <label for="contact" class="control-label">Contact</label>
                        <input type="text" class="form-control" id="contact" name="adopter_Contact" value="{{old('adopter_Contact')}}">
                        @if($errors->has('adopter_Contact'))
                        <small>{{ $errors->first('adopter_Contact') }}</small>
                        @endif
                    </div>

                     <div class="form-group"> 
                        <label for="email" class="control-label">Email</label>
                        <input type="email" class="form-control" id="email" name="adopter_Email" value="{{old('adopter_Email')}}">
                        @if($errors->has('adopter_Email'))
                        <small>{{ $errors->first('adopter_Email') }}</small>
                        @endif
                    </div>

                     <div class="form-group"> 
                        <label for="password" class="control-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" value="{{old('password')}}">
                        @if($errors->has('password'))
                        <small>{{ $errors->first('password') }}</small>
                        @endif
                    </div>

                    <div class="form-group"> 
                      <label for="img" class="control-label">Image</label>
                      <input type="file" class="form-control" id="img" name="uploads" />
                    </div>

                    <input type="hidden"  id="adopter" name="adopter" value="unverified">

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button id="myFormSubmit" type="submit" class="btn btn-primary">Register</button>
            </div>
        </div>
    </div>
</div>
@endsection   