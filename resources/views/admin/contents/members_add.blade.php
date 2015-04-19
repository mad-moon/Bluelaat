				@extends('admin.master')
				@section('title','إضافة عضو')
				@section('content')
				<div class="blockleft">
					<div class="blocklcontent">
						<span class="blockltitle">إضافة مستخدم</span>
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
									{{Form::text('username',null,array('class'=>'form-control input-text'))}}
								</div>
								<div class='formgroup'>										
									<label>البريد الإلكتروني:</label>
									{{Form::text('email',null,array('class'=>'form-control input-text'))}}
								</div>
								<div class='formgroup'>										
									<label>الرقم السري:</label>
									{{Form::text('password',null,array('class'=>'form-control input-text'))}}
								</div>
								<div class='formgroup'>
									<label>مفعل؟</label>
									{{Form::checkbox('active','active',false)}}
								</div>
								<div class="clearfix"></div>
								<div class='formgroup'>
									<label>مدير؟</label>
									{{Form::checkbox('admin','admin',false)}}
								</div>
								<div class="clearfix"></div>
								<center>{{Form::submit('إرسال',array('class'=>'btn btn-primary'))}}</center>
							{{Form::close()}}
						</div>
					</div>
				</div><!-- @end.blockleft -->
				@stop
