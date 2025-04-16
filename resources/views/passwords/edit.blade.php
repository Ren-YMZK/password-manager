@extends('layouts.app')

@section('content')
<h2 class="text-2xl font-bold mb-6">パスワード編集</h2>

<form action="{{ route('passwords.update', $item->id) }}" method="POST" class="space-y-4">
    @csrf
    @method('PUT')

    <div>
        <label class="block font-semibold mb-1">アカウント名:</label>
        <input type="text" name="account_name" value="{{ old('account_name', $item->account_name) }}"
               class="w-full border px-3 py-2 rounded" required>
    </div>

    <div>
        <label class="block font-semibold mb-1">ログインID:</label>
        <input type="text" name="login_id" value="{{ old('login_id', $item->login_id) }}"
               class="w-full border px-3 py-2 rounded" required>
    </div>

    <div>
        <label class="block font-semibold mb-1">パスワード（変更する場合のみ入力）:</label>
        <input type="password" name="password" class="w-full border px-3 py-2 rounded">
    </div>

    <div>
        <label class="block font-semibold mb-1">メモ:</label>
        <textarea name="memo" class="w-full border px-3 py-2 rounded">{{ old('memo', $item->memo) }}</textarea>
    </div>

    <div>
        <label class="block font-semibold mb-1">カテゴリ:</label>
        <input type="text" name="category" value="{{ old('category', $item->category) }}"
               class="w-full border px-3 py-2 rounded">
    </div>

    <div>
        <label class="block font-semibold mb-1">ログインURL:</label>
        <input type="url" name="login_url" value="{{ old('login_url', $item->login_url) }}"
               class="w-full border px-3 py-2 rounded">
    </div>

    <div class="pt-4 flex gap-4">
        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">
            更新する
        </button>

        <a href="{{ route('passwords.index') }}" class="text-blue-500 hover:underline self-center">
            一覧に戻る
        </a>
    </div>
</form>
@endsection
