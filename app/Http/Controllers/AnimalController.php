<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Animal;
use Response;
use Storage;
use View;
use DB;
use Log;
USE Validator;
class AnimalController extends Controller
{

    public function index()
    {
       return View::make('animal.index');
    }

    public function getAnimalAll()
    {  
           $data = Animal::orderBy('id','DESC')->get();
            return response()->json($data);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {   $validator = Validator::make($request->all(),[
            'animal_Name' => 'required|alpha|min:2|max:20',
            'animal_Type' => 'required',
            'animal_Breed' => 'required',
            'animal_Age' => 'numeric|min:1|max:99',
            'animal_Rescueplace' => 'required',
            'animal_Rescuedate' => 'required',
            // 'animal_Image' => 'required|image|mimes:jpg,png,gif,jpeg,jfif,svg|max:2048',
          ]);

        if ($validator->fails())
         {
            return response()->json(['errors'=>$validator->errors()->all()]);
         }
        else{
        $animal = new Animal;
        $animal->animal_Name = $request->animal_Name;
        $animal->animal_Type = $request->animal_Type;
        $animal->animal_Breed= $request->animal_Breed;
        $animal->animal_Age= $request->animal_Age;
        $animal->animal_Rescueplace= $request->animal_Rescueplace;
        $animal->animal_Rescuedate= $request->animal_Rescuedate;
        $animal->adoption_Status= "Adoptable";

        $files = $request->file('uploads');
        $animal->animal_Image = 'storage/images/'.$files->getClientOriginalName();
        $animal->save();


        $data=array('status' => 'saved');
        Storage::put('public/images/'.$files->getClientOriginalName(),file_get_contents($files));
        return response()->json(["success" => "Animal created successfully.","animal" => $animal,"status" => 200]);
    }
    }

   
    public function show($id)
    {
        
        $animal = Animal::findorFail($id); 
        return response()->json($animal);
    }

    
    public function edit($id)
    {
        
        $animal = Animal::find($id); 
        return response()->json($animal);
    }

   
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(),[
            'animal_Name' => 'required|alpha|min:2|max:20',
            'animal_Type' => 'required',
            'animal_Breed' => 'required',
            'animal_Age' => 'numeric|min:1|max:99',
            'animal_Rescueplace' => 'required',
            'animal_Rescuedate' => 'required',
          ]);

        if ($validator->fails())
         {
            return response()->json(['errors'=>$validator->errors()->all()]);
         }
        else{
        $animal = Animal::find($id);
        $animal = $animal->update($request->all());
        $animal = Animal::find($id);
        return response()->json($animal);
        }
    }

    
    public function destroy($id)
    {
        $animal = Animal::findOrFail($id);
        $animal->delete();
        return response()->json(["success" => "Animal successfully deleted.","data" => $animal,"status" => 200]);
    }
}
