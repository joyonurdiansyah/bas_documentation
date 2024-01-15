<?php

namespace App\Http\Controllers\Sigra;

use App\Http\Controllers\Controller;
use App\Dokumentasi;
use Illuminate\Http\Request;
use PDF;

class SigraController extends Controller
{

    public function pdf($slug)
    {
        $data = Dokumentasi::where('slug', $slug)->first();

        // dd($data->judul);

        $pdf = PDF::loadView('pages.print', compact('data'));
        return $pdf->inline();
    }

    public function index($slug)
    {
        $data = Dokumentasi::where('slug', $slug)->first();

        return view('pages.detail', compact('data'));
    }
}
