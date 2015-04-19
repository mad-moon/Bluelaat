	@extends('host.master')
	@section('title',"$title | مغلق")
	@section('content')
	<div id="slider_wrapper2">
		<div class="wrap">

			<h1>رسالة</h1>

		</div>
	</div>

	<div class="clear"></div>

	<div class="content">
		<div class="wrap">
			<div style='text-align:center;background-color:#EAE8E8;padding:30px;border-radius:5px;'><h1>{{$message}}</h1></div>
		</div>
	</div>
	@stop