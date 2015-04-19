				@extends('admin.master')
				@section('title','إضافة خدمة')
				@section('content')
				<div class="blockleft">
					<div class="blocklcontent">
						<span class="blockltitle">إضافة خدمة</span>
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
									{{Form::text('name',null,array('class'=>'form-control input-text'))}}
								</div>
								<div class='formgroup'>										
									<label>القسم :</label>
									{{Form::select('section',$secNames)}} 
								</div>
								<div class="clearfix"></div>
								<div class='formgroup'>										
									<label>تفاصيل الخدمة:</label>
									{{Form::textarea('desc',null,array('class'=>'form-control input-text'))}}
								</div>
								<div class='formgroup'>										
									<label>سعر الخدمة ( بالريال ):</label>
									{{Form::text('price',null,array('class'=>'form-control input-text'))}} 
								</div>
								<div class='formgroup'>										
									<label>مدة الخدمة ( بالأيام ) :</label>
									{{Form::text('period',null,array('class'=>'form-control input-text'))}} 
								</div>
								<div class='formgroup'>										
									<label  style='width:34%'>مدة عمل الخدمة ( بالدقائق ):</label>
									{{Form::text('create_period',null,array('class'=>'form-control input-text','style'=>'width:61%'))}} 
								</div>
								<center>{{Form::submit('إرسال',array('class'=>'btn btn-primary'))}}</center>
							{{Form::close()}}
						</div>
					</div>
				</div><!-- @end.blockleft -->
				@stop