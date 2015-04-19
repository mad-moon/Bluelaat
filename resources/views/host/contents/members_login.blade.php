	@extends('host.master')
	@section('title',"$title | تسجيل الدخول")
	@section('content')

	<div id="slider_wrapper2">
		<div class="wrap">
				
			<h1>منطقة تسجيل الدخول</h1>

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
		@if(Session::get('error_message'))
		<div style='width:600px;margin:0 auto;margin-bottom:35px;background-color:#ededed;padding:50px;text-align:center;border-radius:10px'>
			<span style='font-size:15px;color:#6ab2dc;'>
				اسم المستخدم او كلمة المرور غير صحيحة  <br>
			</span>
		</div>
		@endif
		<div class="wrap">
			<div class="content-g">
				{{Form::open(array('id'=>'form'))}}
					<table>
						<tbody><tr>
							<td>
								{{Form::text('username',null,array('class' =>'input','placeholder'=>'إسم المستخدم'))}}
							</td>
						</tr>
						<tr>
							<td>
								{{Form::password('password',array('class' =>'input','placeholder'=>'كلمة المرور'))}}
							</td>
						</tr>
						<tr>
							<td>
								<p class='primary-text' style='text-align:right;margin-right:10px;'>{{Form::checkbox('remember_me', 'yes', true)}} <label for="remember_me">تذكرني</label> </p> 
								<a href="{{url('restore')}}">إسترجاع كلمة المرور</a>
								<center>{{Form::submit('تسجيل الدخول',array('class'=>'button'))}}</center>
							</td>
						</tr>
					</tbody></table>
				{{Form::close()}}

			</div>
			<div class="clear"></div>
		</div>
	</div>


	@stop