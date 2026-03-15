<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GreetController extends Controller
{
    public function index()
    {
        $name = 'Student';
        return view('greet', compact('name'));
    }
}