<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Memo;

class MemosController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:50',
            'memo' => 'required|max:140',
        ]);

        $store_memo = new Memo;
        $store_memo->fill([
            'title' => $request->title,
            'memo' => $request->memo,
            'user_id' => \Auth::id(),
        ]);
        $store_memo->save();

        return view('dashboard');
    }

    public function create()
    {
        $memos = Memo::get();
        return view('createMemo', ['memos' => $memos]);
    }

    public function list()
    {
        $user_id = \Auth::id();
        $memos = Memo::where('user_id', $user_id)->get();
        $does_memo_exists = Memo::where('user_id', $user_id)->exists();

        return view('listMemos', [
            'memos' => $memos,
            'user_id' => $user_id,
            'does_memo_exists' => $does_memo_exists,
            ]);
    }

    public function edit()
    {
        $user_id = \Auth::id();
        $memos = Memo::select('memos.*')->where('user_id', $user_id)->get();
        $does_memo_exists = Memo::where('user_id', $user_id)->exists();

        return view('editMemos', [
            'memos' => $memos,
            'does_memo_exists' => $does_memo_exists,
        ]);
    }

    public function update(Request $request)
    {
        $posts = $request->all();
        $request->validate([
            'title' => 'required|max:50',
            'memo' => 'required|max:140',
        ]);
    }
}
