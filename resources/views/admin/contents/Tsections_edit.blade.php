				@extends('admin.master')
				@section('title','تعديل تذكرة')
				@section('content')
				<div class="blockleft">
					<div class="blocklcontent">
						<span class="blockltitle">تعديل قسم في الخدمات</span>
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
									{{Form::text('name',e($Tsections->name),array('class'=>'form-control input-text'))}}
								</div>
								<div class='formgroup'>										
									<label>وصف القسم:</label>
									{{Form::textarea('desc',e($Tsections->desc),array('class'=>'form-control input-text'))}}
								</div>
								<center>{{Form::submit('إرسال',array('class'=>'btn btn-primary'))}}</center>
							{{Form::close()}}
						</div>
					</div>
				</div><!-- @end.blockleft -->
				@stop
