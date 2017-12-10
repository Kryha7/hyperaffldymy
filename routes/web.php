<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [
    'uses' => 'HomeController@index',
    'as' => 'index'
]);

Route::get('/help', [
    'uses' => 'HomeController@help',
    'as' => 'help'
]);

Route::post('/put-tickets', [
   'uses' => 'HomeController@put_tickets',
    'as' => 'tickets.put'
])->middleware('auth');

Route::get('/profile',[
    'uses' => 'ProfileController@index',
    'as' => 'profile'
])->middleware('auth');

Route::get('/tickets',[
    'uses' => 'UserController@tickets',
    'as' => 'tickets'
])->middleware('auth');;

Route::get('/buy/{amount}',[
    'uses' => 'UserController@buy',
    'as' => 'buy'
])->middleware('auth');;

Route::group([
    'middleware' => 'roles',
    'roles' => ['Admin']
], function (){
    Route::get('admin/dashboard', [
       'uses' => 'DashboardController@index',
       'as' => 'admin.dashboard'
    ]);

    Route::get('/admin/transactions',[
        'uses' => 'TicketsTransactionsController@index',
        'as' => 'ttransactions.index'
    ]);

    Route::get('/admin/raffles',[
        'uses' => 'RaffleController@index',
        'as' => 'raffle.index'
    ]);

    Route::get('/admin/raffle/create',[
        'uses' => 'RaffleController@create',
        'as' => 'raffle.create'
    ]);

    Route::post('/admin/raffle/store',[
        'uses' => 'RaffleController@store',
        'as' => 'raffle.store'
    ]);

    Route::get('/admin/raffle/edit/{raffle}',[
        'uses' => 'RaffleController@edit',
        'as' => 'raffle.edit'
    ]);

    Route::post('/admin/raffle/update/{raffle}',[
        'uses' => 'RaffleController@update',
        'as' => 'raffle.update'
    ]);

    Route::get('/admin/raffle/delete/{raffle}',[
        'uses' => 'RaffleController@delete',
        'as' => 'raffle.delete'
    ]);

    Route::get('/admin/raffle/raffle/{raffle}',[
        'uses' => 'RaffleController@raffle',
        'as' => 'raffle.raffle'
    ]);

    Route::get('/admin/raffle/show/{raffle}',[
        'uses' => 'RaffleController@show_winner',
        'as' => 'raffle.show_winner'
    ]);
});

Auth::routes();
Route::get('/redirect', 'FacebookAuthController@redirect');
Route::get('/callback', 'FacebookAuthController@callback');