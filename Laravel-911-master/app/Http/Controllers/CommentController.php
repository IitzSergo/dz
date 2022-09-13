<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request, Article $article)
    {
        $request->validate([
            'comment' => 'required|min:3'
        ]);

        $comment = new Comment();
        $comment->user_id = Auth::user()->id;
        $comment->article_id = $article->id;
        $comment->comment_text = $request->comment;
        $comment->save();

        return  redirect()->route('article', $article->slug);
    }
}