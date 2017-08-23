<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use App\User;

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
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->user()->authorizeRoles(['manager']))
        {
          return view('admin.index');
        }
        else {
          return view('home');
        }

    }
    public function employe(Request $request)
    {
      if($request->user()->authorizeRoles(['manager']))
      {
        return view('welcome');
      }
      else {
        return redirect()->route('login');
      }
    }
}
