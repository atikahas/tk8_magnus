<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\App;

class AppController extends Controller
{
    public function index() 
    {
        $app = App::orderBy('created_at','desc')->get();
        return view('apps.index', (compact('app')));
    }

    public function create() 
    {
        return view('apps.create');
    }

    public function store(Request $request)
    {   
        $data = $request->except(['_token']);
        $data['user_id'] = Auth::user()->id;

        if($request->has('image')) {
            $image = $request->file('image');
            $image_name = uniqid().'_'.$image->getClientOriginalName();
            $image->storeAs('public/apps_image/', $image_name);

            $data['image'] = $image_name;
        }

        $app = App::create($data);

        return redirect()->route('apps.index')->withSuccess(__('Application added successfully.'));
    }
}
