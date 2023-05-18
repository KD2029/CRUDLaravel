<!Doctype html>
	<html>
	<head>
		<title></title>
		<link rel="stylesheet" href="css/admindashboard.css" type="text/css"/>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	</head>


	<body>
		
		<div id="mySidenav" class="sidenav">
            <img src="Images/SUPA meal planner.svg" width="180px"/>
		<!-- <p class="logo"><span>M</span>-SoftTech</p> -->
	  <a href="#" class="icon-a"><i class="fa fa-dashboard icons"></i>   Dashboard</a>
	  <a href="#1"class="icon-a"><i class="fa fa-users icons"></i>  Users</a>
      <a href="#2"class="icon-a"><i class="fa fa-users icons"></i>   Students</a>
      <a href="#3"class="icon-a"><i class="fa fa-users icons"></i>  Admin</a>
	
	</div>
	<div id="main">

		<div class="head">
			<div class="col-div-6">
	<span style="font-size:30px;cursor:pointer; color: white;" class="nav"  >☰ Dashboard</span>
	<span style="font-size:30px;cursor:pointer; color: white;" class="nav2"  >☰ Dashboard</span>
	</div>
		
		<div class="col-div-6">
		<div class="profile">
			
			<img src="images/user.png" class="pro-img" />
			<p>Manoj Adhikari <span>UI / UX DESIGNER</span></p>
		</div>
	</div>
		<div class="clearfix"></div>
	</div>

		<div class="clearfix"></div>
		<br/>
		
		<div class="col-div-3">
			@isset($m)
			<div class="box">
				<p>{{ $m['userno'] }}<br/><span>Users</span></p>
				
				<i class="fa fa-users box-icon"></i>
			</div>
		</div>
		<div class="col-div-3">
			<div class="box">
				<p>{{ $m['nutrients'] }}<br/><span>Food entries</span></p>
				<i class="fa fa-apple fa-3x " aria-hidden="true" ></i>
			</div>
		</div>
		<div class="col-div-3">
			<div class="box">
				<p>99<br/><span>Orders</span></p>
				<i class="fa fa-shopping-bag box-icon"></i>
			</div>
		</div>
		<div class="col-div-3">
			<div class="box">
				<p>78<br/><span>Tasks</span></p>
				<i class="fa fa-tasks box-icon"></i>
			</div>
		</div>
		@endisset
		<div class="clearfix"></div>
		<br/><br/>
		<div class="col-div-8">
			<div class="box-8">
			<div class="content-box">
				<p id="1">Users &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
 <a class="button-86" role="button" href="{{ url('crud.create') }}">Create </a>
 &emsp;
  <a class="button-86" role="button" href={{ route('show') }}>Show </a>{{-- for viewing all the details --}}

</p>
				<br/>
				<table style="height:80px;">
	  <tr>
	    <th>id</th>
	    <th>name</th>
	    <th>email</th>
	  </tr>
	  @isset($m)
		  
	
	  @foreach ($m['data'] as $record )
	  <tr>
	    <td>{{ $record->id }}</td>
	    <td>{{ $record->name }}</td>
	    <td>{{ $record->email }}</td>
		<td>
			{{-- {{ $food = $m['foods'][0]->id }}
			{{ $array = array("id"=> "$record->id","id1"=>"$food") }} --}}
			{{-- {{  $Array = serialize($array) }} --}}
			<a class="button-86" role="button"href={{ route('edit', ["table"=>$record->getTable(), "id"=>"$record->id"]) }}>Edit </a>
		</td>
		<td>
			<a class="button-86" role="button">delete</a></td>
	  </tr>
	  
	  @endforeach
	  @endisset
	  
	
	  
	</table>
			</div>
		</div>
		</div>

		{{-- <div class="col-div-4">
			<div class="box-4">
			<div class="content-box">
				<p>Total Sale <span>Sell All</span></p>

				<div class="circle-wrap">
	    <div class="circle">
	      <div class="mask full">
	        <div class="fill"></div>
	      </div>
	      <div class="mask half">
	        <div class="fill"></div>
	      </div>
	      <div class="inside-circle"> 70% </div>
	    </div>
	  </div>
			</div>
		</div>
		</div> --}}
			
		<div class="clearfix"></div>

		<div class="col-div-8">
			<div class="box-8">
			<div class="content-box">
				<p id="1">Foods &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
 <a class="button-86" role="button" href="{{ url('crud.create') }}">Create </a>
  <a class="button-86" role="button" href={{ url('show') }}>Show </a>{{-- for viewing further details --}}

