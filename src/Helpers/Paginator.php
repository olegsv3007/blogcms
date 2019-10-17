<?php

namespace App\Helpers;

class Paginator
{
    public $totalItems;
    public $itemsPerPage;
    public $currentPage;

    public function __construct($totalItems, $itemsPerPage, $currentPage)
    {
        $this->totalItems = $totalItems;
        $this->itemsPerPage = $itemsPerPage;
        $this->currentPage = $currentPage;
    }

    public function getQuantityPages() 
    {
        return (int)ceil($this->totalItems / $this->itemsPerPage);
    }

    public function render() 
    {
        require VIEW_DIR . '/templates/paginator.php';
    }
}