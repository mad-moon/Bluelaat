				@extends('admin.master')
				@section('title','تعديل فاتورة')
				@section('content')
				<div class="blockleft">
					<div class="blocklcontent">
						<span class="blockltitle">تعديل فاتورة</span>
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
									{{Form::text('username',e($bills->username),array('class'=>'form-control input-text'))}}
								</div>
								<div class='formgroup'>										
									<label>الخدمة:</label>
									{{Form::select('service',$servNames,e($bills->service))}} 
								</div>
								<div class="clearfix"></div>
								<div class='formgroup'>										
									<label>حالة الفاتورة:</label>
									 {{Form::radio('statue','payed',($bills->statue)?true:false)}} مدفوعة &nbsp;
									 {{Form::radio('statue','unpayed',(!$bills->statue)?true:false)}} غير مدفوعة <br><small class='text-danger'>ملاحظة: عند تغيير الحالة من غير مدفوعة لمدفوعة يتم إعادة حساب الأيام بحسب الخدمة.</small>
								</div>
								<div class="clearfix"></div><br>
								<center>{{Form::submit('إرسال',array('class'=>'btn btn-primary'))}}</center>
							{{Form::close()}}
						</div>
					</div>
				</div><!-- @end.blockleft -->
				@stop
