<?php
/**
 * Created by PhpStorm.
 * User: tvoronyu
 * Date: 10/28/18
 * Time: 1:05 PM
 */
?>
<!DOCTYPE html>
<html style="height: 100vh">
<head>
    <meta charset="UTF-8">
    <title>Camagru</title>
    <link rel="stylesheet" href="/css/style/style.css" type="text/css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body style="height: calc(100vh - 56px)">
<nav class="navbar navbar-expand bg-dark d-flex justify-content-between">
    <ul class="navbar-nav">
        <li class="nav-item"><a href="/" class="nav-link">Home</a></li>
    </ul>
    <ul class="navbar-nav">
        <?php if ($_SESSION['login'] != '') :?>
            <li class="nav-item"><a href="/camera" class="nav-link">Creat new Photo</a></li>
        <?php endif; ?>
        <?php if ($_SESSION['login'] == '') :?><li class="nav-item"><a href="/login" class="nav-link">Login</a></li>
        <li class="nav-item"><a href="/signup" class="nav-link">SignUp</a></li>
        <?php endif; ?>

        <?php if ($_SESSION['login'] != '') :?>
        <li class="nav-item"><a href="/users" class="nav-link">Users</a></li>
        <?php endif; ?>

        <?php if ($_SESSION['login'] != '') : ?>
            <li class="nav-item"><a href="/cabinet" class="nav-link">Cabinet</a></li>
        <?php endif; ?>

        <?php if ($_SESSION['login'] != '') : ?>
            <li class="nav-item"><a href="/logout" class="nav-link">Logout</a></li>
        <?php endif; ?>
    </ul>
</nav>