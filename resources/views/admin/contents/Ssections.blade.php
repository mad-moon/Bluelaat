				@extends('admin.master')
				@section('title','مشاهدة اقسام الخدمات')
				@section('content')
				<div class="blockleft">

					<div class="blocklcontent">
						<span class="blockltitle">مشاهدة أقسام الخدمات</span>
						<div class="blocklconter">
							<table class="table table-bordered table-hover">
								<tr>
									<td>#</td>
									<td>اسم القسم:</td>
									<td>وصف القسم:</td>
									<td>التحكم:</td>
								</tr>									
								@foreach($Ssections as $Ssection)
									<tr>
										<td>{{{$Ssection['id']}}}</td>
										<td>{{{$Ssection['name']}}}</td>
										<td>{{{$Ssection['desc']}}}</td>
										<td><b><a class='text-primary' href='{{{url("admin/services/sections/edit/{$Ssection['id']}")}}}'>تعديل</a> - <a class='text-danger' href='{{{url("admin/services/sections/delete/{$Ssection['id']}")}}}'>حذف</a></b></td>
									</tr>
								@endforeach
							</table>
							<center>{{$Ssections->render()}}</center>
						</div>
					</div>
				</div><!-- @end.blockleft -->
				@stop
