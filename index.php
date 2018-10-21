<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <meta name="viewport" content="width=device-width; initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script src="js/capture.js" type="text/javascript"></script>
<!--    <script type="text/javascript" src="https://cdn.jsdelivr.net/bootstrap.native/1.0.2/bootstrap-native.min.js"></script>-->
</head>
<body>
<nav>
    <div class="nav-div">
        <div class="nav-div-one">
            <span class="logo-camagru">Camagru</span>
        </div>
    </div>
    <div class="nav-div" style="justify-content: flex-end">
        <div class="nav-div-one">
            <div class="logo-name-div">
                <span class="logo-name">Taras</span>
            </div>
        </div>
    </div>
</nav>
<div class="main-full">
    <div class="main">
        <div class="main-main">
            <div class="main-capture">
                <div class="capture-camera">
                    <video id="video" style="width: 100%;height: 100%" autoplay="autoplay"></video>
                </div>
                <div class="capture-picture">

                    <canvas id="canvas" style="width: 100%;height: 100%; display: none"></canvas>
                    <img  style="width: 100%;height: 80%" id="image" src="https://cdn.newsapi.com.au/image/v1/9fdbf585d17c95f7a31ccacdb6466af9" alt="Your photo">
                </div>
            </div>
            <button id="button" style="width: 100%;height: 30px; background-color: #af0d11; border-radius: 5px">snapshot</button>
            <a href="php/image.jpg" download>Donwload image</a>
        </div>
        <div class="main-menu">
            <div class="menu">
                <button type="button" name="filter" id="t1" value="1">gray</button>
                <button type="button" name="filter" id="t2" value="0">negative</button>
                <button type="button" name="filter" id="t4" value="0">edge</button>
                <button type="button" name="filter" id="t5" value="0">emdos</button>
                <button type="button" name="filter" id="t3" value="10">reset</button>
            </div>
        </div>
    </div>
</div>
</body>
</html>