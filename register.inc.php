<!DOCTYPE html>
<html>
  <head>
    <title>Registration Form</title>
    <link rel="stylesheet" href="stylesheet.css">
  </head>
  <body>
    
<?php
// Connect to the database
$servername = "localhost";
$username = "ClubsSocReg";
$password = "SigninPass1!";
$dbname = "clubsandsoc";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Retrieve the values submitted via the form
$username = $_POST['username'];
$password = $_POST['password'];

// Generate a random 16-bit key for AES-128-CTR encryption
$key = openssl_random_pseudo_bytes(16);

// Encrypt the username using AES-128-cbc encryption
$ivlen = openssl_cipher_iv_length($cipher="AES-128-CBC");
$iv = openssl_random_pseudo_bytes($ivlen);
$encrypted_username = openssl_encrypt($username, $cipher, $key, $options=0, $iv);

// Hash and salt the password using sha256 and a random salt
$salt = bin2hex(random_bytes(16));
$hashed_password = hash("sha256", $password . $salt);

// Insert the user's information into the database
$sql = "INSERT INTO register (username, password, my_key, iv, salt) VALUES ('$encrypted_username', '$hashed_password', '$key', '$iv', '$salt')";

if (mysqli_query($conn, $sql)) {
    echo "Registration successful!";
    echo '<form action="signup.php">';
    echo '<button type="submit">Signup</button>';
    echo '</form>';
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// Close the database connection
mysqli_close($conn);
?>
</body>
</html>
