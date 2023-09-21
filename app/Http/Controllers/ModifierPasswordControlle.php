<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ModifierPasswordControlle extends Controller
{
    public function Modifier()
    {
        return view('pagepassword');
    }
}
