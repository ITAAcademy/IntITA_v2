<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Step;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $steps = Step::all();

        return view('home.index')->with(compact('steps'));
    }
}
