<?php require_once "controllerUserData.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Login</title>
     <!-- Boxicon -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <link rel="stylesheet" href="style.css">
</head>
<style type="text/css">
    input[type="submit"].disable{
    background-color: #333333bf!important;
    color: #ffffff78!important;
    pointer-events: none;
}
    .notification {
  position: relative;
  display: inline-block;
  background-color: #28a745;
  color: #fff;
  padding: 10px;
  border-radius: 5px;
  z-index: 999;
  animation: slideIn 0.5s ease-out;
}

.icon-container {
  display: inline-block;
  vertical-align: middle;
  margin-right: 10px;
}

.text-container {
  display: inline-block;
  vertical-align: middle;
}


@keyframes slideIn {
  0% {
    transform: translateX(-100%);
    opacity: 0;
  }
  100% {
    transform: translateX(0);
    opacity: 1;
  }
}


</style>
<body>
    <div class = "banner">
        <video autoplay muted loop>
            <source src="dogi.mp4" type="video/mp4">
        </video>
    </div> 
    <div class="container">
        <div class="row">
      
            <div class="col-md-4 offset-md-4 form login-form">
                <form action="login-user.php" method="POST" autocomplete="">
                    
                                 <?php if (isset($_SESSION['notification'])) { ?>
  <div class="notification">
    <div class="icon-container"><i class='bx bxs-bell-ring bx-tada'></i></div>
    <div class="text-container"><?php echo $_SESSION['notification']; ?></div>
    <button type="button" class="dismiss-button" aria-label="Close">x</button>
  </div>

  <script>
    // Get the dismiss button and notification element
    var dismissButton = document.querySelector('.dismiss-button');
    var notification = document.querySelector('.notification');

    // Add click event listener to the dismiss button
    dismissButton.addEventListener('click', function() {
      // Hide the notification element
      notification.style.display = 'none';
      <?php unset($_SESSION['notification']); ?>
    });

    // Hide the notification message after 5 seconds
    setTimeout(function() {
      notification.style.display = 'none';
    }, 5000);
  </script>
<?php } ?>
                    <h2 class="text-center">PetFerry</h2>
                    <p class="text-center">Login with your email and password</p>

          
                    <?php
                    if(count($errors) > 0){
                        ?>
                        <div class="alert alert-danger text-center">
                            <?php
                            foreach($errors as $showerror){
                                echo $showerror;
                            }
                            ?>
                        </div>
                        <?php
                    }
                    ?>


                    <div class="form-group">
                        <input class="form-control" type="email" id="myform_email" name="email" placeholder="Email" required value="<?php echo $email ?>">
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="password" id="myform_password" name="password" placeholder="Password" required>
                    </div>
                    <div class="link forget-pass text-left"><a href="forgot-password.php">Forgot password?</a></div>
                    <div class="form-group">
                        <input class="form-control button login" type="submit" id="loginBtn" name="login" value="Login">
                    </div>
                    <div class="link login-link text-center">Not yet a member? <a href="signup-user.php">Signup now</a></div>
                </form>
            </div>
        </div>
    </div>
    


<script type="text/javascript">

    let loginBtn = $('#loginBtn').val()
console.log(loginBtn)
$('#loginBtn').addClass('disable')




function validateEmail(input_str){
  var re = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
  return re.test(input_str);
}

// To check a password between 7 to 15 characters which contain at least one numeric digit and a special character
function validatePassword(input_str){
  var re = /^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{8,15}$/;
  return re.test(input_str);
}


   $(document).on("keyup", "#myform_email", function(e) {
            var email =  document.getElementById('myform_email').value;
            if (!validateEmail(email) || email == "" || !email){
           $('#loginBtn').addClass('disable')
           } else {
          $('#loginBtn').removeClass('disable')
            }
          });


   $(document).on("keyup", "#myform_password", function(e){
            var password = document.getElementById('myform_password').value;
            if(!validatePassword(password) || password == "" || password.length < 8){
               $('#loginBtn').addClass('disable')
           } else {
          $('#loginBtn').removeClass('disable')
            }

            
   });
</script>

</body>
</html>