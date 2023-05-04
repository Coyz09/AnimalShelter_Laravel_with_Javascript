<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Adopter;
use App\Models\User;
use Response;
use Storage;
use View;
use DB;
use Log;
use Validator;
use Auth;


class AdopterController extends Controller
{
    
    public function index()
    {
         return View::make('adopter.index');
    }

     public function getAdopterAll()
    {  
           $data = Adopter::orderBy('id','DESC')->get();
            return response()->json($data);
    }

    
    public function create()
    {
        //
    }

   public function store(Request $request)
    {   
        $validator = Validator::make($request->all(),[
            'adopter_Fname' => 'required|alpha|min:2|max:20',
            'adopter_Lname' => 'required|alpha|min:2|max:20',
            'adopter_Address' => 'required|min:5|max:1000',
            'adopter_Contact' => 'numeric',
            'adopter_Email' => 'required|email',
            'uploads' => 'required|image|mimes:jpg,png,gif,jpeg,jfif,svg|max:2048',
          ]);

        if ($validator->fails())
         {
            return response()->json(['errors'=>$validator->errors()->all()]);
         }
        else{
        $adopter = new Adopter;
        $adopter->adopter_Fname = $request->adopter_Fname;
        $adopter->adopter_Lname = $request->adopter_Lname;
        $adopter->adopter_Address= $request->adopter_Address;
        $adopter->adopter_Contact= $request->adopter_Contact;
        $adopter->adopter_Email= $request->adopter_Email;
      
        $files = $request->file('uploads');
        $adopter->img = 'storage/images/'.$files->getClientOriginalName();
        $adopter->save();
        $data=array('status' => 'saved');
        Storage::put('public/images/'.$files->getClientOriginalName(),file_get_contents($files));
        return response()->json(["success" => "Adopter created successfully.","adopter" => $adopter,"status" => 200]);
         }
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'adopter_Fname' => 'required|alpha|min:2|max:20',
            'adopter_Lname' => 'required|alpha|min:2|max:20',
            'adopter_Address' => 'required|min:5|max:1000',
            'adopter_Contact' => 'numeric',
            'adopter_Email' => 'required|email',
            'uploads' => 'required|image|mimes:jpg,png,gif,jpeg,jfif,svg|max:2048',
          ]);

        if ($validator->fails())
         {
            return response()->json(['errors'=>$validator->errors()->all()]);
         }
        else{
        $user = new User([
            'name' => $request->adopter_Fname.' '.$request->adopter_Lname,
            'email' => $request->adopter_Email,
            'password' => bcrypt($request->password),
             
        ]);
        $user->role = "adopter";
        $user->save();

        $adopter = new Adopter; 
        $adopter->adopter_Fname = $request->adopter_Fname;
        $adopter->adopter_Lname = $request->adopter_Lname;
        $adopter->adopter_Address= $request->adopter_Address;
        $adopter->adopter_Contact= $request->adopter_Contact;
        $adopter->adopter_Email= $request->adopter_Email;
        $adopter->status ="unverified";
        $adopter->user_id = $user->id;
        $files = $request->file('uploads');
        $adopter->img = 'storage/images/'.$files->getClientOriginalName();
        $adopter->save();
        $data=array('status' => 'saved');
        Storage::put('public/images/'.$files->getClientOriginalName(),file_get_contents($files));

         
        return response()->json(["success" => "Adopter register successfully.","adopter" => $adopter,"status" => 200]);
        }
    }

     public function showprofile()
    {
        Auth::check();
        if(auth()->user()->role == 'adopter'){
        $adopter = Adopter::where('user_id',Auth::id())->first(); 
        return view('adopter.profile',compact('adopter'));
    }
        else if(auth()->user()->role == 'personnel'){
        $personnel = Personnel::where('user_id',Auth::id())->first(); 
        return view('adopter.profile',compact('personnel'));
    }
    }

     public function editprofile($id)
    {
        $adopter = Adopter::find($id);
        return view('adopter.editprofile',compact('adopter'));
    }




    
    public function show($id) 
    { 
        $adopter = Adopter::findorFail($id); 
        return response()->json($adopter);
     }

    public function edit($id)
    {
        $adopter = Adopter::find($id);
         return response()->json($adopter);
    }


    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(),[
            'adopter_Fname' => 'required|alpha|min:2|max:20',
            'adopter_Lname' => 'required|alpha|min:2|max:20',
            'adopter_Address' => 'required|min:5|max:1000',
            'adopter_Contact' => 'numeric',
            'adopter_Email' => 'required|email',
          ]);

        if ($validator->fails())
         {
            return response()->json(['errors'=>$validator->errors()->all()]);
         }
        else{
        // $user = User::find($id);
        // $user = $user->update($request->status);
        $adopter = Adopter::find($id);
        $adopter = $adopter->update($request->all());
        $adopter = Adopter::find($id);
        return response()->json($adopter);
        }
    }

     public function updateprofile(Request $request, $id)
    {
        $adopter = Adopter::find($id);
        $adopter->adopter_Fname = $request->adopter_Fname;
           $adopter->adopter_Lname = $request->adopter_Lname;
           $adopter->adopter_Address = $request->adopter_Address;
           $adopter->adopter_Contact = $request->adopter_Contact;
           $adopter->adopter_Email= $request->adopter_Email;
          

        $files = $request->file('img');
        $adopter->img = 'storage/images/'.$files->getClientOriginalName();
        
        $adopter->save();
        $data=array('status' => 'saved');
        Storage::put('public/images/'.$files->getClientOriginalName(),file_get_contents($files));
        return response()->json($adopter);  
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function destroy($id)
    {
        $adopter = Adopter::findOrFail($id);
        $adopter->delete();
     return response()->json(["success" => "Adopter successfully deleted.","data" => $adopter,"status" => 200]);
    
    }


   public function getLogout(){
        Auth::logout();
        return redirect()->guest('/');
    }
   
}
