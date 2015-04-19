				@extends('admin.master')
				@section('title','اقسام التذاكر')
				@section('content')
				<div class="blockleft">

					<div class="blocklcontent">
						<span class="blockltitle">مشاهدة أقسام التذاكر</span>
						<div class="blocklconter">
							<table class="table table-bordered table-hover">
								<tr>
									<td>#</td>
									<td>اسم القسم:</td>
									<td>وصف القسم:</td>
									<td>التحكم:</td>
								</tr>									
								@foreach($Tsections as $Tsection)
									<tr>
										<td>{{{$Tsection['id']}}}</td>
										<td>{{{$Tsection['name']}}}</td>
										<td>{{{$Tsection['desc']}}}</td>
										<td><b><a class='text-primary' href='{{{url("admin/services/sections/edit/{$Tsection['id']}")}}}'>تعديل</a> - <a class='text-danger' href='{{{url("admin/services/sections/delete/{$Tsection['id']}")}}}'>حذف</a></b></td>
									</tr>
								@endforeach
							</table>
							<center>{{$Tsections->render()}}</center>
						</div>
					</div>
				</div><!-- @end.blockleft -->
				@stop
