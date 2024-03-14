<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Middleware\AuthRedirectMiddleware;

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



Route::get('/', [HomeController::class, 'welcome']);
Route::get('/Projeler', [HomeController::class, 'projeler'])->name('tum.projeler');
Route::get('/Fotograflar', [HomeController::class, 'medya_foto']);
Route::get('/Videolar', [HomeController::class, 'medya_video']);
Route::get('/Ozgecmis', [HomeController::class, 'ozgecmis']);
Route::get('/iletisim', [HomeController::class, 'iletisim']);
//Route::get('/Proje', [HomeController::class, 'proje']);
Route::group( ['middleware' => 'auth.redirect' ], function()
{

Route::post('/dosya/yukle', [AdminController::class, 'upload'])->name('dosya.yukle');
Route::post('/proje/yukle', [AdminController::class, 'store'])->name('proje.yukle');
Route::post('/fotograf/yukle', [AdminController::class, 'uploadPhoto'])->name('fotograf.yukle');
Route::post('/video/yukle', [AdminController::class, 'uploadVideo'])->name('video.yukle');
Route::post('/ozgecmis/yukle', [AdminController::class, 'setOzgecmis'])->name('ozgecmis.yukle');
Route::post('/sosyal/yukle', [AdminController::class, 'setSosyal'])->name('sosyal.yukle');
Route::post('/iletisim/yukle', [HomeController::class, 'iletisimYukle'])->name('iletisim.yukle');

Route::post('/Admin/Slider/Sil', [AdminController::class, 'deleteSlider'])->name('slider.sil');
Route::post('/Admin/Proje/Sil', [AdminController::class, 'deleteProject'])->name('proje.sil');
Route::post('/Admin/Galeri/Sil', [AdminController::class, 'deleteGaleri'])->name('galeri.sil');

Route::get('/Proje/{id}/{baslik}', [HomeController::class, 'proje'])->name('proje.goster');

Route::get('/Admin/Projeler/Yukle', [AdminController::class, 'projeler'])->name('projeler.yukle');
Route::get('/Admin/Galeri/Yukle', [AdminController::class, 'galeri'])->name('galeri.yukle');
Route::get('/Admin/Slider/Yukle', [AdminController::class, 'slider'])->name('slider.yukle');
Route::get('/Admin/Slider', [AdminController::class, 'listSliderImages'])->name('slider.listele');
Route::get('/Admin/Projeler', [AdminController::class, 'listProjects'])->name('projeler.listele');
Route::get('/Admin/Galeri', [AdminController::class, 'listGallery'])->name('galeri.listele');
Route::get('/Admin/Ozgecmis', [AdminController::class, 'ozgecmis'])->name('ozgecmis');
Route::get('/Admin/Sosyal', [AdminController::class, 'sosyal'])->name('sosyal');

});

Route::get('/Admin', [AuthController::class, 'giris'])->name('giris'); 
Route::post('/Admin', [AuthController::class, 'giris'])->name('giris'); 
Route::get('/Cikis', [AuthController::class, 'cikis'])->name('cikis');