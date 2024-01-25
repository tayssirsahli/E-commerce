<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    

    public function registerPage(){
        return view('authentification.register');
    }
    public function registerPost(Request $request){
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash :: make($request->password);


        $user->save();
        return back()->with('success','Register successfuly');
    }
    public function loginPage(){
        return view('authentification.login');
    }

    public function loginPost(Request $request){
       
        $credetials = [
            'email' => $request ->email,
            'password' => $request ->password,
        ];
        
        if ( Auth::attempt($credetials)){
            return redirect('/home')->with('success','login success');
        }

        return back()->with('error','error Email or password');
    }
    Public function logout(){

        Auth::logout();
        
        return redirect()->route('login');
    }

}