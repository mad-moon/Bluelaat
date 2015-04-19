				@extends('admin.master')
				@section('title','تعديل عضو')
				@section('content')
				<div class="blockleft">
					<div class="blocklcontent">
						<span class="blockltitle">تعديل مستخدم</span>
						<div class="blocklconter">
							{{Session::get('success')}}
							@if($errors->has())
							<div class="alert alert-danger">							
								<strong>خطأ!</strong>
								<br>								
								@foreach($errors->all() as $error)
								{{{$error}}}{{Session::forget('errors')}}<br>							
								@endforeach
							</div>
							@endif
							{{Form::open(array('class' =>'form'))}}
								<div class='formgroup'>
									<label>إسم المستخدم:</label>
									{{Form::text('username',e($user->username),array('class'=>'form-control input-text'))}}
								</div>
								<div class='formgroup'>										
									<label>البريد الإلكتروني:</label>
									{{Form::text('email',e($user->email),array('class'=>'form-control input-text'))}}
								</div>
								<div class='formgroup'>										
									<label>الرقم السري:</label>
									{{Form::text('password',null,array('class'=>'form-control input-text'))}} <center><small class='text-danger'>اتركه فارغًا لعدم التعديل</small></center>
								</div>
								<div class='formgroup'>
									<label>مفعل؟</label>
									{{Form::checkbox('active','active',(!$user->active?false:true))}}
								</div>
								<div class="clearfix"></div>
								<div class='formgroup'>
									<label>مدير؟</label>
									{{Form::checkbox('admin','admin',(!$user->admin?false:true))}}
								</div>
								<div class="clearfix"></div>
								<center>{{Form::submit('إرسال',array('class'=>'btn btn-primary'))}}</center>
							{{Form::close()}}
						</div>
					</div>
				</div><!-- @end.blockleft -->
				@stop
