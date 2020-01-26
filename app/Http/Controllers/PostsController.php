<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;       // \App\Post::all();などの記述を少なくできる
use App\Http\Requests\PostRequest;      // バリデーションの読み込み

class PostsController extends Controller
{

    public function index() {
        // $posts = \App\Post::all();
        // $posts = Post::all();       // use App\Post;により記述を省略
        // $posts = Post::orderBy('created_at', 'desc')->get();    // 取得したレコードを新しい順に並べ換える
        $posts = Post::latest()->get();     // orderBy('created_at', 'desc')と同じ処理

        // dd($posts->toArray());   //dump dieの略。デバッグがとれる

        // viewの表示。
        // return view('posts.index'); 
        // return view('posts.index', ['posts' => $posts]);    // 上記で取得した$postsをviewに渡す
        return view('posts.index')->with('posts', $posts);      // 上記と同じ
    }


    // urlからidを受け取った場合
    // public function show($id) {     // urlからidを受け取る
        // $post = Post::find($id);        // データが見つからなかった場合例外が返らない
        // $post = Post::findOrFail($id);      // データが見つからなかった場合例外が返る
    // }

    // Implicit Bindingを用いた場合（データ本体を受け取る）
    public function show(Post $post) {

        return view('posts.show')->with('post', $post);
    }


    public function create() {
        return view('posts.create');
    }


    // public function store(Request $request) {
    //     // フォームから送信されたデータはRequest型で渡ってくる

    //     // バリデーション
    //     // updateアクションとstoreアクションで重複するため、Requestクラスを作成し、そちらに記載
    //     $this->validate($request, [
    //         'title' => 'required|min:3',
    //         'body' => 'required'
    //     ]);

    // バリデーションを読ませるためにRequest型ではなくPostRequestにする
    public function store(PostRequest $request) {

        $post = new Post();
        $post->title = $request->title;
        $post->body = $request->body;
        $post->save();
        return redirect('/');
    }


    public function edit(Post $post) {
        return view('posts.edit')->with('post', $post);
    }


    public function update(PostRequest $request, Post $post) {
        $post->title = $request->title;
        $post->body = $request->body;
        $post->save();
        return redirect('/');
    }


    public function destroy(Post $post) {
        $post->delete();
        return redirect('/');
    }

}
