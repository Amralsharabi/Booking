<?php

use App\Http\Controllers\AutoCompletController;
use App\Http\Controllers\BirthRestrictionController;
use App\Http\Controllers\CardDamageRenewalController;
use App\Mail\mailtest;
use App\Models\CommonData;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Posts1Controller;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\CommonDataController;
use App\Http\Controllers\DemandMangController;
use App\Http\Controllers\CardPersonaNewController;
use App\Http\Controllers\CommonDataCardController;
use App\Http\Controllers\ChangeTimeAttendeesController;
use App\Http\Controllers\CorrectionInstRevConstrController;
use App\Http\Controllers\DeathStatementController;
use App\Http\Controllers\FamilyCardController;
use App\Http\Controllers\HelpController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\LogDivorceController;
use App\Http\Controllers\LogMarriageController;
use App\Http\Controllers\ReqChangeDataCommonController;
use App\Models\BirtRestriction;

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
    return view('index');
});

Auth::routes();

// Route::get('/profile', [App\Http\Controllers\HomeController::class, 'index'])
// ->name('profile')->middleware('auth');

Route::get('/index_card_pers', [App\Http\Controllers\CardPersonaNewController::class, 'index'])
->name('index.card.pers')->middleware(['auth', 'chek_statu_user','chek_req_cardper']);

Route::delete('/delete_card_pers', [App\Http\Controllers\CardPersonaNewController::class, 'destroy'])
->name('delete.card.pers')->middleware(['auth', 'chek_statu_user']);


Route::get('edit_card_pers/{id}', [App\Http\Controllers\CardPersonaNewController::class, 'edit'])
->name('edit.card.pers')->middleware(['auth', 'chek_statu_user']);

Route::post('/store_card_pers', [App\Http\Controllers\CardPersonaNewController::class, 'store'])
->name('store.card.pers')->middleware(['auth', 'chek_statu_user']);

Route::post('/req/change/data/commons', [App\Http\Controllers\ReqChangeDataCommonController::class, 'store'])
->name('req.change.data.commons')->middleware(['auth', 'chek_statu_user','chek_req_chang_data_common']);

Route::post('/req/change/data/commons/delete', [App\Http\Controllers\ReqChangeDataCommonController::class, 'destroy'])
->name('req.change.data.commons.delete')->middleware(['auth', 'chek_statu_user']);

Route::post('/req/change/data/commons/update', [App\Http\Controllers\ReqChangeDataCommonController::class, 'update'])
->name('req.change.data.commons.update')->middleware(['auth', 'chek_statu_user']);

Route::post('/update_card_pers/{id}', [App\Http\Controllers\CardPersonaNewController::class, 'update'])
->name('update.card.pers')->middleware(['auth', 'chek_statu_user']);

Route::get('/show_card_pers/{id}', [App\Http\Controllers\CardPersonaNewController::class, 'show'])
->name('show.card.pers')->middleware(['auth', 'chek_statu_user']);

// الدول والمحافظات والمراكز
Route::resource('Location', LocationController::class);

Route::post('getGovernoratesByCountry', [App\Http\Controllers\LocationController::class, 'getGovernoratesByCountry'])
->name('getGovernoratesByCountry');

Route::post('getGovernoratesByCountryAccomForm', [App\Http\Controllers\LocationController::class, 'getGovernoratesByCountryAccomForm'])
->name('getGovernoratesByCountryAccomForm');

Route::post('getDirectoratesByGovernorateAccomForm', [App\Http\Controllers\LocationController::class, 'getDirectoratesByGovernorateAccomForm'])
->name('getDirectoratesByGovernorateAccomForm');

Route::post('getGovernoratesByCountryParthFather', [App\Http\Controllers\LocationController::class, 'getGovernoratesByCountryParthFather'])
->name('getGovernoratesByCountryParthFather');

Route::post('getDirectoratesByProvinceParthFather', [App\Http\Controllers\LocationController::class, 'getDirectoratesByProvinceParthFather'])
->name('getDirectoratesByProvinceParthFather');

Route::post('getGovernoratesByCountryParthMoth', [App\Http\Controllers\LocationController::class, 'getGovernoratesByCountryParthMoth'])
->name('getGovernoratesByCountryParthMoth');

Route::post('getDirectoratesByProvinceParthMoth', [App\Http\Controllers\LocationController::class, 'getDirectoratesByProvinceParthMoth'])
->name('getDirectoratesByProvinceParthMoth');

Route::post('getGovernoratesByCountryAccomFath', [App\Http\Controllers\LocationController::class, 'getGovernoratesByCountryAccomFath'])
->name('getGovernoratesByCountryAccomFath');

Route::post('getDirectoratesByProvincAccomFath', [App\Http\Controllers\LocationController::class, 'getDirectoratesByProvincAccomFath'])
->name('getDirectoratesByProvincAccomFath');

