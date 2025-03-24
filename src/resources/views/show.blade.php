@extends('layouts.app')

@section('content')
    <h1>{{ $board->title }}</h1>
    <p>{{ $board->content }}</p>
    <a href="{{ route('boards.index') }}">戻る</a>
@endsection
