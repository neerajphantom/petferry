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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Profile</title>
    
    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Boxicon -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <!-- Google Web Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans&family=Nunito:wght@600;700;800&display=swap" rel="stylesheet"> 

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Flaticon Font -->
    <link href="lib/flaticon/font/flaticon.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="prosty.css">
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



     <!-- Topbar Start -->
   <div class="container-fluid">
  <div class="row py-3 px-lg-5 justify-content-between">
    <div class="col-lg-4">
      <a href="" class="navbar-brand d-none d-lg-block">
        <h1 class="m-0 display-5 text-capitalize"><span class="text-primary">Pet</span>Ferry</h1>
      </a>
    </div>

    <div class="col-lg-4 text-center">
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

    <div class="col-lg-4 text-center text-lg-right">
      <div class="d-inline-flex align-items-center">
        <div class="d-inline-flex flex-column text-center px-3 border-right">
          <h6>Email Us</h6>
          <p class="m-0">petwalkwithferry@gmail.com</p>
        </div>
        <div class="d-inline-flex flex-column text-center pl-3">
          <h6>Call Us</h6>
          <p class="m-0">+91 98989 89898</p>
        </div>
      </div>
    </div>
  </div>
</div>

    <!-- Topbar End -->
    <!-- Navbar Start -->
    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-3 py-lg-0 px-lg-5">
            <a href="" class="navbar-brand d-block d-lg-none">
                <h1 class="m-0 display-5 text-capitalize font-weight-bold text-white"><span class="text-primary">Pet</span>Ferry</h1>
            </a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between px-3" id="navbarCollapse" >
                <div class="navbar-nav ms-auto py-0">
                     <a href="profile.php" class="nav-item nav-link active" >Profile</a>
                    <a href="index.php" class="nav-item nav-link" >Home</a>
                    <a href="service.php" class="nav-item nav-link">Service</a>
                    <a href="booking.php" class="nav-item nav-link">Booking</a>
                    <a href="price.php" class="nav-item nav-link">Price</a>
                    <a href="about.php" class="nav-item nav-link">About</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Health-hub</a>
                        <div class="dropdown-menu rounded-0 m-0">
                            <a href="tips.php" class="dropdown-item">Tips & Tricks</a>
                            <a href="clinics.php" class="dropdown-item">Clinics & NGOs</a>
                        </div>
                    </div>
                    <a href="conemail.php" class="nav-item nav-link">Contact</a>
                </div>
    
                <ul class="nav flex-row order-lg-2 ml-auto nav-icons">
                    <li class="nav-item dropdown user-dropdown align-items-center">
                        <a class="nav-link text-white" href="#" id="dropdown-user" role="button" data-toggle="dropdown">
                           
                            <i class="fa fa-user-circle fa-2x"></i>
                            <!-- <span><?php echo $fetch_info['name'] ?></span> -->
                            <span class="ml-2 h-lg-down dropdown-toggle"></span>  
                        </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown-user">
                                <a href="profile.php" class="dropdown-item">Profile</a>
                                <a href="/Petferryo/pintro/index.html" class="dropdown-item">Logout</a> 
                               
                            </div>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
    <!-- Navbar End -->

    <div class="container">
    <div class="main-body">
    
         <!--  <nav>
          <ul class="nav nav-pills mb-3 shadow-lg" id="pills-tab" role="tablist">
        <li class="nav-item1">
          <a class="nav-link active " id="pills-home-tab" data-toggle="pill" href="profile.php" role="tab" aria-controls="pills-home" aria-selected="true">User Profile</a>
        </li>
        <li class="nav-item1">
          <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="/Petferryo/Login/Petfolio1.php" role="tab" aria-controls="pills-profile" aria-selected="true">PetFolio</a>
        </li>
      </ul>
  </nav> -->
  <ul class="nav nav-pills mb-3 shadow-lg">
  <li class="nav-item1">
    <a class="nav-link active" aria-current="page" href="profile.php">User Profile</a>
  </li>
  <li class="nav-item1">
    <a class="nav-link" href="Petfolio1.php">Petfolio</a>
  </li>
  <!-- <li class="nav-item">
    <a class="nav-link" href="#">Link</a>
  </li> -->
</ul>
    
    


          <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                    <img src="https://i.postimg.cc/HxDF7zWZ/ownern3.jpg" alt="Admin" class="rounded-circle" width="150">
                    <div class="mt-3">
                      <h4>  <?php echo $fetch_info['name'] ?></h4>
                      <p class="text-secondary mb-1">Customer</p>
                      <!-- <p class="text-muted font-size-sm">Bay Area, San Francisco, CA</p> -->
                      <!-- <button class="btn btn-primary">Follow</button> -->
                      <button class="btn btn-outline-primary">Update Image</button>
                    </div>
                  </div>
                </div>
              </div>
             
            </div> 
            <div class="col-md-8">
              <div class="card mb-3">
                <div class="card-body">
                    <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">User ID</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                     <?php echo $fetch_info['userid'] ?>
                    </div>
                  </div>
                   <hr>

                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Full Name</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                     <?php echo $fetch_info['name'] ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Email</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php echo $fetch_info['email'] ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Phone</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                     <?php echo $fetch_info['phone'] ?>
                    </div>
                  </div>
                  <hr>
           <div class="row">
            <div class="col-sm-6 text-left">
                 <a class="btn btn-info " href="Profile_edit.php">Edit</a>
                  <a class="btn btn-info " href="/Petferryo/pintro/index.html">Logout</a>
            </div>
            <div class="col-sm-6  text-right">
         <a href="change-password.php"><button type="button" class="btn btn-warning">Change Password</button></a>
            </div>
           </div>
                </div>
              </div>
            </div>
          </div>

        </div>
    </div>

 <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>

    <!--icon code javascript-->
    <script src="https://cdn.lordicon.com/fudrjiwc.js"></script>
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>

   
</body>
</html>