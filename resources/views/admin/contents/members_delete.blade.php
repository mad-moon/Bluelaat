				@extends('admin.master')
				@section('title','حذفف عضو')
				@section('content')
				<div class="blockleft">
					<div class="blocklcontent">
						<span class="blockltitle">حذف {{{$user['username']}}}</span>
						<div class="blocklconter">
							{{Form::open()}}
							 	<center><h2>هل انت متأكد من حذف {{{$user['username']}}}؟</h2>
							 	{{Form::submit('حذف',array('class' =>'btn btn-danger'))}} - <a href='{{{url("admin/members/show/{$user['id']}")}}}' class='btn btn-primary'>رجوع</a></center>
							{{Form::close()}}
						</div>
					</div>
				</div><!-- @end.blockleft -->
				@stop
