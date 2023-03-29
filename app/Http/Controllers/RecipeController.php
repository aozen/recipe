<?php

namespace App\Http\Controllers;

use App\Http\Requests\RecipeRequest;
use App\Http\Resources\RecipeResource;
use App\Models\Recipe;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class RecipeController extends Controller
{
    /**
     * Get a collection of all recipes
     *
     * @return AnonymousResourceCollection
     */
    public function index()
    {
        return RecipeResource::collection(Recipe::all());
    }

    /**
     * Create new recipe
     *
     * @param  RecipeRequest  $request
     * @return RecipeResource
     */
    public function store(RecipeRequest $request)
    {
        return new RecipeResource(Recipe::create($request->validated()));
    }

    /**
     * Get a single record by recipe id
     *
     * @param  Recipe  $recipe
     * @return RecipeResource
     */
    public function show(Recipe $recipe)
    {
        return new RecipeResource($recipe);
    }

    /**
     * Update existing recipe by recipe id
     *
     * @param  RecipeRequest  $request
     * @param  Recipe  $recipe
     * @return RecipeResource
     */
    public function update(RecipeRequest $request, Recipe $recipe)
    {
        $recipe->update($request->validated());

        return new RecipeResource($recipe);
    }

    /**
     * Delete existing recipe by id
     *
     * @param  Recipe  $recipe
     * @return JsonResponse
     */
    public function destroy(Recipe $recipe)
    {
        $recipe->delete();

        return response()->json(['message' => 'Record removed successfully', 204]);
    }
}
