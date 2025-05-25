<?php

use App\Http\Controllers\DummyController;

Route::apiResource('dummies', DummyController::class);
Route::middleware('auth:sanctum')->group(function () {
    Route::get('dummies', [DummyController::class, 'index']);
    Route::post('dummies', [DummyController::class, 'store']);
    Route::get('dummies/{dummy}', [DummyController::class, 'show']);
    Route::put('dummies/{dummy}', [DummyController::class, 'update']);
    Route::delete('dummies/{dummy}', [DummyController::class, 'destroy']);
});