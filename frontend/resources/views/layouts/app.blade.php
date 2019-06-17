<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- font awesome -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  	   <link href="{{ asset('css/style.css') }}" rel="stylesheet">
  	    <script src="{{ asset('js/style.js') }}" defer></script>


	<title>@yield('title', 'MELN')</title>
</head>
<body>
	<div id="app" class="container-fluid">

               <h1 class="logo text-center py-4"> CUPCAKE CINEMA</h1>

  <nav class="navbar nav navbar-expand-lg sticky-top mx-auto" id="navBar">         
	</nav>

	<hr class="hr">
	
	@yield('content')
	</div>	
	{{-- run external js once content has loaded --}}
	<script src="{{ asset('js/scripts.js') }}"></script>

</body>
</html>