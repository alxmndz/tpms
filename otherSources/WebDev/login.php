<?php
session_start();
include "dbconn.php";

if(isset($_POST['uname']) && isset($_POST['password'])){

	function validate($data){
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

	$uname = validate($_POST['uname']);
	$pass = validate($_POST['password']);

	if(empty($uname)) {
		header("Location: loginform.php?error=Required to fillup this username tab.");
		exit();
	}else if(empty($pass)){
		header("Location: loginform.php?error=Required to fillup this password tab.");
		exit();
	}else{
		//encrypting the code for more security
		$pass = md5($pass);
		
		$sql = "SELECT * FROM users WHERE user_name = '$uname' AND password = '$pass'";

		$result = mysqli_query($conn, $sql);

		if(mysqli_num_rows($result) === 1){
			$row = mysqli_fetch_assoc($result);
			if ($row['user_name'] === $uname && $row['password'] === $pass){
				$_SESSION['user_name'] = $row['user_name'];
				$_SESSION['role'] = $row['role'];
				$_SESSION['id'] = $row['id'];

				// $sql2 = "SELECT * FROM user_info WHERE userInfo_ID = '$uname' AND password = '$pass'";

				if ($_SESSION['role']==="customer") {
					header("Location: customer.php");
					exit();
				}elseif ($_SESSION['role']==="admin") {
					header("Location: dashboard.php");
					exit();
				}else{
				header("Location: loginform.php?error=Incorrect user or password input.");
				exit();
				}
			}else{
				header("Location: loginform.php?error=Incorrect user or password input.");
				exit();
				}
		}else{
			header("Location: loginform.php?error=Incorrect user or password input.");
			exit();
		}
	}

}else{
	header("Location: loginform.php");
	exit();
}