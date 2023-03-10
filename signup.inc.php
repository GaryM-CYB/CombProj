
<!DOCTYPE html>
<html>
  <head>
    <title>Signup Form</title>
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

// Escape user inputs for security
$club_soc = mysqli_real_escape_string($conn, $_POST['club_soc']);
$student_id = mysqli_real_escape_string($conn, $_POST['student_id']);
$phone_number = mysqli_real_escape_string($conn, $_POST['phone_number']);
$email = $_POST['email'];
$dob = $_POST['dob'];
$photo = addslashes(file_get_contents($_FILES['photo']['tmp_name']));
$med_dec = $_POST['med_dec'];
$med_con = $_POST['med_con'];
$doc_info = $_POST['doc_info'];

// Generate a random 16-bit key for AES-128-CTR encryption
$key = openssl_random_pseudo_bytes(16);

// Generate a random nonce for AES-128-CTR encryption
$nonce = openssl_random_pseudo_bytes(openssl_cipher_iv_length('AES-128-CTR'));

// Encrypt sensitive data with AES-128-CTR
$email_encrypted = openssl_encrypt($email, 'AES-128-CTR', $key, OPENSSL_RAW_DATA, $nonce);
$phone_number_encrypted = openssl_encrypt($phone_number, 'AES-128-CTR', $key, OPENSSL_RAW_DATA, $nonce);
$dob_encrypted = openssl_encrypt($dob, 'AES-128-CTR', $key, OPENSSL_RAW_DATA, $nonce);
$med_dec_encrypted = openssl_encrypt($med_dec, 'AES-128-CTR', $key, OPENSSL_RAW_DATA, $nonce);
$med_con_encrypted = openssl_encrypt($med_con, 'AES-128-CTR', $key, OPENSSL_RAW_DATA, $nonce);
$doc_info_encrypted = openssl_encrypt($doc_info, 'AES-128-CTR', $key, OPENSSL_RAW_DATA, $nonce);

// Insert the data into the database
$sql = "INSERT INTO signup (club_soc, student_id, phone_number, email, dob, photo, med_dec, med_con, doc_info)
VALUES ('$club_soc', '$student_id', '$phone_number_encrypted', '$email_encrypted', '$dob_encrypted', '$photo', '$med_dec_encrypted', '$med_con_encrypted', '$doc_info_encrypted')";

if (mysqli_query($conn, $sql)) {
	echo "New record created successfully";
} else {
	echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// Close the database connection
mysqli_close($conn);

?>
</body>
</html>
