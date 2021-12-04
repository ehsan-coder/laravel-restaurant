<!DOCTYPE html>
<html lang="en"><!-- Basic -->
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">   
   
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
 
     <!-- Site Metas -->
    <title>RESTOBUONO</title>  
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">   
	<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css">
	<!-- Site CSS -->
    <link rel="stylesheet" href="{{asset('css/style.css')}}"> 
	{{-- <link rel="stylesheet" href="{{asset('css/all.min.css')}}">    --}}
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="{{asset('css/responsive.css')}}">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{asset('css/custom.css')}}">
    <!-- Google fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Merienda&display=swap">
	<!-- Site Icons -->
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="{{asset('images/apple-touch-icon.png')}}">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css"
	 integrity="sha384-jLKHWM3JRmfMU0A5x5AkjWkw/EYfGUAGagvnfryNV3F9VqM98XiIH7VBGVoxVSc7" crossorigin="anonymous">


	 <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
     <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	 <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/gh/openlayers/openlayers.github.io@master/en/v6.5.0/build/ol.js"></script>

</head>

<body>
	<!-- Start header -->
	<header class="top-navbar">
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<div class="container">
				<a class="navbar-brand" href="index.html">
					<img src="{{asset('images/logo.jpg')}}" width="185" height="63" alt="" />
				</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbars-rs-food" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
				  <span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbars-rs-food">
					<ul class="navbar-nav ml-auto">
						<li class="nav-item active"><a class="nav-link" href="{{route('customer.dash',app()->getLocale())}}">Home</a></li>
						<li class="nav-item"><a class="nav-link" href="{{route('c_gmenu',app()->getLocale())}}">Menu</a></li>
						<li class="nav-item"><a class="nav-link" href="about.html">About</a></li>
						<li class="nav-item"><a class="nav-link" href="about.html">Contact us</a></li>
						<li class="nav-item"><a class="nav-link" href="#purchase"><i class="fas fa-shopping-cart"></i></a></li>
						{{-- <li class="nav-item"><a class="nav-link LGin" href="contact.html">Log in</a></li> --}}


						<li class="nav-item">
							<a class="nav-link"
							@if (app()->getLocale() == 'en') style="text-decoration: underline" @endif
							href="{{ route(Route::currentRouteName(), 'en') }}">EN</a>
						   </li>   
					  
						   <li class="nav-item">
							<a class="nav-link"
							@if (app()->getLocale() == 'ar') style="text-decoration: underline" @endif
							href="{{ route(Route::currentRouteName(), 'ar') }}">AR</a>
						   </li>



						 <!-- Authentication Links -->
						 @guest
						 @if (Route::has('login'))
							 <li class="nav-item">
								 <a class="nav-link" href="{{ route('login',app()->getLocale()) }}">{{ __('Login') }}</a>
							 </li>
						 @endif

						 @if (Route::has('register'))
							 <li class="nav-item">
								 <a class="nav-link" href="{{ route('register', app()->getLocale()) }}">{{ __('Register') }}</a>
							 </li>
						 @endif
					 @else
						 <li class="nav-item">
							 <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
								 {{ Auth::user()->name }}
							 </a>
							 {{-- <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
								{{ Auth::user()->id }}
							</a> --}}
							{{-- <input>{{ Auth::user()->id }}<> 	 --}}
							{{-- <input id="u_id" type="hidden" value="{{ Auth::user()->id }}"> --}}
						{{-- <div id="u_id">{{ Auth::user()->id }}</div> --}}

							 {{-- <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
								 <a class="dropdown-item" href="{{ route('logout',  app()->getLocale()) }}"
									onclick="event.preventDefault();
												  document.getElementById('logout-form').submit();">
									 {{ __('Logout') }}
								 </a>

								 <form id="logout-form" action="{{ route('logout',  app()->getLocale()) }}" method="POST" class="d-none">
									 @csrf
								 </form>
							 </div> --}}
						 </li>

						 <li class="nav-item">
							<a class="dropdown-item" href="{{ route('logout',  app()->getLocale()) }}"
								onclick="event.preventDefault();
											  document.getElementById('logout-form').submit();">
								 {{ __('Logout') }}
							 </a>

							 <form id="logout-form" action="{{ route('logout',  app()->getLocale()) }}" method="POST" class="d-none">
								 @csrf
							 </form>
						</li>
					 @endguest

					</ul>
				</div>
			</div>
		</nav>
	</header>
	<!-- End header -->
	
	<!-- Start Content -->
	
		
		@yield('content')
	
	<!-- End Content -->
	
	<!-- Start Footer -->
	<footer class="footer-area bg-f">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-6">
					<h3>About Us</h3>
					<p>Integer cursus scelerisque ipsum id efficitur. Donec a dui fringilla, gravida lorem ac, semper magna. Aenean rhoncus ac lectus a interdum. Vivamus semper posuere dui, at ornare turpis ultrices sit amet. Nulla cursus lorem ut nisi porta, ac eleifend arcu ultrices.</p>
				</div>
				<div class="col-lg-3 col-md-6">
					<h3>Opening hours</h3>
					<p><span class="text-color">Monday: </span>Closed</p>
					<p><span class="text-color">Tue-Wed :</span> 9:Am - 10PM</p>
					<p><span class="text-color">Thu-Fri :</span> 9:Am - 10PM</p>
					<p><span class="text-color">Sat-Sun :</span> 5:PM - 10PM</p>
				</div>
				<div class="col-lg-3 col-md-6">
					<h3>Contact</h3>
					<p class="lead">Barzah, Damascus, Syria</p>
					<p class="lead"><a href="#">+01 100 200 300</a></p>
					<p><a href="#"> info@admin.com</a></p>
				</div>
				<div class="col-lg-3 col-md-6">
					<h3>Subscribe</h3>
					<div class="subscribe_form">
						<form class="subscribe_form">
							<input name="EMAIL" id="subs-email" class="form_input" placeholder="Email Address..." type="email">
							<button type="submit" class="submit">SUBSCRIBE</button>
							<div class="clearfix"></div>
						</form>
					</div>
					<ul class="list-inline f-social">
					<li><img src="{{asset('images/SM-icons/facebook-icon.png')}}" alt="Facebook icon" title="Facebbok"></li>
                    <li><img src="{{asset('images/SM-icons/instagram-icon.png')}}" alt="Instagram icon" title="Instagram"></li>
					<li><img src="{{asset('images/SM-icons/youtube-icon.png')}}" alt="Youtube icon" title="Youtube"></li>
                    <li><img src="{{asset('images/SM-icons/twitter-icon.png')}}" alt="Twitter icon" title="Twitter"></li>
                    <li><img src="{{asset('images/SM-icons/gmail-icon.png')}}" alt="Gmail icon" title="Gmail"></li>
					</ul>
				</div>
			</div>
		</div>
		
		<div class="copyright">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<p class="company-name">All Rights Reserved. &copy; 2021 <a href="#">RESTOBUONO</a> Design By : 
					<a href="https://html.design/">ITE collage.Damascus university</a></p>
					</div>
				</div>
			</div>
		</div>
		
	</footer>
	<!-- End Footer -->
	
	<a href="#" id="back-to-top" title="Back to top" style="display: none;">&uarr;</a>

	<!-- ALL JS FILES -->
	<script src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
	<script src="{{asset('js/popper.min.js')}}"></script>
	<script src="{{asset('js/bootstrap.min.js')}}"></script>
    <!-- ALL PLUGINS -->
	<script src="{{asset('js/projectJS.js')}}"></script>
	<script src="{{asset('js/ProjectLoginJS.js')}}"></script>
	<script src="{{asset('js/jquery.superslides.min.js')}}"></script>
	<script src="{{asset('js/images-loded.min.js')}}"></script>
	<script src="{{asset('js/isotope.min.js')}}"></script>
	<script src="{{asset('js/baguetteBox.min.js')}}"></script>
	<script src="{{asset('js/form-validator.min.js')}}"></script>
    <script src="{{asset('js/contact-form-script.js')}}"></script>
	
    <script src="{{asset('js/custom.js')}}"></script>
	<script src="{{asset('js/purchase.js')}}" async></script>
	
</body>
</html>