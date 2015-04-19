				@extends('admin.master')
				@section('title','حذف تذكرة')
				@section('content')
				<div class="blockleft">
					<div class="blocklcontent">
						<span class="blockltitle">حذف {{{$Tsections['name']}}}</span>
						<div class="blocklconter">
							{{Form::open()}}
							 	<center><h2>هل انت متأكد من حذف {{{$Tsections['name']}}}؟</h2>
							 	{{Form::submit('حذف',array('class' =>'btn btn-danger'))}} - <a href='{{{url("admin/members/show/{$Ssections['id']}")}}}' class='btn btn-primary'>رجوع</a></center>
							{{Form::close()}}
						</div>
					</div>
				</div><!-- @end.blockleft -->
				@stop
