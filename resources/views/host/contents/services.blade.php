	@extends('host.master')
	@section('title',"$title | الخدمات")
	@section('content')
	<div id="slider_wrapper2">
		<div class="wrap">

			<h1>الخدمات</h1>

		</div>
	</div>

	<div class="clear"></div>

	<div class="content">
		<div class="wrap">

			<div class="sidebar-right">
				<div class="heading"><span style='padding:5px;'>أقسام الخدمات</span></div>

				<ul class='servicesul'>
					@foreach($sections as $section)
					<li><i class="icon-chevron-sign-left"></i>
						<a href="{{{url("services/{$section['name']}")}}}">{{{$section["name"]}}}</a><div><small>{{{$section["desc"]}}}</small></div></li>
					@endforeach
				</ul>
			</div>

			<div class="content-left">
				<center><h1>الرجاء إختيار قسم من القائمة اليمنى</h1></center>
			</div>
			<div class="clear"></div>

		</div>
	</div>
	@stop