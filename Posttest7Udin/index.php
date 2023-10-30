<?php
require "proses/koneksi.php";

if (isset($_POST["register"])) {
  $username = strtolower($_POST["username"]);
  $phone = $_POST["phone"];
  $pass = $_POST["password"];
  $konfirmasi = $_POST["konfirmasi"];
  $role = 'user';

  // Ubah true disini
  if ($pass === $konfirmasi) {
    // Ubah pass dan result disini
    $pass = password_hash($pass, PASSWORD_DEFAULT);
    $result = mysqli_query($koneksi, "SELECT username FROM users WHERE username = '$username' ");

    // Ubah true disini
    if (mysqli_fetch_assoc($result)) {
      echo "
          <script>
            alert('Username telah digunakan');
            document.location.href = 'index.php';
          </script>
        ";
    } else {
      // Ubah sql dan result disini
      $sql = "INSERT INTO users VALUES ('', '$role', '$username', '$phone', '$pass')";
      $result = mysqli_query($koneksi, $sql);

      if (mysqli_affected_rows($koneksi) > 0) {
        echo "
          <script>
            alert('Registrasi berhasil');
            document.location.href = 'index.php';
          </script>
        ";
      } else {
        echo "
          <script>
            alert('Registrasi gagal');
            document.location.href = 'index.php';
          </script>
        ";
      }
    }
  } else {
    echo "
        <script>
          alert('Password tidak sama');
          document.location.href = 'index.php';
        </script>
      ";
  }
}
?>

<?php
require "proses/koneksi.php";

session_start();

if (isset($_POST["login"])) {
  $username = strtolower($_POST["username"]);
  $pass = $_POST["password"];
  $role = $_POST["role"];

  // Modify the SQL query to check both username and role
  $result = mysqli_query($koneksi, "SELECT * FROM users WHERE username = '$username' AND role = '$role'");

  if (mysqli_num_rows($result) === 1) {
    $row = mysqli_fetch_assoc($result);

    // untuk login admin username = admin pass = admin
    if (password_verify($pass, $row['password'])) {
      $_SESSION["akses"] = $role;
      if ($role === 'admin') {
        header("location: halaman1/test.php");
      } else if ($role === 'user') {
        header("location: halaman2/index2.php");
      } else {
        echo "
          <script>
            alert('Invalid role');
            document.location.href = 'index.php';
          </script>
        ";
      }
      exit;
    } else {
      echo "
        <script>
          alert('Invalid username or password');
          document.location.href = 'index.php';
        </script>
      ";
    }
  } else {
    echo "
      <script>
        alert('Invalid username or password');
        document.location.href = 'index.php';
      </script>
    ";
  }
}
?>



<html>

<head>
  <title>Muhammad Khairrudin</title>
  <link rel="icon" href="gallery/logoo.png" type="image/x-icon">
  <link rel="stylesheet" href="css/cantik.css" />

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
    integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
    integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />



</head>

