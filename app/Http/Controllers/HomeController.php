<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function homePage(){
        return view('home');
    }

    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
       if(Auth::user()->role == "admin")
       {
            //dd(Auth::user()->role);
            return redirect('/dashboard');
       }else{
           // dd( "error");
            return redirect('/listcategorie');
       }
    }

}
