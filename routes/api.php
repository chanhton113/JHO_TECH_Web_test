<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\OpportunityController;
use App\Http\Controllers\PipelineController;
use App\Http\Controllers\TagController;

/*
|---------------------------------------------------------------------------
| API Routes
|---------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/login', [UserController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [UserController::class, 'logout']);

    Route::get('/me', function (Request $request) {
        return response()->json($request->user());
    });
    Route::middleware('role:admin')->get('/admin', function () {
        return response()->json(['message' => 'Chào mừng Admin']);
    });

    Route::middleware('role:user')->get('/user', function () {
        return response()->json(['message' => 'Chào mừng User']);
    });
    Route::get('/users', [UserController::class, 'getAllUsers']);
    Route::prefix('contacts')->group(function () {
        Route::get('/', [ContactController::class, 'index']);
        Route::get('{contact_id}', [ContactController::class, 'show']);
        Route::post('/', [ContactController::class, 'store']);
        Route::put('{contact_id}', [ContactController::class, 'update']);
        Route::delete('{contact_id}', [ContactController::class, 'destroy']);
        Route::post('destroy_multiple', [ContactController::class, 'destroyMultiple']);
        Route::get('export', [ContactController::class, 'export']);
    });

    Route::get('/tasks', [TaskController::class, 'index']);
    Route::get('/tasks/{task_id}', [TaskController::class, 'show']);
    Route::post('/tasks/create', [TaskController::class, 'store'])->middleware('role:admin');
    Route::put('/tasks/update/{task_id}', [TaskController::class, 'update']);
    Route::delete('/tasks/{task_id}', [TaskController::class, 'destroy'])->middleware('role:admin');
    Route::post('/tasks/destroy_multiple', [TaskController::class, 'destroyMultiple'])->middleware('role:admin');

    Route::prefix('opportunities')->group(function () {
        Route::get('/', [OpportunityController::class, 'index']);
        Route::get('/{opportunitie_id}', [OpportunityController::class, 'show']);
        Route::post('/', [OpportunityController::class, 'create']);
        Route::put('/{opportunitie_id}', [OpportunityController::class, 'update']);
        Route::delete('/delete/{opportunitie_id}', [OpportunityController::class, 'destroy']);
        Route::delete('/delete-multiple', [OpportunityController::class, 'destroyMultiple']);
        Route::post('/{opportunitie_id}/tags', [OpportunityController::class, 'attachTagsToOpportunity']);
        Route::delete('/{opportunitie_id}/tags', [OpportunityController::class, 'detachTagsFromOpportunity']);
    });
    Route::prefix('pipeline')->group(function () {
        Route::get('columns', [PipelineController::class, 'getColumns']);
        Route::put('columns/{id}', [PipelineController::class, 'updateColumn']);
        Route::post('columns', [PipelineController::class, 'createColumn']);
        Route::delete('columns/{id}', [PipelineController::class, 'deleteColumn']);
    });
    
    Route::prefix('tags')->group(function () {
        Route::get('/', [TagController::class, 'index']);
        Route::post('/', [TagController::class, 'store']);
        Route::put('{id}', [TagController::class, 'update']);
        Route::delete('{id}', [TagController::class, 'destroy']);
    });
    
    
});
