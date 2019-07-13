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


        /**
         * Controller
         */
        /** *********************************************** */

        'signup/verify'     => 'POST|Controllers/Auth/Signup@signup',
        'activate'          => 'GET|Controllers/Auth/VerifyEmail@verify',
        'login/verify'      => 'POST|Controllers/Auth/Login@login',
        'logout'            => 'GET|Controllers/Auth/Logout@logout',
        'forgot/verify'     => 'POST|Controllers/Auth/ForgotPassword@forgotPassword',
        'user/changeName'     => 'POST|Controllers/User/User@changeName',
        'user/changeSerName'     => 'POST|Controllers/User/User@changeSerName',
        'user/changeEmail'     => 'POST|Controllers/User/User@changeEmail',
        'user/notification'     => 'POST|Controllers/User/User@changeNotification',
        'user/changePassword'     => 'POST|Controllers/User/User@changePassword',
        'test'     => 'POST|Controllers/Test/Test@test',

        /** *********************************************** */


        /**
         * Views
         */
        /** *********************************************** */

        'login'             => 'GET|Views/Login@getLogin',
        'signup'            => 'GET|Views/Signup@getSignup',
        'camera'            => 'GET|Views/Camera@getCamera',
        'profile'           => 'GET|Views/Profile@getProfile',
        'gallery'           => 'GET|Views/Gallery@getGallery',
        'forgot'            => 'GET|Views/ForgotPassowrd@getForgot',
        ''                  => 'GET|Views/Landing@getLanding',

        /** *********************************************** */
);