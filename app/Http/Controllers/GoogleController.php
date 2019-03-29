<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GoogleController extends Controller
{
    public function go(){
        file_get_contents('https://www.google.com');
    }
}
