@extends('layouts.animalbase')
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
          <th>Animal ID</th>
          <th>Animal Name</th>
          <th>Animal Type</th>
          <th>Animal Breed</th>
          <th>Animal Age</th>
          <th>Animal Rescuedate</th>
          <th>Animal Rescueplace</th>   
          <th>Animal Image</th>
          <th class="actionsCol">Actions</th>

          </tr>
      </thead>
      <tbody id="cbody">
      </tbody>
      <tfoot>
       
          <th>Animal ID</th>
          <th>Animal Name</th>
          <th>Animal Type</th>
          <th>Animal Breed</th>
          <th>Animal Age</th>
          <th>Animal Rescuedate</th>
          <th>Animal Rescueplace</th>   
          <th>Animal Image</th>
      </tfoot>

    </table>
  </div>
</div>
</div>
<div class="modal fade" id="myModal" role="dialog" style="display:none">
    <div class="modal-dialog modal-lg" >
        <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Create new Animal</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="alert alert-danger" style="display:none"></div>
                <form id="cform" method="post" action="#" >
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="form-group"> 
                        <label for="name" class="control-label">Animal Name</label>
                        <input type="text" class="form-control " id="name" name="animal_Name" value="{{old('animal_Name')}}" ></text>
                        @if($errors->has('animal_Name'))
                            <small>{{ $errors->first('animal_Name') }}</small>
                        @endif
                    </div> 

                     <div class="form-group"> 
                          {!!Form::label('Animal Type:')!!}
                            <div class="radio">
                               {!! Form::radio('animal_Type', 'DOG',false, ['id' => 'animal_Type']) !!}
                               {!! Form::label('dog', 'DOG') !!}
                               {!! Form::radio('animal_Type', 'CAT',false,['id' => 'animal_Type']) !!}
                               {!! Form::label('cat', 'CAT') !!}   
                            </div>  
                            @if($errors->has('animal_Type'))
                                <a>{{ $errors->first('animal_Type') }}</a>
                             @endif    
                        </div>
                      
                    <div class="form-group"> 
                        <label for="breed" class="control-label">Animal Breed</label>
                        <input type="text" class="form-control " id="breed" name="animal_Breed" value="{{old('animal_Breed')}}">
                        @if($errors->has('animal_Breed'))
                        <small>{{ $errors->first('animal_Breed') }}</small>
                        @endif
                    </div>

                    <div class="form-group"> 
                        <label for="age" class="control-label">Animal Age</label>
                        <input type="text" class="form-control" id="age" name="animal_Age" value="{{old('animal_Age')}}">
                        @if($errors->has('animal_Age'))
                        <small>{{ $errors->first('animal_Age') }}</small>
                        @endif
                    </div>

                     <div class="form-group"> 
                        <label for="place" class="control-label">Animal Rescueplace</label>
                        <input type="place" class="form-control" id="place" name="animal_Rescueplace" value="{{old('animal_Rescueplace')}}">
                        @if($errors->has('animal_Rescueplace'))
                        <small>{{ $errors->first('animal_Rescueplace') }}</small>
                        @endif
                    </div>

                    <div class="form-group"> 
                        <label for="date" class="control-label">Animal Rescuedate</label>
                        <input type="date" class="form-control" id="date" name="animal_Rescuedate" value="{{old('animal_Rescuedate')}}">
                        @if($errors->has('animal_Rescuedate'))
                        <small>{{ $errors->first('animal_Rescuedate') }}</small>
                        @endif
                    </div>

                    
                    <div class="form-group"> 
                      <label for="animal_Image" class="control-label">Animal Image</label>
                      <input type="file" class="form-control" id="animal_Image" name="uploads" />
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
              <h4 class="modal-title">Update animal</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
      <div class="modal-body">
        <div class="alert alert-danger" style="display:none"></div>
        <form id="updateform" method="#" action="#" enctype="multipart/form-data">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">

   
          <div class="form-group"> 
            <label for="ename" class="control-label">Animal Name</label>
            <input type="text" class="form-control " id="ename" name="animal_Name" >
               @if($errors->has('animal_Name'))
                  <small>{{ $errors->first('animal_Name') }}</small>
              @endif
          </div>

         {{--  <div class="form-group"> 
            <label for="etype" class="control-label">Animal Type</label>
            <input type="text" class="form-control " id="etype" name="animal_Type"  >
              @if($errors->has('animal_Type'))
                <small>{{ $errors->first('animal_Type') }}</small>
               @endif
         </div>
 --}}
         <div class="form-group"> 
                          {!!Form::label('Animal Type:')!!}
                            <div class="radio">
                               {!! Form::radio('', '',false, ['id' => 'etype']) !!}
                               {!! Form::radio('animal_Type', 'DOG',false, ['id' => 'etype']) !!}
                               {!! Form::label('dog', 'DOG') !!}
                               {!! Form::radio('animal_Type', 'CAT',false,['id' => 'etype']) !!}
                               {!! Form::label('cat', 'CAT') !!}   
                            </div>  
                            @if($errors->has('animal_Type'))
                                <a>{{ $errors->first('animal_Type') }}</a>
                             @endif    
                        </div>

          <div class="form-group"> 
                <label for="ebreed" class="control-label">Animal Breed</label>
                <input type="text" class="form-control" id="ebreed" name="animal_Breed">
                @if($errors->has('animal_Breed'))
                <small>{{ $errors->first('animal_Breed') }}</small>
               @endif
          </div>

           <div class="form-group"> 
                <label for="eage" class="control-label">Animal Age</label>
                <input type="text" class="form-control" id="eage" name="animal_Age">
                  @if($errors->has('animal_Age'))
                    <small>{{ $errors->first('animal_Age') }}</small>
                  @endif
          </div>

          <div class="form-group"> 
            <label for="eplace" class="control-label">Animal Rescueplace</label>
            <input type="text" class="form-control " id="eplace" name="animal_Rescueplace"  >
              @if($errors->has('animal_Rescueplace'))
                <small>{{ $errors->first('animal_Rescueplace') }}</small>
               @endif
         </div>

           <div class="form-group"> 
            <label for="edate" class="control-label">Animal RescueDate</label>
            <input type="date" class="form-control " id="edate" name="animal_Rescuedate"  >
              @if($errors->has('animal_Rescuedate'))
                <small>{{ $errors->first('animal_Rescuedate') }}</small>
               @endif
          </div>

         
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