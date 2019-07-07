<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Guru;

class DashboardController extends Controller
{
    function index()
    {
        return view('admin.pages.beranda');
    }

    function tu()
    {
        $no = 1;
        $data = Guru::where('level', 2)->get();

        return view('admin.pages.tu.index', compact('data', 'no'));
    }
}
