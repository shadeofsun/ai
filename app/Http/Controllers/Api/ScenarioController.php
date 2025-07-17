<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Scenario;
use App\Http\Resources\ScenarioResource;
use App\Http\Requests\StoreScenarioRequest;
use App\Http\Requests\UpdateScenarioRequest;
use Illuminate\Http\JsonResponse;

class ScenarioController extends Controller
{
    public function index(): JsonResponse
    {
        $scenarios = auth()->user()->scenarios()->with(['assistant1', 'assistant2', 'assistant3'])->get();
        return response()->json(ScenarioResource::collection($scenarios));
    }

    public function store(StoreScenarioRequest $request): JsonResponse
    {
        $validated = $request->validated();

        $scenario = auth()->user()->scenarios()->create($validated);
        $scenario->load(['assistant1', 'assistant2', 'assistant3']);
        return response()->json(new ScenarioResource($scenario), 201);
    }

    public function show(Scenario $scenario): JsonResponse
    {
        $this->authorize('view', $scenario);
        $scenario->load(['assistant1', 'assistant2', 'assistant3']);
        return response()->json(new ScenarioResource($scenario));
    }

    public function update(UpdateScenarioRequest $request, Scenario $scenario): JsonResponse
    {
        $this->authorize('update', $scenario);
        
        $validated = $request->validated();

        $scenario->update($validated);
        $scenario->load(['assistant1', 'assistant2', 'assistant3']);
        return response()->json(new ScenarioResource($scenario));
    }

    public function destroy(Scenario $scenario): JsonResponse
    {
        $this->authorize('delete', $scenario);
        $scenario->delete();
        return response()->json(null, 204);
    }
}