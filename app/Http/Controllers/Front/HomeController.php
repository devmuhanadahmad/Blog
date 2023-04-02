<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return view('front.home');
    }
    public function show($id){
        $post=Post::findOrFail($id);
         return view('front.single',compact('post'));
     }
     public function showContact(){
         return view('front.contact');
     }
     public function showBlog(){
        return view('front.blog');
    }

}
