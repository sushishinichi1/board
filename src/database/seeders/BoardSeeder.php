<?php

namespace Database\Seeders;

use App\Models\Board;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BoardSeeder extends Seeder
{
    public function run(): void
    {
        // ✅ ユーザーを取得または作成
        $user = User::first() ?? User::factory()->create();

        Board::create([
            'title' => '最初の投稿',
            'content' => 'これはサンプルの投稿です。',
            'user_id' => $user->id,
        ]);

        Board::create([
            'title' => '2つ目の投稿',
            'content' => '2つ目の投稿の内容です。',
            'user_id' => $user->id,
        ]);

        Board::create([
            'title' => '3つ目の投稿',
            'content' => '3つ目の投稿の内容です。',
            'user_id' => $user->id,
        ]);
    }
}
