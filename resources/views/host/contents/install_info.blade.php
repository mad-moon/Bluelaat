	@extends('host.install')
	@section('title',"اضافة معلومات الموقع")
	@section('content')

	<div id="slider_wrapper2">
		<div class="wrap">
			<h1>إضافة معلومات الموقع</h1>
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
			<div class="content-g">
				{{Form::open(array('id'=>'form'))}}
					<table>
						<tbody><tr>
							<td>
								<h4 style='text-align:right;margin-bottom:5px;'>إسم الموقع:</h4>
								{{Form::text('subject',null,array('class'=>'input','placeholder'=>'إسم الموقع'))}}
							</td>
						</tr><tr>
							<td>
								<h4 style='text-align:right;margin-bottom:5px;'>البريد الإلكتروني للموقع:</h4>
								{{Form::text('email',null,array('class'=>'input','placeholder'=>'البريد الإلكتروني للموقع'))}}
							</td>
						</tr>
						<tr>
							<td>
								<h4 style='text-align:right;margin-bottom:5px;'>وصف الموقع:</h4>
								{{Form::text('desc',null,array('class'=>'input','placeholder'=>'وصف الموقع'))}}
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