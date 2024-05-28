<?php

class Controller
{
    public function view($view) {
        require_once '../../public/views/' . $view;
    }
}
