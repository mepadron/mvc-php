<?php
namespace App;

class ControllerBase
{
    protected function renderView($view, $params = []): void
    {
        extract($params);
        include __DIR__ . '/Views/' . $view . '.php';
    }
}
