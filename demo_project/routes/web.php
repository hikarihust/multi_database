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
use App\User;
Route::get('/', function () {
    return view('welcome');
});

Route::get('getCountry', function () {
    // Query Builder
    // $countries = DB::connection('mysql2')->table('countries')->get();
    // dump($countries);
    // $countries = DB::connection('mysql2')->table('countries')->select('*' )->get();
    // dump($countries);

    // Eloquent
    // $countries = new App\Country;
    // dump($countries->get()->toArray());

    // setConnection 
    $countries = new App\Country;
    $countries->setConnection('mysql2'); // non-static method
    dump($countries->get()->toArray());
});

Route::get('/getUsers', function () {
    // $users = App\User::all();
    // dump($users->toArray());

    $users = User::join('country.countries as c', 'c.id', '=', 'users.users.country_id')->get();
    dump($users->toArray());
});