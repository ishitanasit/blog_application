<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
      // dd('hyy');
         $blogPosts = BlogPost::latest()->get();
        return view('home.index', compact('blogPosts'));
       
    }
    public function show()
    {
      return view('user.index');
       
    }
}
