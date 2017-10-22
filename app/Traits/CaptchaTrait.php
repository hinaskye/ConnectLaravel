<?php namespace App\Traits;

use http\Env\Request;
use ReCaptcha\ReCaptcha;

trait CaptchaTrait {

    public function captchaCheck()
    {

        $response = request::get('g-recaptcha-response');
        $remoteip = $_SERVER['REMOTE_ADDR'];
        $secret   = env('RE_CAP_SECRET');

        $recaptcha = new ReCaptcha($secret);
        $resp = $recaptcha->verify($response, $remoteip);
        if ($resp->isSuccess()) {
            return 1;
        } else {
            return 0;
        }

    }

}