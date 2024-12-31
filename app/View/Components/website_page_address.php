<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class website_page_address extends Component
{
    public $page_address;
    /**
     * Create a new component instance.
     */
    public function __construct($postTitle)
    {
        $this->page_address=$postTitle;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.website_page_address',['page_address'=>$this->page_address]);
    }
}
