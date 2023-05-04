@extends('layouts.requestbase')
@section('body')
<div class="table-responsive">
<table class="table table-striped table-hover">
    <thead>
      <tr>
        <th>Adopter ID</th>
        <th>Adopter First Name</th>
        
        <th>Adopter Last Name</th>
        <th>Adopter Address</th>
        <th>Adopter Contact</th>
        <th>Adopter Email</th>
        <th>Adopter Image</th>

        <th>Action</th>
        </tr>
    </thead>
  
  </table>
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