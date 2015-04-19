	@extends('host.install')
	@section('title',"اضافة معلومات الموقع")
	@section('content')
	<div id="slider_wrapper2">
		<div class="wrap">
			<h1>تنصيب بلولات</h1>
		</div>
	</div>

	<div style='padding:30px 0;text-align:center;'>
		<h1>مرحبًا بك في إعداد تنصيب سكربت بلولات</h1>
		<h3 style='margin-bottom:0;'>لبدأ عملية التنصيب الرجاء الظغط على</h3>
	</div>

	{{Form::open(array('id'=>'form','style'=>'margin:0 auto;margin-bottom:30px;width:152px'))}}

		<input  type='submit' class='button' value='تنصيب' />
	{{Form::close()}}

	@stop