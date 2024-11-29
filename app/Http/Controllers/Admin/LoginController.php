<?php

namespace App\Http\Controllers\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;


class LoginController extends Controller
{
    public function showRegister(){
        return view('backend.register');
    }

// Create New User Registration Function
   public function createRegister(Request $request){
    $request->validate(
        [
            'name'=>'required',
            'email'=>'required|email|unique:users,email',
            'password'=>'required',
        ]);


        $user = User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>$request->password,
        ]);

        return redirect('login')->with('status', 'User register successfully!','token',$user->createToken("API TOKEN")->plainTextToken);

   }


   //Show User Login Page Function
    public function index()
    {
        return view('backend.login');
    }

    //User Login Function
    public function createLogin(Request $request){

        $request->validate([
            'email'=>'required|email',
            'password'=>'required',
        ]);

    // Check record is avilable in db table or not
    if(!Auth::attempt($request->only(['email','password'])))
    {

        return redirect('login')->with('status', 'Email and Password does not match with our record.');

    }

    $user=User::where('email',$request->email)->first();

    $token =  $user->createToken("API TOKEN")->plainTextToken;
    // dd($token);
    Session::put('token', $token);

    return redirect('dashboard')->with('status', 'User login successfully.!');
  
    }

    //User Logout Function
    public function LogoutUser(Request $request){
        if ($request->user()) { 
            Session::flush();
            redirect::back();
            $request->user()->tokens()->delete();
        }
         return redirect('/login')->with('status','User logged out successfully.');
    }


}
