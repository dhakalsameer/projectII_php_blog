<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Sign Up</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
	<style>
		/* General Body Styling */
		body {
			background: linear-gradient(135deg, #6a11cb, #2575fc);
			font-family: 'Arial', sans-serif;
			color: #fff;
			margin: 0;
			padding: 0;
			height: 100vh;
			display: flex;
			justify-content: center;
			align-items: center;
		}

		/* Form Container Styling */
		.shadow {
			width: 100%;
			max-width: 450px;
			background: rgba(0, 0, 0, 0.8);
			padding: 30px;
			border-radius: 15px;
			box-shadow: 0 10px 25px rgba(0, 0, 0, 0.3);
		}

		/* Header Styling */
		h4 {
			color: #2575fc;
			text-align: center;
			font-weight: bold;
			margin-bottom: 20px;
		}

		/* Input Field Styling */
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

		/* Link Styling */
		.link-secondary {
			display: block;
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

		/* Alert Box Styling */
		.alert-danger {
			border-radius: 8px;
			padding: 10px;
			font-size: 0.9rem;
			text-align: center;
			margin-bottom: 15px;
			background: rgba(255, 0, 0, 0.1);
			color: #ff4d4d;
		}

		.alert-success {
			border-radius: 8px;
			padding: 10px;
			font-size: 0.9rem;
			text-align: center;
			margin-bottom: 15px;
			background: rgba(0, 255, 0, 0.1);
			color: #4CAF50;
		}
	</style>
</head>

<body>
	<div class="d-flex justify-content-center align-items-center vh-100">
		<form class="shadow" action="php/signup.php" method="post">
			<h4 class="display-4 fs-1">Create Account</h4>
			<br>

			<?php if (isset($_GET['error'])) { ?>
				<div class="alert alert-danger" role="alert">
					<?php echo htmlspecialchars($_GET['error']); ?>
				</div>
			<?php } ?>

			<?php if (isset($_GET['success'])) { ?>
				<div class="alert alert-success" role="alert">
					<?php echo htmlspecialchars($_GET['success']); ?>
				</div>
				<script>
					// Redirect to login page after successful signup
					setTimeout(() => {
						window.location.href = 'loginfo.php';
					}, 2000); // 2-second delay
				</script>
			<?php } ?>

			<div class="mb-3">
				<label class="form-label">Full Name</label>
				<input type="text" class="form-control" name="fname" value="<?php echo isset($_GET['fname']) ? htmlspecialchars($_GET['fname']) : ''; ?>">
			</div>

			<div class="mb-3">
				<label class="form-label">User Name</label>
				<input type="text" class="form-control" name="uname" value="<?php echo isset($_GET['uname']) ? htmlspecialchars($_GET['uname']) : ''; ?>">
			</div>

			<div class="mb-3">
				<label class="form-label">Password</label>
				<input type="password" class="form-control" name="pass">
			</div>

			<button type="submit" class="btn btn-primary">Sign Up</button>
			<a href="loginfo.php" class="link-secondary">Already have an account? Login</a>
		</form>
	</div>
</body>

</html>