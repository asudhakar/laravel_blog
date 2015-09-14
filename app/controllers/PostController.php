<?php

class PostController extends \BaseController {

		public function create()
		{	
			$users = Auth::user() ;
			return View::make('posts.create',['users' => $users]);
		}

		public function store()
		{
			$validation = Validator::make(Input::all(), ['title' => 'required', 'content' => 'required']);
			if($validation->fails())
			{
				return Redirect::back()->withInput()->withErrors($validation->messages());
			}

			// return Input::all();
			
			$post = new Post();
			$post->title = Input::get('title');
			$post->content = Input::get('content');
			$post->user_id = Input::get('id');
			$post->save();

			return Redirect::to('/posts');

		}
		
		public function view()
		{
			$posts = Post::all();
			return View::make('posts.index', ['posts' => $posts]);
		}

		public function show($id)
		{
				$post = Post::whereId($id)->first(); 
				$user_id =  $post->user_id;

				$user_det = User::whereId($user_id)->first();

				// $comment = SELECT * FROM 'comments' WHERE 'user_id' = $user_id AND 'post_id' = 'id';
				$cmd = DB::select(DB::raw("SELECT * FROM comments WHERE post_id = '$id' "));

				// return $cmd;
				
				// foreach ($cmd as $command) {
				//  	echo $command->comment . "<br/>";
				//  } 


				return View::make('posts.show', ['post' => $post], ['user_det' => $user_det], ['cmd' => $cmd]);
		}
}