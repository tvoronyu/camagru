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

    .grid-gallery-modal{

    }


</style>



<div class="container-fluid w-100 h-100" id="gallery">
        <?php foreach ($photos as $photo) :?>
            <div class="p-1 m-2" style="float: left; text-align: center; width: 450px; height: 400px;border: cornsilk 2px solid">
                <img src="/PhotoUsers/<?php print $photo->photo_name;?>" class="w-75 h-75 m-2" alt="">
                <?php if (isset($_SESSION['account'])) :?>
                    <div class="d-flex justify-content-around">
                        <a id="like" class="<?php print $photo->photo_name;?>" style="font-size: 40px; color: red; cursor:pointer;">&#128153</a>
                        <a id="comment" class="<?php print $photo->photo_name;?>" style="font-size: 40px;cursor: pointer">&#128172</a>
                    </div>
                <?php endif; ?>
            </div>
        <?php endforeach;?>
</div>

<div id="openModal" class="modalDialog">
    <div class="">
        <a href="#close" title="Закрыть" class="close">&#10060</a>
        <div style="text-align: center" class="p-4">
            <img id="modalPhoto" class="" style="width: 150px; height: 100px;" src="" alt="">
        </div>
        <div style="overflow: hidden; word-wrap: break-spaces">fjdskfj dsjhf jkdsh kjghdjkgh jkhdf hfdkjg hkjhfdk ghkfdh gkdfhgk hfdkg fkdghk jf</div>
        <div class="h-100">

        <textarea style="width: 100%; position: relative;" name="" id="" cols="30" rows="2"></textarea>
        <button class="btn btn-info">send</button>
        </div>

    </div>
</div>

<script src="../../template/js/gallery.js"></script>

<?php
include_once ROOT.'/template/php/footer.php';
?>
