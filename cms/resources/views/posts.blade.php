<!-- resources/views/books.blade.php -->
@extends('layouts.app')
@section('content')
    <!-- Bootstrapの定形コード… -->
    <div class="card-body">
    {{ Auth::user()->id  }}
    USERID:{{$userid}}
    
        <div class="card-title">
            投稿内容
        </div>
        
        
        <!-- バリデーションエラーの表示に使用-->
        @include('common.errors')
        <!-- バリデーションエラーの表示に使用-->

        <!-- 本登録フォーム -->
        <form action="{{ url('posts') }}" method="POST" class="form-horizontal">
            {{ csrf_field() }}

            <!-- 本のタイトル -->
            <div class="form-group">
                <div class="col-sm-6">
                    投稿タイトル
                    <input type="text" name="title" class="form-control">
                </div>
                <div class="col-sm-6">
                    内容
                    <input type="text" name="contents" class="form-control">
                </div>
                <div class="col-sm-6">
                    関連スキル
                    <input type="text" name="skill" class="form-control">
                </div>
                <div class="col-sm-6">
                    匿名にしますか？
                    <input type="text" name="nameor" class="form-control">
                </div>

            </div>

            <!-- 本 登録ボタン -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-primary">
                        Save
                    </button>
                </div>
            </div>
        </form>
        
        
        
           <!-- 現在の本 -->
    @if (count($posts) > 0)
        <div class="card-body">
            <div class="card-body">
                <table class="table table-striped task-table">
                    <!-- テーブルヘッダ -->
                    <thead>
                        <th>質問一覧</th>
                        <th>&nbsp;</th>
                    </thead>
                    <!-- テーブル本体 -->
                    <tbody>
                        @foreach ($posts as $post)
                            <tr>
                                <!-- 投稿タイトルほか -->
                                <td class="table-text">
                                    <div>{{ $post->title }}</div>
                                </td>
                                <td class="table-text">
                                    <div>{{ $post->contents }}</div>
                                </td>
                                <td class="table-text">
                                    <div>{{ $post->skill }}</div>
                                </td>
                                <td class="table-text">
                                    <div>{{ $post->nameor }}</div>
                                </td>
                                

                                
                                <!--更新ボタン-->
                                <td>
                                    <form action="{{ url('postsedit/'.$post ->id) }}" method="POST">
                                            {{ csrf_field() }}
                                        <button type="submit" class="btn btn-primary">
                                            更新
                                        </button>
                                    </form>
                                </td>
                                
                                
                                
                                <!-- 本: 削除ボタン -->
                                
                                <td>
                                
                                <form action="{{ url('post/'.$post->id) }}" method="POST">
                                     {{ csrf_field() }}
                                     {{ method_field('delete') }}
                                    
                                    <button type="submit" class="btn btn-danger">
                                        削除
                                    </button>
                                 </form
                                
                                
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        
        
        <div class="row">
                <div class="col-md-4 offset-md-4">
                    {{ $posts->links()}}
                </div>
        </div>

    @endif
        
        
        
    </div>
    <!-- Book: 既に登録されてる本のリスト -->

@endsection