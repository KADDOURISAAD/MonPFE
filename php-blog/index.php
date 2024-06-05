<?php
   session_start();
   if(isset($_SESSION['auth'])) {
    if(!isset($_SESSION['message'])) {
        $_SESSION['message'] = "You are already logged in";
    }
    
    header("Location: index__.php");
    exit(0);
   }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
    <link rel="stylesheet" href="assets/css/styl.css" />
    <title>Departement informatique</title>
  </head>

  <body>  
  <?php include('loginmess.php'); ?>
    <br><br>
    <div class="container" id="container">

      <div class="form-container sign-up">
        <form action="logincode.php" method="POST">
          <h1>Admin Login</h1>
          <input type="email" name="email" placeholder="Email" required />
          <input type="password" name="password" placeholder="Password" required />
          <button type="submit" name="login_btn_admin" class="btn btn-primary">Login To Dashboard</button>
        </form>
      </div>
      <div class="form-container sign-in">
        <form action="logincode.php" method="POST">
        <h1 >Login</h1>
          <h1 >Student/Teacher</h1>
          <br>
        
          
          <input type="email" name="email" placeholder="Enter email Address" required />
          <input type="password" name="password" placeholder="Enter password" required />
          <a href="#">Forget Your Password?</a>
          <button type="submit" name="login_btn" class="btn btn-primary">Login Now</button>
        </form>
      </div>
      <div class="toggle-container">
        <div class="toggle">
          <div class="toggle-panel toggle-left">
            <h1>Welcome Back!</h1>
            <p>Switch to Student/Teacher Login</p>
            <button class="hidden" id="login">Click Here</button>
          </div>
          <div class="toggle-panel toggle-right">
            <h1>Computer Science Department</h1>
            <p>
              Sign in to view more information
              
            </p>
            <button class="hidden" id="register">Admin Login</button>
          </div>
        </div>
      </div>
    </div>

    <script>
      const container = document.getElementById("container");
      const registerBtn = document.getElementById("register");
      const loginBtn = document.getElementById("login");

      registerBtn.addEventListener("click", () => {
        container.classList.add("active");
      });

      loginBtn.addEventListener("click", () => {
        container.classList.remove("active");
      });
    </script>
  </body>
</html>
