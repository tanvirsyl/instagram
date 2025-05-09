<?php

	$servername = 'instagramapp.mysql.database.azure.com';
	$user 		= 'adminapp';
	$pass 		= 'Adminapp@';
	$db 		= 'insta_db';
	$conn 		= mysqli_connect($servername, $user, $pass, $db);


	$ssl_ca = _DIR_ . '/ssl/DigiCertGlobalRootCA.crt.pem';

	// Establish connection
	$conn = mysqli_init();
	mysqli_options($conn, MYSQLI_OPT_SSL_VERIFY_SERVER_CERT, true);
	mysqli_ssl_set(
		$conn,
		NULL,  // No client key
		NULL,  // No client certificate
		$ssl_ca,
		NULL,  // No CA path
		NULL   // No cipher
	);

	if (!mysqli_real_connect($conn, $hostname, $username, $password, $dbname, 3306, NULL, MYSQLI_CLIENT_SSL)) {
		die("Connection failed: " . mysqli_connect_error());
	}
	
	// if(!$conn){
	// 	die("").'<br>';
	// }
?>

