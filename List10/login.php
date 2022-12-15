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
    <h2>Login form</h2>
    <div class="imgcontainer">
      <img src="images/img_avatar2.png" alt="Avatar" class="avatar" />
    </div>

    <div>
      <?php
      $msg = '';

      if (
        !empty($_POST['username'])
        && !empty($_POST['password'])
      ) {
        $conn = mysqli_connect("localhost", "root", "", "game_app_database");
        $username = $_POST['username'];
        $result = mysqli_query($conn, "SELECT * FROM users WHERE Username = '$username'");
        $row = mysqli_fetch_assoc($result);
        $password =  $row['Password'];
        
        if (!$result) {
          $msg = 'Wrong username or password';
        }
        else {
          if ($_POST['password'] == $password) {
            $_SESSION['valid'] = true;
            $_SESSION['timeout'] = time();
            $_SESSION['username'] = $username;
  
            $msg = 'You have entered valid use name and password';
            $_SESSION['loggedOut'] = false;
            header('Location: home.php');
          } else {
            $msg = 'Wrong username or password';
          }
        }
        mysqli_close($conn);
      } elseif ($_SESSION['loggedOut'] == true) {
        $msg = 'You logged out successfully';
      }
      echo $msg;
      ?>
    </div>

    <div class="container">
      <label for="uname"><b>Username</b></label>
      <input type="text" placeholder="Enter Username" name="username" required />

      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="password" required />

      <button type="submit" name="login">Login</button>
      <a href="registration-edit.php">You don't have an account? Register now!</a>
    </div>
  </form>
</body>

</html>