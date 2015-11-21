<?php
namespace Koter84\SolAuth;
 
use Illuminate\Support\Facades\Facade;
 
class SolAuthFacade extends Facade {
 
    protected static function getFacadeAccessor() {
        return 'Koter84\SolAuth\Http\SolController';
    }
 
}
