	@extends('host.master')
	@section('title',"$title | الفواتير")
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
					<table class='tickettable'>
						<tbody>
							<tr>
								<td>الخدمة: </td>
								<td>المتبقي من الإنتهاء: </td>
								<td>الحالة: </td>
							</tr>
							@foreach($bills as $bill)
							<tr>
								<td><a href='{{{url("members/bills/{$bill['id']}")}}}'>{{{$bill['service']}}}</a></td>
								<td>@if(!$bill['statue']){{''}}@else{{daysleft($bill->ends_at).' يوم'}}@endif </td>
								<td>@if(!$bill['statue']){{'<span style="color:#DB4D4D">غير مدفوعة</span>'}}@else{{'مدفوعة'}}@endif</td>
							</tr>
							@endforeach	
					</tbody></table>
					<center>{{$bills->render()}}</center>
					<div class="clear"></div>
			</div>
			<div class="clear"></div>
		</div>
	</div>


	@stop