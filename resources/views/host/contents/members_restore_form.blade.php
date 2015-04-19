	@extends('host.master')
	@section('title',"$title | إستعادة كلمة المرور")
	@section('content')

	<div id="slider_wrapper2">
		<div class="wrap">
				
			<h1>منطقة تسجيل عضوية جديدة</h1>

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
				{{Form::open(array('url'=>Request::url()."?username={$_GET['username']}",'id'=>'form'))}}
					<table>
						<tbody><tr>
						<tr>
							<td>
								<h4 style='text-align:right;margin-bottom:5px;'> كلمة المرور:</h4>
								{{Form::password('password',array('class'=>'input','placeholder'=>'كلمة المرور'))}}
							</td>
						</tr>
						<tr>
							<td>
								<h4 style='text-align:right;margin-bottom:5px;'> إعادة كلمة المرور:</h4>
								{{Form::password('password_confirmation',array('class'=>'input','placeholder'=>'إعادة كلمة المرور'))}}
							</td>
						</tr>
						<tr>
							<td>
								<center>{{Form::submit('تغيير كلمة المرور',array('class'=>'button'))}}</center>
							</td>
						</tr>
					</tbody></table>
								
{{Form::close()}}

			</div>
			<div class="clear"></div>
		</div>
	</div>


	@stop