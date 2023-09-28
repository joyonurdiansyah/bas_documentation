<?php

namespace App\Http\Controllers\Sigra;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Dokumentasi;

class SigraController extends Controller
{
    public function index($slug)
    {
        $data = Dokumentasi::where('slug', $slug)->first();
        return view('pages.detail', compact('data'));
    }
}
