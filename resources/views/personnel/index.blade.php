@extends('layouts.personnelbase')
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
          <th>Personnel ID</th>
          <th>Personnel Fname</th>
          <th>Personnel Lname</th>
          <th>Personnel Job</th>
          <th>Personnel Contact</th>
          <th>Personnel Image</th>
          <th class="actionsCol">Actions</th>

          </tr>
      </thead>
      <tbody id="cbody">
      </tbody>
      <tfoot>
       
          <th>Personnel ID</th>
          <th>Personnel Fname</th>
          <th>Personnel Lname</th>
          <th>Personnel Job</th>
          <th>Personnel Contact</th>
          <th>Personnel Image</th>
      
      </tfoot>

    </table>
  </div>
</div>
</div>
<div class="modal fade" id="myModal" role="dialog" style="display:none">
    <div class="modal-dialog modal-lg" >
        <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Create new personnel</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
               <div class="alert alert-danger" style="display:none"></div>
                <form id="cform" method="post" action="#" >
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                   {{-- Job --}}
                    <div class="form-group"> 
                        <label for="fname" class="control-label">First name</label>
                        <input type="text" class="form-control " id="fname" name="personnel_Fname" value="{{old('personnel_Fname')}}" ></text>
                        @if($errors->has('personnel_Fname'))
                            <small>{{ $errors->first('personnel_Fname') }}</small>
                        @endif
                    </div> 
                    <div class="form-group"> 
                        <label for="lname" class="control-label">Last Name</label>
                        <input type="text" class="form-control " id="lname" name="personnel_Lname" value="{{old('personnel_Lname')}}">
                        @if($errors->has('personnel_Lname'))
                        <small>{{ $errors->first('personnel_Lname') }}</small>
                        @endif
                    </div>
                    {{-- <div class="form-group"> 
                        <label for="job" class="control-label">Job</label>
                        <input type="text" class="form-control" id="job" name="personnel_Job" value="{{old('addressline')}}">
                        @if($errors->has('addressline'))
                        <small>{{ $errors->first('addressline') }}</small>
                        @endif
                    </div> --}}

                     <div class="form-group"> 
                          {!!Form::label('Job:')!!}
                            <div class="radio">
                               {!! Form::radio('personnel_Job', 'Employee',false, ['id' => 'job']) !!}
                               {!! Form::label('employee', 'Employee') !!}

                               {!! Form::radio('personnel_Job', 'Veterinarian',false,['id' => 'job']) !!}
                               {!! Form::label('veterinarian', 'Veterinarian') !!}   

                               {!! Form::radio('personnel_Job', 'Volunteer',false,['id' => 'job']) !!}
                               {!! Form::label('volunteer', 'Volunteer') !!}   

                            </div>
                             @if($errors->has('personnel_Job'))
                              <a>{{ $errors->first('personnel_Job') }}</a>
                             @endif 
                        </div>
                    
                    <div class="form-group"> 
                        <label for="contact" class="control-label">Contact</label>
                        <input type="text" class="form-control" id="contact" name="personnel_Contact" value="{{old('personnel_Contact')}}">
                        @if($errors->has('personnel_Contact'))
                        <small>{{ $errors->first('personnel_Contact') }}</small>
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
              <h4 class="modal-title">Update customer</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
      <div class="modal-body">
         <div class="alert alert-danger" style="display:none"></div>
        <form id="updateform" method="#" action="#" enctype="multipart/form-data">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">

   
          <div class="form-group"> 
            <label for="efname" class="control-label">First Name</label>
            <input type="text" class="form-control " id="efname" name="personnel_Fname" >
               @if($errors->has('personnel_Fname'))
                  <small>{{ $errors->first('personnel_Fname') }}</small>
              @endif
          </div>

          <div class="form-group"> 
            <label for="elname" class="control-label">Last name</label>
            <input type="text" class="form-control " id="elname" name="personnel_Lname"  >
              @if($errors->has('personnel_Lname'))
                <small>{{ $errors->first('personnel_Lname') }}</small>
               @endif
         </div>
    
           <div class="form-group"> 
                          {!!Form::label('Job:')!!}
                            <div class="radio">

                              {!! Form::radio('', '',false, ['id' => 'ejob']) !!}
                               {!! Form::label('')!!}

                               {!! Form::radio('personnel_Job', 'Employee',false, ['id' => 'ejob']) !!}
                               {!! Form::label('employee', 'Employee') !!}

                               {!! Form::radio('personnel_Job', 'Veterinarian',false,['id' => 'ejob']) !!}
                               {!! Form::label('veterinarian', 'Veterinarian') !!}   

                               {!! Form::radio('personnel_Job', 'Volunteer',false,['id' => 'ejob']) !!}
                               {!! Form::label('volunteer', 'Volunteer') !!}   

                            </div>
                             @if($errors->has('personnel_Job'))
                              <a>{{ $errors->first('personnel_Job') }}</a>
                             @endif 
                        </div>

           <div class="form-group"> 
                <label for="econtact" class="control-label">Contact</label>
                <input type="text" class="form-control" id="econtact" name="personnel_Contact">
                  @if($errors->has('personnel_Contact'))
                    <small>{{ $errors->first('personnel_Contact') }}</small>
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