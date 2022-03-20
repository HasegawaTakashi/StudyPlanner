<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Memo;

class ListMemosController extends Controller
{
    public function listMemos() {
        $memos = Memo::get();
        return view('listMemos', ['memos' => $memos]);
    }
}
