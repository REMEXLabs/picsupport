<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Piktos</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">

		<!-- PRISM syntax highliter Lea Verou (MIT-license)-->
		<link rel="stylesheet" href="{{asset("css/prism.css")}}"/>

		<!-- Personal CSS + Font -->
		<link rel="stylesheet" href="{{asset("css/style.css")}}">

	</head>
    <body>

    <div class="container">


	<!-- Navigation -->
	<div class="leftnavigation">
		<ul>
			<!-- Regestration (on/off) -->
			@if (Auth::check())
			<li><a href="/" type="" class="" data-toggle="tooltip" data-placement="right" title="Home"><span class="glyphicon glyphicon glyphicon-home" aria-hidden="true"></span><span class="nav_text">Home</span></a></li>
			<li><a href="/auth/logout" type="" class="" data-toggle="tooltip" data-placement="right" title="Login"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span><span class="nav_text">Logout</span></a></li>
			@else
			<li><a href="/auth/login" type="" class="" data-toggle="tooltip" data-placement="right" title="Login"><span class="glyphicon glyphicon-log-in" aria-hidden="true"></span><span class="nav_text">Login</span></a></li>
			<li><a href="/auth/register" type="" class="" data-toggle="tooltip" data-placement="right" title="Register"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span><span class="nav_text">Register</span></a></li>
			@endif

			<li><a href="/pikto" type="" class="" data-toggle="tooltip" data-placement="right" title="Piktogramme verwalten"><span class="glyphicon glyphicon glyphicon-cog" aria-hidden="true"></span></span><span class="nav_text">Manage</span></a></li>
			<li><a href="https://gpii.eu/legal/en/imprint.html" type="" class="" data-toggle="tooltip" data-placement="right" title="Imprint/Disclaimer"><span class="glyphicon glyphicon-bullhorn" aria-hidden="true"></span></span><span class="nav_text">Imprint/<wbr>Disclaimer</span></a></li>
            <li><a href="https://gpii.eu/legal/en/privacy.html" type="" class="" data-toggle="tooltip" data-placement="right" title="Privacy Policy"><span class="glyphicon glyphicon glyphicon-info-sign" aria-hidden="true"></span></span><span class="nav_text">Privacy Policy</span></a></li>
		</ul>
	</div>

    <div class="row" style="margin-top:1em;">
        <div class="col-md-12">
            @yield('breadcrumbs')
        </div>
    </div>

    @if (count($errors) > 0)
        <div class="alert alert-danger" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    @if (Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('success') }}
        </div>
    @endif

    </div>



    <div class="container">
    @yield('content')
    </div>


    <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="{{asset('js/jquery.res.min.js')}}"></script>
    <script src="{{asset('js/helper.js')}}"></script>
    @yield('js')
    </body>
</html>
