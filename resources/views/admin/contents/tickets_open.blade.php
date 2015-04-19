				@extends('admin.master')
				@section('title','فتح تذكرة')
				@section('content')
				<div class="blockleft">
					<div class="blocklcontent">
						<span class="blockltitle">فتح {{{$tickets['subject']}}}</span>
						<div class="blocklconter">
							{{Form::open()}}
							 	<center><h2>هل انت متأكد من فتح {{{$tickets['subject']}}} من جديد؟</h2>
							 	{{Form::submit('فتح',array('class' =>'btn btn-success'))}} - <a href='{{{url("admin/tickets/show/{$tickets['id']}")}}}' class='btn btn-primary'>رجوع</a></center>
							{{Form::close()}}
						</div>
					</div>
				</div><!-- @end.blockleft -->
				@stop
