<?php

return array(
    //'base_url' => URL::route( Config::get( 'anvard::routes.login' ) ),
    'providers' => array (
        "Google" => array (
            "enabled" => false,
            "keys"    => array ( "id" => "PUT_YOURS_HERE", "secret" => "PUT_YOURS_HERE" ),
            "scope"   => "https://www.googleapis.com/auth/userinfo.profile https://www.googleapis.com/auth/userinfo.email" // optional
        ),

        'Facebook' => array (
            'enabled' => true,
            'keys'    => array ( 'id' => '776167932490026', 'secret' => 'b92bb2c600e20ee61a65c9975bb46f7b' ),
            "scope"   => 'user_about_me, email, user_birthday, user_hometown, user_friends',
            //"display" => "popup"
        ),

        'Twitter' => array (
            'enabled' => false,
            'keys'    => array ( 'key' => '', 'secret' => '' )
        ),

        'LinkedIn' => array (
            'enabled' => false,
            'keys'    => array ( 'key' => '', 'secret' => '' )
        ),
    )
);