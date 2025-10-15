<?php

if (isset($_POST['fname']) && isset($_POST['uname']) && isset($_POST['pass'])) {

	include "../db_conn.php";

	$fname = $_POST['fname'];
	$uname = $_POST['uname'];
	$pass = $_POST['pass'];

	$data = "fname=" . $fname . "&uname=" . $uname;

	if (empty($fname)) {
		$em = "Full name is required";
		header("Location: ../signup.php?error=$em&$data");
		exit;
	} else if (empty($uname)) {
		$em = "User name is required";
		header("Location: ../signup.php?error=$em&$data");
		exit;
	} else if (empty($pass)) {
		$em = "Password is required";
		header("Location: ../signup.php?error=$em&$data");
		exit;
	} else {
		// Check if the username already exists in the database
		$sql = "SELECT * FROM users WHERE username = ?";
		$stmt = $conn->prepare($sql);
		$stmt->execute([$uname]);
		$user = $stmt->fetch(PDO::FETCH_ASSOC);

		if ($user) {
			// Username already exists, return an error
			$em = "Username is already taken. Please choose another one.";
			header("Location: ../signup.php?error=$em&$data");
			exit;
		} else {
			// Hash the password
			$pass = password_hash($pass, PASSWORD_DEFAULT);

			// Insert the new user into the database
			$sql = "INSERT INTO users(fname, username, password) VALUES(?,?,?)";
			$stmt = $conn->prepare($sql);
			$stmt->execute([$fname, $uname, $pass]);

			header("Location: ../index.php?success=Your account has been created successfully");
			exit;
		}
	}
} else {
	header("Location: ../index.php?error=error");
	exit;
}
