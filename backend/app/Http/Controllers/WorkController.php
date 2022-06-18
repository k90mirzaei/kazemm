<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreWorkRequest;
use App\Http\Requests\UpdateWorkRequest;
use App\Models\Work;
use Illuminate\Http\JsonResponse;

class WorkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        return response()->json(Work::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreWorkRequest $request
     * @return JsonResponse
     */
    public function store(StoreWorkRequest $request): JsonResponse
    {
        Work::create($request->validated());

        return response()->json(['message' => 'Work created successfully']);
    }

    /**
     * Display the specified resource.
     *
     * @param Work $work
     * @return JsonResponse
     */
    public function show(Work $work): JsonResponse
    {
        return response()->json($work);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateWorkRequest $request
     * @param Work $work
     * @return JsonResponse
     */
    public function update(UpdateWorkRequest $request, Work $work): JsonResponse
    {
        $work->update($request->validated());

        return response()->json(['message' => 'Work updated Successfully', 'data' => $work->refresh()]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Work $work
     * @return JsonResponse
     */
    public function destroy(Work $work): JsonResponse
    {
        $work->delete();

        return response()->json(['message' => 'Work deleted successfully!']);
    }
}
