	@extends('host.master')
	@section('title',"$title | رسالة")
	@section('content')
	<div id="slider_wrapper2">
		<div class="wrap">

			<h1>سيتم إعادة توجيهك بعد 5 ثواني</h1>

		</div>
	</div>

	<div class="clear"></div>

	<div class="content">
		<div class="wrap">
			<div style='text-align:center;background-color:#EAE8E8;padding:30px;border-radius:5px;'><h1>{{$message}}</h1></div>
		</div>
	</div>
	<script type="text/javascript">
		setTimeout(function(){ window.location = '{{$url}}' }, 5000);
	</script>
	@stop