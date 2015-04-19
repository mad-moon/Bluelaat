				@extends('admin.master')
				@section('title','مشاهدة فاتورة')
				@section('content')
				<div class="blockleft">
					<div class="blocklcontent">
						<span class="blockltitle">مشاهدة فاتورة</span>
						<div class="blocklconter">
							 <br>
							<ul>
								<li>#: <b>{{{$bills['id']}}}</b></li>
								<li>مستخدم الفاتورة: <b><a href='{{{url("admin/members/show/{$user['id']}")}}}'>{{{$bills['username']}}}</a></b></li>
								<li>الخدمة: <b><a href='{{{url("admin/services/show/{$servInf['id']}")}}}'>{{{$bills['service']}}}</a></b></li>
								<li>سعر الفاتورة: <b>{{{$servInf['price']}}} ريال</b></li>
								<li>حالة الفاتورة: <b>{{$bills['statue']?'<span class="text-success">مدفوعة</span>':'<span class="text-danger">غير مدفوعة</span>'}}</b></li>
								<li>المتبقي من إنتهاء الفاتورة: <b>@if(!$bills['statue']){{'0'}}@else{{daysleft($bills->ends_at)}}@endif يوم</b></li>
								<li>تاريخ إنشاء الفاتورة : <b>{{{$bills['created_at']}}}</b></li>
								<li>تاريخ آخر تحديث للفاتورة : <b>{{{$bills['updated_at']}}}</b></li>
								<li>التحكم بالفاتورة: <b><a class='text-primary' href='{{{url("admin/bills/edit/{$bills['id']}")}}}'>تعديل</a> - <a class='text-danger' href='{{{url("admin/bills/delete/{$bills['id']}")}}}'>حذف</a></b></li>
							</ul>
						</div>
					</div>
				</div><!-- @end.blockleft -->
				@stop
