<!doctype html>
<html>
	<head>
		<title>Web Serials</title>
		<meta charset="utf-8" />
		<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
      <link href='https://fonts.googleapis.com/css?family=Federo' rel='stylesheet'>

  </head>
		<script>
		$.get("rssScraper.php?details=ward", function(data){
			$("#wardUpdate").html(data);
		});		
		$.get("rssScraper.php?details=practical", function(data){
			$("#practicalUpdate").html(data);
		});		
		$.get("rssScraper.php?details=pact", function(data){
			$("#pactUpdate").html(data);
		});		
		
		$(document).ready(function(){
			$("#wardInfo").hover(function(){
				$("#content").css("background-image", "url(res/victoria.jpg)");
				$("#content").css("background-size", "cover");
				$("#content").css("background-position", "center");
			},
			function(){
				$("#content").css("background", "black");
			});
			$("#practicalInfo").hover(function(){
				$("#content").css("background-image", "url(res/catherine.jpg)");
				$("#content").css("background-size", "cover");
				$("#content").css("background-position", "center");
			},
			function(){
				$("#content").css("background", "black");
			});
			$("#pactInfo").hover(function(){
				$("#content").css("background-image", "url(res/barbatorem.jpg)");
				$("#content").css("background-size", "cover");
				$("#content").css("background-position", "center");
			},
			function(){
				$("#content").css("background", "black");
			});
			
			//The onclick functions for the navbar
			$(".nav li").on("click", function(event){
				event.preventDefault();
				$(".nav li").removeClass("active");
				$(this).addClass("active");
				$("#info").css("display", "none");
				$(".about").css("display", "none");
				$("#recent").css("display", "block");
				$("#recent").html("");
			});
			$("#wardNav").on("click", function(event){
				event.preventDefault();
				$.get("rssScraper.php?serial=ward", function(data){
					$("#recent").html(data);
				});
			});
			$("#practicalNav").on("click", function(event){
				event.preventDefault();
				$.get("rssScraper.php?serial=practical", function(data){
					$("#recent").html(data);
				});
			});
			$("#pactNav").on("click", function(event){
				event.preventDefault();
				$.get("rssScraper.php?serial=pact", function(data){
					$("#recent").html(data);
				});
			});
			$(".navbar-header a").on("click", function(){
				$("#recent").css("display", "none");
			});
		});
		
		
		</script>
	
	<style>
		body, html{
			height:100%;
			width:100%;
			font-family: 'Federo';
			background-color: black;
		}
		
		.navbar{
			margin-bottom: 0;
			border-radius: 0px;
		}
	
		#content{
			padding-top: 20px;
			background-size:cover;
			background-position:center;
			width:100%;
			height:100%;
		}
		
		.info{
			color: seashell;
			background: rgba(96,96,96,0.8);
			border-radius: 10px;
			border: 2px solid black;
		}
		
		.center{
			text-align: center;
		}
		
		#recent{
			display:none;
			font-size: 150%;
			margin: 5px 100px 20px 100px;
			padding: 15px;
		}
		
		#recent > p{
			padding-bottom: 20px;
		}
		
		#wardInfo:hover > #content{
			background-color: white;
		}
		
		.serialTitle{
			font-weight: bold;
			font-size: 200%
		}
		
		.description{
			font-style: italic;
		}
		
		.about{
			margin:200px 0 0 0;
		}
		
		a{
			color: seashell;
		}
		
		nav {
			padding:0;
		}
		
	</style>
	

    <body>
		<!-- Creates the Navbar  -->
		<nav class="navbar navbar-inverse" id="navigation">
		  <div class="container">
			
			<!-- Area of the navbar that doesn't collapse when smalled -->
			<div class="navbar-header">
			
			  <a href="" class="navbar-brand">My Webserials</a>
			
			  <!-- Button that expands collapsed items on smalled -->  
			  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
				<span class="glyphicon glyphicon-menu-hamburger" style="color:gray"></span>
			  </button>
			   
			</div>
			
			<!-- Area of the navbar that collapse -->
			<div class="collapse navbar-collapse" id="myNavbar">
			
			  <ul class="nav navbar-nav">
				<li id="wardNav"><a href=""><span class="glyphicon glyphicon-record"></span> Ward</a></li>
				<li id="practicalNav"><a href=""><span class="glyphicon glyphicon-tower"></span> Practical Guide</a></li>
				<li id="pactNav"><a href=""><span class="glyphicon glyphicon-tint"></span> Pact</a></li>
			  </ul>
			
			</div>
			
			
		  </div>
		</nav>

		
		<div class="container" id="content">		
			<div id="info">
				<div class="row" id="descriptions">
					<div class="col-md-4 box">
						<div class="info center" id="wardInfo">
							<h3 class="serialTitle">Ward</h3>
							<h4 class="description">No good deed goes unpunished</h4>
							Last update: <div id="wardUpdate"></div>
						</div>
					</div>
					<div class="col-md-4 box">
						<div class="info center" id="practicalInfo">
							<h3 class="serialTitle">A Practical Guide To Evil</h3>
							<h4 class="description">Justifications only matter to the just</h4>
							Last update: <div id="practicalUpdate"></div>
						</div>
					</div>
					<div class="col-md-4 box">
						<div class="info center" id="pactInfo">
							<h3 class="serialTitle">Pact</h3>
							<h4 class="description">Devils and Details</h4>
							Last update: <div id="pactUpdate"></div>
						</div>
					</div>
				</div>

				<div class="col-md-4 col-md-offset-4">
					<div class="info center about">
						<h3 class="serialTitle">About</h3>
						<h4>A small test website, I made this to have the most recent updates of all the web serials I read in one place.</h2>
					</div>
				</div>		
			</div>
			
			<div class="info" id="recent">
				
			</div>
			

		</div>
		
    </body>

</html>