<?php

namespace App\Http\Controllers\Sigra;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SigraController extends Controller
{
    public function index()
    {
        return view('pages.sigra');
    }
}
