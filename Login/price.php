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
    <title><?php echo $fetch_info['name'] ?> | PetFerry | Price </title>
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
    <script>
    function bookNow(package) {
  window.location.href = 'booking.php?package=' + package;
}
</script>

</head>

<body>
    <!-- Topbar Start -->
    <div class="container-fluid">
        <div class="row py-3 px-lg-5">
            <div class="col-lg-4">
                <a href="" class="navbar-brand d-none d-lg-block">
                    <h1 class="m-0 display-5 text-capitalize"><span class="text-primary">Pet</span>Lover</h1>
                </a>
            </div>
            <div class="col-lg-8 text-center text-lg-right">
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
                    <a href="price.php" class="nav-item nav-link active">Price</a>
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


     <!-- Pricing Plan Start -->
     <div class="container-fluid bg-light pt-5 pb-1">
        <div class="container py-5">
            <div class="d-flex flex-column text-center mb-5">
                <h4 class="text-secondary mb-3">Pricing Plan</h4>
                <h1 class="display-4 m-0">Choose the <span class="text-primary">Best Price</span></h1>
            </div>
            <div class="row">
                <div class="col-lg-4 mb-4">
                    <div class="card border-0" id="hover">
                        <div class="card-header position-relative border-0 p-0 mb-4">
                            <img class="card-img-top" src="https://i.postimg.cc/9X90qsDY/pricen1.jpg" alt="">
                            <div class="position-absolute d-flex flex-column align-items-center justify-content-center w-100 h-100" style="top: 0; left: 0; z-index: 1; background: rgba(0, 0, 0, .5);">
                                <h3 class="text-primary mb-3">Primary</h3>
                                <h1 class="display-4 text-white mb-0">
                                    <small class="align-top" style="font-size: 22px; line-height: 45px;">₹</small>200<small class="align-bottom" style="font-size: 16px; line-height: 40px;">/ walk</small>
                                </h1>
                            </div>
                        </div>
                        <div class="card-body text-center p-0">
                            <ul class="list-group list-group-flush mb-4">
                                <li class="list-group-item p-2"><i class="fa fa-check-circle text-secondary mr-2"></i>Walking</li>
                                <li class="list-group-item p-2"><i class="fa fa-times-circle text-danger mr-2"></i>Dining</li>
                                <li class="list-group-item p-2"><i class="fa fa-times-circle text-danger mr-2"></i>Dressing</li>
                                <li class="list-group-item p-2"><i class="fa fa-times-circle text-danger mr-2"></i>Doctoring</li>
                            </ul>
                        </div>
                        <div class="card-footer border-0 p-0">
                             <a href="booking.php" class="btn btn-primary btn-block p-3" style="border-radius: 10px;">Book Now</a>

                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb-4">
                    <div class="card border-0" id="hover">
                        <div class="card-header position-relative border-0 p-0 mb-4">
                            <img class="card-img-top" src="https://i.postimg.cc/Wb8C4bwF/pricen10.jpg" alt="">
                            <div class="position-absolute d-flex flex-column align-items-center justify-content-center w-100 h-100" style="top: 0; left: 0; z-index: 1; background: rgba(0, 0, 0, .5);">
                                <h3 class="text-primary mb-3">Secondary</h3>
                                <h1 class="display-4 text-white mb-0">
                                    <small class="align-top" style="font-size: 22px; line-height: 45px;">₹</small>350<small class="align-bottom" style="font-size: 16px; line-height: 40px;">/ walk</small>
                                </h1>
                            </div>
                        </div>
                        <div class="card-body text-center p-0">
                            <ul class="list-group list-group-flush mb-4">
                                <li class="list-group-item p-2"><i class="fa fa-check-circle text-secondary mr-2"></i>Walking</li>
                                <li class="list-group-item p-2"><i class="fa fa-check-circle text-secondary mr-2"></i>Dining</li>
                                <li class="list-group-item p-2"><i class="fa fa-times-circle text-danger mr-2"></i>Dressing</li>
                                <li class="list-group-item p-2"><i class="fa fa-times-circle text-danger mr-2"></i>Doctoring</li>
                            </ul>
                        </div>
                        <div class="card-footer border-0 p-0">
                            <a href="booking.php" class="btn btn-primary btn-block p-3" style="border-radius: 10px;">Book Now</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb-4">
                    <div class="card border-0" id="hover">
                        <div class="card-header position-relative border-0 p-0 mb-4">
                            <img class="card-img-top" src="https://i.postimg.cc/gkq0gRqw/pricen4.jpg" alt="">
                            <div class="position-absolute d-flex flex-column align-items-center justify-content-center w-100 h-100" style="top: 0; left: 0; z-index: 1; background: rgba(0, 0, 0, .5);">
                                <h3 class="text-primary mb-3">Standard</h3>
                                <h1 class="display-4 text-white mb-0">
                                    <small class="align-top" style="font-size: 22px; line-height: 45px;">₹</small>500<small class="align-bottom" style="font-size: 16px; line-height: 40px;">/ walk</small>
                                </h1>
                            </div>
                        </div>
                        <div class="card-body text-center p-0">
                            <ul class="list-group list-group-flush mb-4">
                                <li class="list-group-item p-2"><i class="fa fa-check-circle text-secondary mr-2"></i>Walking</li>
                                <li class="list-group-item p-2"><i class="fa fa-check-circle text-secondary mr-2"></i>Dining</li>
                                <li class="list-group-item p-2"><i class="fa fa-check-circle text-secondary mr-2"></i>Dressing</li>
                                <li class="list-group-item p-2"><i class="fa fa-times-circle text-danger mr-2"></i>Doctoring</li>
                            </ul>
                        </div>
                        <div class="card-footer border-0 p-0">
                            <a href="booking.php" class="btn btn-primary btn-block p-3" style="border-radius: 10px;">Book Now</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mb-4 pt-3">
                    <div class="card border-0" id="hover">
                        <div class="card-header position-relative border-0 p-0 mb-4">
                            <img class="card-img-top" src="https://i.postimg.cc/VNTsJF1h/pricen7.jpg
