<?php
return array(
//    'camera/make' => 'camera/captureMakePhoto',
//    'camera/getPhoto' => 'camera/getPhoto',
//    'camera' => 'camera/capture',
//    'users/delete/([0-9]+)' => 'users/userDelId/$1',
//    'cabinet' => 'userCabinet/getCabinet',
//    'users/([0-9]+)' => 'users/userId/$1/$2',
//    'users' => 'users/UsersAll',
//    'signup/valid' => 'sign/signupvalid',
//    'signup' => 'sign/signup',
//    'login/valid' => 'login/loginvalid',
//    'login' => 'login/login',
//    'logout' => 'login/logout',

        'signup/verify' => 'POST|Controllers/Auth/Signup@signup',
        'signup' => 'GET|Views/Signup@getSignup',
        '' => 'GET|Views/Landing@getLanding',
        'activate' => 'GET|Controllers/Auth/VerifyEmail@verify'

);