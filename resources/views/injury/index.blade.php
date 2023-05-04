@extends('layouts.injurybase')
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
          <th>Injury ID</th>
          <th>Injury Name</th>
          <th class="actionsCol">Actions</th>

          </tr>
      </thead>
      <tbody id="cbody">
      </tbody>
      <tfoot>
       
          <th>Injury ID</th>
          <th>Injury Name</th> 
      </tfoot>

    </table>
  </div>
</div>
</div>
<div class="modal fade" id="myModal" role="dialog" style="display:none">
    <div class="modal-dialog modal-lg" >
        <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Add new Injury</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="alert alert-danger" style="display:none"></div>
                <form id="cform" method="post" action="#" >
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="form-group"> 
                        <label for="name" class="control-label">Injury Name</label>
                        <input type="text" class="form-control " id="name" name="injury_Name" value="{{old('injury_Name')}}" ></text>
                       
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
              <h4 class="modal-title">Update Injury</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
      <div class="modal-body">
         <div class="alert alert-danger" style="display:none"></div>
        <form id="updateform" method="#" action="#" enctype="multipart/form-data">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">

   
          <div class="form-group"> 
            <label for="ename" class="control-label">First Name</label>
            <input type="text" class="form-control " id="ename" name="injury_Name" >
               @if($errors->has('injury_Name'))
                  <small>{{ $errors->first('injury_Name') }}</small>
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