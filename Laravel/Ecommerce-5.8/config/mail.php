<?php

return [




    

    'driver' => "smtp",

    'host' =>  "smtp.mailtrap.io",

    'port' =>  "2525",


    

    'from' => [
        'address' => env('MAIL_FROM_ADDRESS', 'mahmmudhossain582@gmail.com'),
        'name' => env('MAIL_FROM_NAME', 'New Shop'),
    ],

 

    'encryption' => env('MAIL_ENCRYPTION', 'tls'),



    'username' =>"54d5178721e5d7",

    'password' => "b63fa532b2d619",

   

    'sendmail' => '/usr/sbin/sendmail -bs',

   

    'markdown' => [
        'theme' => 'default',

        'paths' => [
            resource_path('views/vendor/mail'),
        ],
    ],

    

    'log_channel' => env('MAIL_LOG_CHANNEL'),

];
