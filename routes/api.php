<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MajorController;
use App\Http\Controllers\AlumniController;
use App\Http\Controllers\PersonController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\ApiLoginController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\ProfessorController;
use App\Http\Controllers\ResearchAssistantController;
use App\Http\Controllers\TeachingAssistantController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('login', [ApiLoginController::class, 'login']);

// /api
Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('people', [PersonController::class, 'list']);
    Route::get('people/{person}', [PersonController::class, 'show']);
    Route::get('students', [StudentController::class, 'list']);
    Route::get('students/{student}', [StudentController::class, 'show']);
    Route::get('alumnis', [AlumniController::class, 'list']);
    Route::get('alumnis/{alumni}', [AlumniController::class, 'show']);
    Route::get('majors', [MajorController::class, 'list']);
    Route::get('majors/{major}', [MajorController::class, 'show']);
    Route::get('positions', [PositionController::class, 'list']);
    Route::get('subjects', [SubjectController::class, 'list']);
    Route::get('employees', [EmployeeController::class, 'list']);
    Route::get('employees/general', [EmployeeController::class, 'listGeneral']);
    Route::get('employees/research_assistants', [EmployeeController::class, 'list']);
    Route::get('employees/teaching_assistants', [EmployeeController::class, 'list']);
    
    Route::post('people', [PersonController::class, 'store']);
    Route::post('students', [StudentController::class, 'store']);
    Route::post('alumnis', [AlumniController::class, 'store']);
    Route::post('positions', [PositionController::class, 'store']);
    Route::post('employees/general', [EmployeeController::class, 'store']);
    Route::post('employees/professors', [ProfessorController::class, 'store']);
    Route::post('employees/research_assistants', [ResearchAssistantController::class, 'store']);
    Route::post('employees/teaching_assistants', [TeachingAssistantController::class, 'store']);
    Route::post('subjects', [SubjectController::class, 'store']);
    Route::post('majors', [MajorController::class, 'store']);

    Route::put('people/{person}', [PersonController::class, 'update']);
    Route::put('students/{student}', [StudentController::class, 'update']);
    Route::put('alumnis/{alumni}', [AlumniController::class, 'update']);
    Route::put('employees/professor/{professor}', [ProfessorController::class, 'update']);
    Route::put('employees/research_assistant/{research_assistant}', [ResearchAssistantController::class, 'update']);
    Route::put('employees/teaching_assistant/{teaching_assistant}', [TeachingAssistantController::class, 'update']);
    Route::put('positions/{position}', [PositionController::class, 'update']);
    Route::put('subjects/{subject}', [SubjectController::class, 'update']);
    Route::put('majors/{major}', [MajorController::class, 'update']);

    Route::delete('people/{person}', [PersonController::class, 'destroy']);
    Route::delete('positions/{position}', [PositionController::class, 'destroy']);
    Route::delete('subjects/{subject}', [SubjectController::class, 'destroy']);
    Route::delete('majors/{major}', [MajorController::class, 'destroy']);
});
