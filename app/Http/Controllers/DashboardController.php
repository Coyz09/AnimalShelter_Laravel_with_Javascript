<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rescuer;
use DB;
use View;

class DashboardController extends Controller
{
        
    public function index()
    {
       return View::make('dashboard.index');
    }

     public function getRescued(){
     
      $data = DB::table('animals AS ani')
         ->join('animal_rescuer AS ar','ani.id','=','ar.animal_id')
         ->join('rescuers AS res','ar.rescuer_id','=','res.id')
         // ->select('ani.created_at')

         ->select(DB::raw('DATE(ani.animal_Rescuedate) as DATE'),DB::raw('count(ani.animal_Rescuedate) AS total'))

         ->groupBy('DATE')
         // ->get();
         // ->groupBy('res.created_at')
         // ->pluck(DB::raw('count(DATE) AS total'),'DATE')
      //    ->all();

      // $data = Rescuer::orderBy('created_at','DESC')
      //  ->select('created_at')
       ->get();
         return response()->json($data);
     }


     public function getAdopted(){

        $data = DB::table('adopters AS adopt')
         ->join('adopter_animal AS aa','adopt.id','=','aa.adopter_id')
         ->join('animals AS ani','aa.animal_id','=','ani.id')
         ->select(DB::raw('DATE(adopt.created_at) as DATE'),DB::raw('count(adopt.created_at) AS total'))
         ->groupBy('DATE')
         
         // ->pluck(DB::raw('count(month) AS total'),'DATE')
         ->whereIn('ani.adoption_Status',['Adopted'])
         // ->get();
         // ->groupBy('res.created_at')
         // ->pluck(DB::raw('count(DATE) AS total'),'DATE')
      //    ->all();

      // $data = Rescuer::orderBy('created_at','DESC')
      //  ->select('created_at')
       ->get();
         return response()->json($data);
     }

}
