	@extends('host.master')
	@section('title',"$title | إضافة خدمة")
	@section('content')

	<div id="slider_wrapper2">
		<div class="wrap">
				
			<h1>طلب خدمة</h1>

		</div>
	</div>

	<div class="clear"></div>

	<div class="content">
		<div class="wrap">
			<div class="content-g">
				{{Form::open(array('id'=>'form','style'=>'margin:30px 174px;'))}}
					<table>
						<tbody><tr>
							<td>
								<h1>هل انت متأكد من طلب الخدمة {{{$service['name']}}} </h1>
							</td>
						</tr>
						<tr>
							<td>
								<center>{{Form::submit('نعم',array('class'=>'button'))}} - <a class='button' href='{{{url("services/{$service['section']}")}}}'>العودة</a></center>
							</td>
						</tr>
					</tbody></table>
 				{{Form::close()}}

			</div>
			<div class="clear"></div>
		</div>
	</div>


	@stop