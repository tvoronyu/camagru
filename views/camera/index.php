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

    .modalDialog {
        position: fixed;
        font-family: Arial, Helvetica, sans-serif;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        background: rgba(0,0,0,0.8);
        z-index: 99999;
        -webkit-transition: opacity 400ms ease-in;
        -moz-transition: opacity 400ms ease-in;
        transition: opacity 400ms ease-in;
        display: none;
        pointer-events: none;
    }


    .modalDialog:target {
        display: block;
        pointer-events: auto;
    }

    .modalDialog > div {
        max-width: 700px;
        position: relative;
        margin: 10% auto;
        padding: 5px 20px 13px 20px;
        border-radius: 10px;
        background: #fff;
        background: -moz-linear-gradient(#fff, #999);
        background: -webkit-linear-gradient(#fff, #999);
        background: -o-linear-gradient(#fff, #999);
    }

    .close {
        /*background: #606061;*/
        color: #FFFFFF;
        line-height: 25px;5
        position: absolute;
        right: -12px;
        text-align: center;
        top: -10px;
        width: 24px;
        text-decoration: none;
        font-weight: bold;
        /*-webkit-border-radius: 12px;*/
        /*-moz-border-radius: 12px;*/
        /*border-radius: 12px;*/
        /*-moz-box-shadow: 1px 1px 3px #000;*/
        /*-webkit-box-shadow: 1px 1px 3px #000;*/
        /*box-shadow: 1px 1px 3px #000;*/
    }

    .close:hover {
        /*background: red;*/
    }




</style>



<div id="grid-container" class="grid-container h-100">
    <div class="item video m-1 d-flex align-content-center">
        <video id="video" src="" width="100%"></video>
    </div>
    <div id="canvas-container" class="item photo">
        <canvas  class="w-100" id="canvas" style="display: block; border: #0b2e13 1px solid"></canvas>
    </div>
    <div class="btn-1-4 w-100">
        <div class="item but1 h-25 d-flex justify-content-center align-content-center">
            <button id="btnMake" class="btn btn-primary w-100  m-3">Make photo</button>
        </div>
        <div class="item but3 h-25 d-flex justify-content-center align-content-center">
            <button id="btnSave" class="btn btn-info w-100 m-3">Save photo</button>
        </div>
        <div class="item but2 h-25 d-flex justify-content-center align-content-center">
            <button id="btnClear" class="btn btn-danger w-100 m-3">Clear photo</button>
        </div>
        <div style="display: none" class="item but4 h-25 d-flex justify-content-center align-content-center">
            <button style="display: none" id="btnClearEffect" class="btn btn-success w-100 m-3">Clear effect</button>
        </div>
    </div>
    <div id="template" class="w-100 h-100 template p-1" style="overflow: scroll;overflow-x: hidden; border: #1b1e21 1px dashed;">
        <img id="ramka1" style="float: left" class="w-25 h-50" src="../../template/img/ramka1.png" alt="">
        <img id="ramka2" style="float: left" class="w-25 h-50" src="../../template/img/ramka2.png" alt="">
        <img id="ramka3" style="float: left" class="w-25 h-50" src="../../template/img/ramka3.png" alt="">
        <img id="ramka4" style="float: left" class="w-25 h-50" src="../../template/img/ramka4.png" alt="">
        <img id="ramka5" style="float: left" class="w-25 h-50" src="../../template/img/ramka5.png" alt="">
        <img id="ramka6" style="float: left" class="w-25 h-50" src="../../template/img/ramka6.png" alt="">
        <img id="sticker1" style="float: left" class="w-25 h-50" src="../../template/img/sticker1.png" alt="">
        <img id="sticker2" style="float: left" class="w-25 h-50" src="../../template/img/sticker2.png" alt="">
        <img id="sticker3" style="float: left" class="w-25 h-50" src="../../template/img/sticker3.png" alt="">
    </div>
    <div id="gallery" class="item gallery" style="border: #1f60ff 2px double">
        <?php foreach ($photos as $photo) :?>
        <div>
            <img id="photo1" src="/PhotoUsers/<?php print $photo->photo_name?>" class="w-100 pb-1" alt="">
        </div>
        <?php endforeach;?>
    </div>
    <div class="footer d-flex justify-content-end">Camagru 2019</div>
</div>

<!--<a href="#openModal">Открыть модальное окно</a>-->

<div id="openModal" class="modalDialog">4
    <div>
        <a href="#close" title="Закрыть" class="close">&#10060</a>
        <img class="w-100 p-1" id="modalPhoto" src="" alt="">
    </div>
</div>


<img id="mainPhoto" src="../../template/img/MainPhoto.svg" style="display: none" alt="">

<script src="/template/js/camera.js" type="text/javascript"></script>
<?php
include_once ROOT.'/template/php/footer.php';
?>
