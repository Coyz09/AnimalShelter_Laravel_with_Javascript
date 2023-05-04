<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Personnel;
use Response;
use Storage;
use View;
use DB;
use Log;
use Validator;

class PersonnelController extends Controller
{
    
   public function index(Request $request)
    {  
        return View::make('personnel.index');
    }

     public function getPersonnelAll()
    {  
           $data = Personnel::orderBy('id','DESC')->get();
            return response()->json($data);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
         $validator = Validator::make($request->all(),[
            'personnel_Fname' => 'required|alpha|min:2|max:20',
            'personnel_Lname' => 'required|alpha|min:2|max:20',
            'personnel_Job' => 'required',
            'personnel_Contact' => 'required|numeric',
            'uploads' => 'required|image|mimes:jpg,png,gif,jpeg,jfif,svg|max:2048',
          ]);

        if ($validator->fails())
         {
            return response()->json(['errors'=>$validator->errors()->all()]);
         }
        else{
        $personnel = new Personnel;
        $personnel->personnel_Fname = $request->personnel_Fname;
        $personnel->personnel_Lname = $request->personnel_Lname;
        $personnel->personnel_Job= $request->personnel_Job;
        $personnel->personnel_Contact= $request->personnel_Contact;
      
        $files = $request->file('uploads');
        $personnel->img = 'storage/images/'.$files->getClientOriginalName();
        $personnel->save();
        $data=array('status' => 'saved');
        Storage::put('public/images/'.$files->getClientOriginalName(),file_get_contents($files));
        return response()->json(["success" => "personnel created successfully.","personnel" => $personnel,"status" => 200]);
        }
    }
     public function show($id) 
    { 
        $personnel = Personnel::findorFail($id); 
        return response()->json($item);
     }

    public function edit($id)
    {
        $personnel = Personnel::find($id);
         return response()->json($personnel);
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
            'personnel_Fname' => 'required|alpha|min:2|max:20',
            'personnel_Lname' => 'required|alpha|min:2|max:20',
            'personnel_Job' => 'required',
            'personnel_Contact' => 'numeric',
          ]);

        if ($validator->fails())
         {
            return response()->json(['errors'=>$validator->errors()->all()]);
         }
        else{
        $personnel = Personnel::find($id);
        $personnel = $personnel->update($request->all());
        $personnel = Personnel::find($id);
        return response()->json($personnel);
        }
    }

   
    public function destroy($id)
    {
        $personnel = Personnel::findOrFail($id);
        $personnel->delete();
        return response()->json(["success" => "Personnel successfully deleted.","data" => $personnel,"status" => 200]);
    
    }

    public function getLogout(){
        Auth::logout();
        return redirect()->guest('/');
    }

    public function getRequestsAll(Request $request){   
        if ($request->ajax()){
      $requests = DB::table('adopters')->where('isApproved' , 0)->get();
      return response()->json($requests);
    }
    }

    public function showRequests(){
         return View::make('requests.request');
    }

     public function acceptrequest($id)
    {
        // 
        $req = DB::table('adopters')->select('*')->whereRaw('id = '.$id.'');
        $req->update(['isApproved' => 1]);

        
        return response()->json($req);
    }
 


}