</p>
		<br/>
		<table style="height:80px;">
	  <tr>
	    <th>id</th>
	    <th>name</th>
	    <th>api_name</th>
		<th>image</th>
	  </tr>
	  @isset($m)
		  
	   {{-- {{ dd($m['foods'][0]->id) }} --}}
	  @foreach ($m['foods'] as $record1 )
	  <tr>
	    <td>{{ $record1->id }}</td>
	    <td>{{ $record1->name }}</td>
	    <td>{{ $record1->api_name }}</td>
		<td>{{ $record1->image }}</td>
		
		<td>
			
		   <a class="button-86" role="button"href={{ route('edit',['id'=>$record1->id]) }}>Edit </a>
		
		</td>
		<td>	
			<a class="button-86" role="button" href={{ route('delete',['id' =>$record1->id]) }}>delete</a></td>
	  </tr>
	  
	  
	  @endforeach
	  

	  @endisset
	  
	
	  
	</table>
			</div>
		</div>
		</div>
        <div class="col-div-8">
			<div class="box-8">
			<div class="content-box">
				<p id="2">Food-nutrients &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
 <a class="button-86" role="button">Create </a>
 <a class="button-86" role="button" href={{ url('show') }}>Show </a>{{-- for viewing further details --}}

				<br/>
				<table >
	  <tr>
	    <th>serving_size</th>
	    <th>calories</th>
	    <th>protein</th>
		<th>fat</th>
		<th>carbohydrates</th>
		<th>fibre</th>
	  </tr>
	  <tr>
		@isset($m)
		  
	
		@foreach ($m['nutrients1'] as $record2 )
		<tr>
		  <td>{{ $record2->id }}</td>
		  <td>{{ $record2->food_id  }}</td>
		  <td>{{ $record2->serving_size }}</td>
		  <td>{{ $record2->calories }}</td>
		  <td>{{ $record2->protein }}</td>
		  <td>{{ $record2->fat }}</td>
		  <td>{{ $record2->carbohydrates }}</td>
		  <td>{{ $record2->fibre }}</td>
		</tr>
		<tr>
			<td>  <a class="button-86" role="button"href="{{ route('edit',['id' =>$record2->id,"table"=>$record2->getTable()]) }}">Edit </a>
			</td>
			<td>
			  <a class="button-86" role="button">delete</a></td>
		</tr>
		
		@endforeach
		@endisset
	  </tr>
	  
	  
	</table>
			</div>
		</div>
		</div>

		<div class="col-div-8">
			<div class="box-8">
			<div class="content-box">
				<p id="2">Category &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
 <a class="button-86" role="button">Create </a>
 <a class="button-86" role="button" href={{ url('show') }}>Show </a>{{-- for viewing further details --}}

				<br/>
				<table >
	  <tr>
	    <th>id</th>
	    <th>food_id</th>
	    <th>food_category_id</th>
		
	  </tr>
	  <tr>
		@isset($m)
		  
	
		@foreach ($m['Category'] as $record3 )
		<tr>
			{{-- {{ dd($record3->id);}} --}}
		  <td>{{ $record3->id }}</td>
		  <td>{{ $record3->food_id  }}</td>
		  <td>{{ $record3->food_category_id }}</td>
		  <td>
			  <a class="button-86" role="button"href="{{ route('edit',['id' =>$record3->id,"table"=>$record3->getTable()]) }}">Edit </a>
			  <a class="button-86" role="button">delete</a></td>
		</tr>
		
		@endforeach
		@endisset
	  </tr>
	  
	  
	</table>
			</div>
		</div>
		</div>

		<div class="col-div-8">
			<div class="box-8">
			<div class="content-box">
				<p id="2">Part &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
 <a class="button-86" role="button">Create </a>
 <a class="button-86" role="button" href={{ url('show') }}>Show </a>{{-- for viewing further details --}}

				<br/>
				<table >
	  <tr>
	    <th>id</th>
	    <th>food_id</th>
	    <th>food_part_id</th>
		
	  </tr>
	  <tr>
		@isset($m)
		  
	
		@foreach ($m['Part'] as $record4 )
		<tr>
		  <td>{{ $record4->id }}</td>
		  <td>{{ $record4->food_id  }}</td>
		  <td>{{ $record4->food_part_id }}</td>
		  <td>
			  <a class="button-86" role="button"href="{{ route('edit',['id' =>$record4->id,"table"=>$record4->getTable()]) }}">Edit </a>
			  <a class="button-86" role="button">delete</a></td>
		</tr>
		
		@endforeach
		@endisset
	  </tr>
	  
	  
	</table>
			</div>
		</div>
		</div>

		
        
        <div class="col-div-8">
			<div class="box-8">
			<div class="content-box">
				<p id="3">Admins &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
 <a class="button-86" role="button">Create </a>
<a class="button-86" role="button">Edit </a>
<a class="button-86" role="button">delete</a></p>
				<br/>
				<table >
	  <tr>
	    <th>Company</th>
	    <th>Contact</th>
	    <th>Country</th>
	  </tr>
	  <tr>
	    <td>Alfreds Futterkiste</td>
	    <td>Maria Anders</td>
	    <td>Germany</td>
	  </tr>
	  <tr>
	    <td>Centro comercial Moctezuma</td>
	    <td>Francisco Chang</td>
	    <td>Mexico</td>
	  </tr>
	  <tr>
	    <td>Ernst Handel</td>
	    <td>Roland Mendel</td>
	    <td>Austria</td>
	  </tr>
	  <tr>
	    <td>Island Trading</td>
	    <td>Helen Bennett</td>
	    <td>UK</td>
	  </tr>
	  
	  
	</table>
			</div>
		</div>
		</div>
	</div>


	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script>

	  $(".nav").click(function(){
	    $("#mySidenav").css('width','70px');
	    $("#main").css('margin-left','70px');
	    $(".logo").css('visibility', 'hidden');
	    $(".logo span").css('visibility', 'visible');
	     $(".logo span").css('margin-left', '-10px');
	     $(".icon-a").css('visibility', 'hidden');
	     $(".icons").css('visibility', 'visible');
	     $(".icons").css('margin-left', '-8px');
	      $(".nav").css('display','none');
	      $(".nav2").css('display','block');
	  });

	$(".nav2").click(function(){
	    $("#mySidenav").css('width','300px');
	    $("#main").css('margin-left','300px');
	    $(".logo").css('visibility', 'visible');
	     $(".icon-a").css('visibility', 'visible');
	     $(".icons").css('visibility', 'visible');
	     $(".nav").css('display','block');
	      $(".nav2").css('display','none');
	 });

	</script>

	</body>


	</html>