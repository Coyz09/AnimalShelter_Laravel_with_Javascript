@extends('layouts.adopterbase')
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
          <th>Adopter ID</th>
          <th>Adopter Fname</th>
          <th>Adopter Lname</th>
          <th>Adopter Address</th>
          <th>Adopter Contact</th>
          <th>Adopter Email</th>
          <th>Adopter Image</th>
          <th>Adopter Status</th>
          <th class="actionsCol">Actions</th>

          </tr>
      </thead>
      <tbody id="cbody">
      </tbody>
      <tfoot>
       
          <th>Adopter ID</th>
          <th>Adopter Fname</th>
          <th>Adopter Lname</th>
          <th>Adopter Address</th>
          <th>Adopter Contact</th>
          <th>Adopter Email</th>
          <th>Adopter Image</th>  
          <th>Adopter Status</th>  
      </tfoot>

    </table>
  </div>
</div>
</div>
<div class="modal fade" id="myModal" role="dialog" style="display:none">
    <div class="modal-dialog modal-lg" >
        <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Create new Adopter</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">  
                  <div class="alert alert-danger" style="display:none"></div>
                <form id="cform" method="post" action="#" >
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="form-group"> 
                        <label for="fname" class="control-label">First name</label>
                        <input type="text" class="form-control " id="fname" name="adopter_Fname" value="{{old('adopter_Fname')}}" ></text>

                    </div> 
                    <div class="form-group"> 
                        <label for="lname" class="control-label">Last Name</label>
                        <input type="text" class="form-control " id="lname" name="adopter_Lname" value="{{old('adopter_Lname')}}">
                    </div>

                    <div class="form-group"> 
                        <label for="address" class="control-label">Address</label>
                        <input type="text" class="form-control" id="address" name="adopter_Address" value="{{old('adopter_Address')}}">
                    </div>

                    
                    <div class="form-group"> 
                        <label for="contact" class="control-label">Contact</label>
                        <input type="text" class="form-control" id="contact" name="adopter_Contact" value="{{old('adopter_Contact')}}">
                    </div>

                     <div class="form-group"> 
                        <label for="email" class="control-label">Email</label>
                        <input type="email" class="form-control" id="email" name="adopter_Email" value="{{old('adopter_Email')}}">
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
              <h4 class="modal-title">Update adopter</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
      <div class="modal-body">
          <div class="alert alert-danger" style="display:none"></div>
        <form id="updateform" method="#" action="#" enctype="multipart/form-data">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">

   
          <div class="form-group"> 
            <label for="efname" class="control-label">First Name</label>
            <input type="text" class="form-control " id="efname" name="adopter_Fname" >
               @if($errors->has('adopter_Fname'))
                  <small>{{ $errors->first('adopter_Fname') }}</small>
              @endif
          </div>

          <div class="form-group"> 
            <label for="elname" class="control-label">Last name</label>
            <input type="text" class="form-control " id="elname" name="adopter_Lname"  >
              @if($errors->has('adopter_Lname'))
                <small>{{ $errors->first('adopter_Lname') }}</small>
               @endif
         </div>

          <div class="form-group"> 
                <label for="eaddress" class="control-label">Address</label>
                <input type="text" class="form-control" id="eaddress" name="adopter_Address">
                  @if($errors->has('adopter_Address'))
                    <small>{{ $errors->first('adopter_Address') }}</small>
                  @endif
          </div>

           <div class="form-group"> 
                <label for="econtact" class="control-label">Contact</label>
                <input type="text" class="form-control" id="econtact" name="adopter_Contact">
                  @if($errors->has('adopter_Contact'))
                    <small>{{ $errors->first('adopter_Contact') }}</small>
                  @endif
          </div>

           <div class="form-group"> 
            <label for="eemail" class="control-label">Email</label>
            <input type="text" class="form-control " id="eemail" name="adopter_Email"  >
              @if($errors->has('adopter_Email'))
                <small>{{ $errors->first('adopter_Email') }}</small>
               @endif
         </div>
        {{--    <div class="form-group"> 
                          {!!Form::label('status:')!!}
                            <div class="radio">
                               {!! Form::radio('', '',false, ['id' => 'estatus']) !!}
                               {!! Form::radio('status', 'activated',false, ['id' => 'estatus']) !!}
                               {!! Form::label('activated', 'activated') !!}
                               {!! Form::radio('status', 'unverified',false,['id' => 'estatus']) !!}
                               {!! Form::label('unverified', 'unverified') !!}   
                            </div>  
                            @if($errors->has('status'))
                                <a>{{ $errors->first('status') }}</a>
                             @endif    
                        </div> --}}
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