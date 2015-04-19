	@extends('host.master')
	@section('title',"$title | إضافة تذكرة")
	@section('content')

	<div id="slider_wrapper2">
		<div class="wrap">
				
			<h1>إضافة تذكرة</h1>

		</div>
	</div>

	<div class="clear"></div>

	<div class="content">
		@if(($errors->has()))
		<div style='width:600px;margin:0 auto;margin-bottom:35px;background-color:#ededed;padding:50px;text-align:center;border-radius:10px'>
			@foreach($errors->all() as $error)
			<span style='font-size:15px;color:#6ab2dc;'>
				{{{$error}}} <br>
			</span>
			@endforeach
		</div>
		@endif
		<div class="wrap">
			<div class="content-g">
				{{Form::open(array('id'=>'form'))}}
					<table>
						<tbody><tr>
							<td>
								<h4 style='text-align:right;margin-bottom:5px;'>عنوان التذكرة:</h4>
								{{Form::text('subject',null,array('class'=>'input','placeholder'=>'عنوان التذكرة'))}}
							</td>
						</tr><tr>
							<td>
								<h4 style='text-align:right;margin-bottom:5px;'>قسم التذكرة:</h4>
								{{Form::select('sections',$sections,null,array('class'=>'selectsection input'))}}
							</td>
						</tr>
						<tr>
							<td>
								<h4 style='text-align:right;margin-bottom:5px;'> وصف التذكرة</h4>
								{{Form::textarea('content',null,array('class'=>'input','placeholder'=>'وصف التذكرة'))}}
							</td>
						</tr>
						<tr>
							<td>
								<center>{{Form::submit('إضافة',array('class'=>'button'))}}</center>
							</td>
						</tr>
					</tbody></table>
{{Form::close()}}

			</div>
			<div class="clear"></div>
		</div>
	</div>


	@stop