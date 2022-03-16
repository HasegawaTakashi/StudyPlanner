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
        $posts = $request->all();
        Memo::insert([
            'title' => $posts['title'],
            'memo' => $posts['memo'],
            'user_id' => \Auth::id(),
            'created_at' => now(),
        ]);
        return view('dashboard');
    }
}
