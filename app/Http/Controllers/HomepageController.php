<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use View;
use Redirect;
use DB;
use App\Models\Adopter;
use App\Models\Injury;
use App\Models\Comment;
use Session;
use Validator;
use Askedio\Laravel5ProfanityFilter\ProfanityFilter;

class HomepageController extends Controller
{
  //    public function front()
  //   {
      
  //     $animals = DB::table('animals')
  //       ->select('animals.*')
  //       ->where('adoption_Status','Adoptable')->get();
  //       return view('homepage.front',compact('animals'));
  //   }
     public function animals(){

  		$animal_injuries = DB::table('animals')
              ->leftJoin('animal_injury','animal_injury.animal_id','=','animals.id')
              ->leftJoin('injuries','injuries.id','=','animal_injury.injury_id')
              ->select('animal_injury.animal_id','injuries.injury_Name')
              ->get();  


          $animals = DB::table('animals')
          ->select('animals.*')
          ->whereIn('adoption_Status',['Adopted'])->get();
          
   		 return view('homepage.animals',compact('animals','animal_injuries'));
  
    }

    public function homes(){

      $animal_injuries = DB::table('animals')
              ->leftJoin('animal_injury','animal_injury.animal_id','=','animals.id')
              ->leftJoin('injuries','injuries.id','=','animal_injury.injury_id')
              ->select('animal_injury.animal_id','injuries.injury_Name')
              ->get();  


          $animals = DB::table('animals')
          ->select('animals.*')
          ->whereIn('adoption_Status',['Adopted'])->get();
          
       return view('homepage.home',compact('animals','animal_injuries'));
  
    }

      public function getAnimalAll(Request $request){
            if ($request->ajax()){
                // $adopters = Adopter::with('animals')->select('*')->orderBy('id','DESC')->get();
                $animals = DB::table('animals')
                ->leftJoin('adopter_animal','adopter_animal.animal_id','=','animals.id')
                ->leftJoin('adopters','adopters.id','=', 'adopter_animal.adopter_id')
                ->select('animals.animal_Name','animals.animal_Type','animals.animal_Breed','animals.animal_Age','animals.animal_Rescueplace','animals.animal_Rescuedate','animals.animal_Image','animals.adoption_Status','adopters.adopter_Fname')
                ->orderBy('adopters.id','ASC')
                ->whereIn('animals.adoption_Status',['Adopted'])->get();
                return response()->json($animals);
             }
        }
     
   
      public function adopters(){
         // $adopter = Adopter::with('animals')->select('*')->orderBy('id','DESC')->get();
         // ,compact('adopter')
        return view('homepage.adopters');

    }

    public function getAdopterAll(Request $request){
            if ($request->ajax()){
                // $adopters = Adopter::with('animals')->select('*')->orderBy('id','DESC')->get();
                $adopters = DB::table('adopters')
                ->leftJoin('adopter_animal','adopter_animal.adopter_id','=','adopters.id')
                ->leftJoin('animals','animals.id','=', 'adopter_animal.animal_id')
                ->select('animals.animal_Name','adopters.adopter_Fname','adopters.adopter_Lname','adopters.adopter_Lname','adopters.adopter_Address','adopters.adopter_Contact','adopters.adopter_Email','adopters.img')
                ->orderBy('adopters.id','ASC')
                ->get();
                return response()->json($adopters);
             }
        }
 // public function animalshow($id)
 //    {
 //       $animal_injuries = DB::table('animals')
 //            ->leftJoin('animal_injury','animal_injury.animal_id','=','animals.id')
 //            ->leftJoin('injuries','injuries.id','=','animal_injury.injury_id')
 //            ->select('animal_injury.animal_id','injuries.injury_Name')
 //            ->get();  
 //        $animal = Animal::find($id); 

 //        $comment = Comment::with('animals')->get();
 //        return View::make('homepage.animalshow',compact('animal','animal_injuries','comment'));
 //    }
    
 //    public function postComment(Request $request)
 //    {
        
 //        $this->validate($request,array(
 //            'name'=>'required|max:255',
 //            'email'=>'required|email|max:255',
 //            'comment'=>'required|min:3|max:3000|profanity'
 //            ));

 //       $comments = new Comment([
 //        'name' => $request->get('name'),
 //        'email' => $request->get('email'),
 //        'comment' => $request->get('comment'),
 //        'animal_id' => $request->get('animal_id')
 //        ]);  
       
        
 //        $comments ->save();
        
 //        Session::flash('success','Comment was added');

 //        return redirect()->route('homepage.animals');

 //    }
}
