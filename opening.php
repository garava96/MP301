<?php 
	session_start();
	if (!$user['identity'])
	{
		$s = file_get_contents('http://ulogin.ru/token.php?token=' . $_POST['token'] . '&host=' . $_SERVER['HTTP_HOST']);
		$user = json_decode($s, true);
		//var_dump($user);
		$identity=$user['identity']; $f_name = $user['first_name']; $l_name = $user['last_name']; 
		include 'connection.php'; 
		$mysqli = new mysqli($host, $user, $password, $database);
		$sql="INSERT INTO 'Users'('id_user', 'first_name', 'last_name') VALUES (" + $identity + "," + $f_name + "," + $l_name +")";
		$sql1="SELECT 1 FROM 'Users' WHERE 'id_user'=" + $identity + "LIMIT 1";
		$wordExists = mysqli_query($mysqli, $sql1);
		if (! $wordExists) 
			$res=mysqli_query($mysqli, $sql);
	}
	if (isset($user))
	{
		$_SESSION['user'] = $user;
	}
	mysqli_close($mysqli);
?>