Route::post('getGovernoratesByCountryAccomMoth', [App\Http\Controllers\LocationController::class, 'getGovernoratesByCountryAccomMoth'])
->name('getGovernoratesByCountryAccomMoth');

Route::post('getDirectoratesByProvincAccomMoth', [App\Http\Controllers\LocationController::class, 'getDirectoratesByProvincAccomMoth'])
->name('getDirectoratesByProvincAccomMoth');

Route::post('getDirectoratesByGovernorate', [App\Http\Controllers\LocationController::class, 'getDirectoratesByGovernorate'])
->name('getDirectoratesByGovernorate');

Route::post('getCentersByDirectorate', [App\Http\Controllers\LocationController::class, 'getCentersByDirectorate'])
->name('getCentersByDirectorate');

Route::post('getDirectoratesByProvinceAccom', [App\Http\Controllers\LocationController::class, 'getDirectoratesByProvinceAccom'])
->name('getDirectoratesByProvinceAccom');

Route::post('getProvincesByCountryBirth', [App\Http\Controllers\LocationController::class, 'getProvincesByCountryBirth'])
->name('getProvincesByCountryBirth');

Route::post('getDirectoratesByProvinceBirth', [App\Http\Controllers\LocationController::class, 'getDirectoratesByProvinceBirth'])
->name('getDirectoratesByProvinceBirth');

Route::post('getDirectoratesByGovernorateVersion', [App\Http\Controllers\LocationController::class, 'getDirectoratesByGovernorateVersion'])
->name('getDirectoratesByGovernorateVersion');

Route::post('getCentersByDirectorateVersion', [App\Http\Controllers\LocationController::class, 'getCentersByDirectorateVersion'])
->name('getCentersByDirectorateVersion');

Route::post('getDirectoratesByProvinceLogMarraige', [App\Http\Controllers\LocationController::class, 'getDirectoratesByProvinceLogMarraige'])
->name('getDirectoratesByProvinceLogMarraige');

Route::post('getGovernoratesByCountryParthMarraige', [App\Http\Controllers\LocationController::class, 'getGovernoratesByCountryParthMarraige'])
->name('getGovernoratesByCountryParthMarraige');

Route::post('getDirectoratesByProvinceParthMarraige', [App\Http\Controllers\LocationController::class, 'getDirectoratesByProvinceParthMarraige'])
->name('getDirectoratesByProvinceParthMarraige');

Route::post('getGovernoratesByCountryAcomhMarraige', [App\Http\Controllers\LocationController::class, 'getGovernoratesByCountryAcomhMarraige'])
->name('getGovernoratesByCountryAcomhMarraige');

Route::post('getDirectoratesByProvinceaAcomhMarraige', [App\Http\Controllers\LocationController::class, 'getDirectoratesByProvinceaAcomhMarraige'])
->name('getDirectoratesByProvinceaAcomhMarraige');

Route::post('getGovernoratesByCountryParthMarraigew', [App\Http\Controllers\LocationController::class, 'getGovernoratesByCountryParthMarraigew'])
->name('getGovernoratesByCountryParthMarraigew');

Route::post('getDirectoratesByProvinceParthMarraigew', [App\Http\Controllers\LocationController::class, 'getDirectoratesByProvinceParthMarraigew'])
->name('getDirectoratesByProvinceParthMarraigew');

Route::post('getGovernoratesByCountryAcomhMarraigew', [App\Http\Controllers\LocationController::class, 'getGovernoratesByCountryAcomhMarraigew'])
->name('getGovernoratesByCountryAcomhMarraigew');

Route::post('getDirectoratesByProvinceaAcomhMarraigew', [App\Http\Controllers\LocationController::class, 'getDirectoratesByProvinceaAcomhMarraigew'])
->name('getDirectoratesByProvinceaAcomhMarraigew');

Route::post('getDirectoratesByGovernorateCons', [App\Http\Controllers\LocationController::class, 'getDirectoratesByGovernorateCons'])
->name('getDirectoratesByGovernorateCons');

Route::get('indexprovince', [App\Http\Controllers\LocationController::class, 'indexprovince'])
->name('indexprovince');


Route::get('/verify', function(){
    return view('auth.verify');
})->name('verify');

Route::get('/home', function(){
    return view('index');
})->name('home');

Route::get('/send', function(){
    Mail::to('amralsharabi085@gmail.com')->send(new mailtest);
    return response('تم الارسال');
});

// Route::get('/card_damaged_renewals', function(){
//     return view('card_damaged_renewals');
// })->name('card.damaged.renewals');

Route::get('/show', function(){
    return view('show_form_card_pers');
})->name('show');

Route::get('/demand', function(){
    return view('demand_mang');
})->name('demand')->middleware('auth');

