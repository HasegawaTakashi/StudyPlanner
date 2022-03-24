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
        if (\Auth::id() != 0) {
            $memos = Memo::where('user_id', $user_id)->find($user_id);
        } else {
            $memos = (object) ['user_id' => \Auth::id(), 'title' => $request->title, 'memo' => Memo::where('memo')->get()];
        }
        return view('listMemos', ['memos' => $memos, $user_id]);
    }

    public function postSubmit(Request $request, $user_id = 0)
    {
        $title = $request->input('title');
        $memo = $request->input('memo');
        if ($user_id === 0) {
            Memo::create([
                'title' => $title,
                'memo' => $memo
            ]);
        }
        return redirect()->route('dashboard');
    }
}
