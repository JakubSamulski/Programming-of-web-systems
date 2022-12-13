<?php
ob_start();
session_start();
?>

<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_SESSION['loggedOut'] == true) {
  $username = $_POST['username'];
  $password = $_POST['password'];
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $conn = mysqli_connect("localhost", "root", "", "game_app_database");
  $sql = "INSERT INTO users (Username, Password, FirstName, LastName) VALUES ('$username', '$password', '$firstname', '$lastname')";
  mysqli_query($conn, $sql);
  mysqli_close($conn);
} elseif ($_SERVER['REQUEST_METHOD'] == 'POST' && $_SESSION['loggedOut'] == false) {
  $username = $_POST['username'];
  $password = $_POST['password'];
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $conn = mysqli_connect("localhost", "root", "", "game_app_database");
  $sql = "UPDATE users SET Username = '$username', Password = '$password', FirstName = '$firstname', LastName = '$lastname' WHERE Username = '$username'";
  mysqli_query($conn, $sql);
  mysqli_close($conn);
} elseif ($_SESSION['loggedOut'] == false) {
  $conn = mysqli_connect("localhost", "root", "", "game_app_database");
  $username = $_SESSION['username'];
  $result = mysqli_query($conn, "SELECT * FROM users WHERE Username = '$username'");
  $row = mysqli_fetch_assoc($result);
  $password =  $row['Password'];
  $firstname =  $row['FirstName'];
  $lastname =  $row['LastName'];
  mysqli_close($conn);
}
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
      <input type="text" name="username" value="<?php echo $username ?>" required />

      <label for="fname"><b>First name</b></label>
      <input type="text" name="firstname" value="<?php echo $firstname ?>" required />

      <label for="lname"><b>Last name</b></label>
      <input type="text" name="lastname" value="<?php echo $lastname ?>" required />

      <label for="psw"><b>Password</b></label>
      <input type="password" name="password" value="<?php echo $password ?>" required />

      <button type="submit" name="login">Register</button>
    </div>
  </form>
</body>

</html>