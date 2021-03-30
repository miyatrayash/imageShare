<?php


session_start();
if(!isset($_SESSION['user']))
{
    header('Location:/imageShare/Login/login.php');
}
