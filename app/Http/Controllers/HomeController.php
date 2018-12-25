<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tweet;
use App\User;
use App\Follows;
use Illuminate\Support\Facades\Auth;

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
     // *
     // * @return \Illuminate\Http\Response
     */
    // public function index()
    // {
    // //     //全部のデータを読み込むやつ
    //     $Tweets = Tweet::all();
    //     return view('home',['TweetDate' => $Tweets]);

        // // joinしたデータを取得
        // $Tweets = Tweet::select()
        //     -> join('users','tweets.user_id','=','users.id');
        //     -> get();

    // //     // viewに渡す
    //     return view('home',['TweetDate' => $Tweets]);
    

    public function tweets()
    {
      //  $ueo = ueo
      // dd($ueo);
        // ログイン中のユーザのフォロー中のユーザのユーザIDを取得
        //             ログイン中ユーザのIDを特定
                       //usersテーブルのidカラムのログイン中のidを取得
                       // $my_user = User::where ( 'id',Auth::id() ) ->get();
                       $my_user = User::find (Auth::id() );
        //             ↑の情報を元にフォロー中のユーザIDを特定
                       // $follow_ids = Follows::where ($my_user::follow_id());

                       //後々whereInを活用したいので、IDだけを抽出するために、フォローしてるユーザ IDだけを格納する配列を用意
                       //ループを回して、フォローしてるユーザIDだけを格納した配列を作成
                       $target_id_list = [];
                       foreach ($my_user ->follows as $key => $follow) {
                           $target_id_list[] = $follow -> follow_id;
                       }
        //             ↑と自分のIDも含める
                        $target_id_list[] = Auth::id();
        //             作成したIDリストでwhereInをしてpost情報を、created_atを基準に降順で取得
                        $tweets = Tweet::whereIn ('user_id',$target_id_list)
                          ->orderBy('created_at','desc')->paginate(5);
                          return view('home',['TweetDate' => $tweets]);

    }
}
