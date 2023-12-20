<?php

use App\Http\Controllers\ChambreController;
use App\Http\Controllers\EmployesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EtudiantController;
use App\Http\Controllers\Etudiant1Controller;
use App\Models\Etudiant;
use App\Http\Controllers\BatimentController;
// In routes/web.php

use App\Http\Controllers\TwilioController;



Route::post('employes/register', 'EmployesController@register')->name('employes.register');


Route::get('/welcome', function () {
    return view('welcome')->name('welcome');
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/inscription', function () {
    return view('inscription');
})->name('inscription');



Route::get('/inscription', 'InscriptionController@create')->name('inscription');


Route::post('/inscription', 'InscriptionController@store')->name('inscription.store');



Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/home', function () {
        return view('home');
    })->name('home');

    Route::resource('employes', 'EmployesController');
    Route::get('employes/{id}/certificate', 'EmployesController@getWorkCertificate')
        ->name('work.certificate');
    Route::get('employes/{id}/vacation', 'EmployesController@vacationRequest')
        ->name('work.vacation');


        Route::get('/etudiants/export', [EtudiantController::class, 'exportEtudiants'])->name('etudiants.export');
        Route::get('/export-all-etudiants', [EtudiantController::class, 'exportAllEtudiants'])->name('export.all.etudiants');





    Route::post('/accept-student/{etudiant}', 'AcceptStudentController@store')->name('accept-student.store');
    Route::post('/accept-students', 'AcceptStudentController@store')->name('accept-students.store');

    Route::get('/accept-student', 'AcceptStudentController@index')->name('accept-student.index');
    Route::delete('/accept-students/{id}', 'AcceptStudentController@destroy')->name('accept-students.destroy');
    Route::post('/accept-student/add-chambre/{id}', 'AcceptStudentController@addChambre')->name('accept-student.add-chambre');

    Route::resource('student', 'StudentController');
    Route::get('/student', [StudentController::class, 'index']);

    Route::get('/admin/chambres', 'ChambreController@index')->name('chambres.index');

    Route::get('/chambres', [ChambreController::class, 'index'])->name('chambres.index');
    Route::get('/chambres', [ChambreController::class, 'index']);
    Route::get('/chambres/create', [ChambreController::class, 'create'])->name('chambres.create');
    Route::post('/chambres', [ChambreController::class, 'store'])->name('chambres.store');








    Route::get('/etudiants', [EtudiantController::class, 'index'])->name('etudiants.index');
    Route::get('/etudiant/create', [EtudiantController::class, 'create'])->name('etudiants.create');
    Route::post('/etudiants', [EtudiantController::class, 'store'])->name('etudiants.store');
    Route::get('/etudiants/{id}/edit', 'EtudiantController@edit')->name('etudiants.edit');
    Route::put('/etudiants/{id}', 'EtudiantController@update')->name('etudiants.update');

    Route::get('/etudiants/{etudiant}', [EtudiantController::class, 'show'])->name('etudiants.show');
    Route::delete('/etudiants/{etudiant}', [EtudiantController::class, 'destroy'])->name('etudiants.destroy');


    Route::post('/assign-chambre/{acceptStudent}', 'AcceptStudentController@assignChamber')->name('assign-chambre');
    Route::get('/fetch-chambres/{batiment}', 'AcceptStudent@fetchChambres');




Route::get('/students/pie-chart', [EtudiantController::class, 'showPieChart']);



Route::get('/get-chambres', 'ChambreController@getChambres')->name('get-chambres');







Route::get('/batiments', 'BatimentController@index')->name('batiments.index');

Route::get('/batiments/create', 'BatimentController@create')->name('batiments.create');

Route::post('/batiments', 'BatimentController@store')->name('batiments.store');

Route::get('/batiments/{id}/edit', 'BatimentController@edit')->name('batiments.edit');

Route::put('/batiments/{id}', 'BatimentController@update')->name('batiments.update');

Route::delete('/batiments/{id}', 'BatimentController@destroy')->name('batiments.destroy');



});





use App\Http\Controllers\VonageController;

Route::any('/send-sms', [VonageController::class, 'sendSms']);




Route::post('/send-email-to-etudiants', [EtudiantController::class, 'sendEmailToEtudiants'])->name('send.email.to.etudiants');
