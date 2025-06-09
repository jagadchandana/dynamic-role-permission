<?php

use Illuminate\Support\Facades\Route;
use JCS\RolePermission\Controllers\Api\RoleController;
use JCS\RolePermission\Controllers\Api\PermissionController;
use JCS\RolePermission\Controllers\Api\RouteController;
use JCS\RolePermission\Controllers\Api\UserController;

Route::middleware(['auth:sanctum'])->group(function () {

    // Roles
    Route::get('/roles', [RoleController::class, 'index']);
    Route::post('/roles', [RoleController::class, 'store']);
    Route::post('/roles/{role}/permissions', [RoleController::class, 'assignPermissions']);

    // Permissions
    Route::get('/permissions', [PermissionController::class, 'index']);
    Route::post('/permissions', [PermissionController::class, 'store']);

    // Permission Routes
    Route::post('/permissions/{permission}/routes', [RouteController::class, 'assignRoutes']);

    // Users
    Route::post('/users/{userId}/roles', [UserController::class, 'assignRoles']);
    Route::get('/users/{userId}/roles', [UserController::class, 'roles']);

});
