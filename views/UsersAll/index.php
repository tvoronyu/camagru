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
<div class="container h-100">
    <div class="row">
        <?php foreach ($listUsers as $index){
            echo "
            <div class='col border rounded p-5'><div class='d-flex justify-content-center'><img src='http://media.pn.am/media/issue/197/297/photo/197297.jpg ' alt='user_photo'></div>
            <div><p class='p-3 mt-2 d-flex justify-content-center'>{$index['login_user']}</p>
            </div>
            </div>
            ";
}
?>
    </div>
</div>
<?php
include_once ROOT . '/template/php/footer.php';
