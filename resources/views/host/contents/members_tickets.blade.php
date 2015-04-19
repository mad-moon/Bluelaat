	@extends('host.master')
	@section('title',"$title | التذاكر")
	@section('content')

	<div id="slider_wrapper2">
		<div class="wrap">
				
			<h1>التذاكر</h1>

		</div>
	</div>

	<div class="clear"></div>

	<div class="content">
		<div class="wrap">					
			<a href="{{{url('members/tickets/addticket')}}}" class='addticket small'>إضافة تذكرة</a>
			<div class="clear"></div>
			<div class="content-g">
					<table class='tickettable'>
						<tbody>
							<tr>
								<td>الموضوع: </td>
								<td>القسم: </td>
								<td>آخر رد: </td>
								<td>الحالة: </td>
							</tr>
							@foreach($tickets as $ticket)
							<tr>
								<td><a href='{{{url("members/tickets/{$ticket['id']}")}}}'>{{{$ticket['subject']}}}</a></td>
								<td>{{{$ticket['section']}}}</td>
								<td>@if($ticket['last_comment'] == 'customer') {{'أنت'}} @else {{'الموفظ'}}  @endif</td>
								<td>{{{$ticket['statue']}}}</td>
							</tr>
							@endforeach	
					</tbody></table>
					<center>{{$tickets->render()}}</center>
					<div class="clear"></div>
			</div>
			<div class="clear"></div>
		</div>
	</div>


	@stop