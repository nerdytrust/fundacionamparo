<?php
return array(
    'index' => 'login',
    'login' => 'login/{provider}',
    'loginredirect' => '/',   // set this if you want a default redirect after login, else it will use back()
    'logout' => 'login/logout',
    'logoutredirect' => '/',
    'authfailed' => 'login/{provider}',
    // 'endpoint' => 'anvard/endpoint', // set this if you want a default redirect after logout, else it will use back()
);
