<?php

namespace App\Http\ViewComposers;

use App\Post;
use Illuminate\Contracts\View\View;
use App\Models\Category;

class MainMenuComposer
{

    public function compose(View $view) {
        $categories = Category::where('status', 1)->get();
        $view->with('categories', $categories);
    }

}
