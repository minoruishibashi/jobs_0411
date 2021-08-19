<?php

namespace App\Http\Controllers;

use App\Post;  //Book->Post
use Illuminate\Http\Request;
use Validator;
use Auth;



class PostsController extends Controller
{
    //
    //コンストラクタ
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    
    // index
    public function index(){
       $userid = Auth::user()->id;
    //   $posts = Post::orderBy('created_at', 'asc')->paginate(3);
       $posts = Post::where("user_id",Auth::user()->id)->orderBy('created_at', 'asc')->paginate(3);
        return view('posts', [
            'posts' => $posts,
            'userid'=> $userid
            
        ]);
        //return view('books',compact('books')); //も同じ意味
    }
    
    
    //edit
    
    public function edit($post_id){
        $posts = Post::where("user_id",Auth::user()->id)->find($post_id);
    
            // {books}id 値を取得 => Book $books id 値の １レコード取得
        return view('postsedit', ['post' => $posts]);
    
    }
    
    
    //store
    public function store(Request $request){
    
    //バリデーション
    $validator = Validator::make($request->all(), [
        'title' => 'required|max:255',
        'contents' => 'required|max:255',
        'skill' => 'required|max:255',
        'nameor' => 'required|max:6'
    ]);

    //バリデーション:エラー 
    if ($validator->fails()) {
        return redirect('/')
            ->withInput()
            ->withErrors($validator);
    }
    //以下に登録処理を記述（Eloquentモデル）

    $posts = new Post;
    $posts->title = $request->title;
    $posts->user_id = Auth::user()->id;
    $posts->contents = $request->contents;
    $posts->skill = $request->skill;
    $posts->nameor = $request->nameor;
    $posts->save(); 
    return redirect('/');
        
    }
    
    
    
    //Update:　更新処理
    public function update(Request $request){
        
      //バリデーション
            $validator = Validator::make($request->all(), [
                'id' => 'required',
                'title' => 'required|max:255',
                'contents' => 'required|max:255',
                'skill' => 'required|max:255',
                'nameor' => 'required|max:6'
        ]);
        //バリデーション:エラー
            if ($validator->fails()) {
                return redirect('/')
                    ->withInput()
                    ->withErrors($validator);
        }
        //データ更新
        // $posts = Post::find($request->id);
        $posts = Post::where("user_id",Auth::user()->id)->find($request->id);
        $posts->title = $request->title;
        $posts->contents = $request->contents;
        $posts->skill = $request->skill;
        $posts->nameor = $request->nameor;
        $posts->save();
        return redirect('/');
            
        }
    
    // 削除　destroy
    
    public function destroy (Post $post){
            $post->delete();       //追加
            return redirect('/');  //追加

        
    }
    
}
