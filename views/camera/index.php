<?php
/**
 * Created by PhpStorm.
 * User: tvoronyu
 * Date: 10/30/18
 * Time: 6:13 PM
 */

include_once ROOT.'/template/php/header.php';
?>
<?php if ($_SESSION['login'] == '')
    header("location: /login");
?>
<div class="container h-100">
    <div class="row h-100">
        <div class="flex-column w-100">
            <div class="container-fluid h-75">
                <div class="row h-100">
                    <div class="col d-flex justify-content-center align-items-center">
                        <div class="flex-column">
                            <div><video id="video" style="width: 100%; height: 50%" src="" autoplay></video></div>
                            <div class="container">
                                <div class="row">
                                    <button id="button" class="btn btn-info btn-block">chees...</button>
                                </div>
                            </div>
                            <div class="container">
                                <div class="row">
                                    <button id="newphoto" class="btn btn-success mt-2 btn-block">new photo</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="container-fluid h-25">
                <div class="row h-100">
                    <div class="col h-100">
                        <div class="container-fluid h-100">
                            <div class="row h-100">
                                <div class="col d-flex justify-content-center align-items-center" style="margin: 0px;padding: 0px">
                                    <img id="img-1" style="width: 15%; height: auto" src="/template/img/user.jpg" class="rounded img-fluid img-thumbnail" alt="">
                                    <img id="img-2" style="width: 15%; height: auto" src="/template/img/user.jpg" class="rounded img-fluid img-thumbnail" alt="">
                                    <img id="img-3" style="width: 15%; height: auto" src="/template/img/user.jpg" class="rounded img-fluid img-thumbnail" alt="">
                                    <img id="img-4" style="width: 15%; height: auto" src="/template/img/user.jpg" class="rounded img-fluid img-thumbnail" alt="">
                                    <img id="img-5" style="width: 15%; height: auto" src="/template/img/user.jpg" class="rounded img-fluid img-thumbnail" alt="">
                                    <img id="img-6" style="width: 15%; height: auto" src="/template/img/user.jpg" class="rounded img-fluid img-thumbnail" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<canvas id="canvas" style="display: none; width: 640px;height: 480px;"></canvas>
<script src="/template/js/camera.js" type="text/javascript"></script>
<?php
include_once ROOT.'/template/php/footer.php';
?>
