<?php

class CommantController extends \BaseController {

	public function store()
	{
		$validation = Validator::make(Input::all(), ['comment' => 'required']);
		if($validation->fails())
		{
			return Redirect::back()->withInput()->withErrors($validation->messages());
		}

		$comment = new Comment;
		$comment->comment = Input::get('comment');
		$comment->user_id = Input::get('user_id');
		$comment->post_id = Input::get('post_id');
		
		$comment->save();

		return Redirect::to('/posts');

	}

}