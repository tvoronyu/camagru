<?php
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
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="*******">
                </div>
                <!--<div class="form-group">
                    <label for="exampleInputPassword2">Confirm Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword2" placeholder="Confirm Password">
                </div>-->
                <div class="form-group">
                    <label for="exampleInputName1">Name</label>
                    <input type="text" class="form-control" id="exampleInputName1" placeholder="Taras">
                </div>
                <div class="form-group">
                    <label for="exampleInputName2">Sername</label>
                    <input type="text" class="form-control" id="exampleInputName2" placeholder="Voronyuk">
                </div>
                <!--                <div class="form-group form-check">-->
                <!--                    <input type="checkbox" class="form-check-input" id="exampleCheck1">-->
                <!--                    <label class="form-check-label" for="exampleCheck1">Check me out</label>-->
                <!--                </div>-->
                <button  type="submit" id="btn" class="btn btn-primary btn-block">Submit</button>
                <br>
                <div class="d-flex justify-content-center">
                    <a class="text-primary" style="text-decoration-line: none" href="login">Login</a>
                </div>
            </div>
            <!--        </form>-->
        </div>
    </div>
</div>
<script src="/template/js/signup.js" type="text/javascript"></script>
<?php
include_once ROOT . '/template/php/footer.php';
?>
