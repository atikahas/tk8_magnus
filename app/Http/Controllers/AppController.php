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
        $data['created_by'] = Auth::user()->id;

        if($request->has('image')) {
            $image = $request->file('image');
            $image_name = uniqid().'_'.$image->getClientOriginalName();
            $image->storeAs('public/apps_image/', $image_name);

            $data['image'] = $image_name;
        }

        $app = App::create($data);

        return redirect()->route('apps.index')->withSuccess(__('Application added successfully.'));
    }

    public function edit(App $app)
    {
        return view('apps.edit', ['app' => $app]);
    }

    public function update(Request $request, App $app)
    {
        $data = $request->except(['_token']);
        $data['updated_by'] = Auth::user()->id;
        if($request->has('image')) {
            $image = $request->file('image');
            $image_name = uniqid().'_'.$image->getClientOriginalName();
            $image->storeAs('public/apps_image/', $image_name);

            $data['image'] = $image_name;
        }
        $app->update($data);

        return redirect()->route('apps.index')->withSuccess(__('Application updated successfully.'));
    }

    public function destroy(App $app)
    {
        // $app->delete();
        // return redirect()->route('apps.index')->withSuccess(__('Application deleted successfully.'));

        try {
            $app->delete();
            return response()->json(['status' => 'success', 'message' => 'Application deleted successfully.']);
        } catch(\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }
}
