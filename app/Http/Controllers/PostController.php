<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function index()
    {
        $posts = Post::withTrashed()->latest()->paginate(10);
        return view('posts.index', compact('posts'));
    }


    public function create()
    {
        return view('posts.create');
    }


    public function store(Request $request)
    {
        $valid = $request->validate([
            'title' => ['required', 'string', 'min:5', 'max:255', 'unique:posts'],

        ]);

        if(Post::create($valid));
            return redirect(route('posts.index'))->with('message', 'Post added Successfully');

        return back()->with('error', 'Somethings Went Wrong');


    }


    public function show(Post $post)
    {
         //
    }


    public function edit($id)
    {
        $posts = Post::find($id);
        return view('posts.edit', compact('posts'));
    }


    public function update(Request $request, $id)
    {
        $valid = $request->validate([
            'title' => ['string', 'required', 'min:5', 'max:255'],
        ]);

        $posts = Post::findOrFail($id);

        if ($posts->update($valid));
        return redirect(route('posts.index'))->with('message', 'Post Updated Successfully');

        return back()->with('error', 'Somethings Went Wrong');
    }

    public function destroy($id)
    {
        $posts = Post::find($id);
        $posts->delete();

        return redirect()->back()->with('message', 'Trashed Successfully');
    }


    public function restore($id)
    {
        $posts = Post::withTrashed()->find($id);
        $posts->restore();

        return back()->with('message', 'Restore Successfully');
    }


    public function forceDelete($id)
    {
        $posts = Post::withTrashed()->find($id);
        $posts->forceDelete();

        return back()->with('message', 'Deleted Successfully');
    }

}
