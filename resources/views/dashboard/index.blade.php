@extends('layouts.chartbase')
@section('body')
  
<div  class="container">
   <div class="row">
      <div  class="col-sm-15 col-md-15">    
      <h2>Adopted Animal Demographics</h2>    
       Start: <input id="start" type="date">  End:<input id="end" type="date">
      {{--  <input type="text" class="form-control" name="datepicker" id="datepicker" placeholder="Select Date" /> --}}
       <button id="filter">Filter</button>
       <button id="reset">Reset</button> <br>
       <canvas id="myChart"></canvas>
       
      </div>


     
      <div  class="col-sm-15 col-md-15">     
     <h2>Rescued Animal Demographics</h2> 
       Start: <input id="start2" type="date">  End:<input id="end2" type="date">
       <button id="filter2">Filter</button>
       <button id="reset2">Reset</button> <br>
       <canvas id="myChart2"></canvas>
      </div>
    </div>
</div>

@endsection