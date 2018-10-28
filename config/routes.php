<?php
return array(
    'users/delete/([0-9]+)' => 'users/userDelId/$1',
    'users/([0-9]+)' => 'users/userId/$1',
    'users' => 'users/UsersAll',
    'signup/valid' => 'sign/signupvalid',
    'signup' => 'sign/signup',
    'login/valid' => 'login/loginvalid',
    'login' => 'login/login',

);