@extends('layouts.rescuerbase')
@section('body')
  
  @if ($message = Session::get('success'))
    <div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button> 
          <strong>{{ $message }}</strong>
  </div>
  @endif

<div  class="container">
  <div  class="table-responsive">
    <table id="ctable" class="table table-striped table-hover">
      <thead>
        <tr>
          <th>Rescuer ID</th>
          <th>Rescuer Fname</th>
          <th>Rescuer Lname</th>
          <th>Rescuer Age</th>
          <th>Rescuer Address</th>
          <th>Rescuer Contact</th>
          <th>Rescuer Email</th>
          <th>Rescuer Image</th>
          <th class="actionsCol">Actions</th>

          </tr>
      </thead>
      <tbody id="cbody">
      </tbody>
      <tfoot>
          <th>Rescuer ID</th>
          <th>Rescuer Fname</th>
          <th>Rescuer Lname</th>
          <th>Rescuer Age</th>
          <th>Rescuer Address</th>
          <th>Rescuer Contact</th>
          <th>Rescuer Email</th>
          <th>Rescuer Image</th>   
      </tfoot>

    </table>
  </div>
</div>
</div>
<div class="modal fade" id="myModal" role="dialog" style="display:none">
    <div class="modal-dialog modal-lg" >
        <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Create new rescuer</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
               <div class="alert alert-danger" style="display:none"></div>
                <form id="cform" method="post" action="#" >
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
  
                    <div class="form-group"> 
                        <label for="fname" class="control-label">First name</label>
                        <input type="text" class="form-control " id="fname" name="rescuer_Fname" value="{{old('rescuer_Fname')}}" ></text>
                        @if($errors->has('rescuer_Fname'))
                            <small>{{ $errors->first('rescuer_Fname') }}</small>
                        @endif
                    </div> 
                    <div class="form-group"> 
                        <label for="lname" class="control-label">Last Name</label>
                        <input type="text" class="form-control " id="lname" name="rescuer_Lname" value="{{old('rescuer_Lname')}}">
                        @if($errors->has('rescuer_Lname'))
                        <small>{{ $errors->first('rescuer_Lname') }}</small>
                        @endif
                    </div>
                    <div class="form-group"> 
                        <label for="age" class="control-label">Age</label>
                        <input type="text" class="form-control" id="age" name="rescuer_Age" value="{{old('rescuer_Age')}}">
                        @if($errors->has('rescuer_Age'))
                        <small>{{ $errors->first('rescuer_Age') }}</small>
                        @endif
                    </div>

                    <div class="form-group"> 
                        <label for="address" class="control-label">Address</label>
                        <input type="text" class="form-control" id="address" name="rescuer_Address" value="{{old('rescuer_Address')}}">
                        @if($errors->has('rescuer_Address'))
                        <small>{{ $errors->first('rescuer_Address') }}</small>
                        @endif
                    </div>

                    <div class="form-group"> 
                        <label for="contact" class="control-label">Contact</label>
                        <input type="text" class="form-control" id="contact" name="rescuer_Contact" value="{{old('rescuer_Contact')}}">
                        @if($errors->has('rescuer_Contact'))
                        <small>{{ $errors->first('rescuer_Contact') }}</small>
                        @endif
                    </div>

                     <div class="form-group"> 
                        <label for="email" class="control-label">Email</label>
                        <input type="email" class="form-control" id="email" name="rescuer_Email" value="{{old('rescuer_Email')}}">
                        @if($errors->has('rescuer_Email'))
                        <small>{{ $errors->first('rescuer_Email') }}</small>
                        @endif
                    </div>
                    
                    <div class="form-group"> 
                      <label for="img" class="control-label">Image</label>
                      <input type="file" class="form-control" id="img" name="uploads" />
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button id="myFormSubmit" type="submit" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>


<!-- Modal content-->
<div class="modal fade" id="editModal" role="dialog" style="display:none">
  <div class="modal-dialog modal-lg" >
    <div class="modal-content">
      <div class="modal-header">
              <h4 class="modal-title">Update Rescuer</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
      <div class="modal-body">
         <div class="alert alert-danger" style="display:none"></div>
        <form id="updateform" method="#" action="#" enctype="multipart/form-data">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">

   
          <div class="form-group"> 
            <label for="efname" class="control-label">First Name</label>
            <input type="text" class="form-control " id="efname" name="rescuer_Fname" >
               @if($errors->has('rescuer_Fname'))
                  <small>{{ $errors->first('rescuer_Fname') }}</small>
              @endif
          </div>

          <div class="form-group"> 
            <label for="elname" class="control-label">Last name</label>
            <input type="text" class="form-control " id="elname" name="rescuer_Lname"  >
              @if($errors->has('rescuer_Lname'))
                <small>{{ $errors->first('rescuer_Lname') }}</small>
               @endif
         </div>

            <div class="form-group"> 
            <label for="eage" class="control-label">Age</label>
            <input type="text" class="form-control " id="eage" name="rescuer_Age"  >
              @if($errors->has('rescuer_Age'))
                <small>{{ $errors->first('rescuer_Age') }}</small>
               @endif
         </div>

         <div class="form-group"> 
            <label for="eaddress" class="control-label">Address</label>
            <input type="text" class="form-control " id="eaddress" name="rescuer_Address"  >
              @if($errors->has('rescuer_Address'))
                <small>{{ $errors->first('rescuer_Address') }}</small>
               @endif
         </div>


           <div class="form-group"> 
                <label for="econtact" class="control-label">Contact</label>
                <input type="text" class="form-control" id="econtact" name="rescuer_Contact">
                  @if($errors->has('rescuer_Contact'))
                    <small>{{ $errors->first('rescuer_Contact') }}</small>
                  @endif
          </div>

           <div class="form-group"> 
            <label for="eemail" class="control-label">Email</label>
            <input type="email" class="form-control " id="eemail" name="rescuer_Email"  >
              @if($errors->has('rescuer_Email'))
                <small>{{ $errors->first('rescuer_Email') }}</small>
               @endif
         </div>
{{-- 
          <div class="form-group"> 
             <label for="eimg" class="control-label">Image</label>
             <input type="text" class="form-control" id="eimg" name="uploads" />
              @if($errors->has('image'))
                    <small>{{ $errors->first('image') }}</small>
                  @endif
          </div> --}}

          <input type="hidden"  id="id" name="id" value="">
        </form>
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-default" data-bs-dismiss="modal">Close</button>
          <button id="updatebtn" type="submit" class="btn btn-primary">Update</button>
      </div>
    </div>
  </div>
</div>
@endsection