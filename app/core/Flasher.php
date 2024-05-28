<?php

class Flasher
{
    public static function setFlashMessage($name, $message)
    {
        $_SESSION['flash'][$name] = $message;
    }

    public static function getFlashMessage($name)
    {
        if (isset($_SESSION['flash'][$name])) {
            echo $_SESSION['flash'][$name];
            unset($_SESSION['flash'][$name]);
        }
    }

    public static function setOld($name, $value)
    {
        $_SESSION['old'][$name] = $value;
    }

    public static function getOld($name)
    {
        if (isset($_SESSION['old'][$name])) {
            echo $_SESSION['old'][$name];
            unset($_SESSION['old'][$name]);
        }
    }
}
