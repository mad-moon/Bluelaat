	@extends('host.master')
	@section('title',"$title | إتصل بنا")
	@section('content')

	<div id="slider_wrapper2">
		<div class="wrap">
				
			<h1>إتصل بنا</h1>

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
								<h4 style='text-align:right;margin-bottom:5px;'>الموضوع:</h4>
								{{Form::text('subject',null,array('class'=>'input','placeholder'=>'الموضوع'))}}
							</td>
						</tr><tr>
							<td>
								<h4 style='text-align:right;margin-bottom:5px;'>البريد الإلكتروني:</h4>
								{{Form::text('email',null,array('class'=>'input','placeholder'=>'البريد الإلكتروني'))}}
							</td>
						</tr><tr>
							<td>
								<h4 style='text-align:right;margin-bottom:5px;'>سبب الرسالة:</h4>
								{{Form::select('reasons',array('إستفسار'=>'إستفسار','مشكلة'=>'مشكلة','أخرى'=>'أخرى'),null,array('class'=>'selectsection input'))}}
							</td>
						</tr>
						<tr>
							<td>
								<h4 style='text-align:right;margin-bottom:5px;'> الرسالة:</h4>
								{{Form::textarea('content',null,array('class'=>'input','placeholder'=>'الرسالة'))}}
							</td>
						</tr>
						<tr>
							<td style='padding:11px 0;'>
								<h4 style='text-align:right;margin-bottom:5px;'> التحقق البشري:</h4>
								<div class="captcha">{{Recaptcha::render()}}</div>
							</td>
						</tr>
						<tr>
							<td>
								<center>{{Form::submit('إرسال',array('class'=>'button'))}}</center>
							</td>
						</tr>
					</tbody></table>
{{Form::close()}}

			</div>
			<div class="clear"></div>
		</div>
	</div>


	@stop