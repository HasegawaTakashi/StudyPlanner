<?php

namespace App\Http\Controllers;

use Illuminate\Pagination\Paginator;
use App\Models\Inquiry;
use Illuminate\Http\Request;
use App\Models\Memo;
use Validator;
use Auth;

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

        return redirect()->route('home');
    }

    public function create()
    {
        $memos = Memo::get();
        return view('createMemo', ['memos' => $memos]);
    }

    public function list()
    {
        $user_id = \Auth::id();
        $memos = Memo::where('user_id', $user_id)->paginate(5);
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
        $user_id = \Auth::id();
        $validated = $request->validate([
            'title' => 'required|max:50',
            'memo' => 'required|max:140',
        ]);
        $update_memo = Memo::where('user_id', $user_id)
            ->where('id', $request->memo_id)
            ->update([
                'title' => $validated['title'],
                'memo' => $validated['memo'],
            ]);
        if ($update_memo === 0) {
            return back()->withInput()->withErrors(['error_message' => 'メモの編集に失敗しました']);
        }

        return redirect()->route('memo.list');
    }

    public function confirmDelete(Request $request)
    {
        $user_id = \Auth::id();
        $memo = Memo::where('user_id', $user_id)->where('id', $request->memo_id)->first();
        return view('confirmDeleteMemos', [
            'memo' => $memo,
        ]);
    }

    public function destroy(Request $request) {
        $user_id = \Auth::id();
        Memo::where('user_id', $user_id)->where('id', $request->memo_id)->first()->delete();

        return redirect()->route('memo.list');
    }

    public function signIn()
    {
        return view('signIn');
    }

    public function postSignIn(Request $request)
    {
        $this->validate($request, [
            'email' => 'email|required',
            'password' => 'required|min:4'
        ]);

        if (Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')])) {
            return redirect()->route('home');
        }
        return redirect()->back();
    }
}
