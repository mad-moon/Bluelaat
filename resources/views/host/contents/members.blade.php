	@extends('host.master')
	@section('title',"$title | لوحة التحكم")
	@section('content')

	<div id="slider_wrapper2">
		<div class="wrap">
				
			<h1>لوحة تحكم العضو</h1>

		</div>
	</div>

	<div class="clear"></div>

	<div class="content">
		<div class="wrap">
			<div class="content-g" style='width:193px;'>
					<a style='display:block;' href='{{{url("members/info")}}}' class='members_div'><i style='margin-right:18px;' class='icon-info'></i></a> 
					<center><h4>تعديل المعلومات</h4></center>
					<a style='display:block;' href='{{{url("members/tickets")}}}' class='members_div'><i style='margin-right:10px;' class='icon-ticket'></i></a> 
					<center><h4>التذاكر</h4></center>
					<a style='display:block;' href='{{{url("members/bills")}}}' class='members_div'><i style='margin-right:10px;' class='icon-suitcase'></i></a> 
					<center><h4>الفواتير</h4></center>
			</div>
			<div class="clear"></div>
		</div>
	</div>


	@stop