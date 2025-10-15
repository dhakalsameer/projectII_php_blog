<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
	<style>
		/* General Body Styling */
		body {
			background-color: #001f3f;
			/* Dark blue */
			font-family: 'Arial', sans-serif;
			color: #fff;
			margin: 0;
			padding: 0;
			height: 100vh;
			display: flex;
			justify-content: center;
			align-items: center;
			overflow: hidden;
		}

		/* Card Styling */
		.card {
			width: 100%;
			max-width: 400px;
			background: #000;
			/* Black background */
			box-shadow: 0 10px 25px rgba(0, 0, 0, 0.3);
			border-radius: 15px;
			padding: 30px;
			position: relative;
			z-index: 1;
			animation: fadeIn 1s ease-out;
		}

		h4 {
			color: #2575fc;
			text-align: center;
			font-weight: bold;
			margin-bottom: 10px;
		}

		/* Input Styling */
		.form-label {
			font-weight: bold;
			color: #fff;
		}

		.form-control {
			border-radius: 8px;
			border: none;
			padding: 10px;
			background: rgba(255, 255, 255, 0.2);
			color: #fff;
			box-shadow: inset 0 2px 5px rgba(0, 0, 0, 0.1);
		}

		.form-control:focus {
			border-color: #6a11cb;
			box-shadow: 0 0 10px rgba(106, 17, 203, 0.5);
			background: rgba(255, 255, 255, 0.3);
		}

		/* Button Styling */
		.btn-primary {
			background: linear-gradient(90deg, #2575fc, #6a11cb);
			border: none;
			padding: 10px;
			font-size: 1rem;
			border-radius: 8px;
			color: #fff;
			box-shadow: 0 5px 15px rgba(106, 17, 203, 0.3);
			transition: all 0.3s ease;
			width: 100%;
		}

		.btn-primary:hover {
			background: linear-gradient(90deg, #6a11cb, #2575fc);
			box-shadow: 0 8px 20px rgba(106, 17, 203, 0.5);
			transform: translateY(-3px);
		}

		/* Links Styling */
		.link-secondary {
			display: inline-block;
			text-align: center;
			margin-top: 15px;
			color: #bbb;
			text-decoration: none;
			font-size: 0.9rem;
			transition: color 0.3s ease;
		}

		.link-secondary:hover {
			color: #2575fc;
		}

		.alert-danger {
			border-radius: 8px;
			padding: 10px;
			font-size: 0.9rem;
			text-align: center;
			margin-bottom: 15px;
			background: rgba(255, 0, 0, 0.1);
			color: #ff4d4d;
		}

		/* Form Footer */
		.form-footer {
			text-align: center;
			margin-top: 15px;
		}

		.form-footer a {
			margin: 0 10px;
			color: #bbb;
			text-decoration: none;
			transition: color 0.3s ease;
		}

		.form-footer a:hover {
			color: #2575fc;
		}

		/* Animations */
		@keyframes fadeIn {
			from {
				opacity: 0;
				transform: translateY(-20px);
			}

			to {
				opacity: 1;
				transform: translateY(0);
			}
		}
	</style>
</head>

<body>
	<!-- Login Form -->
	<div class="card">
		<form class="shadow" action="php/login.php" method="post">
			<h4 class="display-4 fs-1">LOGIN</h4><br>

			<?php if (isset($_GET['error'])) { ?>
				<div class="alert alert-danger" role="alert">
					<?php echo htmlspecialchars($_GET['error']); ?>
				</div>
			<?php } ?>

			<div class="mb-3">
				<label class="form-label">User Name</label>
				<input type="text" class="form-control" name="uname" value="<?php echo (isset($_GET['uname'])) ? htmlspecialchars($_GET['uname']) : ''; ?>">
			</div>

			<div class="mb-3">
				<label class="form-label">Password</label>
				<input type="password" class="form-control" name="pass">
			</div>

			<button type="submit" class="btn btn-primary">Login</button>

			<div class="form-footer">
				<a href="admin-login.php" class="link-secondary">Admin Login</a>
				<a href="blog.php" class="link-secondary">Blog</a>
				<a href="signup.php" class="link-secondary">Sign Up</a>
			</div>
		</form>
	</div>
</body>

</html>