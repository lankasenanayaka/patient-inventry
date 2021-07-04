<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
     return redirect('login');
     //return view('welcome');
});

Auth::routes();

Route::group(['middleware' => 'auth'], function()
{
     Route::get('/home', 'HomeController@index')->name('home');

     Route::get('/profile', 'ProfileController@index')->name('profile');
     Route::put('/profile', 'ProfileController@update')->name('profile.update');
     
     Route::get('/about', function () {
         return view('about');
     })->name('about');
     
     Route::group([
         'prefix' => 'beds',
     ], function () {
         Route::get('/', 'BedsController@index')
              ->name('beds.bed.index');
         Route::get('/create','BedsController@create')
              ->name('beds.bed.create');
         Route::get('/show/{bed}','BedsController@show')
              ->name('beds.bed.show')->where('id', '[0-9]+');
         Route::get('/{bed}/edit','BedsController@edit')
              ->name('beds.bed.edit')->where('id', '[0-9]+');
         Route::post('/', 'BedsController@store')
              ->name('beds.bed.store');
         Route::put('bed/{bed}', 'BedsController@update')
              ->name('beds.bed.update')->where('id', '[0-9]+');
         Route::delete('/bed/{bed}','BedsController@destroy')
              ->name('beds.bed.destroy')->where('id', '[0-9]+');
     });
     
     Route::group([
         'prefix' => 'patients',
     ], function () {
         Route::get('/', 'PatientsController@index')
              ->name('patients.patient.index');
         Route::get('/create','PatientsController@create')
              ->name('patients.patient.create');
         Route::get('/show/{patient}','PatientsController@show')
              ->name('patients.patient.show')->where('id', '[0-9]+');
         Route::get('/{patient}/edit','PatientsController@edit')
              ->name('patients.patient.edit')->where('id', '[0-9]+');
         Route::post('/', 'PatientsController@store')
              ->name('patients.patient.store');
         Route::put('patient/{patient}', 'PatientsController@update')
              ->name('patients.patient.update')->where('id', '[0-9]+');
         Route::delete('/patient/{patient}','PatientsController@destroy')
              ->name('patients.patient.destroy')->where('id', '[0-9]+');
         Route::get('/searchPatient','PatientsController@searchPatient');     
     });

     Route::get('/available_beds', 'PatientsController@availableBeds');
     Route::get('/occupied_beds','PatientsController@occupiedBeds'); 
     
     Route::group([
         'prefix' => 'moh_areas',
     ], function () {
         Route::get('/', 'MohAreasController@index')
              ->name('moh_areas.moh_area.index');
         Route::get('/create','MohAreasController@create')
              ->name('moh_areas.moh_area.create');
         Route::get('/show/{mohArea}','MohAreasController@show')
              ->name('moh_areas.moh_area.show')->where('id', '[0-9]+');
         Route::get('/{mohArea}/edit','MohAreasController@edit')
              ->name('moh_areas.moh_area.edit')->where('id', '[0-9]+');
         Route::post('/', 'MohAreasController@store')
              ->name('moh_areas.moh_area.store');
         Route::put('moh_area/{mohArea}', 'MohAreasController@update')
              ->name('moh_areas.moh_area.update')->where('id', '[0-9]+');
         Route::delete('/moh_area/{mohArea}','MohAreasController@destroy')
              ->name('moh_areas.moh_area.destroy')->where('id', '[0-9]+');
     });

     Route::group([
          'prefix' => 'bed_categories',
      ], function () {
          Route::get('/', 'BedCategoriesController@index')
               ->name('bed_categories.bed_category.index');
          Route::get('/create','BedCategoriesController@create')
               ->name('bed_categories.bed_category.create');
          Route::get('/show/{bedCategory}','BedCategoriesController@show')
               ->name('bed_categories.bed_category.show')->where('id', '[0-9]+');
          Route::get('/{bedCategory}/edit','BedCategoriesController@edit')
               ->name('bed_categories.bed_category.edit')->where('id', '[0-9]+');
          Route::post('/', 'BedCategoriesController@store')
               ->name('bed_categories.bed_category.store');
          Route::put('bed_category/{bedCategory}', 'BedCategoriesController@update')
               ->name('bed_categories.bed_category.update')->where('id', '[0-9]+');
          Route::delete('/bed_category/{bedCategory}','BedCategoriesController@destroy')
               ->name('bed_categories.bed_category.destroy')->where('id', '[0-9]+');
      });

});




