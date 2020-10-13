<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}">
</head>
<style type="text/css">
	.card-body p{
		color: black;
	}
</style>
<body>

<div class="row">
	<div class="col-md-8 mx-auto">
		<div class="card">
			<div class="card-body">
				
				<p>Email : {{$data['email']}}</p>
				<p>CodeNo : {{$data['codeno']}}</p>

				<p>Hello!</p>
				<p>You are receiving this email because we recived a password reset for your account.</p>
				<a href="{{env('APP_URL')}}/resetandeditpassword/?codeno={{$data['codeno']}}&email={{$data['email']}}">
					@csrf
					<button type="submit" class="btn btn-outline-warning" style="color: white; padding: 10px;border: none; background-color: #29A3F7;border-radius: 5px">
				       	Reset Password
				    </button>
				</a>

			</div>
		</div>
	</div>
</div>

</body>
</html>

