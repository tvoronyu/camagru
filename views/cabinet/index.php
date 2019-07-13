<?php
/**
 * Created by PhpStorm.
 * User: tvoronyu
 * Date: 10/29/18
 * Time: 7:01 PM
 */
include_once ROOT.'/template/php/header.php';
?>

<style>

    @media screen and (min-width: 1400px) {
        .photo_profile{
            grid-column-start: 2;
            grid-column-end: 9;
            grid-row-start: 3;
            grid-row-end: 3;
        }

        .main_info{
            grid-column-start: 10;
            grid-column-end: 17;
            grid-row-start: 3;
            grid-row-end: 3;
        }

        .edit_password{
            grid-column-start: 18;
            grid-column-end: 24;
            grid-row-start: 3;
            grid-row-end: 3;
        }

        .width{
            width: 75%;

            padding: 5px;
        }
    }

    @media screen and (min-width: 900px) {
        .photo_profile{
            grid-column-start: 2;
            grid-column-end: 9;
            grid-row-start: 3;
            grid-row-end: 3;
        }

        .main_info{
            grid-column-start: 10;
            grid-column-end: 17;
            grid-row-start: 3;
            grid-row-end: 3;
        }

        .edit_password{
            grid-column-start: 18;
            grid-column-end: 24;
            grid-row-start: 3;
            grid-row-end: 3;
        }
    }

</style>

<div class="grid-container h-100 w-100">
    <div class="photo_profile w-100 h-100">
        <img class="w-100" style="border-radius: 10%" src="../../image.png" alt="">
    </div>
    <div class="main_info m-4">
        <div class="pr-5 pl-5 pt-5">
            <div><input id="inputName" class="inputName width" disabled type="text" value="<?php print $_SESSION['account']['user_name']?>" style="border-radius: 10%"> <img id="inputNameEdit" style="margin-top: -40px" width="30px" src="http://s1.iconbird.com/ico/0912/ToolbarIcons/w256h2561346685464Edit.png" alt=""></div>
            <div class="w-100 pt-2">
                <button id="btnName" class="btn btn-primary width disabled">Save</button>
            </div>
        </div>
        <div class="pr-5 pl-5 pt-5">
            <div><input id="inputSerName" class="inputSername width" disabled type="text" value="<?php print $_SESSION['account']['user_sername']?>" style="border-radius: 10%"> <img id="inputSerNameEdit" style="margin-top: -40px" width="30px" src="http://s1.iconbird.com/ico/0912/ToolbarIcons/w256h2561346685464Edit.png" alt=""></div>
            <div class="w-100 pt-2">
                <button id="btnSerName" class="btn btn-primary width disabled">Save</button>
            </div>
        </div>
        <div class="pr-5 pl-5 pt-5">
            <div><input id="inputEmail" class="inputEmail width" disabled type="text" value="<?php print $_SESSION['account']['user_email']?>" style="border-radius: 10%"><img id="inputEmailEdit" style="margin-top: -40px" width="30px" src="http://s1.iconbird.com/ico/0912/ToolbarIcons/w256h2561346685464Edit.png" alt=""></div>
            <div class="w-100 pt-2">
                <button id="btnEmail" class="btn btn-primary width disabled">Save</button>
            </div>
        </div>
        <div class="pr-5 pl-5 pt-5">
            <?php if($_SESSION['account']['user_notification']){
                print "<input id=\"checkbox\" checked=\"checked\" class=\"checkbox\" type=\"checkbox\" value=\"fefe\"> <input disabled  type=\"text\" value=\"Notification by email\">";
            };?>
            <?php if(!$_SESSION['account']['user_notification']){
                print "<input id=\"checkbox\" class=\"checkbox\" type=\"checkbox\" value=\"fefe\"> <input disabled  type=\"text\" value=\"Notification by email\">";
            };?>
        </div>
    </div>
    <div class="edit_password w-100 h-100  m-4">
        <div class="pl-5 pr-5 pt-5 d-flex justify-content-center">
            <strong class="text-success"> Edit Password</strong>
        </div>
        <div class="p-5 d-flex justify-content-center">
            <input id="oldPass" class="w-75" type="password" placeholder="old password">
        </div>
        <div class="p-5 d-flex justify-content-center">
            <input id="newPass" class="w-75" type="password" placeholder="new password">
        </div>
        <div class="p-5 d-flex justify-content-center">
            <button id="btnPass" class="btn btn-primary">Edit Password</button>
        </div>
    </div>
</div>

<script type="application/javascript" src="../../template/js/profile.js"></script>


<?php
include_once ROOT.'/template/php/footer.php';
?>
