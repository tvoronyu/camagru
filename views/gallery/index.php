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

    .modalDialog2 {
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


    .modalDialog2:target {
        display: block;
        pointer-events: auto;
    }

    .modalDialog2 > div {
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

    .close2 {
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

    .close2:hover {
        /*background: red;*/
    }



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
        /*pointer-events: none;*/
    }


    /*.modalDialog:target {*/
    /*    display: block;*/
    /*    pointer-events: auto;*/
    /*}*/

    .close:target.modalDialog{
        display: none;
    }

    .modalDialog > div {
        max-width: 700px;
        height: 70%;
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
        grid-column-start: 12;
        grid-column-end: 12;
        grid-row-start: 1;
        grid-row-end: 1;
        z-index: 99999999;
        /*-webkit-border-radius: 12px;*/
        /*-moz-border-radius: 12px;*/
        /*border-radius: 12px;*/
        /*-moz-box-shadow: 1px 1px 3px #000;*/
        /*-webkit-box-shadow: 1px 1px 3px #000;*/
        /*box-shadow: 1px 1px 3px #000;*/
    }

    .modal-photo{
        grid-column-start: 5;
        grid-column-end: 9;
        grid-row-start: 1;
        grid-row-end: 1;
    }

    .modal-comment{
        grid-column-start: 1;
        grid-column-end: 13;
        grid-row-start: 2;
        grid-row-end: 2;
    }

    .modal-textarea{
        grid-column-start: 1;
        grid-column-end: 13;
        grid-row-start: 3;
        grid-row-end: 3;
    }

    .modal-btn-send{
        grid-column-start: 1;
        grid-column-end: 13;
        grid-row-start: 4;
        grid-row-end: 4;
    }

    .close:hover {
        /*background: red;*/
    }

    .grid-gallery-modal{
        display: grid;
        grid-template-rows: 150px 1fr 100px 50px;
        grid-template-columns: repeat(12, 1fr);
    }


</style>



<div class="container-fluid w-100 h-100" id="gallery">
        <?php foreach ($photos as $photo) :?>
            <div class="p-1 m-2" style="float: left; text-align: center; width: 450px; height: 400px;border: cornsilk 2px solid">
                <img src="/PhotoUsers/<?php print $photo['photo_name'];?>" class="w-75 h-75 m-2" alt="">
                <?php if (isset($_SESSION['account'])) :?>
                    <div class="d-flex justify-content-around align-content-center">
                        <a id="like" class="<?php print $photo['photo_name'];?> far fa-heart pt-2" style="font-size: 40px; color: red; cursor:pointer;"><span><?php if ($photo['like'] != 0)print $photo['like']?></span></a>
                        <a id="comment" class="<?php print $photo['photo_name'];?>" style="font-size: 40px;cursor: pointer">&#128172</a>
                    </div>
                <?php endif; ?>
            </div>
        <?php endforeach;?>
</div>

<div id="openModal" class="modalDialog">
    <div class="grid-gallery-modal" id="modal-grid">
        <a href="#close" id="close" title="Close" class="close m-2 ml-5">&#10060</a>
        <div style="text-align: center" class="p-4 modal-photo">
            <img id="modalPhoto" class="" style="width: 150px; height: 100px;" src="" alt="">
        </div>
        <div class="modal-comment mt-1 mb-2" id="modal-comment" style="overflow: scroll;overflow-x: hidden; word-break: break-all">
            <!-- тут мають js-кою додаватись коменти -->
        </div>
        <div class="h-100 modal-textarea">
            <textarea style="width: 100%; position: relative; resize: none" name="" id="text" cols="30" rows="3"></textarea>
        </div>
        <button id="btn-send" class="btn btn-info modal-btn-send">send</button>
    </div>
</div>

<div id="openModal2" class="modalDialog2">4
    <div>
        <a href="#close2" title="Закрыть" class="close2">&#10060</a>
        <img class="w-100 p-1" id="modalPhoto2" src="" alt="">
    </div>
</div>


<script src="../../template/js/gallery.js"></script>

<?php
include_once ROOT.'/template/php/footer.php';
?>
