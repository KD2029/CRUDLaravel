<?php

namespace App\Http\Controllers;

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

class crudcontroller extends Controller
{
    //

    public function index()
    {   
        return view('crud.create');
    }

    public function api_call(Request $req){
       FoodDatabase::setApiCredentials( env('EDAMAM_ID'), env('EDAMAM_KEY'));
        
       $data1 = FoodRequest::find(['ingredient' => $req->input('ingr')])->results();
        
           // echo "<pre>";
           // print_r($data1[0]);
          $result =json_decode($data1[0]->nutrients);
           $api_name = $data1[0]->label;
           
            //dd($req);
    
          //$m = $req->select;
          //$l = $req->select1;
            $m = json_encode($req->select);//category
            $l = json_encode($req->select1);//part
          // $randomNumber = random_int(100000, 999999);//for testing purposes
           
     return view('crud.create')-> with('k',[
            'category' => $m,
            'part' => $l,
           'ingredient' =>$req->input('ingr'),
            'food'=> $api_name,//passed in the form and not from the api
           'calories'=>$result->ENERC_KCAL, 
           'protein' =>  $result->PROCNT,
           'fat' =>  $result->FAT,
           'carbohydrates' =>  $result->CHOCDF,
           'vitamins' => 30,
           'minerals' => $result->FIBTG
           ]);
    
    
    
    
        
          
          
    }
    

    public function update(Request $req ,$id1) { 
      //foods update
      DB::transaction(function () use ($req,$id1) {
          $id1::update([
              'name' => $req['local_name'],
              'api_name' => $req['api_name'],
             // 'image' => $req['image'],
              'description' => $req['description'],
          ]);

          // $nutrition = NutritionInformation::create([
          //     'food_id' => $food->id,
          //     'serving_size' => 50,
          //     'calories' => $req['calories'],
          //     'protein' => $req['protein'],
          //     'fat' => $req['fat'],
          //     'carbohydrates' => $req['carbohydrates'],
          //     'fibre' => $req['minerals'],
          // ]);

          $categoryIds = $req['category'];
          $id1->foodCategory()->attach($categoryIds);

          $partIds = $req['part'];
          $id1->foodParts()->attach($partIds);
      });
   $id1->update(($req->all)); 

   return redirect()->route('admindashboard')->with('success','Foods table updated successfully');
       
  }
  
}
