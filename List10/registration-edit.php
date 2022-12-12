<?php
ob_start();
session_start();
?>

<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" href="css/login.css" />
</head>

<body>
  <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);
                ?>" method="post">
    <h2>Registration form</h2>

    <div class="container">
      <label for="uname"><b>Username</b></label>
      <input type="text" placeholder="Enter Username" name="username" required />

      <label for="fname"><b>First name</b></label>
      <input type="text" placeholder="Enter First name" name="firstname" required />

      <label for="lname"><b>Last name</b></label>
      <input type="text" placeholder="Enter Last name" name="lastname" required />

      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="password" required />

      <button type="submit" name="login">Register</button>
    </div>
  </form>

  <?php //Na razie basic insert
  $conn = mysqli_connect("localhost", "root", "", "game_app_database");

  $username = $_POST['username'];
  $password = $_POST['password'];
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];

  $sql = "INSERT INTO users (Username, Password, FirstName, LastName) VALUES ('$username', '$password', '$firstname', '$lastname')";
  echo mysqli_query($conn, $sql);

  mysqli_close($conn); ?>


</body>

</html>