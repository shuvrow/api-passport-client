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

    json_decode((string) $response->getBody(),true);


});

Route::get('users',function(){
    $http = new GuzzleHttp\Client;
    $accessToken='eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjdjOGI3YzJjZDllOTgwMjhhYWMzMjkxNjA4MjM1MWQ3OWMzNjM5MmU2N2QwMTBjOGMwYTE0OTIwZWRiY2JiODY0NDRhYzk4YmUzZGIxMWRkIn0.eyJhdWQiOiIxMyIsImp0aSI6IjdjOGI3YzJjZDllOTgwMjhhYWMzMjkxNjA4MjM1MWQ3OWMzNjM5MmU2N2QwMTBjOGMwYTE0OTIwZWRiY2JiODY0NDRhYzk4YmUzZGIxMWRkIiwiaWF0IjoxNDc3MjIxODEwLCJuYmYiOjE0NzcyMjE4MTAsImV4cCI6NDYzMjg5NTQxMCwic3ViIjoiMyIsInNjb3BlcyI6W119.Ixw48yPii65GG5TC2eTh2i5VfU6dMsYMVl0iUWBHM2y5xVtSB-VOq6RBVdImDi6gaBJxYcENGyAWTyDNI5tE4Fkfc-WDIqDZRnm_7g0SRcR66ouBe-DDfl23chSlFq23zOCkB7tYx07-SxgKMqunvi_HfxfvvdSIvsoAygXJrjG_egUFQ78N9Z3aN_4d4D7Ze2oCpX146tQ0srAQNw0_0SG3s9YOWNsgyVRE0znViSO-iss-JWk8Zi6YP67y7WnfijIvKuIBl9Bi52-YsF5_-5-9eTzDoPuEFpRHakKnvzMeHucKimSaaHmMwAEx3wteYFvaXWu7IUs3UE2mfOJEvvn1SZguXscH_2G-ZVNsbLQ52Wy61MDw1alm00qiwdD4vdl2UPGnPDLz4fjpaeOKZfyQxzYuKhFqlRCHR3p_3Sfrx1BkSDwDwsZEfevP3bsY6GX4Qraws8z4GJgaWfVMbva8RjkEkSemQPx1fBTWtQyDcg_vqdDDClEVj-I9FD2sb6Ay88CR9_iRHKK5NVSDsDUvnof6ht0gOhqVrRvWvBUwG2gG9qSMt4Ti6yN7Khlco3D1zAkCeRg3hmVmI93uQ8WEVfVR1Oj9AckGoLPy-S_6oC6HtXdDoTIFxCLrupNgxAIQU7AFBkZUwqUfinF63uOgArerWTmon5SS7A86OiA';


    $response = $http->get('http://localhost:8000/api/user', [
        'headers' => [
            'Accept' => 'application/json',
            'Authorization' => 'Bearer '.$accessToken,
        ],
    ]);

    dd(json_decode((string) $response->getBody(),true));


});
Route::get('products',function(){
    $http = new GuzzleHttp\Client;
    $accessToken='eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjdjOGI3YzJjZDllOTgwMjhhYWMzMjkxNjA4MjM1MWQ3OWMzNjM5MmU2N2QwMTBjOGMwYTE0OTIwZWRiY2JiODY0NDRhYzk4YmUzZGIxMWRkIn0.eyJhdWQiOiIxMyIsImp0aSI6IjdjOGI3YzJjZDllOTgwMjhhYWMzMjkxNjA4MjM1MWQ3OWMzNjM5MmU2N2QwMTBjOGMwYTE0OTIwZWRiY2JiODY0NDRhYzk4YmUzZGIxMWRkIiwiaWF0IjoxNDc3MjIxODEwLCJuYmYiOjE0NzcyMjE4MTAsImV4cCI6NDYzMjg5NTQxMCwic3ViIjoiMyIsInNjb3BlcyI6W119.Ixw48yPii65GG5TC2eTh2i5VfU6dMsYMVl0iUWBHM2y5xVtSB-VOq6RBVdImDi6gaBJxYcENGyAWTyDNI5tE4Fkfc-WDIqDZRnm_7g0SRcR66ouBe-DDfl23chSlFq23zOCkB7tYx07-SxgKMqunvi_HfxfvvdSIvsoAygXJrjG_egUFQ78N9Z3aN_4d4D7Ze2oCpX146tQ0srAQNw0_0SG3s9YOWNsgyVRE0znViSO-iss-JWk8Zi6YP67y7WnfijIvKuIBl9Bi52-YsF5_-5-9eTzDoPuEFpRHakKnvzMeHucKimSaaHmMwAEx3wteYFvaXWu7IUs3UE2mfOJEvvn1SZguXscH_2G-ZVNsbLQ52Wy61MDw1alm00qiwdD4vdl2UPGnPDLz4fjpaeOKZfyQxzYuKhFqlRCHR3p_3Sfrx1BkSDwDwsZEfevP3bsY6GX4Qraws8z4GJgaWfVMbva8RjkEkSemQPx1fBTWtQyDcg_vqdDDClEVj-I9FD2sb6Ay88CR9_iRHKK5NVSDsDUvnof6ht0gOhqVrRvWvBUwG2gG9qSMt4Ti6yN7Khlco3D1zAkCeRg3hmVmI93uQ8WEVfVR1Oj9AckGoLPy-S_6oC6HtXdDoTIFxCLrupNgxAIQU7AFBkZUwqUfinF63uOgArerWTmon5SS7A86OiA';


    $response = $http->get('http://localhost:8000/api/products', [
        'headers' => [
            'Accept' => 'application/json',
            'Authorization' => 'Bearer '.$accessToken,
        ],
    ]);

    dd(json_decode((string) $response->getBody(),true));


});

