				@extends('admin.master')
				@section('title','مشاهدة الأعضاء')
				@section('content')
				<div class="blockleft">

					<div class="blocklcontent">
						<span class="blockltitle">مشاهدة الأعضاء</span>
						<div class="blocklconter">
							<table class="table table-bordered table-hover">
								<tr>
									<td>#</td>
									<td>اسم العضو:</td>
									<td>البريد الإلكتروني:</td>
									<td>حالة العضوية:</td>									
									<td>تاريخ تسجيل العضوية:</td>
								</tr>									
								@foreach($members as $member)
									<tr class="{{{$member['active']?'success':'active'}}}">
										<td>{{{$member['id']}}}</td>
										<td><a href='{{{url("admin/members/show/{$member['id']}")}}}'>{{{$member['username']}}}</a></td>
										<td>{{{$member['email']}}}</td>
										<td>{{{$member['active']?'مفعل':'غير مفعل'}}}</td>
										<td>{{{$member['created_at']}}}</td>
									</tr>
								@endforeach
							</table>
							<center>{{$members->render()}}</center>
						</div>
					</div>
				</div><!-- @end.blockleft -->
				@stop
