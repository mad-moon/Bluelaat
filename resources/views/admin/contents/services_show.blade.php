				@extends('admin.master')
				@section('title','مشاهدة خدمة')
				@section('content')
				<div class="blockleft">
					<div class="blocklcontent">
						<span class="blockltitle">تعديل الخدمة {{{$services['name']}}}</span>
						<div class="blocklconter">
							<ul>
								<li>#: <b>{{{$services['id']}}}</b></li>
								<li>اسم الخدمة: <b>{{{$services['name']}}}</b></li>
								<li>تفاصيل الخدمة: <b>{{{$services['desc']}}}</b></li>
								<li>سعر الخدمة: <b>{{{$services['price']}}} ريال</b></li>
								<li>مدة الخدمة: <b>{{{$services['period']}}} يوم</b></li>
								<li>مدة عمل الخدمة : <b>{{{$services['create_period']}}} ساعة</b></li>
								<li>تاريخ إنشاء الخدمة : <b>{{{$services['created_at']}}}</b></li>
								<li>تاريخ آخر تخديث للخدمة: <b>{{{$services['updated_at']}}}</b></li>
								<li>التحكم بالعضو: <b><a class='text-primary' href='{{{url("admin/services/edit/{$services['id']}")}}}'>تعديل</a> - <a class='text-danger' href='{{{url("admin/services/delete/{$services['id']}")}}}'>حذف</a></b></li>
							</ul>
						</div>
					</div>
				</div><!-- @end.blockleft -->
				@stop
