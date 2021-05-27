<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <title>UBLC</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <link rel="stylesheet" type="text/css" media="screen" href="css/login.css" />



  <script src="js/admin.js"></script>
</head>

<body>
  <div class="modal">
    <input type='radio' checked id="toggle--login" name="toggle" hidden>


    <!--handle validating which form version to show -->
    <div>
      <?php require 'controller/Login.php'; ?>
      <img class="logo" src="img/logo2.png" />

      <form class="form form--login framed" action="" method="post">
        <?php
if (isset($_SESSION['errors'])) {

    echo '<div class="alert alert-danger" role="alert"><p>'
        . $_SESSION['errors'] . '</p></div> <br>';

}
?>
        <input name="uname" type="text" placeholder="Username or ID" class='input input--top' required />
        <input name="pword" type="password" placeholder="Password" class='input' required />
        <input type="submit" name="Login" class="input input--submit" value="Login" />
      </form>
    </div>
  </div>
  <div class="faded"></div>
  <div class="fullscreen-bg"></div>
</body>

</html>