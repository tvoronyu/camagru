<?php
/**
 * Created by PhpStorm.
 * User: tvoronyu
 * Date: 10/30/18
 * Time: 6:13 PM
 */

include_once ROOT.'/template/php/header.php';
?>

<style>



</style>



<div class="grid-container h-100">
    <div class="item video m-1">
        <video id="video" src="" width="100%"></video>
    </div>
    <div id="canvas-container" class="item photo">
        <canvas  class="w-100" id="canvas" style="display: block"></canvas>
        <canvas  class="w-100" id="canvas2" style="display: none"></canvas>
    </div>
    <div class="item but1 d-flex justify-content-center align-content-center">
        <button id="but1" class="btn btn-primary w-100 m-3">Make photo</button>
    </div>
    <div class="item but2 d-flex justify-content-center align-content-center">
        <button class="btn btn-danger w-100 m-3">Clear photo</button>
    </div>
    <div class="item but3 d-flex justify-content-center align-content-center">
        <button class="btn btn-info w-100 m-3">Save photo</button>
    </div>
    <div class="item but4 d-flex justify-content-center align-content-center">
        <button class="btn btn-success w-100 m-3">Effect photo</button>
    </div>
    <div class="item download d-flex justify-content-center align-content-center m-3">
        <form action="#">
            <input type="file" class="btn btn-primary m-2" value="file">
            <button type="submit" class="btn btn-success m-2 w-100">Download</button>
        </form>
    </div>
    <div class="item gallery">
        <img id="photo1" src="../../image.png" class="w-100" alt="">
    </div>
    <div class="footer d-flex justify-content-end">Camagru 2019</div>
</div>

<script src="/template/js/camera.js" type="text/javascript"></script>
<?php
include_once ROOT.'/template/php/footer.php';
?>
