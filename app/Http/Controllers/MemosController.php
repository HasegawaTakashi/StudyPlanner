<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Memo;

class MemosController extends Controller
{
    public function createMemo() {
        return view('createMemo');
    }

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

    public function create() {
        $memos = Memo::get();
        return view('createMemo', ['memos' => $memos]);
    }

    public function list()
    {
        $user_id = \Auth::id();
        $memos = Memo::where('user_id', $user_id)->get();
        $search_memos_user_ids = Memo::pluck('user_id');
        foreach ($search_memos_user_ids as $search_memos_user_id) {
            $search_id[] = $search_memos_user_id;
        }
        $is_false = array_search($user_id, $search_id);

        return view('listMemos', [
            'memos' => $memos,
            'user_id' => $user_id,
            'is_false' => $is_false,
            ]);
    }
}
