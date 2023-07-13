<?php

namespace App\Http\Controllers;
use App\Models\Food;
use App\Models\FoodPart;
use App\Models\FoodCategory;
use App\Models\FoodFoodPart;
use App\Models\FoodFoodCategory;
use Illuminate\Support\Facades\DB;
use \Illuminate\Http\Response;
use \Edamam\Support\Nutrient;
use \Edamam\Api\FoodDatabase\FoodRequest;
use \Edamam\Api\FoodDatabase\FoodDatabase;



use Illuminate\Http\Request;

class UserInputController extends Controller
{
    //

    public function index(){

        return view('auth.register-5');
    }
    
    /**
     * getFoodsByMealType
     *
     * @param  mixed $mealType
     * @return /illuminate/Http/Response
     */
    public function getFoodsByMealType($mealType = null)
{
    $mainFoods = [];
    $sauceFoods = [];
    $sideFoods = [];
   // dd($mealType);

    if ($mealType === 'breakfast') {
        //mainFoods
        $food_part_Ids_1 = DB::table('food_food_part')
                ->where('food_part_id', 1)
                ->pluck('food_id')
                ->all();
        $foodIds_1 = DB::table('food_food_category')
                ->whereIn('food_id', $food_part_Ids_1)
                ->where('food_category_id', 1)
                ->pluck('food_id')
                ->all();
        $mainFoods = DB::table('foods')
                ->whereIn('id', $foodIds_1)
                ->pluck('name as value','id as text')
                ->all();

        //Sauce
        $food_part_Ids_2 = DB::table('food_food_part')
                ->where('food_part_id', 2)
                ->pluck('food_id')
                ->all();
        $foodIds_2 = DB::table('food_food_category')
                ->whereIn('food_id', $food_part_Ids_2)
                ->where('food_category_id', 1)
                ->pluck('food_id')
                ->all();
        $sauceFoods = DB::table('foods')
                ->whereIn('id', $foodIds_2)
                ->pluck('name','id')
                ->all();

       //Side
        $food_part_Ids_3 = DB::table('food_food_part')
        ->where('food_part_id', 3)
        ->pluck('food_id')
        ->all();
        $foodIds_3 = DB::table('food_food_category')
                ->whereIn('food_id', $food_part_Ids_3)
                ->where('food_category_id', 1)
                ->pluck('food_id')
                ->all();
        $sideFoods = DB::table('foods')
                ->whereIn('id', $foodIds_3)
                ->pluck('name','id')
                ->all();

       
    } elseif ($mealType === 'lunch') {
       //mainFoods
       $food_part_Ids_4 = DB::table('food_food_part')
                ->where('food_part_id', 1)
                ->pluck('food_id')
                ->all();
       $foodIds_4 = DB::table('food_food_category')
                ->whereIn('food_id', $food_part_Ids_4)
                ->where('food_category_id', 2)
                ->pluck('food_id')
                ->all();
       $mainFoods = DB::table('foods')
                ->whereIn('id', $foodIds_4)
                ->pluck('name','id')
                ->all();

        //Sauce
        $food_part_Ids_5 = DB::table('food_food_part')
                ->where('food_part_id', 2)
                ->pluck('food_id')
                ->all();
        $foodIds_5 = DB::table('food_food_category')
                ->whereIn('food_id', $food_part_Ids_5)
                ->where('food_category_id', 2)
                ->pluck('food_id')
                ->all();
        $sauceFoods = DB::table('foods')
                ->whereIn('id', $foodIds_5)
                ->pluck('name','id')
                ->all();

      //Sauce
      $food_part_Ids_6 = DB::table('food_food_part')
                ->where('food_part_id', 2)
                ->pluck('food_id')
                ->all();
$foodIds_6 = DB::table('food_food_category')
                ->whereIn('food_id', $food_part_Ids_6)
                ->where('food_category_id', 2)
                ->pluck('food_id')
                ->all();
$sauceFoods = DB::table('foods')
                ->whereIn('id', $foodIds_6)
                ->pluck('name','id')
                ->all();
    } else {
        //dinner
        //mainFoods
 $food_part_Ids_7 = DB::table('food_food_part')
                ->where('food_part_id', 1)
                ->pluck('food_id')
                ->all();
$foodIds_7 = DB::table('food_food_category')
                ->whereIn('food_id', $food_part_Ids_7)
                ->where('food_category_id', 3)
                ->pluck('food_id')
                ->all();
$mainFoods = DB::table('foods')
                ->whereIn('id', $foodIds_7)
                ->pluck('name','id')
                ->all();

//Sauce
$food_part_Ids_8 = DB::table('food_food_part')
                ->where('food_part_id', 2)
                ->pluck('food_id')
                ->all();
$foodIds_8 = DB::table('food_food_category')
                ->whereIn('food_id', $food_part_Ids_8)
                ->where('food_category_id', 3)
                ->pluck('food_id')
                ->all();
$sauceFoods = DB::table('foods')
                ->whereIn('id', $foodIds_8)
                ->pluck('name','id')
                ->all();

//Side
$food_part_Ids_9 = DB::table('food_food_part')
                ->where('food_part_id', 3)
                ->pluck('food_id')
                ->all();
$foodIds_10 = DB::table('food_food_category')
                ->whereIn('food_id', $food_part_Ids_9)
                ->where('food_category_id', 3)
                ->pluck('food_id')
                ->all();
$sideFoods = DB::table('foods')
                ->whereIn('id', $foodIds_10)
                ->pluck('name','id')
                ->all();
    }

    $foods = [
        'mainFoods' => $mainFoods,
        'sauceFoods' => $sauceFoods,
        'sideFoods' => $sideFoods
    ];
return response()->json($foods);
//  return view('auth.register-5')->with('foods', $foods);
}

public function api_call(Request $req){
        FoodDatabase::setApiCredentials( env('EDAMAM_ID'), env('EDAMAM_KEY'));
         
        $data1 = FoodRequest::find(['ingredient' => $req->input('ingr')])->results();
         
             echo "<pre>";
             print_r($data1[0]);
        //    $result =json_decode($data1[0]->nutrients);
//             $api_name = $data1[0]->label;
            
//              //dd($req);
     
//            //$m = $req->select;
//            //$l = $req->select1;
//              $m = json_encode($req->select);//category
//              $l = json_encode($req->select1);//part
//            // $randomNumber = random_int(100000, 999999);//for testing purposes
            
//       return view('crud.create')-> with('k',[
//              'category' => $m,
//              'part' => $l,
//             'ingredient' =>$req->input('ingr'),
//              'food'=> $api_name,//passed in the form and not from the api
//             'calories'=>$result->ENERC_KCAL, 
//             'protein' =>  $result->PROCNT,
//             'fat' =>  $result->FAT,
//             'carbohydrates' =>  $result->CHOCDF,
//             'vitamins' => 30,
//             'minerals' => $result->FIBTG
//             ]);
     
     
     
     
         
           
           
     }

}
