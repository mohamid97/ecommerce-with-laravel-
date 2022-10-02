<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index(){
        return view('admin.auth.login');
    }
    public function checkAuth(Request $request){
        $request->validate([
          'email'=>'required|email',
          'password'=>'required'
        ]);
        if(Auth::attempt(['email'=>$request->email , 'password'=>$request->password])){
            //dd(auth()->users());
            return redirect()->route('dashboard.home');
            exit;
        }
        echo "conttttt";
        exit;
        //$user = User::where([['email' , '=' , $request->email]])->first();
        /*if($user){
            $pass = Hash::check($request->password, $user->password);
             if($pass == true){
                session()->put('auth' , $user);
                dd(session()->get('auth'));
                return redirect()->route('dashboard.home');
             }
            }*/
            session()->flash('notFounded' , __('auth.notFounded'));
            return redirect()->back();
           Auth::attempt();      
    
    }




}
