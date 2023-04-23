@extends('crud.layout');

@section('content');
<div class="main-block">
  <div class="block-item left">
    <form method="POST" action="{{route('api_call')}}">
        @csrf
   <label><input type="textbox" id="t" name="ingr" placeholder="Ingredient"></label> <br>
   <label><input type="textbox" id="l" name="api_name" placeholder="Api Name"></label> <br>
   <br>
   <label><textarea rows="2" name="description" placeholder="Description of the food"></textarea></label><br>
   <Label><span> Category </span></label>
<div >
  <label id="radio">
  <span>Breakfast</span>
<input type="checkbox" name="select[]" value="1">
</label>
<label id="radio">
  <span>Lunch</span>
<input type="checkbox" name="select[]" id="option-2" value="2">
</label>
<label id="radio">
  <span>Supper</span>
<input type="checkbox" name="select[]" id="option-3" value="3">
</label>
 


</div>
<Label><span> Part </span></label>
<div >
  <label id="radio">
  <span>Main</span>
<input type="checkbox" name="select1[]" value="1" >
</label>
<label id="radio">
  <span>Side</span>
<input type="checkbox" name="select1[]" id="option-2" value="2">
</label>
<label id="radio">
  <span>Sauce</span>
<input type="checkbox" name="select1[]" id="option-3" value="3">
</label>
 


</div>
<br>
   <br>
   <button class="red" type="submit"><i class="icon ion-md-lock"></i> View</button>
   <br>
   
 </form >
 
<form method="post" action="{{route('store')}}">
@csrf
 @isset($k)
 @for ($i = 0; $i < 1; $i++)
 <input type="hidden"  name="category" value="{{$k['category']}}">
 <input type="hidden"  name="part" value=" {{ $k['part'] }}">
 <input type="hidden"  name="local_name" value=" {{ $k['ingredient'] }}">
 <input type="hidden"  name="api_name" value=" {{ $k['food'] }}">
 <input type="hidden"  name="calories" value="{{$k['calories']}}">
 <input type="hidden"  name="protein" value="{{$k['protein']}}">
 <input type="hidden"  name="fat" value="{{$k['fat']}}">
 <input type="hidden"  name="carbohydrates" value="{{$k['carbohydrates']}}">
 <input type="hidden"  name="vitamins" value="{{$k['vitamins']}}">
 <input type="hidden"  name="minerals" value="{{$k['minerals']}}"> 

@endfor   
  
 
 @endisset
<button class="red" type="submit"><i class="icon ion-md-lock"></i><a> submit</a> </button>
</form>
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
  <th scope="row">1</th>
  @isset($k)
  <td>{{$k['calories']}}</td>
  <td>{{$k['protein']}}></td>
  <td>{{$k['fat']}}></td>
  <td>
  @for($c=0; $c<1; $c++)
  {{$k['category']}}
   @endfor
  </td>
  
  @endisset
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
  @isset($k)
  <td>{{$k['carbohydrates']}}></td>
  <td>{{$k['vitamins']}}></td>
  <td>{{$k['minerals']}}></td>
  <td>
 @for($c=0; $c<1; $c++)
  {{$k['part']}}
  @endfor
  </td>
  <td>{{$k['food']}}></td>
  @endisset
</tr>

</tbody>
</table>

  </div>

</div>
@endsection