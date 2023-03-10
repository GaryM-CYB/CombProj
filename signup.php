<!DOCTYPE html>
<html>
<head>
	<title>Sign Up Form</title>
	<link href="stylesheet.css">
</head>
<body>
  <h1>NOTICE: By proceeding with the form, you are consenting to the collection, processing and storage of the personal data you insert!</h1>
	<h2>Sign Up</h2>
	<form action="signup.inc.php" method="post" enctype="multipart/form-data">

		<label for="club_soc">Club/Society:</label>
		<input type="text" name="club_soc" required><br><br>

		<label for="student_id">Student ID:</label>
		<input type="text" name="student_id" required><br><br>

		<label for="phone_number">Phone Number:</label>
		<input type="int" name="phone_number" required><br><br>

		<label for="email">Email:</label>
		<input type="email" name="email" required><br><br>

		<label for="dob">Date of Birth:</label>
		<input type="date" name="dob" required><br><br>

		<label for="photo">Photo:</label>
		<input type="file" name="photo" accept="image/*" required><br><br>

		<label for="med_dec">Medical Declaration (Yes/No):</label>
		<input type="text" name="med_dec" required><br><br>

		<label for="med_con">Medical Condition:</label>
		<input type="text" name="med_con" required><br><br>

		<label for="doc_info">Doctor Informaiton:</label>
		<input type="text" name="doc_info" required><br><br>


		<input type="submit" value="Sign Up">
	</form>
</body>
</html>
