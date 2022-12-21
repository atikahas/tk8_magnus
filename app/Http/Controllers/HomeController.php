<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\App;

class HomeController extends Controller
{
    public function index() 
    {
        $app = App::all();
        return view('home.index', (compact('app')));
    }

    public function search(Request $request) {
        // get the search term
        $text = $request->input('text');
    
        // search the members table
        $app = App::where('name', 'Like', $text)->get();
    
        // return the results
        return response()->json($app);
    }
}