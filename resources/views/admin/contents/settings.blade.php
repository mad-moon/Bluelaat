				@extends('admin.master')
				@section('title','الإعدادات الرئيسية')
				@section('content')
				<div class="blockleft">
					<div class="blocklcontent">
						<span class="blockltitle">الإعدادات الرئيسية</span>
						<div class="blocklconter">
							{{Session::get('i_sccess')}}
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
									<label>إسم الموقع:</label>
									{{Form::text('site_name',e($settings->site_name),array('class'=>'form-control input-text'))}}
								</div>
								<div class='formgroup'>										
									<label>إيميل الموقع:</label>
									{{Form::text('site_email',e($settings->site_email),array('class'=>'form-control input-text'))}}
								</div>
								<div class='formgroup'>										
									<label>وصف الموقع:</label>
									{{Form::text('site_desc',e($settings->site_desc),array('class'=>'form-control input-text'))}}
								</div>
								<div class='formgroup'>
									<label>الكلمات المفتاحية للموقع:</label>
									{{Form::text('site_tags',e($settings->site_tags),array('class'=>'form-control input-text'))}}
								</div>
								<div class='formgroup'>
									<label>إغلاق الموقع:</label>
									{{Form::checkbox('site_close','val',(!$settings->site_close?false:true))}}
								</div>
								<div class="clearfix"></div>
								<div class='formgroup'>
									<label>رسالة الإغلاق:</label>
									{{Form::textarea('site_message',e($settings->site_message),array('class'=>'form-control input-text',(!$settings->site_close)?'disabled':''))}}
								</div>

								<center>{{Form::submit('إدخال',array('class'=>'btn btn-primary'))}}</center>
							{{Form::close()}}
						</div>
					</div>
				</div><!-- @end.blockleft -->
				@stop
