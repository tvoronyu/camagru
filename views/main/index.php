<?php
/**
 * Created by PhpStorm.
 * User: tvoronyu
 * Date: 10/28/18
 * Time: 4:31 PM
 */
//$file = file_get_contents(ROOT.'/image.png');
//echo $file;
include_once ROOT . "/template/php/header.php";
?>

<div class="container-fluid h-100">
    <div class="row h-100">
        <div class="col-8 w-100 m-1">
<!--            <img class="d-none" width="150" src="data:image/png;base64,--><?php //echo base64_encode($file)?><!--" alt="suka">-->
            <img class="d-sm-block d-md-none d-xl-none" width="300" src="/image.png" alt="suka">
            <img class="d-sm-none d-md-block d-xl-none" width="600" src="/image.png" alt="suka">
            <img class="d-sm-none d-md-none d-xl-block" width="1100" src="/image.png" alt="suka">
        </div>
    </div>
</div>

<?php
include_once ROOT . "/template/php/footer.php";
?>
