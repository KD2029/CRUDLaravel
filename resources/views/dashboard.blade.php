<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

   
</x-app-layout>
<!Doctype HTML>
	<html>
	<head>
		<title></title>
		<link rel="stylesheet" href="Css/dashboard.css" type="text/css"/>
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
			<div class="box">
				<p>67<br/><span>Customers</span></p>
				<i class="fa fa-users box-icon"></i>
			</div>
		</div>
		<div class="col-div-3">
			<div class="box">
				<p>88<br/><span>Projects</span></p>
				<i class="fa fa-list box-icon"></i>
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
		<div class="clearfix"></div>
		<br/><br/>
		<div class="col-div-8">
			<div class="box-8">
			<div class="content-box">
				<p id="1">Users &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
 <button class="button-86" role="button"href="url('/')">Create </button>
<button class="button-86" role="button">Edit </button>
<button class="button-86" role="button">delete</button>
</p>
				<br/>
				<table>
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

		<div class="col-div-4">
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
		</div>
			
		<div class="clearfix"></div>
        <div class="col-div-8">
			<div class="box-8">
			<div class="content-box">
				<p id="2">Students &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
 <button class="button-86" role="button">Create </button>
<button class="button-86" role="button" href={{ url('edit') }}>Edit </button>
<button class="button-86" role="button">delete</button></p>
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
        
        <div class="col-div-8">
			<div class="box-8">
			<div class="content-box">
				<p id="3">Admins &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
 <button class="button-86" role="button">Create </button>
<button class="button-86" role="button">Edit </button>
<button class="button-86" role="button">delete</button></p>
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