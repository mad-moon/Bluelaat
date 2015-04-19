<!DOCTYPE html>
<html lang="en">

<head>
        
    <title>@yield('title')</title>

	<meta name="author" content="Turki Hazaa" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta charset="utf-8" />
	
	<!-- css files -->
    <link href="{{asset('views/host/css/blue.css')}}" rel="stylesheet" title="blue" />
    <link href="{{asset('views/host/css/font-awesome.css')}}" rel="stylesheet" />
    <link href="{{asset('views/host/css/responsive.css')}}" rel="stylesheet" />
    <link href="{{asset('views/host/css/options.css')}}" rel="stylesheet" />
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,400italic,700,700italic' rel='stylesheet' type='text/css' />
	<link href='http://fonts.googleapis.com/css?family=Ubuntu:400,500,700,400italic,500italic,700italic' rel='stylesheet' type='text/css' />
	
</head>

<body>

	<!-- START options -->

	<header id="top">
		<div class="wrap" style='padding-bottom: 36px;'>
		
			<div id="logo">
				<p><a href="{{{url()}}}">بلولات</a></p>
			</div>
			<div class="clear"></div>

			<nav class="nav-collapse" id="nav">
				<div class="clear"></div>
			</nav>
			
			<div class="clear"></div>

		</div>
	</header>
		@yield('content')
		<footer style='padding:0;padding-bottom:20px;'>
			<div class="clear"></div>

		</div>

		<div class="copyright_panel">
			<div class="wrap">
				<p class="alignleft">جميع الحقوق محفوظة &copy;</p>
				<p class="alignright"><a target='_blank' href="http://twitter.com/turki_alhazaa">تم تطوير الموقع من قبل تركي الهزاع</a></p>
				<div class="clear"></div>
			</div>
		</div>

	</footer>


	<script type="text/javascript">
		var nav = responsiveNav("#nav", {customToggle: "#toggle"});
	</script>

</body>

</html>