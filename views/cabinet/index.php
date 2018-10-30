<?php
/**
 * Created by PhpStorm.
 * User: tvoronyu
 * Date: 10/29/18
 * Time: 7:01 PM
 */
include_once ROOT.'/template/php/header.php';
?>
<?php if ($_SESSION['login'] == '')
    header("location: /login");
?>
<div class="container h-100">
    <div class="row h-100">
        <div class="col-5">
            <div class="border">
                <div class="pt-3">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col">
                                <?php if ($var['pic_user']) : ?>
                                    <img src="<?php echo $var['pic_user'] ?>" alt="photo">
                                <?php endif; ?>
                                <?php if ($var['pic_user'] == '') : ?>
                                    <img src="http://media.pn.am/media/issue/197/297/photo/197297.jpg" alt="photo">
                                <?php endif; ?>
                            </div>
                            <?php if ($_SESSION['id'] == $var['id_user']) :?>
                            <div class="col">
                                <a>New photo</a>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="flex-column p-3">
                    <div class="w-100"><span style="font-family: cursive; font-size: 30px"><?php echo $var['name_user']?></span></div>
                    <div><span style="font-family: cursive; font-size: 30px"><?php echo $var['sename_user']?></span></div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include_once ROOT.'/template/php/footer.php';
?>
