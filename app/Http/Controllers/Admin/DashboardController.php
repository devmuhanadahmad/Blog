<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(){
        return view('dashboard',[
            'categories'=>Category::all()->count(),
            'posts'=>Post::all()->count(),
            'postsUser'=>Post::where('user_id',Auth::user()->id)->count(),
            'tags'=>Tag::all()->count(),
        ]);
    }
}
