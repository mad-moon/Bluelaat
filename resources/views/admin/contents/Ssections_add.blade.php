				@extends('admin.master')
				@section('title','إضافة قسم خدمات')
				@section('content')
				<div class="blockleft">
					<div class="blocklcontent">
						<span class="blockltitle">إضافة قسم خدمات</span>
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
									<label>إسم القسم:</label>
									{{Form::text('name',null,array('class'=>'form-control input-text'))}}
								</div>
								<div class='formgroup'>										
									<label>وصف القسم:</label>
									{{Form::textarea('desc',null,array('class'=>'form-control input-text'))}}
								</div>
								<center>{{Form::submit('إرسال',array('class'=>'btn btn-primary'))}}</center>
							{{Form::close()}}
						</div>
					</div>
				</div><!-- @end.blockleft -->
				@stop
