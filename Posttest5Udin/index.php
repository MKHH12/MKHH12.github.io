<?php
$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $password = $_POST["password"];
    
    $message = "<strong>Data yang telah regist: </strong> ".
               "<br><strong>Email:</strong> " . htmlspecialchars($email) .
               "<br><strong>Phone:</strong> " . htmlspecialchars($phone) .
               "<br><strong>Password:</strong> " . htmlspecialchars($password);

    // Set session variable to indicate successful registration
    $_SESSION['registration_successful'] = true;
}

// Check if registration was successful and show the pop-up
if (isset($_SESSION['registration_successful'])) {
    echo "<script>document.getElementById('popup').style.display = 'block';</script>";
}

?>


<html>
<head>
    <title>Muhammad Khairrudin</title>
    <link rel="icon" href="logoo.png" type="image/x-icon">
    <link rel="stylesheet" href="cantik.css" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" 
    integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />


    
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
        <form action="#">
          <div class="input-box">
            <span class="icon"><ion-icon name="mail"></ion-icon></span>
            <input type="email" required>
            <label>Email</label>
          </div>
          <div class="input-box">
            <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
            <input type="password" required>
            <label>Password</label>
          </div>
          <div class="remember-forgot">
            <label><input type="checkbox">Remember Me</label>
            <a href="#">Forgot Password?</a>
          </div>
          <button type="submit" class="btnSubmit">LOGIN</button>
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
            <input type="email" name="email" required>
            <label>Email</label>
          </div>
          <div class="input-box">
            <span class="icon"><ion-icon name="call"></ion-icon></span>
            <input type="number"  name="phone" required>
            <label>Phone Number</label>
          </div>
          <div class="input-box">
            <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
            <input type="password" name="password" required>
            <label>Password</label>
          </div>
          <div class="remember-forgot">
            <label><input type="checkbox">I aggre to the terms & conditions</label>
            
          </div>
          <button type="submit" class="btnSubmit">Register</button>
          <div class="login-register">
            <p>Already have an account? <a href="#" class="login-link">Login</a></p>
          </div>
          
          <div  class="result">
            <p><?php echo $message ?></p>
          </div>

        </form>

        
    
        
      </div>


      
    </div>
      
    





 


    <!-- NAVIGATION BAR -->
    <div class="navbar">
      <ul class="UL-navbar">
        <div class="logo">
          <a href="#"><img src="logoo.png" alt="Logo" /></a>
        </div>
        <li class="li-navbar">
          <a href="#" class="a-navbar">HOME</a>
        </li>
        <li class="li-navbar">
          <a href="profil.html" class="a-navbar">PROFILE</a>
        </li>
        <li class="li-navbar">
          <a href="classic.html" class="a-navbar">CLASSICS</a>
        </li>
        <li class="li-navbar">
            <a href="gallery.html" class="a-navbar">GALLERY</a>
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
      
        <img src="1.jpg" width="20%"  alt="Gambar 1">
        <img src="2.jpg" width="20%"  alt="Gambar 2">
        <img src="17.jpg" width="22%"  alt="Gambar 3">
        <img src="4.jpg" width="20%"  alt="Gambar 4">
        <img src="21.jpg" width="25%"  alt="Gambar 5">
        <img src="22.jpg" width="20%"  alt="Gambar 6">
        <img src="7.jpg" width="20%"  alt="Gambar 7">
        <img src="8.jpg" width="30%"  alt="Gambar 8">
        <img src="9.jpg" width="20%"  alt="Gambar 9">
        <img src="10.jpg" width="20%"  alt="Gambar 10">
        <img src="11.jpg" width="20%"  alt="Gambar 11">
        <img src="12.jpg" width="20%"  alt="Gambar 12">        
       

        <div class="gallery">
          <h2 class="gal">WORLD GALLERY</h2>
        </div>
      </a>  
      
    <a href="bodykit.html" class="body">
      <img src="body.jpg" alt="Gambar">
      
      <div class="bodykit">
        <h2 class="kit">BODY KIT</h2>
      </div>

    </a>
    
    <a href="classic.html" class="classic">
      <img src="Classics.jpg" alt="Gambar">
      
      <div class="clas">
        <h2 class="sic">CLASSISCS</h2>
      </div>

    </a>

  

        </div>
    <!-- CONTENT 2 END -->

    <!-- FOOTER -->
    <div class="container-footer">
      <div class="logo-footer">
        <a href="#"><img src="logoo.png" alt="Logo" /></a> 
      </div>
      
      <div class="motivasi">
        <h3 class="motiv">Living, learning, & leveling up </h3>
      </div>

      <div class="kata">
        <h3 class="motiv">one day at a time. </h3>
      </div>

      <a href="https://www.instagram.com/mhmmd_khair122/" class="circle2">
        <div>
          <img src="ig.png" alt="Gambar Anda">
        </div>
      </a>
      
      <a href="https://wa.me/6281242709627" class="circle3">
        <div>
          <img src="wa.png" alt="Gambar Anda">
        </div>
      </a>

      <a href="mailto:khoirudin044@gmail.com" class="circle4">
        <div>
          <img src="email.png" alt="Gambar Anda">
        </div>
      </a>

      <div class="copy">
        <h3 class="craft">Handcrafted by me </h3>
      </div>

      <div class="copyright">
        <img src="copy.png" alt="copright">
      </div>

      <div class="nama">
        <h3 class="craft">Muhammad Khairrudin</h3>
      </div>
      


    </div>
    <!-- FOOTER END -->

  

    <script src="main2.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
  </body>
</html>
