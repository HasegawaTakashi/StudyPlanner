<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Memo;
use Validator;

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
        $does_memo_exists = $memos->count() === 0 ? false : true;

        return view('listMemos', [
            'memos' => $memos,
            'user_id' => $user_id,
            'does_memo_exists' => $does_memo_exists,
            ]);
    }

    public function edit(Request $request)
    {
        $user_id = \Auth::id();
        $validated = Validator::make($request->all(), [
            'memo_id' => 'numeric',
        ],
        [
            'memo_id.numeric' => 'メモidが不正です',
        ]);
        if ($validated->fails()) {
            return redirect()->route('memo.list')->withErrors($validated);
        }
        $memo = Memo::where('user_id', $user_id)->where('id', $request->memo_id)->first();
        $does_memo_exists = $memo->count() === 0 ? false : true;

        return view('editMemos', [
            'memo' => $memo,
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
