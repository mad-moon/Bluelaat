
	@extends('host.master')
	@section('title',"$title | مشاهدة خدمة")
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
						<a href="{{{url("services/{$section['name']}")}}}">
							{{{$section["name"]}}}</a>
						<div><small>{{{$section["desc"]}}}</small></div></li>
					@endforeach
				</ul>
			</div>

			<div class="content-left">
					<table class='servicestable'>
						<tbody>
						<tr>
							<h1>{{{$services[0]['section']}}}:</h1>
						@foreach($services as $service)
						<td style='padding:0'>
							<a href='{{{url("services/order/{$service['name']}")}}}' style='display:block;word-wrap:break-word;padding:10px 5px 0px 5px;width:615px;background:#ededed;color:#6ab2dc;border-radius:5px;margin-bottom:25px;'><h4 style='margin:4px'>{{{$service['name']}}}: </h4> {{{$service['desc']}}} 
								<div style='margin-top:20px;padding-bottom:5px;'>
									<div style='margin-right:10px;'>
										<i style='padding-left:5px;margin-right:5px;' class="icon-money"></i>{{{$service['price']}}} ريال سعودي
										<i style='padding-left:5px;margin-right:5px;' class="icon-time"></i>{{{$service['period']}}} يوم
										<i style='padding-left:5px;margin-right:5px;' class="icon-gear"></i>{{{$service['create_period']}}} دقيقة
									</div>
								</div>
							</a>
						</td>
						@endforeach
						<td style='margin-right:16px;padding:0'>
							<i style='padding-left:5px;margin-right:5px;' class="icon-money"></i>= المبلغ
							<i style='padding-left:5px;margin-right:5px;' class="icon-time"></i>= مدة الخدمة
							<i style='padding-left:5px;margin-right:5px;' class="icon-gear"></i>= مدة عمل الخدمة
						</td>

					</tbody></table>			
			</div>
			<div class="clear"></div>

		</div>
	</div>
	@stop