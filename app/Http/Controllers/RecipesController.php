<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Recipes;
use App\Http\Resources\Recipes as RecipeResource;

class RecipesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recipes = Recipes::orderBy('created_at', 'desc')->paginate(20);

        // Return collection of categories as a resource
        return RecipeResource::collection($recipes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // $recipe = new Recipes();
        // $recipe->title = $request->title;
        // $recipe->category_id = $request->category_id;
        // $recipe->ingredients = $request->ingredients;
        // $recipe->steps = $request->steps;
        // $recipe->duration = $request->duration;
        // $recipe->publish = $request->publish;
        // $recipe->save();

        
        $this->validate($request, [
            'title' => 'required',
            'ingredients' => 'required',
            'steps' => 'required',
            'duration' => 'required',
        ]);

        $recipe = $request->isMethod('put') ? Recipes::findOrFail($request->id) : new Recipes;

        $recipe->category_id = $request->category_id;
        $recipe->title = $request->input('title');
        $recipe->ingredients = $request->input('ingredients');
        $recipe->steps = $request->input('steps');
        $recipe->duration = $request->input('duration');
        $recipe->publish = $request->input('publish');

        if ($recipe->save()) {
            return new RecipeResource($recipe);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Recipes  $recipes
     * @return \Illuminate\Http\Response
     */
    public function show(Recipes $recipes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Recipes  $recipes
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return Recipes::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Recipes  $recipes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Recipes $recipes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Recipes  $recipes
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // get article
        $recipe = Recipes::findOrFail($id);

        if ($recipe->delete()) {
            return new RecipeResource($recipe);
        }
    }
}
