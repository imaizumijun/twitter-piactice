@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <?php //@FIXME ユーザーデータの存在チェック
                   //自分を除くユーザ データを出す?>
            @if(!empty($users))
            <div class="card">
                <div class="card-header">ユーザ一覧</div>


                <?php //@FIXME ユーザーデータを表示 ?>
                    @foreach( $users as $user )
            
                    <div class="card-body">
                        <?php //@FIXME ユーザー名を表示 ?>
                        {{ $user->name }}
                        <div style="float:right">


                                <?php //@FIXME 未フォロー時の表示 ?>
                                @if( !in_array( $user->id,$follow_id_list))
                                {!! Form::open(['id' => 'formTweet', 'url' => 'users/follow/', 'enctype' => 'multipart/form-data']) !!}
                                   
                                    {{Form::hidden('followId', $user->id, ['id' => 'followId'])}}
                                    <!-- <input id="followId" name="followId" type="hidden" value="2"> -->
                                    <button type="submit" class="btn btn-light">
                                        {{ __('フォローする') }}
                                    </button>
                                {!! Form::close() !!}


                                <?php //@FIXME フォロー中の表示 ?>
                                @else
                                フォロー中
                                @endif
                        </div>
                    </div>
                    <hr>

                    @endforeach

                   

                <?php //@FIXME ページングを表示 ?>

            </div>


            @endif
            </div>
        </div>
    </div>
</div>
@endsection
