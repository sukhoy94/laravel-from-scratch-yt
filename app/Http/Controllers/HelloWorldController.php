<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelloWorldController extends Controller
{
    public function index(Request $request, string $userName)
    {

        return view('hello-world.index', ['userName' => $userName,]);
    }

    public function two()
    {
        return 'two';
    }
}
