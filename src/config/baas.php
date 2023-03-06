<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'baas_id' => [
        'sender' => env('BAAS_SENDER', 'mywagepay'),
        'senderKey' =>  env('BAAS_SENDER_KEY', 'y-p39bt29ENZPfifA2ziEx1m8D1w8c9w9M-p1XywCRjM4v-mxMirBdwmFHrsTEC2'),
    ],

    'env_baas' => env('BAAS_ENV', 'sandbox')
];
