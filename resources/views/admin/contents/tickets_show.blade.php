				@extends('admin.master')
				@section('title','مشاهدة تذكرة')
				@section('content')
				<div class="blockleft">
					<div class="blocklcontent">
						<span class="blockltitle">مشاهدة التذكرة {{{$tickets['subject']}}}</span>
						<div class="blocklconter" style='padding-bottom:0'>
							<ul class='list-unstyled'>
								<li><b>اسم المستخدم:</b> {{{$tickets['username']}}}</li>
								<li><b>الموضوع:</b> {{{$tickets['subject']}}}</li>
								<li><b>تاريخ التذكرة:</b> {{{$tickets['created_at']}}}</li>
								<li><b>آخر رد:</b> {{{$tickets['last_comment'] == 'staff'?'الموظف':'العميل'}}}</li>
								<li><b>حالة التذكرة:</b> {{{$tickets['statue'] == 'open'?'مفتوحة':'مغلقة'}}}</li>
							</ul>
						</div>
						<hr>
						<div style='text-align:right;padding:10px 10px 30px 30px;background-color:rgba(194, 194, 194, 0.6);margin:5px;border-radius:5px;' class="content">
							<span style='white-space: pre;'>{{{$tickets['desc']}}}</span>
						</div>
					</div>
					@if(count($tcomments))
					<div class="blocklcontent" style='margin-top:5px;'>
						<center><h2>الردود على التذاكر</h2></center>
						<hr>
						@foreach($tcomments as $tcomments)
						<ul class='list-unstyled'>
							<li><b>اسم المستخدم:</b> {{{$tcomments['username']}}}</li>
							<li><b>تاريخ التذكرة:</b> {{{$tcomments['created_at']}}}</li>
							<li><b>موظف؟</b> {{{$tcomments['staff']?'نعم':'لا'}}}</li>
						</ul>
						<div style='text-align:right;padding:10px 10px 30px 30px;background-color:rgba(194, 194, 194, 0.6);margin:5px;border-radius:5px;' class="content">
							<span style='white-space: pre;'>{{{$tcomments['comment']}}}</span>
						</div>
						@if($tcomments['staff'])
						<div class="set" style='float:left;margin-left:15px;'><a class='text-primary' href='{{{url("admin/tickets/comments/edit/{$tcomments['id']}")}}}'>تعديل</a> - <a class='text-danger' href="{{{url("admin/tickets/comments/delete/{$tcomments['id']}")}}}">حذف</a></div>
						<div class="clearfix"></div>
						@endif
						<hr>
						@endforeach
					</div>
					@endif
					@if($tickets['statue'] !='close')
					<div class="blocklcontent" style='margin-top:5px;'>
						{{Form::open(array('class' =>'form','style'=>'padding:5px;'))}}
							<center>
								<h2>منطقة الرد على العميل</h2>
								<hr>
								<div style='margin-top:11px;' class='formgroup'>										
									{{Form::textarea('ticket',null,array('class'=>'form-control input-text'))}}
								</div>
							</center>
							<center>{{Form::submit('إرسال',array('class'=>'btn btn-primary'))}}</center>
						{{Form::close()}}
					</div>
					@endif
				</div><!-- @end.blockleft -->
				@stop
