<?php
namespace Koter84\SolAuth\Http;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\RedirectResponse;


class SolController extends Controller {

    protected function cURL($url) {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => $url
        ));
        $resp = curl_exec($curl);
        curl_close($curl);
        return $resp;
    }

    public function signIn(Request $request)
    {
        $input = $request->only('username');

        if (empty(config('sol.url'))) {
            $url = $_SERVER['HTTP_HOST'];
        } else {
            $url = config('sol.url', $_SERVER['HTTP_HOST']);
        }
        $openid = new \Koter84\SolAuth\LightOpenID($url);
        if (!$openid->mode) {
            // ToDo - username from remember-me-cookie...
            if($input['username'] == "") {
                if (empty(config('sol.loginView'))) {
                    return view('sol-auth::login');
                } else {
                    return view(config('sol.loginView'));
                }
            }

            $openid->identity = 'https://login.scouting.nl/user/'.$input['username'];
            $openid->required = array('contact/email','namePerson', 'namePerson/friendly');
            $openid->optional = array('birthDate','person/gender','pref/language','pref/timezone');
            //echo $openid->authUrl();
            return redirect($openid->authUrl());
        } elseif ($openid->mode == 'cancel') {
            echo 'cancel auth';
        } else {
            if ($openid->validate()) {
                $attr = $openid->getAttributes();
                Session::put('email', $attr['contact/email']);
                Session::put('name', $attr['namePerson']);
                Session::put('username', $attr['namePerson/friendly']);
                Session::put('birthdate', $attr['birthDate']);
                Session::put('gender', $attr['person/gender']);
                Session::put('language', $attr['pref/language']);
                Session::put('timezone', $attr['pref/timezone']);
                return redirect(config('sol.loginRedirect', '/'));
            }
            else
            {
                echo "something failed while authenticating...<br/>\n";
                return dd($openid);
            }
        }
    }
    
    public function check()
    {
        return Session::has('email');
    }
    
    public function signOut()
    {
        Session::forget('email');
        Session::forget('name');
        Session::forget('username');
        Session::forget('birthdate');
        Session::forget('gender');
        Session::forget('language');
        Session::forget('timezone');
        return redirect(config('sol.logoutRedirect', '/'));
    }
}
