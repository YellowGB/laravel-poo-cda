<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreClassRoomRequest;
use App\Models\ClassRoom;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ClassRoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $classRooms = ClassRoom::all();

        return response()->json([
            'class_rooms' => $classRooms,
        ], 200);
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
    public function store(StoreClassRoomRequest $request): JsonResponse
    {
        $classRoom = ClassRoom::create([
            'name' => $request->name,
            'capacity' => $request->capacity ?? '20',
        ]);

        return response()->json([
            'class_room' => $classRoom,
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(ClassRoom $classRoom): void
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ClassRoom $classRoom): void
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ClassRoom $classRoom): void
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ClassRoom $classRoom): void
    {
        //
    }
}
