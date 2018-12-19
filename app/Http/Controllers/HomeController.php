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
        //全部のデータを読み込むやつ
        $Tweets = Tweet::all();
        return view('home',['TweetDate' => $Tweets]);

        // // joinしたデータを取得
        // $Tweets = Tweet::select()
        //     -> join('users','tweets.user_id','=','users.id')
        //     -> get();

    //     // viewに渡す
    //     return view('home',['TweetDate' => $Tweets]);

    }
}
