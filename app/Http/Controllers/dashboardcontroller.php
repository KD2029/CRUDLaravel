<?php namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\users;
use App\Models\foods;
use App\Models\food_categories;
use App\Models\food_food_category;
use Illuminate\Support\Facades\DB;
Use App\Models\nutrition_information;
use App\Models\food_food_part;
use Illuminate\Support\Str;
use \Edamam\Support\Nutrient;
use \Edamam\Api\FoodDatabase\FoodRequest;
use \Edamam\Api\FoodDatabase\FoodDatabase;
use Illuminate\Support\Facades\Schema;




class dashboardcontroller extends Controller
{          
        /**
         * index
         *
         * @return void
         */
        public function index(){
            //details for the user table are passed to the admin dashboard
        $data1= users::all(); 
        $users= users::all()->count(); 
           //details for the foods table are passed to the admin dashboard
        $Food=foods::all();
        $Food1=foods::all()->count();
           //details for the NutritionInformation table are passed to the admin dashboard
        $nutrientdata1=nutrition_information::all();
         $nutrientdata=nutrition_information::all()->count();
           //details for the FoodFoodCategory table are passed to the admin dashboard
         $FoodFoodCategory =food_food_category::all();
           ////details for the FoodPart table are passed to the admin dashboard
           $FoodPart = food_food_Part::all();


         return view('admindashboard')->with('m', [ 
             'data'=>$data1, 
             'userno'=>$users, 
             'nutrients'=>$nutrientdata, 
             'nutrients1'=>$nutrientdata1,
             'foods'=> $Food,
              'Category'=>$FoodFoodCategory,
             'Part'=>$FoodPart
            ]);
        } 
        public function create() { 
            //
            // return view('crud.create');
            }
        public function store(Request $request): string {
              //
              
              DB::transaction(function () use ($request) {
                $food = foods::create([
                    'name' => $request['local_name'],
                    'api_name' => $request['api_name'],
                   // 'image' => $request['image'],
                    'description' => $request['description'],
                ]);
    
                $nutrition = nutrition_information::create([
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
        public function show($m) { 
            //
        }
                
               
               
        /**
         * edit
         *
         * @param  mixed $id
         * @param  mixed $table
         * @return 
         */
        public function edit(foods $food,$id) {

        $food =$food->find($id);
        $food_id=$food->id;
        $nutrition_info = nutrition_Information::where('food_id', $food_id)->get();
        $food_categories = food_food_category::where('food_id', $food_id)->get();
        $food_parts = food_food_part::where('food_id', $food_id)->get();
        // dd($food_categories);

      return view('crud.edit', compact('food', 'nutrition_info', 'food_categories','food_parts'));

        // return view('crud.edit')->with('Foods',[
        //     'id'=>$food->id,
        //     'row1'=>$nutrition_info, 
        //     'row2'=>$food_food_category,
        //     'row3'=>$food_food_part,
        //     'row4' =>$nutrition_info
        // ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
        
    
        /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        // dd($request);
        $food = foods::find($request->id);
 
    
        // Save the new values of the food
        $food->name =  $request['local_name'];
        $food->api_name = $request['api_name'];
        $food->image =  $request['image'];
        $food->description = $request['description'];
        $food->save();
        

        //Add nutrients for that food
        $nutrients =  nutrition_Information::where('food_id', $food->id);
        $nutrients->calories = $request['calories'];
        $nutrients->protein = $request['protein'];
        $nutrients->fat = $request['fat'];
        $nutrients->carbohydrates = $request['carbohydrates'];
        //$nutrients->fibre = $request['fibre'];
    

        // Add the new categories
        if ($request['category'] !=null) {

            //Delete the categories present
            $foodCategory = food_food_category::where('food_id', $food->id);
            $foodCategory->delete();

            // Add new categories
            $categoryIds = $request['category'];
            foreach ($categoryIds as $categoryId) {
            food_food_category::create([
                'food_id' => $food->id,
                'food_category_id' => $categoryId
            ]);
            }
        }
        
        // Add the new food parts
        if ($request['part'] !=null) {
            //Delete Previously stored Food parts
            $foodParts =  food_food_part::where('food_id', $food->id);
            $foodParts->delete();

            // Store new food parts assigned
            $partIds = $request['part'];
            foreach ($partIds as $partId) {
            food_food_part::create([
                'food_id' => $food->id,
                'food_part_id' => $partId
            ]);
        }
dd('OK -- last');
        
     
    }
}

     
        
        public function destroy($id ) {
             // 
             $food = foods::find($id);
 
             $food->delete()->cascade(); 
             return redirect()->route('admindashboard')->with('success','Foods row deleted successfully'); 

        }
    }