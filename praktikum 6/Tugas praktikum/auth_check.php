<?php
session_start();

/* CEK LOGIN */
if(!isset($_SESSION['login']) || $_SESSION['login'] !== true){
    header("Location: auth.php");
    exit;
}
?>