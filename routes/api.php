<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\DocumentTypeController;
use App\Http\Controllers\OfficeLocalationController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\PrescriptionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/users', [UserController::class, 'index']);
Route::get('/users/{id}', [UserController::class, 'show']);
Route::post('/users', [UserController::class, 'store']);
Route::put('/users/{id}', [UserController::class, 'update']);
Route::delete('/users/{id}', [UserController::class, 'destroy']);

// Doctors
Route::get('/doctors', [DoctorController::class, 'index']);
Route::get('/doctors/{id}', [DoctorController::class, 'show']);
Route::post('/doctors', [DoctorController::class, 'store']);
Route::put('/doctors/{id}', [DoctorController::class, 'update']);
Route::delete('/doctors/{id}', [DoctorController::class, 'destroy']);

// Patients
Route::get('/patients', [PatientController::class, 'index']);
Route::get('/patients/{id}', [PatientController::class, 'show']);
Route::post('/patients', [PatientController::class, 'store']);
Route::put('/patients/{id}', [PatientController::class, 'update']);
Route::delete('/patients/{id}', [PatientController::class, 'destroy']);

// Office locations
Route::get('/office_locations', [OfficeLocalationController::class, 'index']);
Route::get('/office_locations/{id}', [OfficeLocationController::class, 'show']);
Route::post('/office_locations', [OfficeLocationController::class, 'store']);
Route::put('/office_locations/{id}', [OfficeLocationController::class, 'update']);
Route::delete('/office_locations/{id}', [OfficeLocationController::class, 'destroy']);

// Documents
Route::get('/documents', [DocumentController::class, 'index']);
Route::get('/documents/{id}', [DocumentController::class, 'show']);
Route::post('/documents', [DocumentController::class, 'store']);
Route::put('/documents/{id}', [DocumentController::class, 'update']);
Route::delete('/documents/{id}', [DocumentController::class, 'destroy']);

// Prescriptions
Route::get('/prescriptions', [PrescriptionController::class, 'index']);
Route::get('/prescriptions/{id}', [PrescriptionController::class, 'show']);
Route::post('/prescriptions', [PrescriptionController::class, 'store']);
Route::put('/prescriptions/{id}', [PrescriptionController::class, 'update']);
Route::delete('/prescriptions/{id}', [PrescriptionController::class, 'destroy']);

// Appointments
Route::get('/appointments', [AppointmentController::class, 'index']);
Route::get('/appointments/{id}', [AppointmentController::class, 'show']);
Route::post('/appointments', [AppointmentController::class, 'store']);
Route::put('/appointments/{id}', [AppointmentController::class, 'update']);
Route::delete('/appointments/{id}', [AppointmentController::class, 'destroy']);

// Document types
Route::get('/document_types', [DocumentTypeController::class, 'index']);
Route::get('/document_types/{id}', [DocumentTypeController::class, 'show']);
Route::post('/document_types', [DocumentTypeController::class, 'store']);
Route::put('/document_types/{id}', [DocumentTypeController::class, 'update']);
Route::delete('/document_types/{id}', [DocumentTypeController::class, 'destroy']);