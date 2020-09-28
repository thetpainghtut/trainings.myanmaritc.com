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
				
				<p>Name : {{$data['name']}}</p>
				<p>Email : {{$data['email']}}</p>
				<p>Current Password : {{$data['password']}}</p>

				<p>Please veriry email and change your own password</p>
				<a href="http://localhost:8000/change_password">
					<button type="submit" class="btn btn-outline-warning" style="color: white; padding: 10px;border: none; background-color: #61EA5F;border-radius: 5px">
				        Verify Email
				    </button>
				</a>

			</div>
		</div>
	</div>
</div>

</body>
</html>

