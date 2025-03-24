@extends('layouts.app')

@section('content')
    <h1>掲示板一覧</h1>
    <a href="{{ route('board.create') }}">新規作成</a>

    @if (session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <ul>
        @foreach ($boards as $board)
            <li>
                <a href="{{ route('board.show', $board->id) }}">{{ $board->title }}</a>
                <a href="{{ route('board.edit', $board->id) }}">編集</a>
                <form action="{{ route('board.destroy', $board->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">削除</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection
