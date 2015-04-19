				@extends('admin.master')
				@section('title','مشاهدة عضو')
				@section('content')
				<div class="blockleft">
					<div class="blocklcontent">
						<span class="blockltitle">الملف الشخصي لـ {{{$user['username']}}}</span>
						<div class="blocklconter">
							<ul>
								<li>#: <b>{{{$user['id']}}}</b></li>
								<li>اسم المستخدم: <b>{{{$user['username']}}}</b></li>
								<li>البريد الإلكتروني: <b>{{{$user['email']}}}</b></li>
								<li>حالة العضوية: <b>{{{$user['active']?'مفعل':'غير مفعل'}}}</b></li>
								<li>صلاحية العضوية: <b>{{{$user['admin']?'مدير':'عضو'}}}</b></li>
								<li>تاريخ تسجيل العضوية: <b>{{{$user['created_at']}}}</b></li>
								<li>تاريخ آخر تخديث لملف العضوية: <b>{{{$user['updated_at']}}}</b></li>
								<li>عدد تذاكر العضو: <b>{{{$user['id']}}}</b></li>
								<li>عدد خدمات العضو: <b>{{{$user['id']}}}</b></li>
								<li>التحكم بالعضو: <b><a class='text-primary' href='{{{url("admin/members/edit/{$user['id']}")}}}'>تعديل</a> - <a class='text-danger' href='{{{url("admin/members/delete/{$user['id']}")}}}'>حذف</a></b></li>
							</ul>
						</div>
					</div>
				</div><!-- @end.blockleft -->
				@stop
