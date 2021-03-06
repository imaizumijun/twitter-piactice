@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <!-- 現在ログイン中のユーザ の名前を表示 -->
                <div class="card-header">{{ Auth::user()->name }}さんのタイムライン</div>

                @foreach ($TweetDate as $Tweet)
                    <div class="card-body">
                        {{$Tweet -> tweet}}

                        <br>
                        <div style="display:flex; justify-content: left;align-items: center;">
                            <div style="float:left">
                                <!-- ↓に名前表示をする -->
                                {{$Tweet->user->name}}
                                 / 
                                <!-- ↓に時間表示をする -->
                                {{$Tweet->created_at}}
                            </div>
                            <?php //@FIXME Favはマウスオーバーでアニメーションするだけの状態 ?>
                            <div style="float:left" class="heart"></div>
                        </div>
                    </div>

                    <hr style="margin-top:0px; margin-bottom:0px">
                @endforeach
            </div>

            {{ $TweetDate->links() }} 
        </div>
    </div>
</div>
@endsection