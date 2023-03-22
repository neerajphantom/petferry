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
    <title><?php echo $fetch_info['name'] ?> | PetFerry | Service </title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
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
        <div class="row py-3 px-lg-5">
            <div class="col-lg-4">
                <a href="" class="navbar-brand d-none d-lg-block">
                    <h1 class="m-0 display-5 text-capitalize"><span class="text-primary">Pet</span>Ferry</h1>
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
                    <a href="service.php" class="nav-item nav-link active">Service</a>
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


   <!-- Services Start -->
   <div class="container-fluid bg-light pt-5">
    <div class="container py-5">
        <div class="d-flex flex-column text-center mb-5">
            <h4 class="text-secondary mb-3">Our Assistance</h4>
            <h1 class="display-4 m-0"><span class="text-primary">Loving</span> Pet Services</h1>
        </div>
        <div class="row pb-3">
            <div class="col-md-6 col-lg-6 mb-4">
                <div class="d-flex flex-column text-center bg-white mb-2 p-3 p-sm-5" id="hover">
                    <!-- <h3 class="flaticon-house display-3 font-weight-normal text-secondary mb-3"></h3>
                    <h3 class="mb-3">Pet Walking</h3> -->
                    <h3 class="mb-3"><lottie-player src="https://assets2.lottiefiles.com/packages/lf20_2ixzdfvy.json"  background="transparent"  speed="1"  style="width: 450px; height: 300px;"  loop  autoplay></lottie-player></h3>
                        <h3 class="mb-3">Pet Walking</h3>
                    <p>Just go to booking and book a walker for your pet. The ferry will be present at your doorstep to pickup your pet, after the session is completed the ferry will drop your pet at their respective home</p>
                    
                </div>
            </div>
            <div class="col-md-6 col-lg-6 mb-4">
                <div class="d-flex flex-column text-center bg-white mb-2 p-3 p-sm-5" id="hover">
                    <h3 class="mb-3"><lottie-player src="https://assets4.lottiefiles.com/packages/lf20_zdrbkdtt.json"  background="transparent"  speed="1"  style="width: 450px; height: 300px;"  loop  autoplay></lottie-player></h3>
                    <h3 class="mb-3">Pet Dining</h3>
                    <p>Its a meal for pets which consist of highly nutritious value rich in protien & other essential vitamins which helps your pet to achieve a healty life. These also makes the session more engaging & happier for pets.</p>
                    
                </div>
            </div>
            <div class="col-md-6 col-lg-6 mb-4">
                <div class="d-flex flex-column text-center bg-white mb-2 p-3 p-sm-5" id="hover">
                    <h3 class="mb-3"><lottie-player src="https://assets1.lottiefiles.com/private_files/lf30_vgeoiyj0.json"  background="transparent"  speed="1"  style="width: 450px; height: 300px;"  loop  autoplay></lottie-player></lottie-player></h3>
                    <h3 class="mb-3">Pet Coaching</h3>
                    <p>A professional coach will teach all the basic & essential habits which are very helpfull for owners as the pet can perform all the primary tasks without any mess which makes owner life more comfortable & easy</p>
                    
                </div>
            </div>
            <div class="col-md-6 col-lg-6 mb-4">
                <div class="d-flex flex-column text-center bg-white mb-2 p-3 p-sm-5" id="hover">
                    <!-- <h3 class="flaticon-cat display-3 font-weight-normal text-secondary mb-3"></h3>
                    <h3 class="mb-3">Pet Coaching</h3> -->
                    
                        <h3 class="mb-3"><lottie-player src="https://assets9.lottiefiles.com/private_files/lf30_licg9ydj.json" mode="bounce" background="transparent"  speed="1"  style="width: 450px; height: 300px;"  loop  autoplay></lottie-player></h3>
                        <h3 class="mb-3">Pet Dressing</h3>
                        <p>Every owner wants their pet to be healty & fit, one of the crucial factor is hygiene & cleaniness of their body. Dressing includes pets grooming & all basic cleaning of there whole body.</p>
                     
                </div>
            </div>
            <div class="col-md-6 col-lg-6 mb-4">
                <div class="d-flex flex-column text-center bg-white mb-2 p-3 p-sm-5" id="hover">
                    <h3 class="mb-3"><lottie-player src="https://assets8.lottiefiles.com/packages/lf20_LczabPsHLK.json"  background="transparent"  speed="1"  style="width: 450px; height: 300px;"  loop  autoplay></lottie-player></h3>
                    <h3 class="mb-3">Pet Doctoring</h3>
                    <p>Its very important to keep a check on pets health in order to keep them away from any kind of illness, infection & diseases.Doctoring will include all the basic tests to track their entire body & fitness goals</p>
                    
                </div>
            </div>
            <div class="col-md-6 col-lg-6 mb-4"> 
                <div class="d-flex flex-column text-center bg-white mb-2 p-3 p-sm-5" id="hover">
                    <h3 class="mb-3"><lottie-player src="https://assets4.lottiefiles.com/packages/lf20_lkcv3xga.json"  background="transparent"  speed="1"  style="width: 450px; height: 300px;"  loop  autoplay></lottie-player></h3>
                    <h3 class="mb-3">Pet Workout</h3>
                    <p>Pet workout includes a trainer who focuses on the flexibility, strength & overall performance of the pet which boost pet fitness & endurance level that makes them more active & sharp. </p>
                    <!-- <a class="text-uppercase font-weight-bold" href="">Read More</a>   -->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Services End -->


    <!-- Testimonial Start -->
    <div class="container-fluid  my-5 p-0 py-5">
        <div class="container p-0 py-5">
            <div class="d-flex flex-column text-center mb-5">
                <h4 class="text-secondary mb-3">Testimonial</h4>
                <h1 class="display-4 m-0">Our Client <span class="text-primary">Says</span></h1>
            </div>
            <div class="owl-carousel testimonial-carousel">
                <div class="bg-light mx-3 p-4">
                    <div class="d-flex align-items-end mb-3 mt-n4 ml-n4">
                        <img class="img-fluid" src="img/testimonial-1.jpg" style="width: 80px; height: 80px;" alt="">
                        <div class="ml-3">
                            <h5>Aditya Watekar</h5>
                            <i>Natru's parent</i>
                        </div>
                    </div>
                    <p class="m-0">Decent service also liked the packages idea it makes our choices more clear based on the activities present inside each package</p>
                </div>
                <div class="bg-light mx-3 p-4">
                    <div class="d-flex align-items-end mb-3 mt-n4 ml-n4">
                        <img class="img-fluid" src="img/testimonial-2.jpg" style="width: 80px; height: 80px;" alt="">
                        <div class="ml-3">
                            <h5>Jatin Pandey</h5>
                            <i>Honey's parent</i>
                        </div>
                    </div>
                    <p class="m-0">Featured packed services, the walkers are also co-operative and very caring</p>
                </div>
                <div class="bg-light mx-3 p-4">
                    <div class="d-flex align-items-end mb-3 mt-n4 ml-n4">
                        <img class="img-fluid" src="img/testimonial-3.jpg" style="width: 80px; height: 80px;" alt="">
                        <div class="ml-3">
                            <h5>Jaikumar Gaja</h5>
                            <i>Julie's parent</i>
                        </div>
                    </div>
                    <p class="m-0">Nice User Interface with respect to the colors, its very catchy for a user as it grabs our focus</p>
                </div>
                <div class="bg-light mx-3 p-4">
                    <div class="d-flex align-items-end mb-3 mt-n4 ml-n4">
                        <img class="img-fluid" src="img/testimonial-4.jpg" style="width: 80px; height: 80px;" alt="">
                        <div class="ml-3">
                            <h5>Sahil Varia</h5>
                            <i>Sheru's parent</i>
                        </div>
                    </div>
                    <p class="m-0">For me the additional features are very useful as i can get daily new tips & can find clinics using health hub section</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonial End -->


     <!-- Adv Start -->
   
       <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="adver1.webp" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="adver2.webp" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="adver3.webp" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="adver4.webp" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="adver5.webp" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="adver6.webp" class="d-block w-100" alt="...">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
    <!--  Adv End -->


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
                            <a class="text-white mb-2" href="clinics.php"><i class="fa fa-angle-right mr-2"></i>Clinics & Ngo's</a>
                            <a class="text-white" href="conemail.php"><i class="fa fa-angle-right mr-2"></i>Contact Us</a>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
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