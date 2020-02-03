<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Entities\Comment;

class CommentsController extends Controller
{
    public function index()
    {
    	$comments = (new Comment())->get();
    	$params = [
    		'comments' => $comments
    	];
    	return view('admin.comments', $params);
    }

     public function acceptComment($id)
     {

     		\DB::table('comments')->where('id', $id) ->update(['status' => true]);
     		return back();
     }
}
