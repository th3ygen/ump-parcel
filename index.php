<?php
/* 
    author: MUHAMMAD AIDIL SYAZWAN BIN HAMDAN CA19144
    MODULE 1
*/

session_start();

include('./config.php');

if (isset($_SESSION['userid'])) {
  switch ($_SESSION['role']) {
    case 'user':
      switch ($_SESSION['job']) {
        case 'student':
          return header('Location: ' . URL . '/recipient/goodlist1.php');
        case 'warden':
          return header('Location: ' . URL . '/collection');
        case 'officier':
          return header('Location: ' . URL . '/arrival');
        default:
          return header('Location: ' . URL . '/recipient/goodlist1.php');
      }
    case 'admin':
      return header('Location: ' . URL . '/admin/dashboard.php');
    default:
      break;
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>UMP Parcel | Login</title>

  <!-- <script src="https://kit.fontawesome.com/35298e8662.js" crossorigin="anonymous"></script> -->
  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet" />
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
  <!-- MDB -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.5.0/mdb.min.css" rel="stylesheet" />

  <link rel="stylesheet" href="./styles/global.css" />
  <link rel="stylesheet" href="./styles/login.css">
</head>

<body>
  <?php
  $remember = (isset($_COOKIE['remember']) ? $_COOKIE['remember'] : '');
  $username = (isset($_COOKIE['remember_username']) ? $_COOKIE['remember_username'] : '');
  $password = (isset($_COOKIE['remember_password']) ? $_COOKIE['remember_password'] : '');
  ?>

  <div class="wrappers">
    <div class="stripes">
      <div class="grp-1">
        <div></div>
        <div></div>
        <div></div>
      </div>
      <div class="stripe-1"></div>
    </div>

    <div class="box">
      <div class="logo"><img src="./res/logo/Logo UMP-Official.png" alt="" /></div>

      <section class="svg">
        <lottie-player src="./res/lottie-anim/boxes_login.json" background="transparent" speed="1" style="width: 80%;" loop autoplay></lottie-player>
      </section>
      <section class="login">
        <div class="heading">
          <h1>Welcome back!</h1>
          <h4>Login to access the parcel management system</h4>
        </div>
        <div class="body">
          <!-- 
              Login
              -username
              -password
              -remember (cookie)
             -->
          <form action="./api/auth/login.php" method="POST">
            <div class="creds">
              <div class="input">
                <i class="fas fa-user"></i>
                <label for="">Username</label>
                <input type="text" name="username" value="<?php echo $username; ?>">
              </div>
              <div class="input">
                <i class="fas fa-key"></i>
                <label for="">Password</label>
                <input type="password" name="password" value="<?php echo $password; ?>">
              </div>
            </div>
            <div class="sideactions">
              <div class="action">
                <input type="checkbox" name="remember" id="remember" value="yes" <?php echo ($remember == 'true' ? 'checked' : '') ?>>
                <label for="remember">Remember me</label>
              </div>
            </div>
            <div class="actions">
              <input type="submit" class="btn-login" value="Login" />

            </div>
          </form>
        </div>
      </section>
    </div>
  </div>

  <!-- JQuery -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <!-- MDB -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.5.0/mdb.min.js"></script>
  <!-- LottieFiles -->
  <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

  <!-- custom scripts -->
  <script>
    window.onload = async () => {
      if (window.location.search === '?error=401') {
        await swal({
          title: "Error",
          text: "Invalid credential",
          icon: "error",
          buttons: true
        });

        window.location.href = './login.php';
      }

      $('.creds > .input > input').each((x, e) => {
        if ($(e).val() !== '') {
          $(e).closest('div').find('label').addClass('focus');
        }
      });

      $('.creds > .input > input').focus($e => {
        $($e.target).closest('div').find('label').addClass('focus');
      });
      $('.creds > .input > input').blur($e => {
        if ($($e.target).val() === '') {
          $($e.target).closest('div').find('label').removeClass('focus');
        }
      });
    };
  </script>
</body>

</html>