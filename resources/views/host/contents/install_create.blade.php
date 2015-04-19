	@extends('host.install')
	@section('title',"إضافة الجداول")
	@section('content')
	<div id="slider_wrapper2">
		<div class="wrap">
			<h1>إضافة الجداول</h1>
		</div>
	</div>

	<div style='padding:30px 0;text-align:center;'>
		<h1>مرحبًا بك في إعداد تنصيب سكربت بلولات</h1>
		<h3 style='margin-bottom:0;'>اضافة جداول لقاعدة البيانات </h3>
	</div>
	@if(count($errors))
		<div style='width:600px;margin:0 auto;margin-bottom:35px;background-color:#ededed;padding:50px;text-align:center;border-radius:10px'>
			@foreach($errors as $error)
			<span style='font-size:15px;color:#6ab2dc;'>
				{{{$error}}} <br>
			</span>
			@endforeach		
			<p>الرجاء حل المشاكل ثم تحديث الصفحة</p>
		</div>			

	@else		
		<div class="form">
			<div style='width:600px;margin:0 auto;margin-bottom:35px;background-color:#ededed;padding:50px;text-align:center;border-radius:10px'>
				<h1>تم اضافة الجداول بنجاح</h1>
			</div>
			<center>
				<h3 style='margin-bottom:0;'>للإنتقال للخطوة اللاحقة الرجاء </h3>
				<div style='margin:30px 0;'>			
					<a href="{{url('install/info')}}" class='button' >الظغط هنا</a>
				</div>
			</center>
			<div class="clear"></div>
		</div>
	@endif
	@stop