@section('content')
    <div style="width: 100%; text-align: center;">
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

        <form action="{{ route('board.store') }}" method="POST" style="display: flex; flex-direction: column; align-items: center; gap: 10px;">
            @csrf
            <label for="title">タイトル:</label>
            <input type="text" name="title" id="title" value="{{ old('title') }}" required style="width: 300px; padding: 5px;">

            <label for="content">内容:</label>
            <textarea name="content" id="content" required style="width: 300px; height: 100px; padding: 5px;"></textarea>

            <button type="submit">作成</button>
        </form>

        <a href="{{ route('board.view') }}">戻る</a>
    </div>
@endsection
