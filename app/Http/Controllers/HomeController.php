<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tweet;

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
    public function index()
    {
        $Tweets = Tweet::all();
        return view('home',['TweetDate' => $Tweets]);
    }
}
