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

Route::get('/musics/{id}/details', 'DetailController@index');

Route::group(['middleware' => 'auth'], function() {
    Route::get('/mypage', 'MypageController@index');
    Route::get('/mypage/search', 'MypageController@search');
    Route::get('/mypage/music/{id}', 'MypageController@music')->name('mypage.music');
    Route::post('/mypage/csvimport', 'CsvImportController@index');
});


Route::get('/', function () {
    return view('home');
});

Route::get('/admin', 'AdminContoroller@index');
Route::get('/admin/search', 'AdminContoroller@search');

Auth::routes();
/* E:\Users\Documents\laravel\iidx_scmm\vendor\laravel\framework\src\Illuminate\Routing\Router.php
public function auth(array $options = [])
{
    // Authentication Routes...
    $this->get('login', 'Auth\LoginController@showLoginForm')->name('login');
    $this->post('login', 'Auth\LoginController@login');
    $this->post('logout', 'Auth\LoginController@logout')->name('logout');

    // Registration Routes...
    if ($options['register'] ?? true) {
        $this->get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
        $this->post('register', 'Auth\RegisterController@register');
    }

    // Password Reset Routes...
    if ($options['reset'] ?? true) {
        $this->resetPassword();
    }

    // Email Verification Routes...
    if ($options['verify'] ?? false) {
        $this->emailVerification();
    }
}
*/