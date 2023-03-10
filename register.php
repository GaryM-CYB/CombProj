<!DOCTYPE html>
<html>
  <head>
    <title>Registration Form</title>
    <link rel="stylesheet" href="stylesheet.css">
  </head>
  <body>

    <h1>NOTICE: By proceeding with the form, you are consenting to the collection, processing and storage of the personal data you insert!</h1>
    <h2>Registration Form</h2>
    <form action="register.inc.php" method="post">
      <label for="username">Username:</label>
      <input type="text" name="username" id="username"><br>

      <label for="password">Password:</label>
      <input type="password" name="password" id="password"><br>

      <input type="submit" value="Register">
    </form>
  </body>
</html>
