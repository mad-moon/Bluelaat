				@extends('admin.master')
				@section('title','تعديل خدمة')
				@section('content')
				<div class="blockleft">
					<div class="blocklcontent">
						<span class="blockltitle">تعديل خدمة</span>
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
									<label>إسم الخدمة:</label>
									{{Form::text('name',e($services->name),array('class'=>'form-control input-text'))}}
								</div>
								<div class='formgroup'>										
									<label>القسم :</label>
									{{Form::select('section',$secNames,e($services->section))}} 
								</div>
								<div class="clearfix"></div>
								<div class='formgroup'>										
									<label>تفاصيل الخدمة:</label>
									{{Form::textarea('desc',e($services->desc),array('class'=>'form-control input-text'))}}
								</div>
								<div class='formgroup'>										
									<label>سعر الخدمة ( بالريال ):</label>
									{{Form::text('price',e($services->price),array('class'=>'form-control input-text'))}} 
								</div>
								<div class='formgroup'>										
									<label>مدة الخدمة ( بالأيام ) :</label>
									{{Form::text('period',e($services->period),array('class'=>'form-control input-text'))}} 
								</div>
								<div class='formgroup'>										
									<label  style='width:34%'>مدة عمل الخدمة ( بالدقائق ):</label>
									{{Form::text('create_period',e($services->create_period),array('class'=>'form-control input-text','style'=>'width:61%'))}} 
								</div>
								<center>{{Form::submit('إرسال',array('class'=>'btn btn-primary'))}}</center>
							{{Form::close()}}
						</div>
					</div>
				</div><!-- @end.blockleft -->
				@stop
