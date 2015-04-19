<!DOCTYPE html>
<html lang="en">

<head>
        
    <title>@yield('title')</title>

	<meta name="author" content="Turki Hazaa" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta name="description" content="{{{$desc}}}">
	<meta name="keywords" content="{{{$keywords}}}">
	<meta charset="utf-8" />
	
	<!-- css files -->
    <link href="{{asset('views/host/css/blue.css')}}" rel="stylesheet" title="blue" />
    <link href="{{asset('views/host/css/font-awesome.css')}}" rel="stylesheet" />
    <link href="{{asset('views/host/css/responsive.css')}}" rel="stylesheet" />
    <link href="{{asset('views/host/css/options.css')}}" rel="stylesheet" />
	
	<!-- javascript files -->
	<script src="{{asset('views/host/js/jquery.js')}}"></script>
  	<script src="{{asset('views/host/js/jquery-ui.js')}}"></script>
	<script src="{{asset('views/host/js/jquery.easytabs.js')}}"></script>
	<script src="{{asset('views/host/js/jquery.cycle.all.js')}}"></script>
	<script src="{{asset('views/host/js/superfish.js')}}"></script>
	<script src="{{asset('views/host/js/jquery.bxSlider.min.js')}}"></script>
	<script src="{{asset('views/host/js/main.js')}}"></script>
	<script src="{{asset('views/host/js/responsive-nav.js')}}"></script>
	<script src="{{asset('views/host/js/options.js')}}"></script>
	<script src="{{asset('views/host/js/jquery.carouFredSel-6.2.1-packed.js')}}"></script>

	<script type="text/javascript">
		$(function() {
			$('#carousel').carouFredSel({
				auto: true,
				prev: '#prev2',
				next: '#next2',
				scroll: 1,
				items: {
					visible: {
						min: 1,
						max: 4
					}
				}
			});
		});
	</script>

	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,400italic,700,700italic' rel='stylesheet' type='text/css' />
	<link href='http://fonts.googleapis.com/css?family=Ubuntu:400,500,700,400italic,500italic,700italic' rel='stylesheet' type='text/css' />
	
</head>

<body>

	<!-- START options -->

	<div class="top_area">
		<div class="wrap">
			<ul class="social">
				<li><a href="#"><i class="icon-twitter-sign"></i></a></li>
				<li><a href="#"><i class="icon-facebook-sign"></i></a></li>
				<li><a href="#"><i class="icon-google-plus-sign"></i></a></li>
				<li><a href="#"><i class="icon-pinterest-sign"></i></a></li>
				<li><a href="#"><i class="icon-tumblr-sign"></i></a></li>
				<li><a href="#"><i class="icon-flickr"></i></a></li>
				<li><a href="#"><i class="icon-linkedin-sign"></i></a></li>
				<li><a href="#"><i class="icon-pinterest-sign"></i></a></li>
			</ul>
			@if(Auth::check())
			<a href='{{url("logout")}}' style='margin-right:84px;' class='button small'>تسجيل الخروج</a>
			@else
			<a href='{{url("login")}}' style='margin-right:84px;' class='button small'>تسجيل الدخول</a>
			@endif
			<ul id="top_area_links">				
				<li></li>
				<li><i class="icon-phone"></i> 1.888-888-8888</li>
				<li><i class="icon-envelope"></i> <a href="#">support@website.com</a></li>
				<li><i class="icon-skype"></i> <a href="#">trook112</a></li>
			</ul>
		</div>
		<div class="clear"></div>
	</div>

	<header id="top">
		<div class="wrap">
		
			<div id="logo">
				<p><a style='display:block;width:80px' href="{{{url()}}}">{{{$title}}}</a></p>
			</div>
			
			<a href="#nav" id="toggle"><i class="icon-reorder"></i></a>

			<nav class="nav-collapse" id="nav">
				<ul class="sf-menu">
					<li><a class="selected" href="{{url()}}">الرئيسية<span>الرئيسية</span></a>
					</li>
					@if(Auth::check())
					<li><a href="{{url('members')}}">لوحة التحكم<span>التحكم</span></a>
						<ul>
							<li><a href="{{url('members/info')}}">تعديل المعلومات</a></li>
							<li><a href="{{url('members/tickets')}}">التذاكر</a></li>
							<li><a href="{{url('members/bills')}}">الفواتير</a></li>
						</ul>
					</li>
					@else
					<li><a href="{{url('register')}}">التسجيل<span>تسجيل عضوية جديدة</span></a></li>
					@endif
					<li><a href="{{url('services')}}">الخدمات<span>عروض الاستضافة لدينا</span></a></li>
					<li><a href="{{url('pages/hosting')}}">عروض الإستضافة<span>عروض الاستضافة لدينا</span></a></li>
					<li><a href="{{url('pages/aboutus')}}">من نحن<span>فريقنا</span></a></li>
					<li><a href="{{url('pages/contactus')}}">إتصل بنا<span>تواصل</span></a></li>
				</ul><div class="clear"></div>
			</nav>
			
			<div class="clear"></div>

		</div>
	</header>
		@yield('content')
		<footer>
		<div class="wrap">

			<div class="footer_nav">
				<div class="one_third">
					<h3>حول <span>{{{$title}}}</span></h3>

					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus dignissim sodales nisl sed facilisis. Suspendisse tempor, nisl eu sollicitudin feugiat, eros sem porta magna quis vestibulum lorem urna.</p>
				</div>

				<div class="one_third">
					<h3><span>خدماتنا</span></h3>

					<ul>
						<li><i class="icon-chevron-left"></i><a href="{{url()}}">إستضافة</a></li>
						<li><i class="icon-chevron-left"></i><a href="{{url()}}">إستضافة</a></li>
						<li><i class="icon-chevron-left"></i><a href="{{url()}}">إستضافة</a></li>
						<li><i class="icon-chevron-left"></i><a href="{{url()}}">إستضافة</a></li>
					</ul>
				</div>

				<div class="one_third last">
					<h3><span>إتصل بنا</span></h3>

					<ul id="footer_address">
						<li><i class="icon-pushpin"></i><span>العنوان :</span> السعودية الرياض</li>
						<li><i class="icon-envelope"></i><span>الإيميل :</span> support@website.com</li>
						<li><i class="icon-headphones"></i><span>رقم الهاتف :</span> 1.888-888-8888</li>
					</ul>
				</div>
				<div class="clear"></div>
			</div>

			<div class="clear"></div>

		</div>

		<div class="copyright_panel">
			<div class="wrap">
				<p class="alignleft">جميع الحقوق محفوظة   @if(isset($title))<a href="{{url()}}">{{{$title}}}</a> @endif&copy;</p>
				<p class="alignright"><a target='_blank' href="http://twitter.com/turki_alhazaa">تم تطوير الموقع من قبل تركي الهزاع</a></p>
				<div class="clear"></div>
			</div>
		</div>

	</footer>

	<script type="text/javascript">
		$('.count').each(function () {
		    $(this).prop('Counter',0).animate({
		        Counter: $(this).text()
		    }, {
		        duration: 4000,
		        easing: 'swing',
		        step: function (now) {
		            $(this).text(Math.ceil(now));
		        }
		    });
		});
	</script>

	<script type="text/javascript">
		var nav = responsiveNav("#nav", {customToggle: "#toggle"});
	</script>

</body>

</html>