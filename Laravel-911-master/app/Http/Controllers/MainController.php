<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        $articles = Article::paginate(5);
        return view('home', compact('articles'));
    }

    public function contacts()
    {
        $title = 'Contacts Us';
        return view('contacts', compact('title'));
    }

    public function getContactsForm(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required'
        ]);

        return redirect()->route('mail')->with('success', 'Thank');
    }
    public function category(Category $category)
    {
        $articles = Article::where('category_id', '=', $category->id)->paginate(3);
        return view('content.category', compact('articles', 'category'));
    }

    public function article(Article $article)
    {
        $comments = $article->comments()->get();
        return view('content.article', compact('article', 'comments'));
    }
}