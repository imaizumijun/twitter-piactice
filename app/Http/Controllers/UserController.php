<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Follows;


class UserController extends Controller
{
    public function index()
    {
          //ユーザ一覧を表示してからログイン中のIDを取り除く
    	$Users = User::whereNotIn ('id', [ Auth::id() ] )->get();

    	$my_user = User::find(Auth::id());
    	$follow_id_list = [];

    	foreach($my_user->follows as $key =>$follow){
    		$follow_id_list[]=$follow->follow_id;
    	}

    	return view('user.list',['users'=>$Users, 'follow_id_list'=>$follow_id_list]);
    }


    public function follow(Request $request)
    // viewでサブミットしたデータがリクエストに入ってきた
    // $request->followId
    {
      // $aiu = aiu
      // dd($aiu);
        //最初にDBにデータを登録をしたい
        //セーブするためにインスタンスモデル作成
          $follows = new Follows;
          //インスタンスモデルにユーザーID登録
          $follows->user_id = Auth::id();
          //インスタンスモデルにリクエストデータのフォローIDを登録
          $follows->follow_id = $request->followId;
          //インスタンスモデルに登録した２つをDBへ登録
          $follows->save();


        //登録後は一覧画面に戻る。
        return redirect()->action('UserController@index');

    }

}
