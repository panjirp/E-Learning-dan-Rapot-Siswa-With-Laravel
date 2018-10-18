<?php
use App\Models\Data;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;
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

Route::get('', 'SiteController@login');

Route::post('', 'SiteController@sendLogin');

Route::get('/login', 'SiteController@login');

Route::post('/login', 'SiteController@sendLogin');

Route::get('/getLogout', 'SiteController@getLogout');

Route::get('/changepass', 'SiteController@changePass');

Route::post('/changepass', 'SiteController@sendReset');


//route admin
Route::group( ['middleware' => 'App\Http\Middleware\AdminMiddleware' ], function()
{
   
Route::get('/admin', 'SiteController@admin');

Route::get('/class&j={jenjang}','SiteController@kelas');


Route::get('/elearningadmin&a={id}','SiteController@elearningadmin');

Route::get('/filemateriadmin&a={id}','SiteController@filemateriadmin');

Route::get('/videoadmin&a={id}','SiteController@videoadmin');

Route::get('/tugasadmin&a={id}','SiteController@tugasadmin');

Route::get('/latihanadmin&a={id}','SiteController@latihanadmin');


Route::get('/courseadmin','SiteController@courseAdmin');

Route::get('/courseadmin/{task_id}','SiteController@courseadminGetAjax');

Route::post('/courseadmin','SiteController@courseadminPostAjax');

Route::put('/courseadmin/{task_id}','SiteController@courseadminPutAjax');

Route::delete('/courseadmin/{task_id}','SiteController@courseadminDeleteAjax');


Route::get('/matpel', 'SiteController@matpel');

Route::get('/matpel/{task_id}','SiteController@matpelGetAjax');

Route::post('/matpel','SiteController@matpelPostAjax');

Route::put('/matpel/{task_id}','SiteController@matpelPutAjax');

Route::delete('/matpel/{task_id}','SiteController@matpelDeleteAjax');


Route::get('/siswa&id={id}','SiteController@siswa');

Route::get('/siswa/{task_id}','SiteController@siswaGetAjax');

Route::post('/siswa','SiteController@siswaPostAjax');

Route::put('/siswa/{task_id}','SiteController@siswaPutAjax');

Route::delete('/siswa/{task_id}','SiteController@siswaDeleteAjax');

Route::post('/usersiswa/{task_id}','SiteController@usersiswaPostAjax');

Route::put('/usersiswa/{task_id}','SiteController@usersiswaPutAjax');

Route::delete('/usersiswa/{task_id}','SiteController@usersiswaDeleteAjax');

Route::get('/detailsiswa&id={id}','SiteController@detailsiswa');


Route::get('/jurusan','SiteController@jurusan');

Route::get('/jurusan/{task_id}','SiteController@jurusanGetAjax');

Route::post('/jurusan','SiteController@jurusanPostAjax');

Route::put('/jurusan/{task_id}','SiteController@jurusanPutAjax');

Route::delete('/jurusan/{task_id}','SiteController@jurusanDeleteAjax');


Route::get('/kelas/{task_id}','SiteController@kelasGetAjax');

Route::post('/kelas','SiteController@kelasPostAjax');

Route::put('/kelas/{task_id}','SiteController@kelasPutAjax');

Route::delete('/kelas/{task_id}','SiteController@kelasDeleteAjax');


Route::get('/guru','SiteController@guru');

Route::get('/guru/{task_id}','SiteController@guruGetAjax');

Route::post('/guru','SiteController@guruPostAjax');

Route::put('/guru/{task_id}','SiteController@guruPutAjax');

Route::delete('/guru/{task_id}','SiteController@guruDeleteAjax');

Route::post('/userguru/{task_id}','SiteController@userguruPostAjax');

Route::put('/userguru/{task_id}','SiteController@userguruPutAjax');

Route::delete('/userguru/{task_id}','SiteController@userguruDeleteAjax');


Route::post('/changepict/{id}','SiteController@changepictPostAjax');

Route::get('/rapotadmin','SiteController@rapotadmin');

Route::get('/detailrapot&a={id}','SiteController@detailrapot');

Route::get('/detailrapotsiswa&a={kls}&b={smt}&c={id}','SiteController@detailrapotsiswa');

Route::get('/elearning','SiteController@elearning');

});

Route::group( ['middleware' => 'App\Http\Middleware\UserMiddleware' ], function()
{
	Route::get('/home', 'SiteController@home')->name('home');

	Route::get('/course&a={id}','SiteController@course');

	Route::post('/course&a={id}','SiteController@coursePost');

	Route::get('/profil','SiteController@profil');

	Route::get('/reportsiswa&a={kls}&b={smt}','SiteController@reportsiswa');

	Route::get('/filemateri&a={id}','SiteController@filemateri');

	Route::get('/video&a={id}','SiteController@video');

	Route::post('/video','SiteController@videoPostAjax');
	
	Route::get('/video/{task_id}','SiteController@videoGetAjax');

	Route::put('/video/{task_id}','SiteController@videoPutAjax');

	Route::delete('/video/{task_id}','SiteController@videoDeleteAjax');


	Route::get('/tugas&a={id}','SiteController@tugas');

	Route::post('/tugas&a={id}','SiteController@tugasPost');

	Route::get('/tugas/{task_id}','SiteController@tugasGetAjax');

	Route::put('/tugas/{task_id}','SiteController@tugasPutAjax');

	Route::post('/tugas/{task_id}','SiteController@tugasPostAjax');

	Route::delete('/tugas/{task_id}','SiteController@tugasDeleteAjax');

	Route::post('/submit&a={id}','SiteController@submitTugasPost');


	Route::get('/latihan&a={id}','SiteController@latihan');

	Route::post('/latihan&a={id}','SiteController@latihanPost');

	Route::post('/addquestion/{id}','SiteController@addQuest');

	Route::get('/latihan/{task_id}','SiteController@latihanGetAjax');

	Route::put('/latihan/{task_id}','SiteController@latihanPutAjax');

	Route::delete('/latihan/{task_id}','SiteController@latihanDeleteAjax');

	Route::post('/latihanNew&a={id}','SiteController@latihanNewPost');


	Route::get('/course/{task_id}','SiteController@courseGetAjax');

	Route::put('/course/{task_id}','SiteController@coursePutAjax');

	Route::delete('/course/{task_id}','SiteController@courseDeleteAjax');

	Route::post('/course/{task_id}','SiteController@coursePostAjax');

	Route::get('/download/{id}/{name}','SiteController@download');


	Route::get('/report&a={id}&b={smt}','SiteController@report');

	Route::get('/report/{task_id}/{task_id2}/{smt}','SiteController@reportGetAjax');

	Route::post('/report/{task_id}/{task_id2}/{task_id3}','SiteController@reportPostAjax');

	Route::get('/reportwali&a={id}&b={smt}','SiteController@reportwali');

	Route::get('/reportwali/{task_id}','SiteController@reportwaliGetAjax');

	Route::post('/reportwali/{task_id}/{task_id2}','SiteController@reportwaliPostAjax');

	Route::get('/excel','SiteController@excel');

});