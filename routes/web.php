<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

use Illuminate\Http\Request;

Route::get('/', function () {
    $query = http_build_query([
        'client_id' => 12,
        'redirect_uri' => 'http://localhost:9000/callback',
        'response_type' => 'code',
        'scope' => '',
    ]);

    return redirect('http://localhost:8000/oauth/authorize?'.$query);
});

Route::get('/callback', function (Request $request) {

    $http = new GuzzleHttp\Client;

    $response = $http->post('http://localhost:8000/oauth/token', [
        'form_params' => [
            'grant_type' => 'authorization_code',
            'client_id' => 12,
            'client_secret' => 'rfkixBY5v3SwnqwRM570yKHfgQMRNyNDd1WgOxWP',
            'redirect_uri' => 'http://localhost:9000/callback',
            'code' => $request->code,
        ],
    ]);

    return json_decode((string) $response->getBody(),true);
    


});
