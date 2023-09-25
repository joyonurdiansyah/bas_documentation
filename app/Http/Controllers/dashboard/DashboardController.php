<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Dokumentasi;

class DashboardController extends Controller
{
    public function home()
    {
        $data = Dokumentasi::all();

        return view('pages.dashboard', compact('data'));
    }
}
