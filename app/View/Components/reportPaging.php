<?php

namespace App\View\Components;

use Illuminate\View\Component;

class reportPaging extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $option_page;
    public function __construct($option_page = NULL)
    {
        $this->option_page;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.report-paging');
    }
}
