<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rescuer;
use Response;
use Storage;
use View;
use DB;
use Log;
use Validator;

class RescuerController extends Controller
{
    
    public function index(Request $request)
    {  
        return View::make('rescuer.index');
    }
   
    public function getRescuerAll()
    {  
           $data = Rescuer::orderBy('id','DESC')->get();
            return response()->json($data);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
         $validator = Validator::make($request->all(),[
           'rescuer_Fname' => 'required|alpha|min:2|max:20',
            'rescuer_Lname' => 'required|alpha|min:2|max:20',
            'rescuer_Age' => 'numeric|min:1|max:99',
            'rescuer_Address' => 'required|min:5|max:1000',
            'rescuer_Contact' => 'numeric',
            'rescuer_Email' => 'required|email',
            'uploads' => 'required|image|mimes:jpg,png,gif,jpeg,jfif,svg|max:2048',
          ]);

        if ($validator->fails())
         {
            return response()->json(['errors'=>$validator->errors()->all()]);
         }
        else{
        $rescuer = new Rescuer;
        $rescuer->rescuer_Fname = $request->rescuer_Fname;
        $rescuer->rescuer_Lname = $request->rescuer_Lname;
        $rescuer->rescuer_Age= $request->rescuer_Age;
        $rescuer->rescuer_Address= $request->rescuer_Address;
        $rescuer->rescuer_Contact= $request->rescuer_Contact;
        $rescuer->rescuer_Email= $request->rescuer_Email;

      
        $files = $request->file('uploads');
        $rescuer->img = 'storage/images/'.$files->getClientOriginalName();
        $rescuer->save();
        $data=array('status' => 'saved');
        Storage::put('public/images/'.$files->getClientOriginalName(),file_get_contents($files));
        return response()->json(["success" => "Rescuer created successfully.","rescuer" => $rescuer,"status" => 200]);
        }
    }
    
     public function show($id) 
    { 
        $rescuer = Rescuer::findorFail($id); 
        return response()->json($rescuer);
     }

    public function edit($id)
    {
        $rescuer = Rescuer::find($id);
         return response()->json($rescuer);
    }

  
    public function update(Request $request, $id)
    {
       //  $personnel = Personnel::findOrFail($request->id);
       //  $files = $request->file('uploads');
       //  $personnels->img = 'storage/images/'.$files->getClientOriginalName();
     
       //  $personnels->save();
       //  $data=array('status' => 'saved');
       // // $request['img'] = 'storage/images/'.$files->getClientOriginalName();
       //  $personnel->update($request->all());
       //  $personnel = Personnel::find($id);
       //  Storage::put('public/images/'.$files->getClientOriginalName(),file_get_contents($files));
       //   return response::json($personnel,200);
        $validator = Validator::make($request->all(),[
           'rescuer_Fname' => 'required|alpha|min:2|max:20',
            'rescuer_Lname' => 'required|alpha|min:2|max:20',
            'rescuer_Age' => 'numeric|min:1|max:99',
            'rescuer_Address' => 'required|min:5|max:1000',
            'rescuer_Contact' => 'numeric',
            'rescuer_Email' => 'required|email',
          ]);

        if ($validator->fails())
         {
            return response()->json(['errors'=>$validator->errors()->all()]);
         }
        else{
        $rescuer = Rescuer::find($id);
        $rescuer = $rescuer->update($request->all());
        $rescuer = Rescuer::find($id);
        return response()->json($rescuer);
        }
    }

   
    public function destroy($id)
    {
        $rescuer = Rescuer::findOrFail($id);
        $rescuer->delete();
        return response()->json(["success" => "Rescuer successfully deleted.","data" => $rescuer,"status" => 200]);
    
    }
}
