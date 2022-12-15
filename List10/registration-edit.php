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

  <?php

  function runQuery($sql)
  {
    $conn = mysqli_connect("localhost", "root", "", "game_app_database");
    if (mysqli_query($conn, $sql)) {
      return "Record updated successfully";
    } else {
      return "Error updating record: " . mysqli_error($conn);
    }
  }


  $msg = "";
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];

    if ($_SESSION['loggedOut'] == true) {

      $conn = mysqli_connect("localhost", "root", "", "game_app_database");
      $result = mysqli_query($conn, "SELECT * FROM users WHERE Username = '$username'");
      $row = mysqli_fetch_array($result);
      mysqli_close($conn);
      if ($row['Username'] == $username) {
        $msg = "Username already exists";
      } else {
        $sql = "INSERT INTO users (Username, Password, FirstName, LastName) VALUES ('$username', '$password', '$firstname', '$lastname')";
        runQuery($sql);
      }
    } else {
      $currentUser = $_SESSION['username'];
      $sql = "UPDATE users SET Username = '$username', Password = '$password', FirstName = '$firstname', LastName = '$lastname' WHERE Username = '$currentUser'";
      $msg = runQuery($sql);
      $_SESSION['username'] = $username;
    }
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

  <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);
                ?>" method="post">
    <h2>Registration form</h2>
    <p><?php echo $msg ?></p>
    <div class="container">
      <label for="uname"><b>Username</b></label>
      <input type="text" name="username" value="<?php echo $username ?>" required />

      <label for="fname"><b>First name</b></label>
      <input type="text" name="firstname" value="<?php echo $firstname ?>" required />

      <label for="lname"><b>Last name</b></label>
      <input type="text" name="lastname" value="<?php echo $lastname ?>" required />

      <label for="psw"><b>Password</b></label>
      <input type="password" name="password" value="<?php echo $password ?>" required />

      <button type="submit" name="register">Register</button>
    </div>
  </form>
</body>

</html>