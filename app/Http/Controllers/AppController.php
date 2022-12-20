<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\App;

class AppController extends Controller
{
    public function index() 
    {
        $app = App::all();
        return view('apps.index', (compact('app')));
    }
}
