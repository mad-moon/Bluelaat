				@extends('admin.master')
				@section('title','إغلاق تذكرة')
				@section('content')
				<div class="blockleft">
					<div class="blocklcontent">
						<span class="blockltitle">إغلاق {{{$tickets['subject']}}}</span>
						<div class="blocklconter">
							{{Form::open()}}
							 	<center><h2>هل انت متأكد من إغلاق {{{$tickets['subject']}}}؟</h2>
							 	{{Form::submit('إغلاق',array('class' =>'btn btn-success'))}} - <a href='{{{url("admin/tickets/show/{$tickets['id']}")}}}' class='btn btn-primary'>رجوع</a></center>
							{{Form::close()}}
						</div>
					</div>
				</div><!-- @end.blockleft -->
				@stop
