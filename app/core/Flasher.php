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

    public static function setFlashAlert($name, $message, bool $success)
    {
        $_SESSION['flash'][$name] = ['message' => $message, 'success' => $success];
    }

    public static function getFlashAlert($name)
    {
        if (isset($_SESSION['flash'][$name])) {
            $success = 'success';

            if($_SESSION['flash'][$name]['success'] == false) {
                $success = 'danger';
            }

            echo    "<div class='alert alert-$success role='alert'>
                        " . $_SESSION['flash'][$name]['message'] . "
                    </div>";
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
