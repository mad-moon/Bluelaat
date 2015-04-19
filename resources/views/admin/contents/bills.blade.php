				@extends('admin.master')
				@section('title','الفواتير')
				@section('content')
				<div class="blockleft">

					<div class="blocklcontent">
						<span class="blockltitle">مشاهدة الفواتير</span>
						<div class="blocklconter">
							<table class="table table-bordered table-hover">
								<tr>
									<td>#</td>
									<td>اسم المستخدم:</td>
									<td>الخدمة:</td>
									<td>التحكم:</td>
								</tr>									
								@foreach($bills as $bill)
									<tr>
										<td>{{{$bill['id']}}}</td>
										<td>{{{$bill['username']}}}</td>
										<td>{{{$bill['service']}}}</td>
										<td><b><a class='text-success' href='{{{url("admin/bills/show/{$bill['id']}")}}}'>مشاهدة</a> - <b><a class='text-primary' href='{{{url("admin/bills/edit/{$bill['id']}")}}}'>تعديل</a> - <a class='text-danger' href='{{{url("admin/bills/delete/{$bill['id']}")}}}'>حذف</a></b></td>
									</tr>
								@endforeach
							</table>
							<center>{{$bills->render()}}</center>
						</div>
					</div>
				</div><!-- @end.blockleft -->
				@stop
