<?php
 
return [

    /*
    |--------------------------------------------------------------------------
    | Urls
    |--------------------------------------------------------------------------
    |
    | url: Install URL, leave blank to autodetect (default: $_SERVER['HTTP_HOST'])
    | loginUrl: Where the user needs to go to login (default: sollogin)
    | logoutUrl: Where the user needs to go to logout (default: sollogout)
    | loginView: The view to load to have the user input his/her username for sol (default: views/vendor/sol-auth/login.blade.php)
    | loginRedirect: Where the user should be redirected after they are logged in (default: /)
    | logoutRedirect: Where the user should be redirected if they are not logged in (default: /)
    |
    */

    'url' => '',
    'loginUrl' => '',
    'logoutUrl' => '',
	'loginView' => '',
    'loginRedirect' => '',
    'logoutRedirect' => '',
];