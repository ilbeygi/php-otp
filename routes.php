<?php

use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Router;

/** @var $router Router */

$router->name('home')->get('/', function () {
    return [
        'error' => true
    ];
});

$router->group(['namespace' => 'App\Controllers', 'prefix' => 'otp'], function (Router $router) {
    $router->post('/send', ['name' => 'otp.send', 'uses' => 'OtpController@send']);
    $router->post('/verify', ['name' => 'otp.verify', 'uses' => 'OtpController@verify']);
});
