@extends('crud.layout');

@section('content');



<div class="main-block">
  <div class="block-item left">
  @isset($food)
  

  
    <form method="POST" action="{{  route('update',["id"=>$food->id ])}}"enctype="multipart/form-data">
        @csrf
        {{ method_field('put') }}
       
   <label><input type="textbox" id="t" name="local_name" value=" {{$food->name}}" placeholder="food name"></label> <br>
   <label><input type="textbox" id="l" name="api_name" value=" {{  $food->api_name}}" placeholder="api_name"></label> <br>
   <label><input type="textbox" id="l" name="image" value=" {{  $food->image}}" placeholder="api_name"></label> <br>
   <label><input type="textbox" id="l" name="description" value="{{ $food->description}}" placeholder="description"></label><br>
   @endisset
<div>  
  @foreach($food_categories as $category) 
  
@if ($category->food_category_id==1)
@php
$breakfast = 'checked' 
@endphp
@endif
@if ($category->food_category_id==2)
@php
$lunch =  'checked' 
@endphp
@endif
@if ($category->food_category_id==3)
@php
 $supper ='checked' 
@endphp
@endif
  @endforeach

  <Label><span> Category </span></label>
  <label id="radio"> <span>Breakfast</span> 
 @if(isset($breakfast))
    <input type="checkbox" name="category[]" value="1" {{ $breakfast }}>  
    @else
    <input type="checkbox" name="category[]" value="1">  
  @endif

</label><label id="radio">  <span>Lunch</span>
  @if(isset($lunch))
  <input type="checkbox" name="category[]" value="2" {{ $lunch }}>  
  @else
  <input type="checkbox" name="category[]" value="2">  
@endif

</label><label id="radio">  <span>Supper</span>
@if(isset($supper))
<input type="checkbox" name="category[]" value="3" {{ $supper }}>  
@else
<input type="checkbox" name="category[]" value="3">  
@endif

</label>

</div>



@foreach($food_parts as $part) 
@if ($part->food_part_id==1)
@php
   $main = 'checked' 
@endphp
@endif
@if ($part->food_part_id==2)
@php
 $sauce =  'checked' 
 @endphp
@endif
@if ($part->food_part_id==3)
@php
 $side ='checked'
 @endphp
@endif
  @endforeach

  <div>
  <Label><span> Part </span>
  
</label>  <label id="radio">
<span>Main</span>
@if(isset($main))
<input type="checkbox" name="part[]" value="1" {{ $main }}>  
@else
<input type="checkbox" name="part[]" value="1">  
@endif

</label><label id="radio">
<span>Sauce</span>
@if(isset($sauce))
<input type="checkbox" name="part[]" value="2" {{ $sauce }}>  
@else
<input type="checkbox" name="part[]" value="2">  
@endif

</label><label id="radio">
<span>Side</span>
@if(isset($side))
<input type="checkbox" name="part[]" value="3" {{ $side }}>  
@else
<input type="checkbox" name="part[]" value="3">  
@endif

</label>
 @foreach($nutrition_info as $nutrients)
   <input type="hidden"  name="calories" value="{{$nutrients['calories']}}"> 
 <input type="hidden" name="protein" value="{{$nutrients['protein'] }}">
  <input type="hidden"  name="fat" value="{{$nutrients['fat']}}">
 <input type="hidden"  name="carbohydrates" value="{{$nutrients['carbohydrates']}}">
 @endforeach
</div>
<br>
   <br>
   <button class="red" type="submit"><i class="icon ion-md-lock"></i> Submit</button>
   <br>
   
 
   
 
 </form >
  </div>
  <div class="block-item right">
    
    <table class="table table-striped">
<thead>
<tr>
  <th scope="col">#</th>
  <th scope="col">calories</th>
  <th scope="col">protein</th>
  <th scope="col">fat</th> 
  <th scope="col">Category</th>
  <th scope="col">Api_name</th>  
</tr>
</thead>
<tbody>
<tr>
   @isset($food) 
   <th scope="row">1</th>
  @foreach($nutrition_info as $nutrients) 
  <td>{{$nutrients['calories']}}</td>
  <td>{{$nutrients['protein']}}></td>
  <td>{{$nutrients['fat']}}></td> 
</tr>

</tbody>
</table>
<table class="table table-striped">
<thead>
<tr>
  <th scope="col">#</th>
  <th scope="col">carbohydrates</th>
  <th scope="col">vitamins</th>
  <th scope="col">minerals</th>
  <th scope="col">part</th>
</tr>
</thead>
<tbody>
<tr>
  <th scope="row">1</th>
  
   <td>{{$nutrients['carbohydrates']}}></td>
  @endforeach
</tr>

</tbody>
</table>
@endisset
  </div>
  
</div>
@endsection