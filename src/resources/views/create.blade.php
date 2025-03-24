@extends('layouts.app')

@section('content')
    <h1>新しい掲示板を作成</h1>

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('board.store') }}" method="POST">
        @csrf
        <label for="title">タイトル:</label>
        <input type="text" name="title" id="title" value="{{ old('title') }}" required>

        <label for="content">内容:</label>
        <textarea name="content" id="content" required>{{ old('content') }}</textarea>

        <button type="submit">作成</button>
    </form>

    <a href="{{ route('board.view') }}">戻る</a>
@endsection
