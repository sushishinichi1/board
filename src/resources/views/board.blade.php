@extends('layouts.app')

@section('content')
    <div style="max-width: 600px; margin: 40px auto; text-align: center;">
        <a href="{{ route('board.create') }}" style="display: inline-block; margin-bottom: 20px;">
            📝 新規作成
        </a>

        <h1 style="margin-bottom: 30px;">掲示板一覧</h1>

        @if (session('success'))
            <p style="margin-bottom: 20px;">{{ session('success') }}</p>
        @endif

        <ul style="list-style: none; padding: 0;">
            @foreach ($boards as $board)
                <li style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 15px;">
                    <a href="{{ route('board.show', $board->id) }}">{{ $board->title }}</a>
                    <div>
                        <a href="{{ route('board.edit', $board->id) }}" style="margin-right: 10px;">編集</a>
                        <form action="{{ route('board.destroy', $board->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">削除</button>
                        </form>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
@endsection
