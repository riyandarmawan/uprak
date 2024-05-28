<?php

class Flasher
{
    public static function setFlashMessage($message) {
        $_SESSION['flash'] = $message;
    }

    public static function getFlashMessage() {
        if($_SESSION['flash']) {
            echo $_SESSION['flash'];
            unset($_SESSION['flash']);
        }
    }
}
