<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Tweet;

class TweetsController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }

public function tweet(Request $request)
{
	$tweet = new Tweet;
	$tweet -> tweet = $request -> tweet;
	$tweet -> user_id = Auth::user() -> id;
	$tweet -> save();
	return redirect('/home');
}

}
