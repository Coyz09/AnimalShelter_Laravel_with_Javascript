<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Personnel;
use App\Models\Adopter;
use App\Models\User;
use DB;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
         Auth::check();
        if(auth()->user()->role == 'adopter'){
        $adopter = Adopter::where('user_id',Auth::id())->first(); 
        return view('adopter.profile',compact('adopter'));
    }
        else if(auth()->user()->role == 'personnel'){
        $personnel = Personnel::where('user_id',Auth::id())->first(); 
        return view('personnel.profile',compact('personnel'));
    }

       else if(auth()->user()->role == 'admin'){
        $admin = User::where('id',Auth::id())->first(); 
        return view('dashboard.index',compact('admin'));
    }
    }


    public function admin()
    {
         Auth::check();
         if(auth()->user()->role == 'admin'){
        $admin = User::where('id',Auth::id())->first(); 
        return view('dashboard.index',compact('admin'));
    }
    }
}
