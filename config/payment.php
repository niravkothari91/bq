<?php

return [

    /*
    |--------------------------------------------------------------------------
    | CCAvenue configuration file
    |--------------------------------------------------------------------------
    |   gateway = CCAvenue
    |   view    = File
     */

    'gateway' => 'CCAvenue', // Making this option for implementing multiple gateways in future

    'testMode' => (bool)env('CCAVENUE_SANBOX', false), // True for Testing the Gateway [For production false]

    'ccavenue' => [ // CCAvenue Parameters
        'merchantId' => env('CCAVENUE_MERCHANT_ID', ''),
        'accessCode' => env('CCAVENUE_ACCESS_CODE', ''),
        'workingKey' => env('CCAVENUE_WORKING_KEY', ''),

        // Should be route address for url() function
        'redirectUrl' => env('CCAVENUE_REDIRECT_URL', 'cc-response'),
        'cancelUrl' => env('CCAVENUE_CANCEL_URL', 'cc-cancel'),

        'currency' => env('CCAVENUE_CURRENCY', 'INR'),
        'language' => env('CCAVENUE_LANGUAGE', 'EN'),
    ],

    // Add your response link here. In Laravel 5.* you may use the api middleware instead of this.
    'remove_csrf_check' => [
        env('CCAVENUE_REDIRECT_URL', 'cc-response'),
        env('CCAVENUE_CANCEL_URL', 'cc-cancel')
    ],

];
