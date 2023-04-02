<?php

namespace App\View\Components;

use App\Models\Post;
use Illuminate\View\Component;

class Popular extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.popular',[
            'posts'=>Post::where('status','active')->take(4)->latest()->get()
        ]);
    }
}
