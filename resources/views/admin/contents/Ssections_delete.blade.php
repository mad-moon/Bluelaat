				@extends('admin.master')
				@section('title','حذف قسم خدمات')
				@section('content')
				<div class="blockleft">
					<div class="blocklcontent">
						<span class="blockltitle">حذف {{{$Ssections['name']}}}</span>
						<div class="blocklconter">
							{{Form::open()}}
							 	<center><h2>هل انت متأكد من حذف {{{$Ssections['name']}}}؟</h2>
							 	{{Form::submit('حذف',array('class' =>'btn btn-danger'))}} - <a href='{{{url("admin/members/show/{$Ssections['id']}")}}}' class='btn btn-primary'>رجوع</a></center>
							{{Form::close()}}
						</div>
					</div>
				</div><!-- @end.blockleft -->
				@stop
