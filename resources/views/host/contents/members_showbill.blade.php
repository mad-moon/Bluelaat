	@extends('host.master')
	@section('title',"$title | مشاهدة فاتورة")
	@section('content')

	<div id="slider_wrapper2">
		<div class="wrap">
				
			<h1>الفواتير</h1>

		</div>
	</div>

	<div class="clear"></div>

	<div class="content">
		<div class="wrap">					
			<div class="content-g">
				<ul style='font-size:16px;'>
					<li>الخدمة: <span style='color:#6ab2dc'>{{{$bill['service']}}}</span></li>
					<li>وصف الخدمة: <span style='color:#6ab2dc'>{{{$service['desc']}}}</span></li>
					<li>مدة الخدمة: <span style='color:#6ab2dc'>{{{$service['period']}}} يوم</span></li>
					<li>مدة عمل الخدمة: <span style='color:#6ab2dc'>{{{$service['create_period']}}} دقيقة</span></li>
					<li>السعر: <span style='color:#6ab2dc'>{{{$service['price']}}} ريال</span></li>
					<li>المتبقي من الخدمة: <span style='color:#6ab2dc'>@if(!$bill['statue']){{''}}@else{{daysleft($bill['ends_at']).' يوم'}}@endif</span></li>
					<li>حالة الفاتورة: <span style='color:#6ab2dc'>@if(!$bill['statue']){{'<span style="color:#DB4D4D">غير مدفوعة</span>'}}@else{{'مدفوعة'}}@endif</span></li>
				</ul>
			</div>
			<div class="clear"></div>
		</div>
	</div>


	@stop