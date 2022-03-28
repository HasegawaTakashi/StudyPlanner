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
        $memos = Memo::where('user_id', $user_id)->get();
        $searchMemosUserIds = Memo::pluck('user_id');
        foreach ($searchMemosUserIds as $searchMemosUserId) {
            $searchId[] = $searchMemosUserId;
        }
        $judgeBoolean = array_search($user_id, $searchId);
        
        return view('listMemos', [
            'memos' => $memos,
            'user_id' => $user_id,
            'judgeBoolean' => $judgeBoolean,
            ]);
    }
}
