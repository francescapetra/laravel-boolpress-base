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
}