<body>
  <!-- Pop-up box -->
  <div id="popup" class="overlay">
    <div class="window">
      <a href="#" id="closePopup" class="close-button" title="Close">X</a>
      <h1>Selamat Datang di Situs Saya</h2>
        <p>Terima kasih telah mengunjungi situs web saya.</p>
    </div>
  </div>

  <div class="wrapper">

    <span class="icon-close">
      <ion-icon name="close"></ion-icon>
    </span>

    <div class="form-box login">
      <h2>LOGIN</h2>
      <form method="POST">
        <div class="input-box">
          <span class="icon"><ion-icon name="mail"></ion-icon></span>
          <input type="text" name="username" required>
          <label>Username</label>
        </div>
        <div class="input-box">
          <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
          <input type="password" name="password" required>
          <label>Password</label>
        </div>
        <div class="inputBoxx">
          <select name="role" class="roles" id="" required>
            <option value="">Select Role</option>
            <option value="admin">Admin</option>
            <option value="user">User</option>
          </select>
        </div>
        <div class="remember-forgot">
          <label><input type="checkbox">Remember Me</label>
          <a href="#">Forgot Password?</a>
        </div>
        <button type="submit" class="btnSubmit" name="login">LOGIN</button>
        <div class="login-register">
          <p>Don't have an account? <a href="#" class="register-link">Register</a></p>
        </div>
      </form>

    </div>

    <div class="form-box Register">
      <h2>Registration</h2>
      <form action="#" method="POST">
        <div class="input-box">
          <span class="icon"><ion-icon name="mail"></ion-icon></span>
          <input type="username" name="username" required>
          <label>Username</label>
        </div>
        <div class="input-box">
          <span class="icon"><ion-icon name="call"></ion-icon></span>
          <input type="number" name="phone" required>
          <label>Phone Number</label>
        </div>
        <div class="input-box">
          <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
          <input type="password" name="password" required>
          <label>Password</label>
        </div>
        <div class="input-box">
          <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
          <input type="password" name="konfirmasi" required>
          <label>Konfirmasi Password</label>
        </div>
        <div class="remember-forgot">
          <label><input type="checkbox">I aggre to the terms & conditions</label>

        </div>
        <button type="submit" class="btnSubmit" name="register">Register</button>
        <div class="login-register">
          <p>Already have an account? <a href="#" class="login-link">Login</a></p>
        </div>

        

      </form>




    </div>



  </div>










  <!-- NAVIGATION BAR -->
  <div class="navbar">
    <ul class="UL-navbar">
      <div class="logo">
        <a href="#"><img src="gallery/logoo.png" alt="Logo" /></a>
      </div>
      <li class="li-navbar">
        <a href="#" class="a-navbar">HOME</a>
      </li>
      <li class="li-navbar">
        <a href="halaman1/profil.html" class="a-navbar">PROFILE</a>
      </li>
      <li class="li-navbar">
        <a href="halaman1/classic.html" class="a-navbar">CLASSICS</a>
      </li>
      <li class="li-navbar">
        <a href="halaman1/gallery.html" class="a-navbar">GALLERY</a>
      </li>

      <li class="li-navbar">
        <div class="login-container">
          <button class="btnLogin-Popup">LOGIN</button>
        </div>
      </li>





    </ul>
    <div class="posisi">
      <div class="btn">
        <div class="btn_indicator">
          <div class="btn_icon-container">
            <i class="btn_icon fas "></i>
          </div>
        </div>
      </div>
    </div>

  </div>
  <!-- NAVIGATION BAR END -->


  <!-- CONTENT 1 -->

  <div class="content-1">

    <div class="memories">
      <h1 class="memo">Driving - <br> Memories</h1>
    </div>
    <div class="kotak-1">
      <h3 class="info">Info.</h3>
      <h2 class="dates">dates <br> from the <br> 90s</h2>
      <h3 class="cars">Cars</h3>
      <p class="desc">We only sell limited <br> production, limited edition <br> and special edition cars.</p>
    </div>

  </div>


  </div>

  <!-- CONTENT 1 END -->

  <!-- CONTENT 2 -->
  <div class="content-2">


    <a href="gallery.html" class="image-container">

      <img src="gallery/1.jpg" width="20%" alt="Gambar 1">
      <img src="gallery/2.jpg" width="20%" alt="Gambar 2">
      <img src="gallery/17.jpg" width="22%" alt="Gambar 3">
      <img src="gallery/4.jpg" width="20%" alt="Gambar 4">
      <img src="gallery/21.jpg" width="25%" alt="Gambar 5">
      <img src="gallery/22.jpg" width="20%" alt="Gambar 6">
      <img src="gallery/7.jpg" width="20%" alt="Gambar 7">
      <img src="gallery/8.jpg" width="30%" alt="Gambar 8">
      <img src="gallery/9.jpg" width="20%" alt="Gambar 9">
      <img src="gallery/10.jpg" width="20%" alt="Gambar 10">
      <img src="gallery/11.jpg" width="20%" alt="Gambar 11">
      <img src="gallery/12.jpg" width="20%" alt="Gambar 12">


      <div class="gallery">
        <h2 class="gal">WORLD GALLERY</h2>
      </div>
    </a>

    <a href="halaman1/bodykit.html" class="body">
      <img src="gallery/body.jpg" alt="Gambar">

      <div class="bodykit">
        <h2 class="kit">BODY KIT</h2>
      </div>

    </a>

    <a href="halaman1/classic.html" class="classic">
      <img src="gallery/Classics.jpg" alt="Gambar">

      <div class="clas">
        <h2 class="sic">CLASSISCS</h2>
      </div>

    </a>



  </div>
  <!-- CONTENT 2 END -->

  <!-- FOOTER -->
  <div class="container-footer">
    <div class="logo-footer">
      <a href="#"><img src="gallery/logoo.png" alt="Logo" /></a>
    </div>

    <div class="motivasi">
      <h3 class="motiv">Living, learning, & leveling up </h3>
    </div>

    <div class="kata">
      <h3 class="motiv">one day at a time. </h3>
    </div>

    <a href="https://www.instagram.com/mhmmd_khair122/" class="circle2">
      <div>
        <img src="gallery/ig.png" alt="Gambar Anda">
      </div>
    </a>

    <a href="https://wa.me/6281242709627" class="circle3">
      <div>
        <img src="gallery/wa.png" alt="Gambar Anda">
      </div>
    </a>

    <a href="mailto:khoirudin044@gmail.com" class="circle4">
      <div>
        <img src="gallery/email.png" alt="Gambar Anda">
      </div>
    </a>

    <div class="copy">
      <h3 class="craft">Handcrafted by me </h3>
    </div>

    <div class="copyright">
      <img src="gallery/copy.png" alt="copright">
    </div>

    <div class="nama">
      <h3 class="craft">Muhammad Khairrudin</h3>
    </div>



  </div>
  <!-- FOOTER END -->



  <script src="java/main2.js"></script>
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>