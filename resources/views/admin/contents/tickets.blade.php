				@extends('admin.master')
				@section('title','التذاكر')
				@section('content')
				<div class="blockleft">

					<div class="blocklcontent">
						<span class="blockltitle">مشاهدة التذاكر</span>
						<div class="blocklconter">
							<table class="table table-bordered table-hover">
								<tr>
									<td>#</td>
									<td>اسم المستخدم:</td>
									<td>القسم:</td>
									<td>آخر رد:</td>
									<td>التحكم:</td>
								</tr>									
								@foreach($tickets as $ticket)
									<tr>
										<td>{{{$ticket['id']}}}</td>
										<td><a href='{{{url("admin/tickets/show/{$ticket['id']}")}}}'>{{{$ticket['username']}}}</a></td>
										<td><b>{{{$ticket['section']}}}</b></td>
										<td><b>{{{$ticket['last_comment'] == 'staff'?'الموظف':'العميل'}}}</b></td>
										<td><b><a class='text-success' href='{{{url("admin/tickets/show/{$ticket['id']}")}}}'>مشاهدة</a> - @if($ticket['statue'] == 'open')<a class='text-primary' href='{{{url("admin/tickets/close/{$ticket['id']}")}}}'>إغلاق</a>@else <a class='text-primary' href='{{{url("admin/tickets/open/{$ticket['id']}")}}}'>فتح</a>@endif - <a class='text-danger' href='{{{url("admin/tickets/delete/{$ticket['id']}")}}}'>حذف</a></b></td>
									</tr>
								@endforeach
							</table>
							<center>{{$tickets->render()}}</center>
						</div>
					</div>
				</div><!-- @end.blockleft -->
				@stop
