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

<?php
$email = $_SESSION['email'];

// Retrieve the user ID based on the email
$sql = "SELECT * FROM petusers WHERE email = '$email'";
$result = mysqli_query($con, $sql);
if ($row = mysqli_fetch_array($result)) {
    $ownid = $row['userid'];
    $cust_name = $row['name'];
    $contact = $row['phone'];
}

// Retrieve the pet ID based on the selected pet name
//$petname = $_POST['petname']; // Assuming the form has a select input named 'petname'
$sql = "SELECT * FROM petscust WHERE  ownerid = '$ownid'";
$result = mysqli_query($con, $sql);
if ($row = mysqli_fetch_array($result)) {
    $petid = $row['petid'];
    $petname = $row['petname'];
    $pettype = $row['pettype'];
    $petbreed = $row['petbreed'];
    $gender = $row['gender'];
}

if (isset($_POST['submit'])) {
  
  // Get the form data
  $pndaddress = $_POST['pndaddress'];
  $addr_area = $_POST['addr_area'];
  $package = $_POST['package'];
  $activities = $_POST['activities'];
  $price = $_POST['price'];
  $payment = $_POST['payment'];

  function uniqueid() {
  $num = mt_rand(10000000, 99999999);
  return $num;
}

  // Add an alert if the payment option is online
  if ($payment == 'Online') {
    // Use JavaScript to display the confirmation alert
    echo '<script>if(confirm("Do you want to confirm payment and place your booking?")){}else{location.href="index.php";}</script>';
    // Generate a random payment ID
    $paymentid = uniqueid();
    // Set the payment status to "Paid"
    $paymentstatus = "Paid";
  } else {
    $paymentid = "NULL";
    $paymentstatus = "Unpaid";
  }

  // Insert the data into the bookings table
  $sql = "INSERT INTO bookings (ownid, petid, email, pndaddress, addr_area, package, activities, price, payment, paymentstatus, paymentid) VALUES ('$ownid', '$petid', '$email', '$pndaddress', '$addr_area', '$package', '$activities', '$price', '$payment', '$paymentstatus', '$paymentid')";

  if ($con->query($sql) === TRUE) {
    // Store notification in session variable
    $_SESSION['notification'] = "New booking added successfully";
    // Redirect to the same page after a delay
    header("Refresh:1; url=booking.php");
    exit(); // Make sure to call exit after header
  } else {
    // Store notification in session variable
    $_SESSION['notification'] = "Please try again!";
    // Redirect to the same page after a delay
    header("Refresh:1; url=booking.php");
    exit(); // Make sure to call exit after header
  }
  
  // Close the database connection
  $con->close();
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title><?php echo $fetch_info['name'] ?> | PetFerry | Home </title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

     <!-- Boxicon -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    


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
    <link rel="shortcut icon" href="Bg1.jpg" />
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
                <h1 class="m-0 display-5 text-capitalize font-weight-bold text-white"><span class="text-primary">Pet</span>Ferry</h1>
            </a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between px-3" id="navbarCollapse" >
                <div class="navbar-nav ms-auto py-0">
                    <a href="index.php" class="nav-item nav-link active" >Home</a>
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

    <!-- Carousel Start -->
    <div class="container-fluid p-0">
        <div id="header-carousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" src="https://i.postimg.cc/QtDpCFWH/carousal5.jpg" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 900px;">
                            <h3 class="text-white mb-3 d-none d-sm-block">Pet Services</h3>
                            <h1 class="display-3 text-white mb-3">Think About Your Pet</h1>
                            <h5 class="text-white mb-3 d-none d-sm-block">Does they feel happy? when you are away. Who will look after them? it's us PetFerry!</h5>
                            <a href="booking.php" class="btn btn-lg btn-primary mt-3 mt-md-4 px-4">Book Now</a>
                            <a href="service.php" class="btn btn-lg btn-secondary mt-3 mt-md-4 px-4 text-white">Learn More</a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="w-100" src="https://i.postimg.cc/1zp0cGG9/carousal4.jpg" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 900px;">
                            <h3 class="text-white mb-3 d-none d-sm-block">Walk-Love-Care</h3>
                            <h1 class="display-3 text-white mb-3">Pet Walking - our superior service</h1>
                            <h5 class="text-white mb-3 d-none d-sm-block">A new partner for every owners & their pets </h5>
                            <a href="booking.php" class="btn btn-lg btn-primary mt-3 mt-md-4 px-4">Book Now</a>
                            <a href="service.php" class="btn btn-lg btn-secondary mt-3 mt-md-4 px-4 text-white">Learn More</a>
                        </div>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#header-carousel" data-slide="prev">
                <div class="btn btn-primary rounded" style="width: 45px; height: 45px;">
                    <span class="carousel-control-prev-icon mb-n2"></span>
                </div>
            </a>
            <a class="carousel-control-next" href="#header-carousel" data-slide="next">
                <div class="btn btn-primary rounded" style="width: 45px; height: 45px;">
                    <span class="carousel-control-next-icon mb-n2"></span>
                </div>
            </a>
        </div>
    </div>
    <!-- Carousel End -->


    <!-- Booking Start -->
 <div class="container-fluid bg-light">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-5">
                <div class="bg-primary py-5 px-4 px-sm-5">
                    <form class="py-0" action="index.php" method="post">
                        <div class="form-group">
                            <label class="col-form-label form-control-label text-white">Email</label>
                            <input type="email" class="form-control border-0 p-4" readonly placeholder="Your Email" required name="email" value="<?php echo $fetch_info['email'] ?>" />
                        </div>
                        <div class="form-group">
                            <label class="col-form-label form-control-label text-white">Pickup & Dropoff Points</label>
                            <input type="text" required name="pndaddress" class="form-control border-0 p-4" placeholder="Address to pick up & Dropoff Point"/>
                        </div>
                        <div class="form-group">
                              <label class="col-form-label form-control-label text-white">Address region</label>
                            <select class="custom-select border-0 px-4" required name="addr_area" style="height: 47px;">
                                <option selected value="">Select your Address Area</option>
                                <option value="Ghatkopar (east)">Ghatkopar (east)</option>
                                <option value="Ghatkopar (west)">Ghatkopar (west)</option>
                                <option value="Sion (east)">Sion (east)</option>
                                <option value="Sion (west)">Sion (west)</option>
                                <option value="Vidyavihar (east)">Vidyavihar (east)</option>
                                <option value="Vidyavihar (west)">Vidyavihar (west)</option>
                            </select>
                        </div>
                        <div class="form-group">
                        <label class="col-form-label form-control-label text-white"  for="package">Packages</label>
                        <select class="form-control border-0 px-4" required name="package" style="height: 47px;" id="package" onchange="populateActivities()">
                        <option value="">Select a package</option>
                         <option value="Primary">Primary</option>
                         <option value="Secondary">Secondary</option>
                        <option value="Standard">Standard</option>
                        <option value="Preferred">Preferred</option>
                        <option value="Habitude">Habitude</option>
                        <option value="Master Fitness">Master Fitness</option>
                        <option value="Master Health">Master Health</option>
                       
                        
                        </select>
                        </div>

                        <div class="form-group">
                        <label class="col-form-label form-control-label text-white" for="activity">Package Activities</label>
                        <select class="form-control border-0 px-4" required name="activities" style="height: 47px;" id="activity">
                        <option value="">Activities to be performed</option>
                        </select>
                        </div>

                         <div class="form-group">
                        <label class="col-form-label form-control-label text-white" for="price">Price</label>
                        <select class="form-control border-0 px-4 " required name="price" style="height: 47px;" id="price">
                        <option value="">Package Price</option>
                        </select>
                        </div>

                        <div class="form-group">
                              <label class="col-form-label form-control-label text-white">Payment Mode</label>
                            <select class="custom-select border-0 px-4 mb-3" required name="payment" style="height: 47px;">
                                <option selected value="">Select your Payment Mode</option>
                                <option value="Online">Online</option>
                                <option value="Offline">Offline</option>
                            </select>
                        </div>



                        <div>
                            <button class="btn btn-dark btn-block border-0 py-3" name="submit" type="submit">Book Now</button>
                        </div>
                    </form>
                </div>
            </div>
                <div class="col-lg-7 py-5 py-lg-0 px-3 px-lg-5">
                    <h4 class="text-secondary mb-3">Going for a vacation, leave or need a break?</h4>
                    <h1 class="display-6 mb-4">Book a Ferry <span class="text-primary">For Your Pet</span></h1>
                    <p>Having a pet but not able to spend time with them. Let we help you out with small steps</p>
                    <div class="row py-2">
                        <div class="col-sm-6">
                            <div class="d-flex flex-column">
                                <div class="d-flex align-items-center mb-2">
                                    <!-- <h1 class="flaticon-house font-weight-normal text-secondary m-0 mr-3"></h1> --><h1 class="m-0 mr-3"><lottie-player src="https://assets2.lottiefiles.com/packages/lf20_2ixzdfvy.json"  background="transparent"  speed="1"  style="width: 90px; height: 80px;"  loop  autoplay></lottie-player></h1> 
                                    <h5 class="text-truncate m-0">Pet Walking</h5>
                                </div>
                                <p>Book a ferry & wallah walker is there to take care</p>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="d-flex flex-column">
                                <div class="d-flex align-items-center mb-2">
                                    <!-- <h1 class="flaticon-food font-weight-normal text-secondary m-0 mr-3"></h1> -->
                                    <h1 class="m-0 mr-3"><lottie-player src="https://assets4.lottiefiles.com/packages/lf20_zdrbkdtt.json"  background="transparent"  speed="1"  style="width: 90px; height: 80px;"  loop  autoplay></lottie-player></h1>
                                    <h5 class="text-truncate m-0">Pet Dining</h5>
                                </div>
                                <p>Providing your pet with most nutritional food</p>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="d-flex flex-column">
                                <div class="d-flex align-items-center mb-2">
                                    <!-- <h1 class="flaticon-grooming font-weight-normal text-secondary m-0 mr-3"></h1> -->
                                    <h1 class="m-0 mr-3"><lottie-player src="https://assets9.lottiefiles.com/private_files/lf30_licg9ydj.json" mode="bounce" background="transparent"  speed="1"  style="width: 90px; height: 80px;"  loop  autoplay></lottie-player></h1>
                                    <h5 class="text-truncate m-0">Pet Dressing</h5>
                                </div>
                                <p class="m-0">To enhance your pet beauty with grooming & cleansing</p>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="d-flex flex-column">
                                <div class="d-flex align-items-center mb-2">
                                    <!-- <h1 class="flaticon-toy font-weight-normal text-secondary m-0 mr-3"></h1> -->
                                    <h1 class="m-0 mr-3"><lottie-player src="https://assets1.lottiefiles.com/private_files/lf30_vgeoiyj0.json"  background="transparent"  speed="1"  style="width: 90px; height: 80px;"  loop  autoplay></lottie-player></h1>
                                    <h5 class="text-truncate m-0">Pet Coaching</h5>
                                </div>
                                <p class="m-0">To train your pet by adding a little more knowledge</p>
                            </div>
                        </div>
                           <div class="col-sm-6">
                            <div class="d-flex flex-column">
                                <div class="d-flex align-items-center mb-2">
                                    <!-- <h1 class="flaticon-dog font-weight-normal text-secondary m-0 mr-3"></h1> -->
                                    <h1 class="m-0 mr-3"><lottie-player src="https://assets2.lottiefiles.com/packages/lf20_IHCvIx.json"  background="transparent"  speed="1"  style="width: 80px; height: 70px;"  loop  autoplay></lottie-player></h1>
                                    <h5 class="text-truncate m-0">Pet Workout</h5>
                                </div>
                                <p>To make sure that your pet is ready for any kind of situation</p>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="d-flex flex-column">
                                <div class="d-flex align-items-center mb-2">
                                    <!-- <h1 class="flaticon-vaccine font-weight-normal text-secondary m-0 mr-3"></h1> -->
                                    <h1 class="m-0 mr-3"><lottie-player src="https://assets8.lottiefiles.com/packages/lf20_LczabPsHLK.json"  background="transparent"  speed="1"  style="width: 80px; height: 70px;"  loop  autoplay></lottie-player></h1>
                                    <h5 class="text-truncate m-0">Pet Doctoring</h5>
                                </div>
                                <p>To keep a track of their health & providing them with better guidence</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Booking Start -->


    <!-- About Start -->
    <div class="container py-5">
        <div class="row py-5">
            <div class="col-lg-7 pb-5 pb-lg-0 px-3 px-lg-5">
                <h4 class="text-secondary mb-3">Tale</h4>
                <h1 class="display-4 mb-4"><span class="text-primary">Walking</span> & <span class="text-secondary">Loving</span></h1>
                <h5 class="text-muted mb-3">The idea is to use todays technology & prepare an outcome from it. Process that can be helpfull for every pet owners.</h5>
                <p class="mb-4">Motive is to provide our best service to each and every customer. To lend a helping hand for those owners who are unable to spend valuable moment with their pets. Acting as a sub-ordinate to role as your pets friend!! </p>
                <ul class="list-inline">
                    <li><h5><i class="fa fa-check-double text-secondary mr-3"></i>Finest In Industry</h5></li>
                    <li><h5><i class="fa fa-check-double text-secondary mr-3"></i>Excellent Services</h5></li>
                    <li><h5><i class="fa fa-check-double text-secondary mr-3"></i>Customer Support</h5></li>
                </ul>
                <a href="service.php" class="btn btn-lg btn-primary mt-3 px-4">Learn More</a>
            </div>
            <div class="col-lg-5">
                <div class="row px-3">
                    <div class="col-12 p-0">
                        <img class="img-fluid w-100" src="https://i.postimg.cc/RZdNZfWr/pricen3.jpg" alt="">
                    </div>
                    <div class="col-6 p-0">
                        <img class="img-fluid w-100" src="https://i.postimg.cc/L8YkKT9s/aboutn3.jpg" alt="">
                    </div>
                    <div class="col-6 p-0">
                        <img class="img-fluid w-100" src="https://i.postimg.cc/zXPwcM1M/aboutn4.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


    <!-- Services Start -->
    <div class="container-fluid bg-light pt-5">
        <div class="container py-5">
            <div class="d-flex flex-column text-center mb-5">
                <h4 class="text-secondary mb-3">Our Assistance</h4>
                <h1 class="display-4 m-0"><span class="text-primary">Loving</span> Pet Services</h1>
            </div>
            <div class="row pb-3">
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="d-flex flex-column text-center bg-white mb-2 p-3 p-sm-5" id="hover" >
                        <!-- <h3 class="flaticon-house display-3 font-weight-normal text-secondary mb-3"></h3> -->
                        <h3 class="mb-3"><lottie-player src="https://assets2.lottiefiles.com/packages/lf20_2ixzdfvy.json"  background="transparent"  speed="1"  style="width: 260px; height: 180px;"  loop  autoplay></lottie-player></h3>
                        <h3 class="mb-3">Pet Walking</h3>
                     <!--   <p>Diam amet eos at no eos sit lorem, amet rebum ipsum clita stet, diam sea est magna diam eos, rebum sit vero stet ipsum justo</p>
                        <a class="text-uppercase font-weight-bold" href="">Read More</a> -->
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="d-flex flex-column text-center bg-white mb-2 p-3 p-sm-5" id="hover">
                        <!-- <h3 class="flaticon-grooming display-3 font-weight-normal text-secondary mb-3"></h3> -->
                        <h3 class="mb-3"><lottie-player src="https://assets9.lottiefiles.com/private_files/lf30_licg9ydj.json" mode="bounce" background="transparent"  speed="1"  style="width: 260px; height: 180px;"  loop  autoplay></lottie-player></h3>
                        <h3 class="mb-3">Pet Dressing</h3>
                     <!--   <p>Diam amet eos at no eos sit lorem, amet rebum ipsum clita stet, diam sea est magna diam eos, rebum sit vero stet ipsum justo</p>
                        <a class="text-uppercase font-weight-bold" href="">Read More</a>  -->
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="d-flex flex-column text-center bg-white mb-2 p-3 p-sm-5" id="hover">
                        <!-- <h3 class="flaticon-food display-3 font-weight-normal text-secondary mb-3"></h3> -->
                        <h3 class="mb-3"><lottie-player src="https://assets4.lottiefiles.com/packages/lf20_zdrbkdtt.json"  background="transparent"  speed="1"  style="width: 260px; height: 180px;"  loop  autoplay></lottie-player></h3>
                        <h3 class="mb-3">Pet Dining</h3>
                      <!--  <p>Diam amet eos at no eos sit lorem, amet rebum ipsum clita stet, diam sea est magna diam eos, rebum sit vero stet ipsum justo</p>
                        <a class="text-uppercase font-weight-bold" href="">Read More</a> -->
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="d-flex flex-column text-center bg-white mb-2 p-3 p-sm-5" id="hover">
                        <!-- <h3 class="flaticon-vaccine display-3 font-weight-normal text-secondary mb-3"></h3> -->
                        <h3 class="mb-3"><lottie-player src="https://assets8.lottiefiles.com/packages/lf20_LczabPsHLK.json"  background="transparent"  speed="1"  style="width: 260px; height: 180px;"  loop  autoplay></lottie-player></h3>
                        <h3 class="mb-3">Pet Doctoring</h3>
                     <!--    <p>Diam amet eos at no eos sit lorem, amet rebum ipsum clita stet, diam sea est magna diam eos, rebum sit vero stet ipsum justo</p>
                        <a class="text-uppercase font-weight-bold" href="">Read More</a> -->
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="d-flex flex-column text-center bg-white mb-2 p-3 p-sm-5" id="hover">
                        <!-- <h3 class="flaticon-cat display-3 font-weight-normal text-secondary mb-3"></h3> -->
                        <h3 class="mb-3"><lottie-player src="https://assets1.lottiefiles.com/private_files/lf30_vgeoiyj0.json"  background="transparent"  speed="1"  style="width: 260px; height: 180px;"  loop  autoplay></lottie-player></lottie-player></h3>
                        <h3 class="mb-3">Pet Coaching</h3>
                    <!--       <p>Diam amet eos at no eos sit lorem, amet rebum ipsum clita stet, diam sea est magna diam eos, rebum sit vero stet ipsum justo</p>
                        <a class="text-uppercase font-weight-bold" href="">Read More</a>  -->
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="d-flex flex-column text-center bg-white mb-2 p-3 p-sm-5" id="hover">
                        <!-- <h3 class="flaticon-dog display-3 font-weight-normal text-secondary mb-3"></h3> -->
                        <h3 class="mb-3"><lottie-player src="https://assets4.lottiefiles.com/packages/lf20_lkcv3xga.json"  background="transparent"  speed="1"  style="width: 260px; height: 180px;"  loop  autoplay></lottie-player></h3>
                        <h3 class="mb-3">Pet Workout</h3>
                        
                    <!--     <p>Diam amet eos at no eos sit lorem, amet rebum ipsum clita stet, diam sea est magna diam eos, rebum sit vero stet ipsum justo</p>
                        <a class="text-uppercase font-weight-bold" href="">Read More</a>  -->
                    </div>
                </div>
                <a href="service.php" class="btn btn-lg btn-primary mt-3 px-5 p-3 align-self-center mx-auto">More Info</a>
            </div>
        </div>
    </div>
    <!-- Services End -->


    <!-- Features Start -->
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-5">
                <img class="img-fluid w-100" src="https://i.postimg.cc/hjkG515m/aboutn1.jpg" alt="">
            </div>
            <div class="col-lg-7 py-5 py-lg-0 px-3 px-lg-5">
                <h4 class="text-secondary mb-3">Why Prefer Us?</h4>
                <h1 class="display-4 mb-4"><span class="text-primary">Special Care</span> Of Pets</h1>
                <p class="mb-4">We always make sure that your pet feel safe with us without any barrier. The walker is best in the business, who will look after them, as they are fully mastered in their job.</p>
                <div class="row py-2">
                    <div class="col-6">
                        <div class="d-flex align-items-center mb-4">
                            <!-- <h1 class="flaticon-cat font-weight-normal text-secondary m-0 mr-3"></h1> -->
                            <h1 class="m-0 mr-3"><lottie-player src="https://assets1.lottiefiles.com/packages/lf20_gfmpysbx.json"  background="transparent"  speed="1"  style="width: 85px; height: 75px;"  loop  autoplay></lottie-player></h1>
                            <h5 class="text-truncate m-0">Finest In Industry</h5>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="d-flex align-items-center mb-4">
                            <!-- <h1 class="flaticon-doctor font-weight-normal text-secondary m-0 mr-3"></h1> -->
                            <h1 class="m-0 mr-3"><lottie-player src="https://assets10.lottiefiles.com/private_files/lf30_mksyrgzs.json"  background="transparent"  speed="1"  style="width: 85px; height: 75px;"  loop  autoplay></lottie-player></h1>
                            <h5 class="text-truncate m-0">Excellent Services</h5>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="d-flex align-items-center">
                            <!-- <h1 class="flaticon-care font-weight-normal text-secondary m-0 mr-3"></h1> -->
                            <h1 class="m-0 mr-3"><lottie-player src="https://assets9.lottiefiles.com/packages/lf20_ldyugxmt.json"  background="transparent"  speed="1"  style="width: 85px; height: 75px;"  loop  autoplay></lottie-player></h1>
                            <h5 class="text-truncate m-0">Specific Care</h5>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="d-flex align-items-center">
                            <!-- <h1 class="flaticon-dog font-weight-normal text-secondary m-0 mr-3"></h1> -->
                            <h1 class="m-0 mr-3"><lottie-player src="https://assets2.lottiefiles.com/packages/lf20_qzhzukc8.json"  background="transparent"  speed="1"  style="width: 85px; height: 75px;"  loop  autoplay></lottie-player></h1>
                            <h5 class="text-truncate m-0">Customer Support</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Features End -->


    <!-- Pricing Plan Start -->
    <div class="container-fluid bg-light pt-5 pb-4">
        <div class="container py-5">
            <div class="d-flex flex-column text-center mb-5">
                <h4 class="text-secondary mb-3">Pricing Plan</h4>
                <h1 class="display-4 m-0">Choose the <span class="text-primary">Best Price</span></h1>
            </div>
            <div class="row">
                <div class="col-lg-4 mb-4">
                    <div class="card border-0" id="hover">
                        <div class="card-header position-relative border-0 p-0 mb-4">
                            <img class="card-img-top" src="https://i.postimg.cc/y8sXyVhM/price4.jpg" alt="">
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
                            <img class="card-img-top" src="https://i.postimg.cc/dt8jC7CR/price5.jpg" alt="">
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
                            <img class="card-img-top" src="https://i.postimg.cc/XNB8V17z/price6.jpg" alt="">
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
                <a href="price.php" class="btn btn-lg btn-primary mt-3 px-5 p-3 align-self-center mx-auto">More Plans</a>
            </div>
        </div>
    </div>
    
    <!-- Pricing Plan End -->


    <!-- Testimonial Start -->
    <div class="container-fluid  my-5 p-0 py-5">
        <div class="container p-0 py-5">
            <div class="d-flex flex-column text-center mb-5">
                <!-- <h4 class="text-secondary mb-3">Testimonial</h4> -->
                <h1 class="display-4 m-0">Our Client <span class="text-primary">Says</span></h1>
            </div>
            <div class="owl-carousel testimonial-carousel">
                <div class="bg-white mx-3 p-4">
                    <div class="d-flex align-items-end mb-3 mt-n4 ml-n4">
                        <img class="img-fluid" src="img/testimonial-1.jpg" style="width: 80px; height: 80px;" alt="">
                        <div class="ml-3">
                            <h5>Aditya Watekar</h5>
                            <i>Natru's parent</i>
                        </div>
                    </div>
                    <p class="m-0">Decent service also liked the packages idea it makes our choices more clear based on the activities present inside each package</p>
                </div>
                <div class="bg-white mx-3 p-4">
                    <div class="d-flex align-items-end mb-3 mt-n4 ml-n4">
                        <img class="img-fluid" src="img/testimonial-2.jpg" style="width: 80px; height: 80px;" alt="">
                        <div class="ml-3">
                            <h5>Jatin Pandey</h5>
                            <i>Honey's parent</i>
                        </div>
                    </div>
                    <p class="m-0">Featured packed services, the walkers are also co-operative and very caring</p>
                </div>
                <div class="bg-white mx-3 p-4">
                    <div class="d-flex align-items-end mb-3 mt-n4 ml-n4">
                        <img class="img-fluid" src="img/testimonial-3.jpg" style="width: 80px; height: 80px;" alt="">
                        <div class="ml-3">
                            <h5>Jaikumar Gaja</h5>
                            <i>Julie's parent</i>
                        </div>
                    </div>
                    <p class="m-0">Nice User Interface with respect to the colors, its very catchy for a user as it grabs our focus</p>
                </div>
                <div class="bg-white mx-3 p-4">
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
                            <a class="text-white mb-2" href="tips.php"><i class="fa fa-angle-right mr-2"></i>Tips & Tricks</a>
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
<script>
   function populateActivities() {
  var package = document.getElementById("package").value;
  var activity = document.getElementById("activity");
  var price = document.getElementById("price");

  activity.innerHTML = "";
  price.innerHTML = "";


  if (package === "Primary") {
    var option1 = document.createElement("option");
    option1.text = "Walking";
    activity.add(option1);
    activity.value = "Walking"; // Automatically select "Walking"
    var option1 = document.createElement("option");
    option1.text = "₹200";
    price.add(option1);
    price.value = "₹200"; // Automatically select "Walking"
  } 
  else if (package === "Secondary") {
     var option1 = document.createElement("option");
    option1.text = "Walking, Dining";
    activity.add(option1);
    activity.value = "Walking, Dining"; // Automatically select "Walking"
    var option1 = document.createElement("option");
    option1.text = "₹350";
    price.add(option1);
    price.value = "₹350"; // Automatically select "Walking"
  } else if (package === "Standard") {
     var option1 = document.createElement("option");
    option1.text = "Walking, Dining, Dressing";
    activity.add(option1);
    activity.value = "Walking, Dining, Dressing"; // Automatically select "Walking"
    var option1 = document.createElement("option");
    option1.text = "₹500";
    price.add(option1);
    price.value = "₹500"; 
  }
  else if (package === "Preferred") {
     var option1 = document.createElement("option");
    option1.text = "Walking, Dining, Dressing, Doctoring";
    activity.add(option1);
    activity.value = "Walking, Dining, Dressing, Doctoring";
    var option1 = document.createElement("option");
    option1.text = "₹1000";
    price.add(option1);
    price.value = "₹1000"; 
  }
  else if (package === "Habitude") {
     var option1 = document.createElement("option");
    option1.text = "Walking, Dining, Coaching";
    activity.add(option1);
    activity.value = "Walking, Dining, Coaching";
    var option1 = document.createElement("option");
    option1.text = "₹650";
    price.add(option1);
    price.value = "₹650"; 
  }
   else if (package === "Master Fitness") {
     var option1 = document.createElement("option");
    option1.text = "Walking, Dining, Workout";
    activity.add(option1);
    activity.value = "Walking, Dining, Workout";
    var option1 = document.createElement("option");
    option1.text = "₹800";
    price.add(option1);
    price.value = "₹800"; 
  }
  else if (package === "Master Health") {
     var option1 = document.createElement("option");
    option1.text = "Coaching, Dining, Workout, Doctoring";
    activity.add(option1);
    activity.value = "Coaching, Dining, Workout, Doctoring";
    var option1 = document.createElement("option");
    option1.text = "₹1500";
    price.add(option1);
    price.value = "₹1500"; 
  }
}
</script>
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