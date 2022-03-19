<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ListMemosController extends Controller
{
    public function listMemos() {
        return view('listMemos');
    }
}
