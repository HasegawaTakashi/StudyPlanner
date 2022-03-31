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
        $count_memo = $memos->count();

        if ($count_memo === 0) {
            $is_memo_count_zero = false;

        } else {
            $is_memo_count_zero = true;
        }

        return view('listMemos', [
            'memos' => $memos,
            'user_id' => $user_id,
            'is_memo_count_zero' => $is_memo_count_zero,
            ]);
    }

    public function edit()
    {
        $user_id = \Auth::id();
        $memos = Memo::select('memos.*')->where('user_id', $user_id)->get();

        $count_memo = $memos->count();

        if ($count_memo === 0) {
            $is_memo_count_zero = false;
        } else {
            $is_memo_count_zero = true;
        }

        return view('editMemos', [
            'memos' => $memos,
            'is_memo_count_zero' => $is_memo_count_zero,
        ]);
    }

    public function update(Request $request)
    {
        $posts = $request->all();
        $request->validate([
            'title' => 'required|max:50',
            'memo' => 'required|max:140',
        ]);
        dd($posts);
    }
}
