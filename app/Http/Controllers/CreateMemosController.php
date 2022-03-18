<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Memo;

class CreateMemosController extends Controller
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
}
