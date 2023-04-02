<?php

namespace App\View\Components;

use App\Models\Post;
use Illuminate\View\Component;

class Trending extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.trending',[
            'posts'=>Post::with('user')->where('status','active')->take(8)->latest()->get()
        ]);
    }
}
