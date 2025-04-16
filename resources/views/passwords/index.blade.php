@extends('layouts.app')

@section('content')
    <h2 class="text-2xl font-bold mb-6">パスワード一覧</h2>

    <div class="mb-4">
        <a href="{{ route('passwords.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
            ＋ 新規追加
        </a>
    </div>

    <table class="w-full border border-gray-300 text-left">
        <thead class="bg-gray-100">
            <tr>
                <th class="p-2 border-b">アカウント名</th>
                <th class="p-2 border-b">カテゴリ</th>
                <th class="p-2 border-b">ログインID</th>
                <th class="p-2 border-b">操作</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($items as $item)
                <tr class="hover:bg-gray-50">
                    <td class="p-2 border-b">{{ $item->account_name }}</td>
                    <td class="p-2 border-b">{{ $item->category }}</td>
                    <td class="p-2 border-b">{{ $item->login_id }}</td>
                    <td class="p-2 border-b">
                        <a href="{{ route('passwords.show', $item->id) }}" class="text-blue-500 hover:underline">詳細</a> /
                        <a href="{{ route('passwords.edit', $item->id) }}" class="text-blue-500 hover:underline">編集</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="p-4 text-center text-gray-500">登録されたアカウント情報はありません。</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
