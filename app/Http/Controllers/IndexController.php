<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class IndexController extends Controller
{
    public function index()
    {
        $nav_status = Config::get('const.nav_status');
        return view('index', compact('nav_status'));
    }
}
