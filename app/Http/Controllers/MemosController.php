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

    public function edit(Request $request)
    {
        $user_id = \Auth::id();
        $validated = Validator::make($request->all(), [
            'memo_id' => 'required|numeric',
        ],
        [
            'memo_id.required' => 'メモidが必要です',
            'memo_id.numeric' => 'メモidが不正です',
        ]);
        if ($validated->fails()) {
            return redirect('memo.edit');
        }
        $memo = Memo::where('user_id', $user_id)->where('id', $request->memo_id)->get();
        dd($memo);
        $does_memo_exists = Memo::where('user_id', $user_id)->exists();

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
