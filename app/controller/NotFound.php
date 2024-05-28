<?php

require_once 'app/core/Controller.php';

class NotFound extends Controller
{
    public function index()
    {
        $this->view('/page/index.php');
    }
}
