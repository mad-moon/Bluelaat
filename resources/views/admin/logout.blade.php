				@extends('admin.master')
				@section('title','تسجيل الخروج')
				@section('content')
				<div class="blockleft">
					<div class="blocklcontent">
						<span class="blockltitle">سيتم تحويلك بعد ٥ ثواني</span>
						<div class="blocklconter">
							 	<center><h2>تم تسجيل الخروج بنجاح</h2></center>
						</div>
					</div>
				</div><!-- @end.blockleft -->
				<script type="text/javascript">
					setTimeout(function(){ window.location = '{{url()}}' }, 5000);
				</script>

				@stop
