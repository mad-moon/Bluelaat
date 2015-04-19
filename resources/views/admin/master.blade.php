<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>@if(isset($title)){{$title}}@endif | @yield('title')</title>
		<meta name="author" content="Ciel" />

		<!-- CSS -->
		<link href="{{asset('views/admin/assets/bootstrap/css/bootstrap.min-ar.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('views/admin/assets/css/display.css')}}" rel="stylesheet" type="text/css" />

		<!-- تستطيع حذف هذا بالكامل -->
		<style type="text/css">
			.sugoi {
				padding: 10px;
				border: 1px dotted green;
			}
		</style>
		<!-- الى هنا تستطيع الحذف -->

		<!-- Date: 2014-01-17 -->
	</head>
	<body>
		<div id="top">
			<div class="topcontent">
				<div class="fright">
					<span class="h1"> <a href="{{url('admin')}}">Bluelat</a> <small style="font-size: 13px;">Version: 0.1 beta</small> </span>
				</div><!-- @end.fright -->

				<div class="fleft">
					<div class="toolbar">
						<div class="btn-toolbar" role="toolbar">
							<div class="btn-group">
								<button class="btn btn-danger btn-xs dropdown-toggle" type="button" data-toggle="dropdown">
									مرحبًا {{{Session::get('admin_username')}}}
									<span class="caret"></span>
								</button>
								<ul class="dropdown-menu" role="menu">
									<li>
										<a href="{{url('admin/logout')}}">تسجيل الخروج</a>
									</li>
								</ul>
							</div><!-- /btn-group -->
						</div>
					</div>
				</div><!-- @end.fleft -->

			</div><!-- @end.topcontent -->
		</div><!-- @end.top -->
		<div id="wrapper">
			<div class="wcontent">
				<div class="qucbar">
					<div class="fright">
						<a href='{{{url("admin/members/add")}}}' class="btn btn-warning">
							إضافة مستخدم
						</a>
					</div>
					<div class="fleft">
						<span class="btn btn-success">إداري</span>
						<span class="btn btn-primary">{{date('F d, Y')}}</span>
					</div>
				</div>
				<!--
				ملاحظة في حال انشأت بلوك جديد، قم بتغير قيمة href و id، واجعل لكل بلوك ميزته الخاصة.
				-->
				<div class="blockright">
					<div class="blockgroup">
						<span class="blocktitle"> <a data-toggle="collapse" href="#list1">روابط سريعة</a> </span>
						<div id="list1" style="height: auto;" class="blockcontent in collapse">
							<ul class="blockitem">
								<li>
									<a href="{{{url('admin')}}}">رئيسية الادارة</a>
								</li>
								<li>
									<a target='_blank' href="{{url('/')}}">رئيسية الموقع</a>
								</li>
							</ul>
						</div>
					</div><!-- @end.blockgroup -->

					<div class="blockgroup">
						<span class="blocktitle"> <a data-toggle="collapse" href="#list2">إعدادات الموقع</a> </span>
						<div id="list2" style="height: auto;" class="blockcontent in collapse">
							<ul class="blockitem">
								<li>
									<a href="{{{url('admin/settings/')}}}">الإعدادات الرئيسية</a>
								</li>
								<li>
									<a href="{{{url('admin/members/')}}}"> الأعضاء</a>
									<ul class="snip">
										<li><a href="{{{url('admin/members/add')}}}">إضافة مستخدم</a></li>
									</ul>
								</li>
								<li>
									<a href="{{{url('admin/services/')}}}"> الخدمات</a>
									<ul class="snip">
										<li><a href="{{{url('admin/services/add')}}}">إضافة خدمة</a></li>
										<li>
											<a href="{{{url('admin/services/sections')}}}">اقسام الخدمات</a>
											<ul class="snip">
												<li>
													<a href="{{{url('admin/services/sections/add')}}}">إضافة قسم</a>
												</li>
											</ul>
										</li>
									</ul>
								</li>
								<li>
									<a href="{{{url('admin/tickets/')}}}"> التذاكر</a>
									<ul class="snip">
										<li>
											<a href="{{{url('admin/tickets/sections')}}}">اقسام التذاكر</a>
											<ul class="snip">
												<li>
													<a href="{{{url('admin/tickets/sections/add')}}}">إضافة قسم</a>
												</li>
											</ul>
										</li>
									</ul>
								</li>
								<li>
									<a href="{{{url('admin/bills/')}}}"> الفواتير</a>
									<ul class="snip">
										<li>
											<a href="{{{url('admin/bills/add')}}}">إضافة فاتورة</a>
										</li>
									</ul>
								</li>
							</ul>
						</div>
					</div><!-- @end.blockgroup -->

				</div><!-- @end.blockright -->
				@yield('content')
			</div><!-- @end.wcontent -->
			<div id="footer">
				Copyright © <a target='_blank' href="http://shinome.com">Sugoi</a> 2015 - {Y} . All rights reserved.
			</div>
			<div class="clear"></div>
		</div><!-- @end.wrapper -->

		<!-- AJAX -->
		<script src="https://code.jquery.com/jquery.js"></script>
		<!-- #bootstrap -->
		<script src="{{asset('views/admin/assets/bootstrap/js/bootstrap.min.js')}}" type="text/javascript"></script>
	</body>
</html>

