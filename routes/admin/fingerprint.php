<?php

use App\Http\Controllers\Fingerprint\FingerprintController;

// use App\Http\Controllers\Fingerprint\FingerprintController;
// use App\Services\Fingerprint\FingerprintService;


/*
|--------------------------------------------------------------------------
| Fingerprint Routes
|--------------------------------------------------------------------------
|
| Here is where you can register setting related routes for your application.
|
*/



Route::prefix('fingerprint')->name('fingerprint.')->group(function () {
    Route::controller(FingerprintController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('get-data', 'getData')->name('getdata');
        Route::post('create', 'createFingerprint')->name('create');
        Route::delete('{id}/delete', 'deleteFingerprint')->name('delete');
        Route::post('{id}/update', 'updateFingerprint')->name('update');
        // Route::put('{id}/approve', 'approveApproval')->name('approve');
        // Route::put('{id}/reject', 'rejectApproval')->name('reject');
    });
});
