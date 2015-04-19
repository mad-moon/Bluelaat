	@extends('host.master')
	@section('title',"$title | مشاهدة تذكرة")
	@section('content')

	<div id="slider_wrapper2">
		<div class="wrap">
				
			<h1>مشاهدة تذكرة</h1>

		</div>
	</div>

	<div class="clear"></div>

	<div class="content">
		@if(($errors->has()))
		<div style='width:600px;margin:0 auto;margin-bottom:35px;background-color:#ededed;padding:50px;text-align:center;border-radius:10px'>
			@foreach($errors->all() as $error)
			<span style='font-size:15px;color:#6ab2dc;'>
				{{{$error}}} <br>
			</span>
			@endforeach
		</div>
		@endif
		<div class="wrap">
			<div class="content-g" style='margin-bottom: 20px;'>
				<h3>{{{$ticket['subject']}}}</h3>
				<hr style='border-style:dashed'>
				<p style='text-align:justify'>{{{$ticket['desc']}}}</p>
			</div>
			<br>
			@foreach($comments as $comment)
			<div class="content-g" style='margin-bottom:20px;'>
				<ul>
					<li style='float:right;margin-right:5px;font-size:16px'>إسم المستخدم: <span style='color:#6ab2dc'>{{{$comment['username']}}}</span></li>
					<li style='float:right;margin-right:250px;width:259px;font-size:16px'>تاريخ الرد: <span style='color:#6ab2dc'>{{{$comment['created_at']}}}</span></li>
				</ul>
				<div class="clear"></div>
				<hr style='border-style:dashed'>
				<p style='text-align:justify'>{{{$comment['comment']}}}</p>
			</div>
			@endforeach
			<br>
			<div class="content-g">
				{{Form::open(array('id'=>'form'))}}
					<table>
						<tbody><tr>
						<tr>
							<td>
								<h4 style='text-align:right;margin-bottom:5px;'>وضع رد على التذكرة</h4>
								{{Form::textarea('content',null,array('class'=>'input','placeholder'=>'رد على التذكرة'))}}
							</td>
						</tr>
						<tr>
							<td>
								<center>{{Form::submit('إضافة',array('class'=>'button'))}}</center>
							</td>
						</tr>
					</tbody></table>
{{Form::close()}}

			</div>
			<div class="clear"></div>
		</div>
	</div>


	@stop