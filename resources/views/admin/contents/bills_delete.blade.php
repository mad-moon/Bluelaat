				@extends('admin.master')
				@section('title','حذف فاتورة')
				@section('content')
				<div class="blockleft">
					<div class="blocklcontent">
						<span class="blockltitle">حذف فاتورة خاصة بـ {{{$bills['username']}}}</span>
						<div class="blocklconter">
							{{Form::open()}}
							 	<center><h2>هل انت متأكد من حذف الفاتورة الخاصة بـ {{{$bills['username']}}}؟</h2>
							 	{{Form::submit('حذف',array('class' =>'btn btn-danger'))}} - <a href='{{{url("admin/bills/show/{$bills['id']}")}}}' class='btn btn-primary'>رجوع</a></center>
							{{Form::close()}}
						</div>
					</div>
				</div><!-- @end.blockleft -->
				@stop
