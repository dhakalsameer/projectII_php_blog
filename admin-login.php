<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Admin Login</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
	<style>
		/* Background Styling */
		body {
			background: linear-gradient(135deg, #1c1c1c, #581845);
			font-family: 'Poppins', sans-serif;
			color: #fff;
			height: 100vh;
			margin: 0;
			display: flex;
			justify-content: center;
			align-items: center;
			overflow: hidden;
		}

		/* Card Styling */
		.card {
			background: rgba(0, 0, 0, 0.8);
			border-radius: 20px;
			box-shadow: 0 15px 30px rgba(0, 0, 0, 0.5);
			width: 100%;
			max-width: 400px;
			padding: 30px;
			animation: fadeIn 1s ease-out;
			position: relative;
			z-index: 1;
		}

		/* Form Header */
		h4 {
			font-size: 2rem;
			color: #e83e8c;
			font-weight: bold;
			text-align: center;
			margin-bottom: 5px;
		}

		p {
			text-align: center;
			color: #ddd;
			font-size: 0.9rem;
			margin-bottom: 20px;
		}

		/* Input Styling */
		.form-control {
			border-radius: 10px;
			border: none;
			padding: 12px;
			background: rgba(255, 255, 255, 0.2);
			color: #fff;
			box-shadow: inset 0 2px 5px rgba(0, 0, 0, 0.1);
		}

		.form-control:focus {
			border-color: #e83e8c;
			box-shadow: 0 0 10px rgba(232, 62, 140, 0.5);
			background: rgba(255, 255, 255, 0.3);
		}

		/* Button Styling */
		.btn-primary {
			background: linear-gradient(90deg, #e83e8c, #581845);
			border: none;
			border-radius: 10px;
			padding: 10px;
			font-size: 1rem;
			font-weight: bold;
			text-transform: uppercase;
			color: #fff;
			box-shadow: 0 5px 15px rgba(232, 62, 140, 0.4);
			transition: all 0.3s ease;
			width: 100%;
		}

		.btn-primary:hover {
			transform: translateY(-3px);
			box-shadow: 0 8px 20px rgba(232, 62, 140, 0.6);
		}

		/* Alert Styling */
		.alert-danger {
			border-radius: 10px;
			text-align: center;
			font-size: 0.9rem;
			margin-bottom: 15px;
			background: rgba(232, 62, 140, 0.1);
			color: #e83e8c;
		}

		/* Link Styling */
		.link-secondary {
			display: block;
			text-align: center;
			margin-top: 15px;
			font-size: 0.9rem;
			color: #ccc;
			text-decoration: none;
			transition: color 0.3s ease, transform 0.3s ease;
		}

		.link-secondary:hover {
			color: #e83e8c;
			transform: scale(1.1);
		}

		/* Animations */
		@keyframes fadeIn {
			from {
				opacity: 0;
				transform: translateY(-10px);
			}

			to {
				opacity: 1;
				transform: translateY(0);
			}
		}
	</style>
</head>

<body>
	<div class="card">
		<form action="admin/admin-login.php" method="post">
			<h4 class="display-4 fs-1">Admin Login</h4>
			<p>Exclusive access for administrators</p>

			<?php if (isset($_GET['error'])) { ?>
				<div class="alert alert-danger" role="alert">
					<?php echo htmlspecialchars($_GET['error']); ?>
				</div>
			<?php } ?>

			<div class="mb-3">
				<label class="form-label">User Name</label>
				<input type="text"
					class="form-control"
					name="uname"
					value="<?php echo (isset($_GET['uname'])) ? htmlspecialchars($_GET['uname']) : ''; ?>">
			</div>

			<div class="mb-3">
				<label class="form-label">Password</label>
				<input type="password" class="form-control" name="pass">
			</div>

			<button type="submit" class="btn btn-primary">Login</button>
			<a href="loginfo.php" class="link-secondary">User Login</a>
		</form>
	</div>
</body>

</html>