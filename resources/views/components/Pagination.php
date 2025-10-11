<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Pagination extends Component
{
    public $currentPage;
    public $totalPages;

    public function __construct($currentPage = 1, $totalPages = 48)
    {
        $this->currentPage = $currentPage;
        $this->totalPages = $totalPages;
    }

    public function render()
    {
        return view('components.pagination');
    }
}
