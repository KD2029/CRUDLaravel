<?php

namespace App\Http\Controllers;

use App\Models\Food;
use App\Models\FoodFoodCategory;
use App\Models\FoodFoodPart;
use App\Models\NutritionInformation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FoodsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @return string
     */
    public function store(Request $request): string
    {

        DB::transaction(function () use ($request) {
            $food = Food::create([
                'name' => $request['local_name'],
                'api_name' => $request['api_name'],
                'image' => $request['image'],
                'description' => $request['description'],
            ]);

            $nutrition = NutritionInformation::create([
                'food_id' => $food->id,
                'serving_size' => 50,
                'calories' => $request['calories'],
                'protein' => $request['protein'],
                'fat' => $request['fat'],
                'carbohydrates' => $request['carbohydrates'],
                'fibre' => $request['minerals'],
            ]);

            $categoryIds = $request['category'];
            $food->foodCategory()->attach($categoryIds);

            $partIds = $request['part'];
            $food->foodParts()->attach($partIds);
        });

        return 'Success';
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
