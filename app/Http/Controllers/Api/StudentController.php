<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreStudentRequest;
use App\Models\Student;
use Illuminate\Http\JsonResponse;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $students = Student::all();
        return response()->json([
            'students' => $students,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): void
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStudentRequest $request): JsonResponse
    {
        $student = Student::create([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'age' => $request->age,
        ]);

        return response()->json([
            'message' => 'Student stored successfully',
            'student' => $student,
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student): void
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student): void
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreStudentRequest $request, Student $student): JsonResponse
    {
        $student->update([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'age' => $request->age,
        ]);

        return response()->json([
            'message' => 'Student updated successfully',
            'student' => $student,
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student): JsonResponse
    {
        $student->delete();

        return response()->json([
            'message' => 'Student deleted successfully',
        ], 200);
    }
}
