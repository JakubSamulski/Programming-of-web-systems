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
        isset($_POST['login']) && !empty($_POST['username'])
        && !empty($_POST['password'])
      ) {

        if (
          $_POST['username'] == 'pawel' &&
          $_POST['password'] == 'pawel'
        ) {
          $_SESSION['valid'] = true;
          $_SESSION['timeout'] = time();
          $_SESSION['username'] = 'pawel';

          $msg = 'You have entered valid use name and password';
          header('Location: home.php');
        } else {
          $msg = 'Wrong username or password';
        }
      } elseif ($_SESSION['loggedOut'] == true) {
        $msg = 'You logged out successfully';
        unset($_SESSION['loggedOut']);
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