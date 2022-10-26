<?php 
session_start();
if(isset($_SESSION['id'])){
  header('location:employee.php');
  exit;
}
if(isset($_COOKIE['remember'])){
  $id = $_COOKIE['remember'];
  require 'connect.php';
  $sql = "select * from user where id = '$id'";
  $result =mysqli_query($connect,$sql);
  $each = mysqli_fetch_array($result);
  $_SESSION['id']= $each['id'];
  $_SESSION['username']= $each['username'];
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login UI</title>
    <link rel="shortcut icon" href="login_image.jpg" type="image/x-icon" />
    <link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"
      integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm"
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
    />
    <link
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
      integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
      crossorigin="anonymous"
    />
    <script
      src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
      integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
      integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
      integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
      crossorigin="anonymous"
    ></script>
    <link rel="stylesheet" href="./assets/css/style.css" />
  </head>
  <body>
   
    <section class="box">
      <div class="design">
        <div></div>
        <div></div>
        <div></div>
        <div></div>
      </div>
      <div class="form">
        <h2>User Login</h2>
        <form class="form-login" method="post" action="process_login.php">
        <?php if(isset($_GET['error'])){ ?>
             <p style="color:red"><?php  echo $_GET['error'];?></p>
        <?php    }?>
          <input
            type="text"
            name="username"
            class="input-field"
            placeholder="Username"
          />
          <div style="width: 300px; display: flex">
            <input
              type="password"
              name="password"
              class="input-field"
              placeholder="Password"
              id="password"
            />
            <i
              class="fas fa-eye"
              style="margin-top: 22px; margin-left: -30px"
              id="togglePassword"
            ></i>
          </div>
          <input type="submit" class="btn" value="LOGIN" />
          Remember password <input type="checkbox" name="remember"> 
          <p>If you don't have account, Click blow</p>
          <i class="fas fa-arrow-down" style="margin-top: -10px"></i>
          <button href="#" type="button" class="btn js-buy-ticket">
            REGISTER
          </button>
     
        </form>
      </div>
    </section>
    
    <form action="process_reg.php"  method="post" class="modal js-modal register-btn">
      <div class="modal-container js-modal-container">
        <div class="modal-close js-modal-close">
          <i class="fas fa-times"></i>
        </div>

        <header class="modal-header">
          <i class="fas fa-registered" style="margin-right: 10px"></i>
          REGISTER
        </header>
        <form action="process_reg.php">
        <div class="modal-body">
        <?php if(isset($_GET['error'])){ ?>
             <p style="color:red"><?php  echo $_GET['error'];?></p>
        <?php    }?>
          <label class="modal-label">
            <i class="fas fa-user"></i>
            Username
          </label>

          <input
            type="text"
            name="username1"
            class="modal-input"
            placeholder="Username"
          />
          <label class="modal-label">
            <i class="fas fa-key"></i>
            Password
          </label>
          <input
            type="password"
            name="password1"
            class="modal-input"
            placeholder="Password"
          />
          <input type="submit" id="buy-tickets" value="Accept" />

          
          <!-- <button id="buy-tickets" type="submit">
            Accept
            <i class="fas fa-check"></i>
          </button> -->
        </div>
        </form>
      </div>
    </form>
    <script>
      const togglePassword = document.querySelector("#togglePassword");
      const password = document.querySelector("#password");

      togglePassword.addEventListener("click", function () {
        // toggle the type attribute
        const type =
          password.getAttribute("type") === "password" ? "text" : "password";
        password.setAttribute("type", type);

        // toggle the icon
        this.classList.toggle("bi-eye");
      });
    </script>
    <script src="./assets/js/modal.js"></script>
  </body>
</html>
