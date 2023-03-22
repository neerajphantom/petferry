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
    <title><?php echo $fetch_info['name'] ?> | PetFerry | Clinic </title>
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

    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<style type="text/css">
    :root{
  --background-dark: #2d3548;
  --text-light: rgba(255,255,255,0.6);
  --text-lighter: rgba(255,255,255,0.9);
  --spacing-s: 8px;
  --spacing-m: 16px;
  --spacing-l: 24px;
  --spacing-xl: 32px;
  --spacing-xxl: 64px;
  --width-container: 1200px;
}

*{
  border: 0;
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

html{
  height: 100%;
  font-family: 'Montserrat', sans-serif;
  font-size: 14px;
}

body{
  height: 100%;
}

.hero-section{
  align-items: flex-start;
/*  background-image: linear-gradient(15deg, #0f4667 0%, #2a6973 150%);*/
  display: flex;
  min-height: 100%;
  justify-content: center;
  padding: var(--spacing-xxl) var(--spacing-l);
}

.card-grid{
  display: grid;
  grid-template-columns: repeat(1, 1fr);
  grid-column-gap: var(--spacing-l);
  grid-row-gap: var(--spacing-l);
  max-width: var(--width-container);
  width: 100%;
}

@media(min-width: 540px){
  .card-grid{
    grid-template-columns: repeat(2, 1fr); 
  }
}

@media(min-width: 960px){
  .card-grid{
    grid-template-columns: repeat(4, 1fr); 
  }
}

.card{
  list-style: none;
  position: relative;
}

.card:before{
  content: '';
  display: block;
  padding-bottom: 150%;
  width: 100%;
}

.card__background{
  background-size: cover;
  background-position: center;
  border-radius: var(--spacing-l);
  bottom: 0;
  filter: brightness(0.75) saturate(1.2) contrast(0.85);
  left: 0;
  position: absolute;
  right: 0;
  top: 0;
  transform-origin: center;
  trsnsform: scale(1) translateZ(0);
  transition: 
    filter 200ms linear,
    transform 200ms linear;
}

.card:hover .card__background{
  transform: scale(1.05) translateZ(0);
}

.card-grid:hover > .card:not(:hover) .card__background{
  filter: brightness(0.5) saturate(0) contrast(1.2) blur(20px);
}

.card__content{
  left: 0;
  padding: var(--spacing-l);
  position: absolute;
  top: 0;
}

.card__category{
  color: var(--text-light);
  font-size: 0.9rem;
  margin-bottom: var(--spacing-s);
  text-transform: uppercase;
}

.card__heading{
  color: var(--text-lighter);
  font-size: 1.9rem;
  text-shadow: 2px 2px 20px rgba(0,0,0,0.2);
  line-height: 1.4;
/*  word-spacing: 100vw;*/
}

.card_text {
     color: RED;
  font-size: 1.2rem;
  text-shadow: 2px 2px 20px rgba(0,0,0,0.2);
  line-height: 1.4;

}

.card__body{
     color: white;
  font-size: 1.2rem;
  text-shadow: 2px 2px 20px rgba(0,0,0,0.2);
  line-height: 1.4;
}

.location-icon {
    position: absolute;
    bottom: 0;
    right: 0;
    margin: 10px;
    color: #fff;
    font-size: 24px;
}

.location-icon:hover{
     transform: scale(2) translateZ(0);
     color: orange;

}
</style>



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
                        <p class="m-0">+91 98989 898989</p>
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
                    <a href="about.php" class="nav-item nav-link">About</a>
                   
                   
                    
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle active" data-toggle="dropdown">Health-hub</a>
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


    <section class="hero-section">
  <div class="card-grid">

    <?php
      // Establish a connection to the database
      $con = mysqli_connect('localhost', 'root', '', 'formuser1');

      // Check if the connection was successful
      if (!$con) {
        die('Connection failed: ' . mysqli_connect_error());
      }

      $backgrounds = array(
  'https://i.postimg.cc/sxgpZDBD/card1.jpg',
  'https://i.postimg.cc/XYtKrbc9/card2.jpg',
  'https://i.postimg.cc/nrTYr90L/card3.jpg',
   'https://i.postimg.cc/xCnzmTkN/card4.jpg',
    'https://i.postimg.cc/Y0tztzNV/card5.jpg',
     'https://i.postimg.cc/gcKKN1mP/card6.jpg',
      'https://i.postimg.cc/Cx5JZJyp/card7.jpg',
       'https://i.postimg.cc/KvqDyL1q/card8.jpg',
        'https://i.postimg.cc/FKZK2bR1/card9.jpg',
         'https://i.postimg.cc/YqsYPHPT/card10.jpg',
          'https://i.postimg.cc/T1yYLZcW/card11.jpg',
           'https://i.postimg.cc/XqvB2HkV/card12.jpg',
            'https://i.postimg.cc/k5nJFVcC/card13.jpg',
             'https://i.postimg.cc/RV7LbFfh/card14.jpg',
'https://i.postimg.cc/RZPfjn0S/card15.jpg',
'https://i.postimg.cc/tCkVxVW3/card16.jpg',
'https://i.postimg.cc/sgK9sNTR/card17.jpg',
'https://i.postimg.cc/ZRvrPK4T/card18.jpg',
'https://i.postimg.cc/2SC7pDFw/card19.jpg',
'https://i.postimg.cc/Kzm2B4nT/card20.jpg',
'https://i.postimg.cc/mkwhC0zL/card21.jpg',
'https://i.postimg.cc/Pr550VvD/card22.jpg',
'https://i.postimg.cc/d0PvQ534/card23.jpg',
'https://i.postimg.cc/9fR4K8Sb/card24.jpg',
'https://i.postimg.cc/y8rgf4fW/card25.jpg',
'https://i.postimg.cc/7L0HSpdF/card26.jpg',

  // Add more URLs here as needed
);
       // Define the query to retrieve data from the pet_clinics table
      $sql = "SELECT * FROM pet_clinics";

      // Execute the query
      $result = mysqli_query($con, $sql);

       // Loop through the results and display them in a card format
      while ($row = mysqli_fetch_assoc($result)) {
        $background = $backgrounds[array_rand($backgrounds)];

         echo '<a class="card" href="' . $row['map_link'] . '">';
       echo '<div class="card__background" style="background-image: url(' . $background . ')"></div>';
        echo '<div class="card__content">';
        echo '<p class="card__category">' . $row['type'] . '</p>';
        echo '<h3 class="card__heading">' . $row['name'] . '</h3>';
         echo '<p class="card__body">' . $row['address'] . '</p>';
         echo '<p class="card_text text-white">'. $row['phone_number'] .'</p>';
        echo '</div>';
         echo '<div class="location-icon"><i class="fas fa-map-marker-alt"></i></div>';
        echo '</a>';
      }

      // Close the database connection
      mysqli_close($con);
    ?>

    </div>

</section>
    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-white mt-5 py-5 px-sm-3 px-md-5">
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