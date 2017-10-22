<?php

namespace App\Validators;
namespace App\Http\Controllers\Auth;

use GuzzleHttp\Client;

class ReCaptcha
{
    public function validate(
        $attribute,
        $value,
        $parameters,
        $validator
    ){

        $client = new Client();

        $response = $client->post(
            'https://www.google.com/recaptcha/api/siteverify',
            ['form_params'=>
                [
                    'secret'=>'66LfvXDUUAAAAAAuDp_T_6LEq-UQCyVQRiL8CivT3',
                    'response'=>$value
                ]
            ]
        );

        $body = json_decode((string)$response->getBody());
        return $body->success;
    }

}