" alt="">
                            <div class="position-absolute d-flex flex-column align-items-center justify-content-center w-100 h-100" style="top: 0; left: 0; z-index: 1; background: rgba(0, 0, 0, .5);">
                                <h3 class="text-primary mb-3" >Preferred</h3>
                                <h1 class="display-4 text-white mb-0">
                                    <small class="align-top" style="font-size: 22px; line-height: 45px;">₹</small>1000<small class="align-bottom" style="font-size: 16px; line-height: 40px;">/ walk</small>
                                </h1>
                            </div>
                        </div>
                        <div class="card-body text-center p-0">
                            <ul class="list-group list-group-flush mb-4">
                                <li class="list-group-item p-2"><i class="fa fa-check-circle text-secondary mr-2"></i>Walking</li>
                                <li class="list-group-item p-2"><i class="fa fa-check-circle text-secondary mr-2"></i>Dining</li>
                                <li class="list-group-item p-2"><i class="fa fa-check-circle text-secondary mr-2"></i>Dressing</li>
                                <li class="list-group-item p-2"><i class="fa fa-check-circle text-secondary mr-2"></i>Doctoring</li>
                            </ul>
                        </div>
                        <div class="card-footer border-0 p-0">
                            <a href="booking.php" class="btn btn-primary btn-block p-3" style="border-radius: 10px;">Book Now</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mb-4 pt-3">
                    <div class="card border-0" id="hover">
                        <div class="card-header position-relative border-0 p-0 mb-4">
                            <img class="card-img-top" src="https://i.postimg.cc/TY9RVxfg/pricen8.jpg" alt="">
                            <div class="position-absolute d-flex flex-column align-items-center justify-content-center w-100 h-100" style="top: 0; left: 0; z-index: 1; background: rgba(0, 0, 0, .5);">
                                <h3 class="text-primary mb-3">Habitude</h3>
                                <h1 class="display-4 text-white mb-0">
                                    <small class="align-top" style="font-size: 22px; line-height: 45px;">₹</small>650<small class="align-bottom" style="font-size: 16px; line-height: 40px;">/ walk</small>
                                </h1>
                            </div>
                        </div>
                        <div class="card-body text-center p-0">
                            <ul class="list-group list-group-flush mb-4">
                                <li class="list-group-item p-2"><i class="fa fa-check-circle text-secondary mr-2"></i>Walking</li>
                                <li class="list-group-item p-2"><i class="fa fa-check-circle text-secondary mr-2"></i>Dining</li>
                                <li class="list-group-item p-2"><i class="fa fa-check-circle text-secondary mr-2"></i>Coaching</li>
                                <li class="list-group-item p-2"><i class="fa fa-times-circle text-danger mr-2"></i>Doctoring</li>
                            </ul>
                        </div>
                        <div class="card-footer border-0 p-0">
                            <a href="booking.php" class="btn btn-primary btn-block p-3" style="border-radius: 10px;">Book Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
                
    <div class="container-fluid bg-light pt-1 pb-1">
        <div class="container py-0 pb-4">
            <div class="d-flex flex-column text-center mb-5">
                <h1 class="display-4 m-0">Fitness <span class="text-primary">Packages</span></h1>
            </div>
            <div class="row">
                <div class="col-lg-6 mb-4">
                    <div class="card border-0" id="hover">
                        <div class="card-header position-relative border-0 p-0 mb-4">
                            <img class="card-img-top" src="https://i.postimg.cc/QCkP1XLz/pricen11.jpg" alt="">
                            <div class="position-absolute d-flex flex-column align-items-center justify-content-center w-100 h-100" style="top: 0; left: 0; z-index: 1; background: rgba(0, 0, 0, .5);">
                                <h3 class="text-primary mb-3">Master Fitness</h3>
                                <h1 class="display-4 text-white mb-0">
                                    <small class="align-top" style="font-size: 22px; line-height: 45px;">₹</small>800<small class="align-bottom" style="font-size: 16px; line-height: 40px;">/ walk</small>
                                </h1>
                            </div>
                        </div>
                        <div class="card-body text-center p-0">
                            <ul class="list-group list-group-flush mb-4">
                                <li class="list-group-item p-2"><i class="fa fa-check-circle text-secondary mr-2"></i>Walking</li>
                                <li class="list-group-item p-2"><i class="fa fa-check-circle text-secondary mr-2"></i>Dining</li>
                                <li class="list-group-item p-2"><i class="fa fa-check-circle text-secondary mr-2"></i>Workout</li>
                                <li class="list-group-item p-2"><i class="fa fa-times-circle text-danger mr-2"></i>Doctoring</li>
                            </ul>
                        </div>
                        <div class="card-footer border-0 p-0">
                            <a href="booking.php" class="btn btn-primary btn-block p-3" style="border-radius: 10px;">Book Now</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mb-4">
                    <div class="card border-0" id="hover">
                        <div class="card-header position-relative border-0 p-0 mb-4">
                            <img class="card-img-top" src="https://i.postimg.cc/vTkXRSVG/pricen12.jpg" alt="">
                            <div class="position-absolute d-flex flex-column align-items-center justify-content-center w-100 h-100" style="top: 0; left: 0; z-index: 1; background: rgba(0, 0, 0, .5);">
                                <h3 class="text-primary mb-3">Master Health</h3>
                                <h1 class="display-4 text-white mb-0">
                                    <small class="align-top" style="font-size: 22px; line-height: 45px;">₹</small>1500<small class="align-bottom" style="font-size: 16px; line-height: 40px;">/ walk</small>
                                </h1>
                            </div>
                        </div>
                        <div class="card-body text-center p-0">
                            <ul class="list-group list-group-flush mb-4">
                                <li class="list-group-item p-2"><i class="fa fa-check-circle text-secondary mr-2"></i>Coaching</li>
                                <li class="list-group-item p-2"><i class="fa fa-check-circle text-secondary mr-2"></i>Dining</li>
                                <li class="list-group-item p-2"><i class="fa fa-check-circle text-secondary mr-2"></i>Workout</li>
                                <li class="list-group-item p-2"><i class="fa fa-check-circle text-secondary mr-2"></i>Doctoring</li>
                            </ul>
                        </div>
                        <div class="card-footer border-0 p-0">
                            <a href="booking.php" class="btn btn-primary btn-block p-3" style="border-radius: 10px;">Book Now</a>
                        </div>
                    </div>
                </div>
                <!-- <a href="price.php" class="btn btn-lg btn-primary mt-3 px-5 p-3 align-self-center mx-auto">More Plans</a> -->
            </div>
        </div>
    </div>

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
                        <div class="d-flex justify-content-start mt-4">
                            <a class="btn btn-outline-light rounded-circle text-center mr-2 px-0" style="width: 36px; height: 36px;" href="#"><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-outline-light rounded-circle text-center mr-2 px-0" style="width: 36px; height: 36px;" href="#"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-outline-light rounded-circle text-center mr-2 px-0" style="width: 36px; height: 36px;" href="#"><i class="fab fa-linkedin-in"></i></a>
                            <a class="btn btn-outline-light rounded-circle text-center mr-2 px-0" style="width: 36px; height: 36px;" href="#"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                    <div class="col-md-3 mb-4">
                        <h5 class="text-primary mb-4">Popular Links</h5>
                        <div class="d-flex flex-column justify-content-start">
                            <a class="text-white mb-2" href="index.php"><i class="fa fa-angle-right mr-2"></i>Home</a>
                            <a class="text-white mb-2" href="about.php"><i class="fa fa-angle-right mr-2"></i>About Us</a>
                            <a class="text-white mb-2" href="service.php"><i class="fa fa-angle-right mr-2"></i>Our Services</a>
                            <a class="text-white mb-2" href="booking.php"><i class="fa fa-angle-right mr-2"></i>Booking</a>
                            <a class="text-white" href="contact.php"><i class="fa fa-angle-right mr-2"></i>Contact Us</a>
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