<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Entities\Comment;


class CommentsController extends Controller
{
	public function addComment(Request $request)
	{
		$comment = $request->input('comment');
   	$article_id = (int)$request->input('article_id');
   	$user_id = auth()->user()->id;

   	$objComment = new Comment();
   	$objComment = $objComment->create([
   		'article_id' => $article_id,
   		'user_id' => $user_id,
   		'comment' => $comment
   	]);

   	if($objComment) {
   		return back();
   	}

   	return back();
	}
   
}
