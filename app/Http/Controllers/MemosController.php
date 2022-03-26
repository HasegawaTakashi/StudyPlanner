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

        $storeMemo = new Memo;
        $storeMemo->fill([
            'title' => $request->title,
            'memo' => $request->memo,
            'user_id' => \Auth::id(),
        ]);
        $storeMemo->save();

        return view('dashboard');
    }

    public function create() {
        $memos = Memo::get();
        return view('createMemo', ['memos' => $memos]);
    }

    public function list(Request $request)
    {
        $user_id = \Auth::id();
        $title = Memo::where('title')->get();
        if (\Auth::user()->user_id != 0) {
            $memos = Memo::where('user_id', $user_id)->find($user_id);
        } else {
            $memos = new Memo;
            $memos = Memo::get();
            $memos->user_id = \Auth::id();
            $memos->title = $request->title;
            $memos->memos = Memo::where('memo')->get();
            }
        return view('listMemos', [
            'memos' => $memos,
            'title' => $title,
            'user_id' => $user_id,
            ]);
    }
}
