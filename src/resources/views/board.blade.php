@extends('layouts.app')

@section('content')
    <div style="width: 100%; text-align: center; padding: 20px;">
        <!-- 📝 新規作成ボタンをタイトルの上に配置 -->
        <a href="{{ route('board.create') }}" style="display: inline-block; padding: 10px 15px; background-color: #007bff; color: white; text-decoration: none; border-radius: 5px; margin-bottom: 20px;">
            📝 新規作成
        </a>

        <h1>掲示板一覧</h1>

        @if (session('success'))
            <p style="color: green;">{{ session('success') }}</p>
        @endif

        <ul style="list-style: none; padding: 0; text-align: left; max-width: 600px; margin: auto;">
            @foreach ($boards as $board)
                <li style="margin: 10px 0; display: flex; justify-content: space-between; align-items: center; border-bottom: 1px solid #ddd; padding: 5px 0;">
                    <a href="{{ route('board.show', $board->id) }}" style="text-decoration: none; color: #007bff;">{{ $board->title }}</a>
                    <div>
                        <a href="{{ route('board.edit', $board->id) }}" style="margin-right: 10px; text-decoration: none; color: #28a745;">編集</a>
                        <form action="{{ route('board.destroy', $board->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" style="background: none; border: none; color: #dc3545; cursor: pointer;">削除</button>
                        </form>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
@endsection
