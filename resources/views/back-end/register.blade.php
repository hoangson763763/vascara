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
		<form action="{{route('register')}}" method="post">
			{!! csrf_field() !!}
			<label>Register QUICK</label>
			
			<div>
				<input type="email" name="email" placeholder="E-mail">
				@error('email')
					<p>{{$errors->first('email')}}</p>
				@enderror
				
			</div>
			<div>
				<input type="text" name="username" placeholder="Username">
				@error('email')
					<p>{{$errors->first('username')}}</p>
				@enderror
			</div>
			<div>
				<input type="text" name="phone" placeholder="Phone Number">
				@error('email')
					<p>{{$errors->first('phone')}}</p>
				@enderror
			</div>
			<div>
				<input type="password" name="password" placeholder="Password">
				@error('email')
					<p>{{$errors->first('password')}}</p>
				@enderror
			</div>
			<div>
				<input type="password" name="re-pass" placeholder="Re-enter password">
				@error('email')
					<p>{{$errors->first('re-pass')}}</p>
				@enderror
			</div>
			<div class="submit">
				<a href="{{route('login')}}">Login</a> 
				<button>Register</button>
			</div>
		</form>
		<div class="copy-r">
			<p>© 2017 Online Login Form. All rights reserved | Design by W3layouts</p>
		</div>
	</div>
</body>
</html>