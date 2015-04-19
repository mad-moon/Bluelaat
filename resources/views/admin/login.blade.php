<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>{{{$title}}} | تسجيل دخول لوحة التحكم</title>
		<meta name="author" content="Ciel" />

		<!-- CSS -->
		<link href="{{asset('views/admin/assets/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('views/admin/assets/css/login.css')}}" rel="stylesheet" type="text/css" />

		<!-- Date: 2014-01-17 -->
	</head>
	<body>
		<div id="wrapper">
			<h1>Admin Login</h1>
				{{Form::open()}}
					<div class="loginForm">
					<div class="inputs">						
						{{form::text('username',null,array('class'=>'inputtext','placeholder'=>'اسم المستخدم'))}}
						{{form::password('password',array('class'=>'inputtext','placeholder'=>'كلمة المرور'))}}
					</div>
					<!-- @end.inputs -->
					{{Form::submit('ولوجْ',array('class'=>'submit'))}}
					<!-- @end.submit -->
					</div>
 					<div id="resultBox">
 							{{Session::get('i_error')}}
							{{$errors->first('username','<span class="msgError">:message</span>')}}
							{{$errors->first('password','<span class="msgError">:message</span>')}}
					</div>
				{{Form::close()}}
			
		</div><!-- @end.wrapper -->
		
		
	</body>
</html>

