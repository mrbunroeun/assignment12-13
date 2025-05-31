<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
use App\Models\Classroom;

// Get all students
Route::get('/students', function () {
    return response()->json(Classroom::getStudents());
});

// Create a new student
Route::post('/students', function (Request $request) {
    $success = Classroom::addStudent($request->all());
    if ($success) {
        return response()->json(['message' => 'Student created'], 201);
    }
    return response()->json(['message' => 'Student ID already exists'], 400);
});

// Update existing student
Route::patch('/students/{id}', function ($id, Request $request) {
    $updated = Classroom::updateStudent($id, $request->all());
    if ($updated) {
        return response()->json($updated);
    }
    return response()->json(['message' => 'Student not found'], 404);
});

// Delete student by ID
Route::delete('/students/{id}', function ($id) {
    $deleted = Classroom::deleteStudent($id);
    if ($deleted) {
        return response()->json(['message' => 'Student deleted']);
    }
    return response()->json(['message' => 'Student not found'], 404);
});

// ======= Teacher Routes =======

// Get all teachers
Route::get('/teachers', function () {
    return response()->json(Classroom::getTeachers());
});

// Create a new teacher
Route::post('/teachers', function (Request $request) {
    $success = Classroom::addTeacher($request->all());
    if ($success) {
        return response()->json(['message' => 'Teacher created'], 201);
    }
    return response()->json(['message' => 'Teacher ID already exists'], 400);
});

// Update existing teacher
Route::patch('/teachers/{id}', function ($id, Request $request) {
    $updated = Classroom::updateTeacher($id, $request->all());
    if ($updated) {
        return response()->json($updated);
    }
    return response()->json(['message' => 'Teacher not found'], 404);
});

// Delete teacher by ID
Route::delete('/teachers/{id}', function ($id) {
    $deleted = Classroom::deleteTeacher($id);
    if ($deleted) {
        return response()->json(['message' => 'Teacher deleted']);
    }
    return response()->json(['message' => 'Teacher not found'], 404);
});