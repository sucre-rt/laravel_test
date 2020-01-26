@extends('layouts.default')

<!-- layouts/defaultファイルの@yield('title')部分に挿入するデータ -->
{{--
  @section('title')
  Blog Posts
  @endsection
--}}
<!-- 上記と同じ処理 -->
@section('title', 'Blog Posts')


<!-- layouts/defaultファイルの@yield('content')部分に挿入するデータ -->
@section('content')
  <h1>
    <a href="{{ url('/posts/create') }}" class="header-menu">New Post</a>
    Blog Posts
  </h1>
  <ul>
    {{--
      @foreach ($posts as $post)    <!-- セミコロンはいらない -->
        <li><a href="">{{ $post->title }}</a></li>
      @endforeach
    --}}

    <!-- $postsが空だった時の処理を追加するため、foreachではなくforelseを使う -->
    @forelse ($posts as $post)

      <!-- リンクの飛ばし方。以下三行同じ処理。urlからidを受け取った場合 -->
        <!-- <li><a href="/posts/{{ $post->id }}">{{ $post->title }}</a>
        <li><a href="{{ url('/posts', $post->id) }}">{{ $post->title }}</a>
        <li><a href="{{ action('PostsController@show', $post->id) }}">{{ $post->title }}</a> -->

      <!-- Implicit Binding -->
      <li>
        <a href="{{ action('PostsController@show', $post) }}">{{ $post->title }}</a>
        <a href="{{ action('PostsController@edit', $post) }}" class="edit">[Edit]</a>

        <a href="#" class="del" data-id="{{ $post->id }}">[x]</a>
        <!-- jsでidを取得するためにdate-id属性を付与 -->
        <form method="post" action="{{ url('/posts', $post->id) }}" id= "form_{{ $post->id }}">
        <!-- jsで使うためidをつける -->
          {{ csrf_field() }}
          {{ method_field('delete') }}
        </form>

      </li>

    @empty
      <li>No posts yet</li>
    @endforelse

  </ul>
  <script src="/js/main.js"></script>
@endsection
