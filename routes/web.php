<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->get('/migrate', function () use ($router) {
    return \Illuminate\Support\Facades\Artisan::call('migrate:fresh');
});
$router->get('/seed', function () use ($router) {
    return \Illuminate\Support\Facades\Artisan::call('db:seed');
});


$router->group(['prefix' => 'api'], function ($router) {
    $router->post('login', 'AuthController@login');

    $router->group(
        ['middleware' => 'jwt'],
        function () use ($router) {
            $router->get('user-profile', 'AuthController@me');
            $router->post('refresh', 'AuthController@refresh');
            $router->post('logout', 'AuthController@logout');

            // $router->post('admin', function () {
            //     $admin = \App\Models\Admin::all();
            //     return response()->json($admin);
            // });

            // DATABASE
            $router->group(['prefix' => 'database'], function () use ($router) {
                // cara-pelaporan
                $router->group(['prefix' => 'cara-pelaporan'], function () use ($router) {
                    $router->get('/', 'Database\CaraPelaporanController@get');
                    $router->get('/{id}', 'Database\CaraPelaporanController@getOne');
                    $router->post('/', 'Database\CaraPelaporanController@post');
                    $router->put('/{id}', 'Database\CaraPelaporanController@put');
                    $router->delete('/{id}', 'Database\CaraPelaporanController@delete');
                });
                // hari-libur
                $router->group(['prefix' => 'hari-libur'], function () use ($router) {
                    $router->get('/', 'Database\HariLiburController@get');
                    $router->get('/{id}', 'Database\HariLiburController@getOne');
                    $router->post('/', 'Database\HariLiburController@post');
                    $router->put('/{id}', 'Database\HariLiburController@put');
                    $router->delete('/{id}', 'Database\HariLiburController@delete');
                });
                // jenis-usaha
                $router->group(['prefix' => 'jenis-usaha'], function () use ($router) {
                    $router->get('/', 'Database\JenisUsahaController@get');
                    $router->get('/{id}', 'Database\JenisUsahaController@getOne');
                    $router->post('/', 'Database\JenisUsahaController@post');
                    $router->put('/{id}', 'Database\JenisUsahaController@put');
                    $router->delete('/{id}', 'Database\JenisUsahaController@delete');
                });
                // kota-penandatangan
                $router->group(['prefix' => 'kota-penandatangan'], function () use ($router) {
                    $router->get('/', 'Database\KotaPenandatanganController@get');
                    $router->get('/{id}', 'Database\KotaPenandatanganController@getOne');
                    $router->post('/', 'Database\KotaPenandatanganController@post');
                    $router->put('/{id}', 'Database\KotaPenandatanganController@put');
                    $router->delete('/{id}', 'Database\KotaPenandatanganController@delete');
                });
                // masa-pajak
                $router->group(['prefix' => 'masa-pajak'], function () use ($router) {
                    $router->get('/', 'Database\MasaPajakController@get');
                    $router->get('/{id}', 'Database\MasaPajakController@getOne');
                    $router->post('/', 'Database\MasaPajakController@post');
                    $router->put('/{id}', 'Database\MasaPajakController@put');
                    $router->delete('/{id}', 'Database\MasaPajakController@delete');
                });
                // penandatangan
                $router->group(['prefix' => 'penandatangan'], function () use ($router) {
                    $router->get('/', 'Database\PenandatanganController@get');
                    $router->get('/{id}', 'Database\PenandatanganController@getOne');
                    $router->post('/', 'Database\PenandatanganController@post');
                    $router->put('/{id}', 'Database\PenandatanganController@put');
                    $router->delete('/{id}', 'Database\PenandatanganController@delete');
                });
                // perusahaan
                $router->group(['prefix' => 'perusahaan'], function () use ($router) {
                    $router->get('/', 'Database\PerusahaanController@get');
                    $router->get('/{id}', 'Database\PerusahaanController@getOne');
                    $router->post('/', 'Database\PerusahaanController@post');
                    $router->put('/{id}', 'Database\PerusahaanController@put');
                    $router->delete('/{id}', 'Database\PerusahaanController@delete');
                });
                // npa
                $router->group(['prefix' => 'npa'], function () use ($router) {
                    $router->get('/', 'Database\NpaController@get');
                    $router->get('/{id}', 'Database\NpaController@getOne');
                    $router->post('/', 'Database\NpaController@post');
                    $router->put('/{id}', 'Database\NpaController@put');
                    $router->delete('/{id}', 'Database\NpaController@delete');
                });
                // tarif-pajak
                $router->group(['prefix' => 'tarif-pajak'], function () use ($router) {
                    $router->get('/', 'Database\TarifPajakController@get');
                    $router->get('/{id}', 'Database\TarifPajakController@getOne');
                    $router->post('/', 'Database\TarifPajakController@post');
                    $router->put('/{id}', 'Database\TarifPajakController@put');
                    $router->delete('/{id}', 'Database\TarifPajakController@delete');
                });
            });
        }
    );
});
