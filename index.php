<?php 

if(!session_id()) session_start();

require_once 'app/init.php';

$app = new App();

if(!isset($_SESSION['login'])) {
    header('Location: /login');
    exit;
}