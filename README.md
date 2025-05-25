# FRONTEND

## Halaman Login ##
![image](https://github.com/user-attachments/assets/d7e1ea17-6f41-41e7-9cff-b34bc7d81f0c)
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Login</title>
		<!-- Bootstrap 5 CDN -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
	</head>
	<body class="bg-light d-flex justify-content-center align-items-center" style="height: 100vh;">

		<div class="card shadow p-4" style="min-width: 350px;">
			<h4 class="mb-3 text-center">Login</h4>

			@if(session('error'))
				<div class="alert alert-danger">{{ session('error') }}</div>
			@endif

			<form method="POST" action="{{ url('/login') }}">
				@csrf
				<div class="mb-3">
					<label for="email" class="form-label">Email</label>
					<input type="text" name="email" id="email" class="form-control" required autofocus>
				</div>

				<div class="mb-3">
					<label for="password" class="form-label">Password</label>
					<input type="password" name="password" id="password" class="form-control" required>
				</div>

				<button type="submit" class="btn btn-primary w-100">Login</button>
			</form>
		</div>

	</body>
</html>
