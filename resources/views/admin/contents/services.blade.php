				@extends('admin.master')
				@section('title','الخدمات')
				@section('content')
				<div class="blockleft">

					<div class="blocklcontent">
						<span class="blockltitle">مشاهدة الخدمات</span>
						<div class="blocklconter">
							<table class="table table-bordered table-hover">
								<tr>
									<td>#</td>
									<td>اسم الخدمة:</td>
									<td>التحكم:</td>
								</tr>									
								@foreach($services as $service)
									<tr>
										<td>{{{$service['id']}}}</td>
										<td><a href='{{{url("admin/services/show/{$service['id']}")}}}'>{{{$service['name']}}}</a></td>
										<td><b><a class='text-primary' href='{{{url("admin/services/edit/{$service['id']}")}}}'>تعديل</a> - <a class='text-danger' href='{{{url("admin/services/delete/{$service['id']}")}}}'>حذف</a></b></td>
									</tr>
								@endforeach
							</table>
							<center>{{$services->render()}}</center>
						</div>
					</div>
				</div><!-- @end.blockleft -->
				@stop
