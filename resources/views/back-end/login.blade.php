<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- CSS -->
    <link  href="{{ asset('/back-end/fontawesome-free-5.15.3-web/css/all.css') }}" rel="stylesheet">
    <link  type="text/css" href="{{ asset('back-end/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link  href="{{ asset('back-end/css/jquery.dataTables.min.css ') }}" rel="stylesheet ">
    <link  type="text/css" href="{{ asset('back-end/css/login.css') }}" rel="stylesheet ">
</head>
<body>
	<div class="login container">
		<div class="title">
			<p>ONLINE LOGIN FORM</p>
		</div>
		<form action="{{route('login')}}" method="post">
			{!! csrf_field() !!}
			<label>LOGIN QUICK</label>
			<div>
				<input type="email" name="email" placeholder="E-mail">
				@error('email')
					<p>{{$errors->first('email')}}</p>
				@enderror
			</div>
			<div>
				<input type="password" name="password" placeholder="Password">
				@error('password')
					<p>{{$errors->first('password')}}</p>
				@enderror
			</div>
			<div class="link-register">
				<p>
					<a href="{{route('register')}}">Bạn chưa có tài khoản?</a>
				</p>
				
			</div>
			<div>

				@if(isset($message))
					<p style="margin-top: 20px;color: #F82C44;">
						{{$message}}
					</p>
				@endif
				
			</div>	
			<div class="submit"> 
				<button>Login</button>
			</div>
		</form>
		<div class="copy-r">
			<p>© 2017 Online Login Form. All rights reserved | Design by W3layouts</p>
		</div>
	</div>
</body>
</html>