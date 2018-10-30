<?php
/**
 * Created by PhpStorm.
 * User: tvoronyu
 * Date: 10/28/18
 * Time: 3:25 PM
 */
include_once ROOT . '/template/php/header.php';
//echo"<pre>";
//print_r($listUsers);
?>
    <?php if ($_SESSION['login'] == '')
        header("location: /login");
    ?>
<div class="container h-100">
    <div class="row">
        <?php foreach ($listUsers as $index):?>
            <a>
                <div class='col border rounded p-5'>
                    <label for="img-p" class="cursor_1"></label>
                    <div class='d-flex justify-content-center'>
                        <img id="user-<?php echo $index['id_user'];?>" class="img-p" src='http://media.pn.am/media/issue/197/297/photo/197297.jpg ' alt='user_photo'>
                    </div>
                    <div>
                        <p id="user-<?php echo $index['id_user'];?>"  class='img-p p-3 mt-2 d-flex justify-content-center'><?php echo $index['name_user']." ", $index['sename_user']?></p>
                    </div>
                </div>
            </a>
        <?php endforeach; ?>
    </div>
</div>
<script src="/template/js/getUserId.js" type="text/javascript"></script>
<?php
include_once ROOT . '/template/php/footer.php';
