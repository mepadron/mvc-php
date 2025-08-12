<?php
namespace App\Controllers;

use App\ControllerBase;

class HomeController extends ControllerBase
{
    public function index()
    {
        $this->renderView('index_view');
    }
}
