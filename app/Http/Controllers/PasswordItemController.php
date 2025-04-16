<?php

namespace App\Http\Controllers;

use App\Models\PasswordItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;


class PasswordItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = PasswordItem::where('user_id', Auth::id())->get();

        return view('passwords.index', compact('items'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('passwords.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'account_name' => 'required|string|max:255',
            'login_id' => 'required|string|max:255',
            'password' => 'required|string|max:255',
            'memo' => 'nullable|string',
            'category' => 'nullable|string|max:100',
            'login_url' => 'nullable|url|max:255',
        ]);

        PasswordItem::create([
            'user_id' => Auth::id(),
            'account_name' => $request->account_name,
            'login_id' => $request->login_id,
            'password' => Crypt::encryptString($request->password),
            'memo' => $request->memo,
            'category' => $request->category,
            'login_url' => $request->login_url,
        ]);

        return redirect()->route('passwords.index')->with('success', '登録しました！');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $item = PasswordItem::where('id', $id)
            ->where('user_id', Auth::id()) // 他人のデータは見せない
            ->firstOrFail();

        $item->password = Crypt::decryptString($item->password);

        return view('passwords.show', compact('item'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $item = PasswordItem::where('id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        return view('passwords.edit', compact('item'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $item = PasswordItem::where('id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        $validated = $request->validate([
            'account_name' => 'required|string|max:255',
            'login_id'     => 'required|string|max:255',
            'password'     => 'nullable|string|max:255',
            'memo'         => 'nullable|string',
            'category'     => 'nullable|string|max:100',
            'login_url'    => 'nullable|url|max:255',
        ]);

        $item->account_name = $validated['account_name'];
        $item->login_id     = $validated['login_id'];
        $item->memo         = $validated['memo'] ?? null;
        $item->category     = $validated['category'] ?? null;
        $item->login_url    = $validated['login_url'] ?? null;

        if (!empty($validated['password'])) {
            $item->password = Crypt::encryptString($validated['password']);
        }

        $item->save();

        return redirect()->route('passwords.index')->with('success', '更新しました！');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $item = PasswordItem::where('id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        $item->delete();

        return redirect()->route('passwords.index')->with('success', '削除しました！');
    }
}
