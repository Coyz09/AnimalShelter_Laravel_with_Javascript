<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Injury;
use Response;
use Storage;
use View;
use DB;
use Log;
use Validator;

class InjuryController extends Controller
{
    
    public function index()
    {
         return View::make('injury.index');
    }

    public function getInjuryAll()
    {  
           $data = Injury::orderBy('id','DESC')->get();
            return response()->json($data);
    }
   
    public function create()
    {
        //
    }

    public function store(Request $request)
    {   $validator = Validator::make($request->all(),[
              'injury_Name'=>'required',
          ]);

        if ($validator->fails())
         {
            return response()->json(['errors'=>$validator->errors()->all()]);
         }
        else{
        $injury = new Injury;
        $injury->injury_Name = $request->injury_Name;
        $injury->save();
        $data=array('status' => 'saved');
        return response()->json(["success" => "Injury added successfully.","injury" => $injury,"status" => 200]);
        }
    }

   
    public function show($id)
    {
         $injury = Injury::findorFail($id); 
        return response()->json($injury);
    }


    public function edit($id)
    {
         $injury = Injury::find($id); 
        return response()->json($injury);
    }

   
    public function update(Request $request, $id)
    {   $validator = Validator::make($request->all(),[
              'injury_Name'=>'required',
          ]);

        if ($validator->fails())
         {
            return response()->json(['errors'=>$validator->errors()->all()]);
         }
        else{
        $injury = Injury::find($id);
        $injury = $injury->update($request->all());
        $injury = Injury::find($id);
        return response()->json($injury);
     }
    }

   
    public function destroy($id)
    {
         $injury = Injury::findOrFail($id);
        $injury->delete();
        return response()->json(["success" => "Injury successfully deleted.","data" => $injury,"status" => 200]);
    }
}
