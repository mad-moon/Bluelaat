				@extends('admin.master')
				@section('title','حذف رد')
				@section('content')
				<div class="blockleft">
					<div class="blocklcontent">
						<span class="blockltitle">حذف</span>
						<div class="blocklconter">
							{{Form::open()}}
							 	<center><h2>هل انت متأكد من حذف الرد؟</h2>
							 	{{Form::submit('حذف',array('class' =>'btn btn-danger'))}} - <a href='{{{url("admin/tickets/show/{$Tcomments['id']}")}}}' class='btn btn-primary'>رجوع</a></center>
							{{Form::close()}}
						</div>
					</div>
				</div><!-- @end.blockleft -->
				@stop
