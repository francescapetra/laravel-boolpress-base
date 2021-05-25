<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class BlogController extends Controller
{
    public function index(){
        //prendi i dati del db
        $posts = Post::where('published', 1)->orderBy('date', 'asc')->limit(5)->get();
        //restituisco pagina della home
        return view('guest.index', compact('posts'));
    }
    public function show($slug){

        // prendo i dati dal db, first restituisce il primo record trovato lo usi al posto di get
        $post = Post::where('slug', $slug)->first();

        if ($post == null) {
            abort(404);
        }
        // restituisco la pagina del singolo post
        return view('guest.show', compact('post'));
    }
}
