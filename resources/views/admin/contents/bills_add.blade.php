				@extends('admin.master')
				@section('title','إضافة فاتورة')
				@section('content')
				<div class="blockleft">
					<div class="blocklcontent">
						<span class="blockltitle">إضافة فاتورة</span>
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
									<label>الخدمة:</label>
									{{Form::select('service',$servNames)}} 
								</div>
								<div class="clearfix"></div>
								<div class='formgroup'>										
									<label>حالة الفاتورة:</label>
									 {{Form::radio('statue','payed')}} مدفوعة &nbsp;
									 {{Form::radio('statue','unpayed')}} غير مدفوعة <br>
								</div>
								<div class="clearfix"></div><br>
								<center>{{Form::submit('إرسال',array('class'=>'btn btn-primary'))}}</center>
							{{Form::close()}}
						</div>
					</div>
				</div><!-- @end.blockleft -->
				@stop
