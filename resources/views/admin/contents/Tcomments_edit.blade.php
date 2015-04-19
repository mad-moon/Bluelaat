				@extends('admin.master')
				@section('title','تعديل رد')
				@section('content')
				<div class="blockleft">
					<div class="blocklcontent">
						<span class="blockltitle">تعديل رد</span>
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
									<label>الرد:</label>
									{{Form::textarea('comment',e($Tcomments->comment),array('class'=>'form-control input-text'))}}
								</div>
								<center>{{Form::submit('إرسال',array('class'=>'btn btn-primary'))}}</center>
							{{Form::close()}}
						</div>
					</div>
				</div><!-- @end.blockleft -->
				@stop
