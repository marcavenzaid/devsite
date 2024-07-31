<?php 

namespace Devsite\Http\Controllers;

use Devsite\Post;
use Devsite\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Input;
use Session;
use Image;
use File;

class PostController extends Controller {
	
	public function getHome() {
		$posts = Post::all();
		$randomPosts = Post::inRandomOrder()->get();
		return view('pages/home', ['posts' => $posts, 'randomPosts' => $randomPosts]);
	}

	public function getSubmit() {
		return view('pages/post');
	}

	public function postCreatePost(Request $request) {
		$this->validate($request, [
			'title' => 'required|max:35',
			'description' => 'required|max:500',
			'genre' => 'required',
			'tags' => 'required|max:255',			
		]);

		// Handle post.
		$post = new Post();
		$post->title = $request['title'];		
		$post->description = $request['description'];
		$post->genre = $request['genre'];
		$post->tags = $request['tags'];

		// Handle the icon.
		if($request->hasFile('icon')) {
			$icon = $request->file('icon');
			$filename = time() . '.' . $icon->getClientOriginalExtension();

			Image::make($icon)->save(public_path('uploads/posts/icons/' . $filename));

			$post->icon = $filename;
		}

		// Handle the avatar.
		if($request->hasFile('images')) {
			$images = $request->file('images');
			$filename = time() . '.' . $images->getClientOriginalExtension();

            Image::make($images)->save(public_path('uploads/posts/images/' . $filename));

            $post->images = $filename;	
		}

		// Handle the file.
		if($request->hasFile('file')) {
			$file = $request->file('file');
			$foldername = time();
			$filename = $post->title . '.' . $file->getClientOriginalExtension();

			$file->move(public_path('uploads/posts/files/' . $foldername), $filename);

			$post->folder_name = $foldername;
			$post->file = $filename;
		}

		$request->user()->posts()->save($post);

		// Session::flash('sucess', 'Image uploaded');

		return redirect()->route('home');
	}
}