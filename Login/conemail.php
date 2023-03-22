<?php include 'send-email.php';?>
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
    <meta charset="utf-8">
    <title>PetFerry - Walk-Love-Care</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

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
</head>


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
                <h1 class="m-0 display-5 text-capitalize font-italic text-white"><span class="text-primary">Pet</span>Ferry</h1>
            </a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between px-3" id="navbarCollapse">
                <div class="navbar-nav mr-auto py-0">
                    <a href="index.php" class="nav-item nav-link">Home</a>
                    <a href="service.php" class="nav-item nav-link">Service</a>
                    <a href="booking.php" class="nav-item nav-link">Booking</a>
                    <a href="price.php" class="nav-item nav-link">Price</a>
                    <a href="about.php" class="nav-item nav-link ">About</a>
                    
                    
                    
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Health-hub</a>
                        <div class="dropdown-menu rounded-0 m-0">
                            <a href="tips.php" class="dropdown-item">Tips & Tricks</a>
                            <a href="clinics.php" class="dropdown-item">Clinics & NGOs</a>
                        </div>
                    </div>
                    <a href="conemail.php" class="nav-item nav-link active">Contact</a>
                </div>
                 <ul class="nav flex-row order-lg-2 ml-auto nav-icons">
                    <li class="nav-item dropdown user-dropdown align-items-center">
                        <a class="nav-link text-white" href="#" id="dropdown-user" role="button" data-toggle="dropdown">
                           
                            <i class="fa fa-user-circle fa-2x"></i>
                            <span><?php echo $fetch_info['name'] ?></span>
                            <span class="ml-2 h-lg-down dropdown-toggle"></span>  
                        </a>
                             <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown-user">
                                <a href="profile.php" class="dropdown-item">Profile</a>
                                 <a href="mybook.php" class="dropdown-item">My Bookings</a> 
                                <a href="/Petferryo/pintro/index.html" class="dropdown-item">Logout</a> 
                            
                            </div>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
    <!-- Navbar End -->



    <!-- Contact Start -->
    <div class="container-fluid pt-5">
        <div class="d-flex flex-column text-center mb-5 pt-5">
            <h4 class="text-secondary mb-3">Contact Us</h4>
            <h1 class="display-4 m-0">Contact For <span class="text-primary">Any Query</span></h1>
        </div>
        <div class="row justify-content-center">
            <div class="col-12 col-sm-8 mb-5">
                <div class="contact-form">
                    <div id="success"></div>
                    <form id="contact" action="" method="post">
                        <div class="control-group">
                            <input type="text" name="name" readonly class="form-control p-4"   value="<?php echo $fetch_info['name'] ?>" required/>
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group">
                            <input type="email" name="email" readonly class="form-control p-4"  value="<?php echo $fetch_info['email'] ?>" required />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group">
                            <input type="text" name="subject" class="form-control p-4"  placeholder="Subject" required />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group">
                            <textarea class="form-control p-4" rows="6" name="message" placeholder="Message" required data-validation-required-message="Please enter your message"></textarea>
                            <p class="help-block text-danger"></p>
                        </div>
                    
                        <div>
                            <button class="btn btn-primary py-3 px-5" type="submit" name="submit">Send Message</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-12 mb-n2 p-0">
                <iframe style="width: 100%; height: 500px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15082.025067258091!2d72.91580849277089!3d19.08543370643832!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be7c633bf7b6acd%3A0x5e24ab7dfa94c81b!2sNew%20Satya%20Sai%20General%20Store%20%26kerosene%20Depot%20Apnb!5e0!3m2!1sen!2sin!4v1674532676018!5m2!1sen!2sin" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
            </div>
        </div>
    </div>
    <!-- Contact End -->


    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-white mt-5 py-5 px-sm-3 px-md-5">
        <div class="row pt-5">
            <div class="col-lg-4 col-md-12 mb-5">
                <h1 class="mb-3 display-5 text-capitalize text-white"><span class="text-primary">Pet</span>Ferry</h1>
                <p class="m-0">A site for all the pet lovers who care about there pets health & safety. The vision that will make our present living better & opens up a path for great future. Everything that you need to know is right here on petferry, their are various options that act as a substitute</p>
            </div>
            <div class="col-lg-8 col-md-12">
                <div class="row">
                    <div class="col-md-4 mb-4">
                        <h5 class="text-primary mb-4">Get In Touch</h5>
                        <p><i class="fa fa-map-marker-alt mr-2"></i>Ghatkopar East, Mumbai, INDIA</p>
                        <p><i class="fa fa-phone-alt mr-2"></i>+91 98989 89898</p>
                        <p><i class="fa fa-envelope mr-2"></i>petwalkwithferry@gmail.com</p>
                    </div>
                    <div class="col-md-3 mb-4">
                        <h5 class="text-primary mb-4">Useful Links</h5>
                        <div class="d-flex flex-column justify-content-start">
                            <a class="text-white mb-2" href="index.php"><i class="fa fa-angle-right mr-2"></i>Home</a>
                            <a class="text-white mb-2" href="about.php"><i class="fa fa-angle-right mr-2"></i>About Us</a>
                            <a class="text-white mb-2" href="service.php"><i class="fa fa-angle-right mr-2"></i>Our Services</a>
                            <a class="text-white mb-2" href="tips.php"><i class="fa fa-angle-right mr-2"></i>Tips & Tricks</a>
                            <a class="text-white mb-2" href="clinics.php"><i class="fa fa-angle-right mr-2"></i>Clinics & NGo's</a>
                        
                           
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                     <lottie-player src="https://assets8.lottiefiles.com/packages/lf20_syqnfe7c.json"  background="transparent"  speed="1"  style="width: 300px; height: 200px;"  loop  autoplay></lottie-player>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


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