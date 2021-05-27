<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;
use App\Tag;

class BlogController extends Controller
{
    public function index(){
        //prendi i dati del db
        $posts = Post::where('published', 1)->orderBy('date', 'asc')->limit(5)->get();
        //i tag associati
        $tags = Tag::all();
        //restituisco pagina della home
        return view('guest.index', compact('posts', 'tags'));
    }
    public function show($slug){

        // prendo i dati dal db, first restituisce il primo record trovato lo usi al posto di get
        $post = Post::where('slug', $slug)->first();
        //i tag associati anche
        $tags = Tag::all();

        if ($post == null) {
            abort(404);
        }
        // restituisco la pagina del singolo post
        return view('guest.show', compact('post', 'tags'));
    }
    public function addComment(Request $request, Post $post)
    {
        $request->validate([
            'name' => 'nullable|string|max:100',
            'content' => 'required|string',
        ]);

        $newComment = new Comment();
        $newComment->name = $request->name;
        $newComment->content = $request->content;
        $newComment->post_id = $post->id;

        $newComment->save();

        return back();
    }
    public function filterTag($slug){
        //tutti i tag 
        $tags = Tag::all();
        //selezioni con lo slug
        $tag = Tag::where('slug', $slug)->first();
        if ($tag == null) {
            abort(404);
        }
        //solo i tag dei pubblicati
        $posts = $tag->posts()->where('published', 1)->get();
        // restituisco la pagina home prendendo i post e i tag
        return view('guest.index', compact('posts', 'tags'));


    }
}
