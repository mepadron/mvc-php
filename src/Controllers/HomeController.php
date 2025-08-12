<?php
namespace App\Controllers;

use App\ControllerBase;

class HomeController extends ControllerBase
{
    public function index()
    {
        $this->renderView('index_view');
    }

    public function create()
    {
        var_dump($_POST);
    }
}
