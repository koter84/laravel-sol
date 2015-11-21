# Laravel 5.1 Sol Login
[![License](https://poser.pugx.org/scollins/steam-auth/license)](https://packagist.org/packages/scollins/steam-auth)

This package redirects user to ScoutingNL and returns with user information.

The user will be redirected to the ScoutingNL login page, if they are able to sucsessfully login the folowing details are stored in the session:
   - username
   - email
   - name
   - birthdate
   - gender
   - language
   - timezone

Now with support for Facades, just add `'solLogin' => \Koter84\SolAuth\Http\SolLogin::class,` to your kernel and it will test if the user is logged in.

## How to use
Grab the package with `composer require koter84/sol-auth`

Add to your services `Koter84\SolAuth\SolAuthServiceProvider::class,`

You can even made a Facade `'Sol' => Koter84\SolAuth\SolAuthFacade::class,`

Then publish the config files `php artisan vendor:publish`

Fill in the details at /config/sol.php


Redirect user to /sollogin and they should login and /sollogout to logout
