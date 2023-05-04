<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
class LoginController extends Controller
{
    public function postSignin(Request $request){
        $this->validate($request, [
            'email' => 'email| required',
            'password' => 'required| min:4'
        ]);
		 if(auth()->attempt(array('email' => $request->email, 'password' => $request->password)))
		      {
            $personnels = DB::table('personnels')
            ->select('*')
            ->where('user_id', $user_id)
            ->get();

                  if (auth()->user()->email_verified_at == null){
                    Auth::logout();
                    return redirect()->route('user.signin')
                 ->with('error','Please verify your account!');
                } 

                 else if (auth()->user()->role == 'admin') {
                  return redirect()->route('dashboard.index');
                 }

	       		  else if (auth()->user()->role == 'adopter'){
	             return redirect()->route('adopter.profile');
	            } 

                else if (auth()->user()->role == 'personnel'){
                 return redirect()->route('personnel.profile');
                } 

                else if (auth()->user()->role == 'user'){
                 return redirect()->route('user.sign');
                } 

            else {
                return redirect()->route('homepage.front');
            }
        }
        else{
            return redirect()->route('user.signin')
                ->with('error','Email-Address And Password Are Wrong.');
        }
     }
}
