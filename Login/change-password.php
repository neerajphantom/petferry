<?php require_once "controllerUserData.php"; ?>



<?php 
$email = $_SESSION['email'];
$password = $_SESSION['password'];
if($email != false && $password != false){
    $sql = "SELECT * FROM petusers WHERE email = '$email'";
    $run_Sql = mysqli_query($con, $sql);
    if($run_Sql){
        $fetch_info = mysqli_fetch_assoc($run_Sql);
        $status = $fetch_info['status'];
        $code = $fetch_info['code'];
        if($status == "verified"){
            if($code != 0){
                header('Location: reset-code.php');
            }
        }else{
            header('Location: user-otp.php');
        }
    }
}else{
    header('Location: login-user.php');
}
?>
 <!DOCTYPE html>
<html>
<head>
    <title>Change Password</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"> 
    <link rel="stylesheet" href="change-password.css">
      <!-- Boxicon -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<style>
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
<div class="container">
            <div class="row ">
                 <div class="col-sm-3">
            </div>
             <div class="col-sm-6">

                        <div class="card radius-10 border-start border-0 border-3 border-danger">
                             <div class="card-header text-white text-center bg-dark pb-1" >
                          <h3 class="text-white"> Reset Password</h3>

                      <?php if (isset($_SESSION['notification'])) { ?>
  <div class="notification">
    <div class="icon-container"><i class='bx bxs-bell-ring bx-tada bx-sm'></i></div>
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


             </div>
                            <div class="card-body">
                                <div class="m-sm-4">
                                    <form method="POST" action="petupdate.php">
                                        <div class="form-group">
                                            <label>Current Password</label>
                                            <!-- <input class="form-control form-control-lg" type="password" name="oldpassword" required placeholder="Enter your current password"> -->
                                            <input class="form-control form-control-lg" required type="password" name="oldpassword" pattern="[a-zA-Z0-9!@#$%^&*]{8,15}"  placeholder="Enter your current password">
      <small class="text-muted">Minimum 8+ characters,Special character, digit</small>
                                        </div>
                                        <div class="form-group">
                                            <label>New Password</label>
                                            <!-- <input class="form-control form-control-lg" type="password" name="Newpassword" required placeholder="Enter your new password"> -->
                                             <input class="form-control form-control-lg" required type="password" name="Newpassword" pattern="[a-zA-Z0-9!@#$%^&*]{8,15}"  placeholder="Enter your new password">
      <small class="text-muted">Minimum 8+ characters,Special character, digit</small>
                                        </div>
                                        <div class="form-group">
                                            <label>Confirm New Password</label>
                                            <!-- <input class="form-control form-control-lg" type="password" name="passwordConfirm" required placeholder="Enter your confirm new password"> -->
                                             <input class="form-control form-control-lg" required type="password" name="passwordConfirm" pattern="[a-zA-Z0-9!@#$%^&*]{8,15}"  placeholder="Enter your confirm new password">
      <small class="text-muted">Minimum 8+ characters,Special character, digit</small>
                                        </div>

                                         <div class="row">
            <div class="col-sm-6 text-left">
                 <a class="btn btn-lg btn-primary" href="profile.php">Cancel</a>
                  <!-- <a class="btn btn-info " href="/Petferryo/pintro/index.html">Logout</a> -->
            </div>
            <div class="col-sm-6  text-right">
         <a><button type="submit"  name="change_password" class="btn btn-lg btn-primary">Reset Password</button></a>
            </div>
           </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
             <div class="col-sm-3">
            </div>


                
            </div>
        </div>
</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
</html>