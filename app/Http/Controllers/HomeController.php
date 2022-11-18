<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Store;

class HomeController extends Controller {

    public function index()
    {
        $stores = Store::all();

        return view('welcome', compact('stores'));
    }
}