Route::resource('demand_mang', DemandMangController::class)->middleware(['auth', 'chek_statu_user']);
Route::resource('ReqChangeDataCommon', ReqChangeDataCommonController::class)->middleware(['auth', 'chek_statu_user']);
Route::post('/change-password', 'App\Http\Controllers\ChangePasswordController@changePassword')->name('password.update');
Route::resource('profiles', CommonDataCardController::class)->middleware('auth');
// Route::resource('/req/change/data', ReqChangeDataCommonController::class)->middleware('auth');
Route::resource('register', RegisterController::class);
Route::resource('post', PostController::class);
Route::resource('ChangeTimeAttendeesController', ChangeTimeAttendeesController::class)->middleware('auth');
Route::get('/autocomplete/names', [AutoCompletController::class, 'getNames'])->name('autocomplete.names');
Route::get('/autocomplete/userdata', [AutoCompletController::class, 'getUserData'])->name('autocomplete.userdata');

Route::resource('cardDamagedRenewal', CardDamageRenewalController::class)->middleware(['auth', 'chek_req_card_damaged_renewal']);
Route::get('/cardDamagedRenewal/edit/{id}', [CardDamageRenewalController::class, 'edit'])->name('carddamagerenewal.edit')->middleware('auth');
Route::get('/cardDamagedRenewal/update/{id}', [CardDamageRenewalController::class, 'update'])->name('carddamagerenewal.update')->middleware('auth');
Route::get('/cardDamagedRenewal/show/{id}', [CardDamageRenewalController::class, 'show'])->name('carddamagerenewal.show')->middleware('auth');

Route::resource('FamilyCard', FamilyCardController::class)->middleware(['auth','chek_req_family_card']);
Route::get('/FamilyCard/show/{id}', [FamilyCardController::class, 'show'])->name('FamilyCard.show')->middleware('auth');
Route::get('/FamilyCard/edit/{id}', [FamilyCardController::class, 'edit'])->name('FamilyCard.edit')->middleware('auth');
Route::get('/FamilyCard/update/{id}', [FamilyCardController::class, 'update'])->name('FamilyCard.update')->middleware('auth');

Route::resource('birthRestriction', BirthRestrictionController::class)->middleware(['auth','chek_req_birth_restriction']);
Route::get('/birthRestriction/show/{id}', [BirthRestrictionController::class, 'show'])->name('birthRestriction.show')->middleware('auth');
Route::get('/birthRestriction/edit/{id}', [BirthRestrictionController::class, 'edit'])->name('birthRestriction.edit')->middleware('auth');
Route::get('/birthRestriction/update/{id}', [BirthRestrictionController::class, 'update'])->name('birthRestriction.update')->middleware('auth');

Route::resource('logMarriage', LogMarriageController::class)->middleware(['auth','chek_req_log_marriage']);
Route::get('/logMarriage/show/{id}', [LogMarriageController::class, 'show'])->name('logMarriage.show')->middleware('auth');
Route::get('/logMarriage/edit/{id}', [LogMarriageController::class, 'edit'])->name('logMarriage.edit')->middleware('auth');
Route::get('/logMarriage/update/{id}', [LogMarriageController::class, 'update'])->name('logMarriage.update')->middleware('auth');


Route::resource('logDivorce', LogDivorceController::class)->middleware(['auth','chek_req_log_divorce']);
Route::get('/logDivorce/show/{id}', [LogDivorceController::class, 'show'])->name('logDivorce.show')->middleware('auth');
Route::get('/logDivorce/edit/{id}', [LogDivorceController::class, 'edit'])->name('logDivorce.edit')->middleware('auth');
Route::get('/logDivorce/update/{id}', [LogDivorceController::class, 'update'])->name('logDivorce.update')->middleware('auth');

Route::resource('correctionInstRevConstr', CorrectionInstRevConstrController::class)->middleware(['auth','chek_req_correction_inst_rev_constr']);
Route::get('/correctionInstRevConstr/show/{id}', [CorrectionInstRevConstrController::class, 'show'])->name('correctionInstRevConstr.show')->middleware('auth');
Route::get('/correctionInstRevConstr/edit/{id}', [CorrectionInstRevConstrController::class, 'edit'])->name('correctionInstRevConstr.edit')->middleware('auth');
Route::get('/correctionInstRevConstr/update/{id}', [CorrectionInstRevConstrController::class, 'update'])->name('correctionInstRevConstr.update')->middleware('auth');

Route::resource('deathStatement', DeathStatementController::class)->middleware(['auth','chek_req_death_statement']);
Route::get('/deathStatement/show/{id}', [DeathStatementController::class, 'show'])->name('deathStatement.show')->middleware('auth');
Route::get('/deathStatement/edit/{id}', [DeathStatementController::class, 'edit'])->name('deathStatement.edit')->middleware('auth');
Route::get('/deathStatement/update/{id}', [DeathStatementController::class, 'update'])->name('deathStatement.update')->middleware('auth');

Route::get('/help', [HelpController::class, 'help'])->name('help');
Route::get('/pdf', function() {
    $file = public_path(). "/dalil.pdf";
    $headers = array(
        'Content-Type: application/pdf',
    );
    return response()->file($file, $headers);
});




Route::resource('user', UserController::class);