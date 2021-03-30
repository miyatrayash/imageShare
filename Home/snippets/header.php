<?php

include_once  $_SERVER['DOCUMENT_ROOT'] . '/Auth/isSigned.php';
include_once  "/imageShare/Database/config.php";

$login = "/imageShare/Login/Login.php";
$home = "/imageShare/Home/home.php";
$logout = "/imageShare/Login/logout.php";
$upload = "/imageShare/Home/upload.php";
$shared = "/imageShare/Home/shared.php";
$name = $_SESSION['user']['username'];
?>


<!DOCTYPE html>
<html lang="en">
<title>Home Page</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<style>
    body{
        background-image: url("/imageShare/static/imgs/pexels-sohel-patel-1199824.jpg");
    }
    nav{
        background-color: black;
    }
    body,h1,h2,h3,h4,h5 {font-family: sans-serif}
    .photo img{margin-bottom: -6px; cursor: pointer}
    .photo img:hover{opacity: 0.6; transition: 0.3s}
</style>
<body class="w3-light-grey">

<nav class="w3-sidebar w3-bar-block w3-black w3-animate-right w3-top w3-text-light-grey w3-large" style="z-index:3;width:250px;font-weight:bold;display:none;right:0;" id="mySidebar">
    <a href="javascript:void(0)" onclick="w3_close()" class="w3-bar-item w3-button w3-center w3-padding-32">CLOSE</a>
    <a href="<?php echo $home; ?>" onclick="w3_close()" class="w3-bar-item w3-button w3-center w3-padding-16">HOME</a>
    <a href="<?php echo $shared; ?>" onclick="w3_close()" class="w3-bar-item w3-button w3-center w3-padding-16">SHARED</a>
    <a href="<?php echo $upload; ?>" onclick="w3_close()" class="w3-bar-item w3-button  w3-center  w3-padding-16">UPLOAD</a>
    <a href="<?php echo $logout ?>" onclick="w3_close()" class="w3-bar-item w3-button w3-center w3-padding-16">LOGOUT</a>
    <a href="<?php echo $home; ?>" onclick="w3_close()" class="w3-bar-item w3-button  w3-center  w3-padding-16">ABOUT</a>

</nav>

<header class="w3-container w3-top w3-white w3-xlarge w3-padding-16">
    <span class="w3-left w3-padding">Welcome <?php echo $name; ?></span>
    <a href="javascript:void(0)" class="w3-right w3-button w3-white" onclick="w3_open()">☰</a>
</header>

<div class="w3-overlay w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>


<script>

    function w3_open() {
        document.getElementById("mySidebar").style.display = "block";
        document.getElementById("myOverlay").style.display = "block";
    }

    function w3_close() {
        document.getElementById("mySidebar").style.display = "none";
        document.getElementById("myOverlay").style.display = "none";
    }

</script>