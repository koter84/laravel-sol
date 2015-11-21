<?php
Route::get('/'.config('sol.loginUrl', 'sollogin'), 'Koter84\SolAuth\Http\SolController@signIn');
Route::post('/'.config('sol.loginUrl', 'sollogin'), 'Koter84\SolAuth\Http\SolController@signIn');
Route::get('/'.config('sol.logoutUrl', 'sollogout'), 'Koter84\SolAuth\Http\SolController@signOut');
