@extends('layouts.app')

@section('content')
    <h1>投稿編集</h1>
    <form action="{{ route('boards.update', $board->id) }}" method="POST">
        @csrf
        @method('PUT')
        <p>タイトル: <input type="text" name="title" value="{{ $board->title }}"></p>
        <p>内容: <textarea name="content">{{ $board->content }}</textarea></p>
        <button type="submit">更新</button>
    </form>
@endsection
