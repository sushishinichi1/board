<?php

namespace App\Http\Controllers;

use App\Models\Board;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BoardController extends Controller
{
    protected $board;

    public function __construct(Board $board)
    {
    }

    public function view()
    {
        $boards = Board::all();
        return view('board', compact('boards'));
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);
        Board::create([
            'title' => $request->title,
            'content' => $request->content,
            'user_id' => Auth::id(), // 現在のログインユーザーのIDを保存
        ]);

        return redirect()->route('board.view')->with('success', '投稿が作成されました');
    }

    public function show(Board $id)
    {
        
        return view('show', compact('board'));
    }

    public function edit($id)
    {
        $board = Board::findOrFail($id); // ← IDで1件取得（なければ404）
        return view('edit', compact('board'));
    }

    public function update(Request $request, Board $board)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        $board->update($request->all());

        return redirect()->route('board.view')->with('success', '投稿が更新されました');
    }

    public function destroy(Board $board)
    {
        $board->delete();
        return redirect()->route('board.view')->with('success', '投稿が削除されました');
    }
}

