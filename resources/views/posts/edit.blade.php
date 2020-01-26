@extends('layouts.default')

@section('title', 'Edit Post')

@section('content')
  <h1>
    <a href="{{ url('/') }}" class="header-menu">Back</a>
    Edit Post
  </h1>

  <form method="post" action="{{ url('/posts', $post->id) }}">
    {{ csrf_field() }}    <!-- laravelが用意してくれているcsrf対策 -->
    {{ method_field('patch') }}   <!-- ルーティングでpatchメソッドが使えるようになる -->
    <p>
      <input type="text" name="title" placeholder="enter title" value="{{ old('title', $post->title) }}">
      <!-- old('title', $post->title)とすることで、old('title')がなければ$post->titleを表示する -->

      @if ($errors->has('title'))
        <span class="error">{{ $errors->first('title') }}</span>
      @endif
    </p>
    <p>
      <textarea name="body" placeholder="enter body">{{ old('body', $post->body) }}</textarea>
      @if ($errors->has('body'))
        <span class="error">{{ $errors->first('body') }}</span>
      @endif

    </p>
    <p>
      <input type="submit" value="Update">
    </p>

  </form>

@endsection
