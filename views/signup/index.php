<?php
/**
 * Created by PhpStorm.
 * User: tvoronyu
 * Date: 10/28/18
 * Time: 1:33 PM
 */
include_once ROOT . '/template/php/header.php';
?>
<div class="container h-100">
    <div class="h-100 d-flex justify-content-center align-content-center ">
        <!--        <form class="mt-lg-5" action="#">-->
        <div class="" style="margin-top: 20%">
            <div class="">
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword2">Confirm Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword2" placeholder="Confirm Password">
                </div>
                <div class="form-group">
                    <label for="exampleInputName1">Name</label>
                    <input type="text" class="form-control" id="exampleInputName1" placeholder="Name">
                </div>
                <div class="form-group">
                    <label for="exampleInputName2">Sername</label>
                    <input type="text" class="form-control" id="exampleInputName2" placeholder="Sername">
                </div>
                <!--                <div class="form-group form-check">-->
                <!--                    <input type="checkbox" class="form-check-input" id="exampleCheck1">-->
                <!--                    <label class="form-check-label" for="exampleCheck1">Check me out</label>-->
                <!--                </div>-->
                <button  type="submit" class="btn btn-primary btn-block">Submit</button>
            </div>
            <!--        </form>-->
        </div>
    </div>
</div>
<?php
include_once ROOT . '/template/php/footer.php';
?>
