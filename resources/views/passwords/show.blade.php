@extends('layouts.app')

@section('content')
    <h2 class="text-2xl font-bold mb-6">パスワード詳細</h2>

    {{-- 編集・削除ボタン（横並び） --}}
    <div class="flex items-center gap-4 mb-6">
        <a href="{{ route('passwords.edit', $item->id) }}"
           class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
            編集
        </a>

        <form action="{{ route('passwords.destroy', $item->id) }}" method="POST"
              onsubmit="return confirm('本当に削除しますか？')">
            @csrf
            @method('DELETE')
            <button type="submit"
                    class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">
                削除
            </button>
        </form>
    </div>

    {{-- 詳細テーブル --}}
    <table class="w-full border border-gray-300 text-sm">
        <tbody>
            <tr>
                <th class="bg-gray-100 text-left p-2 w-1/4">アカウント名</th>
                <td class="p-2">{{ $item->account_name }}</td>
            </tr>
            <tr>
                <th class="bg-gray-100 text-left p-2">カテゴリ</th>
                <td class="p-2">{{ $item->category }}</td>
            </tr>
            <tr>
                <th class="bg-gray-100 text-left p-2">ログインID</th>
                <td class="p-2">{{ $item->login_id }}</td>
            </tr>
            <tr>
                <th class="bg-gray-100 text-left p-2">パスワード</th>
                <td class="p-2">{{ $item->password }}</td>
            </tr>
            <tr>
                <th class="bg-gray-100 text-left p-2">メモ</th>
                <td class="p-2">{{ $item->memo }}</td>
            </tr>
            <tr>
                <th class="bg-gray-100 text-left p-2">ログインURL</th>
                <td class="p-2">
                    @if ($item->login_url)
                        <a href="{{ $item->login_url }}" target="_blank"
                           class="text-blue-500 hover:underline">
                           {{ $item->login_url }}
                        </a>
                    @else
                        -
                    @endif
                </td>
            </tr>
        </tbody>
    </table>

    <div class="mt-6">
        <a href="{{ route('passwords.index') }}" class="text-blue-500 hover:underline">
            一覧に戻る
        </a>
    </div>
@endsection
