<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CreateMemosController extends Controller
{
    public function createMemo() {
        return view('createMemo');
    }
}
