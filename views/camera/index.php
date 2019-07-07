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

    .size{

    }

</style>

<video id="video" src="" width="100%"></video>

<!--<div class="container h-100">-->
<!--    <div class="row h-100">-->
<!--        <div class="flex-column w-100">-->
<!--            <div class="container-fluid h-75">-->
<!--                <div class="row h-100">-->
<!--                    <div class="col d-flex justify-content-center align-items-center">-->
<!--                        <div class="flex-column">-->
<!--                            <div><video id="video" style="display: none; width: 1024px; height: 720px" src="" autoplay></video></div>-->
<!--                            <div>-->
<!--                                <img style="width: 300px; height: auto; margin: 10px" id="img-video" src="" alt="">-->
<!--                                <img style="width: 300px; height: auto;" src="/template/img/user.jpg" id="filter-image" alt="">-->
<!---->
<!--                            <div class="container">-->
<!--                                <div class="row">-->
<!--                                    <button id="button" class="btn btn-info btn-block">chees...</button>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                            <div class="container">-->
<!--                                <div class="row">-->
<!--                                    <button id="newphoto" class="btn btn-success mt-2 btn-block">new photo</button>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                                <div id="fountainTextG" style="position: absolute;display: none;">-->
<!--                                    <div id="fountainTextG_1" class="fountainTextG">З</div>-->
<!--                                    <div id="fountainTextG_2" class="fountainTextG">а</div>-->
<!--                                    <div id="fountainTextG_3" class="fountainTextG">г</div>-->
<!--                                    <div id="fountainTextG_4" class="fountainTextG">р</div>-->
<!--                                    <div id="fountainTextG_5" class="fountainTextG">у</div>-->
<!--                                    <div id="fountainTextG_6" class="fountainTextG">з</div>-->
<!--                                    <div id="fountainTextG_7" class="fountainTextG">к</div>-->
<!--                                    <div id="fountainTextG_8" class="fountainTextG">а</div>-->
<!--                                </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!---->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="container-fluid h-25">-->
<!--                <div class="row h-100">-->
<!--                    <div class="col h-100">-->
<!--                        <div class="container-fluid h-100">-->
<!--                            <div class="row h-100">-->
<!--                                <div class="col d-flex justify-content-center align-items-center" style="margin: 0px;padding: 0px">-->
<!--                                    <img id="img-1" style="width: 15%; height: auto" src="/template/img/user.jpg" class="rounded img-fluid img-thumbnail" alt="">-->
<!--                                    <img id="img-2" style="width: 15%; height: auto" src="/template/img/user.jpg" class="rounded img-fluid img-thumbnail" alt="">-->
<!--                                    <img id="img-3" style="width: 15%; height: auto" src="/template/img/user.jpg" class="rounded img-fluid img-thumbnail" alt="">-->
<!--                                    <img id="img-4" style="width: 15%; height: auto" src="/template/img/user.jpg" class="rounded img-fluid img-thumbnail" alt="">-->
<!--                                    <img id="img-5" style="width: 15%; height: auto" src="/template/img/user.jpg" class="rounded img-fluid img-thumbnail" alt="">-->
<!--                                    <img id="img-6" style="width: 15%; height: auto" src="/template/img/user.jpg" class="rounded img-fluid img-thumbnail" alt="">-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->
<canvas id="canvas" style="display: none; width: 1024px;height: 720px;"></canvas>
<script src="/template/js/camera.js" type="text/javascript"></script>
<?php
include_once ROOT.'/template/php/footer.php';
?>
