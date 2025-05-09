<?php
$servername = 'instagramapp.mysql.database.azure.com';
$username   = 'adminapp';
$password   = 'Adminapp@';
$dbname     = 'insta_db';

// Full path to your CA certificate on the server
$ssl_ca = __DIR__ . '/ssl/DigiCertGlobalRootCA.crt.pem';

// Init mysqli
$conn = mysqli_init();

// Optional: Verify the server's certificate
mysqli_options($conn, MYSQLI_OPT_SSL_VERIFY_SERVER_CERT, true);

// Set SSL certificate options (CA only, no client cert or key)
mysqli_ssl_set($conn, NULL, NULL, $ssl_ca, NULL, NULL);

// Establish secure connection
if (!mysqli_real_connect($conn, $servername, $username, $password, $dbname, 3306, NULL, MYSQLI_CLIENT_SSL)) {
    die("Secure connection failed: " . mysqli_connect_error());
}
?>
