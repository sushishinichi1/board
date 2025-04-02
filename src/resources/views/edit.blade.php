@extends('layouts.app')

@section('content')
    <div style="max-width: 600px; margin: 40px auto;">
        <h1 style="margin-bottom: 20px;">投稿編集</h1>
        <form action="{{ route('board.update', $board->id) }}" method="POST" style="display: flex; flex-direction: column; gap: 15px;">
            @csrf
            @method('PUT')

            <label>
                タイトル:
                <input type="text" name="title" value="{{ $board->title }}">
            </label>

            <label>
                内容:
                <textarea name="content" rows="6">{{ $board->content }}</textarea>
            </label>

            <button type="submit">更新</button>
        </form>
    </div>
@endsection

