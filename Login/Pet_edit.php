<?php require_once "controllerUserData.php"; ?>
<?php require_once "petupdate.php"; ?>
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
         $userid = $fetch_info['userid'];
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
 $userid = $fetch_info['userid'];
    $sql = "SELECT petusers.userid, petscust.ownerid, petscust.petid, petscust.petname, petscust.pettype, petscust.petbreed, petscust.gender FROM  petusers, petscust WHERE '$userid' =  petscust.ownerid";
    $result = mysqli_query($con, $sql);
   
    while($row=mysqli_fetch_array($result)){
        
        $petid = $row['petid'];
     $petname = $row['petname'];
      $pettype = $row['pettype'];
       $petbreed = $row['petbreed'];
        $gender = $row['gender'];
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Pet_edit</title>
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
    <link rel="stylesheet" type="text/css" href="Profiledit.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

   <!--  <script>
function favSex() {
var petsex = document.getElementById("petsexList");
// document.getElementById("petsex").value = petsex.options[petsex.selectedIndex].text;
}
</script>
 -->

</head>
<body>
        <nav class="navbar fixed-top navbar-expand-lg bg-dark navbar-dark py-3 py-lg-0 px-lg-5 ">
            <div class="container-fluid p-0">
             <div class="col-lg-3">
                <a href="" class="navbar-brand d-none d-lg-block">
                    <h1 class="m-0 display-5 text-capitalize text-white"><span class="text-primary">Pet</span>Ferry</h1>
                </a>
            </div>
            <a href="" class="navbar-brand d-block d-lg-none">
                <h1 class="m-0 display-5 text-capitalize font-weight-bold text-white"><span class="text-primary">Pet</span>Ferry</h1>
            </a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between px-3" id="navbarCollapse" >
                <div class="navbar-nav ms-auto py-0">
                      <a href="Pet_edit.php" class="nav-item nav-link active" >Edit</a>
                       <a href="Petfolio1.php" class="nav-item nav-link">Profile</a>
                    <a href="index.php" class="nav-item nav-link " >Home</a>
                    <a href="service.php" class="nav-item nav-link">Service</a>
                    <a href="booking.php" class="nav-item nav-link">Booking</a>
                    <a href="price.php" class="nav-item nav-link">Price</a>
                   
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Health-hub</a>
                        <div class="dropdown-menu rounded-0 m-0">
                            <a href="tips.php" class="dropdown-item">Tips & Tricks</a>
                            <a href="clinics.php" class="dropdown-item">Clinics & NGOs</a>
                        </div>
                    </div>
                    <a href="contact.php" class="nav-item nav-link">Contact</a>
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

<header>
    <div class="container">

 <div class="row">
        <div class="col-lg-4">
           <div class="profile-card-4">
            <div class="card z-depth-3">
              <div class="card-body text-center bg-primary rounded-top">
               <div class="user-box">
                <img src="https://i.postimg.cc/FKH6FS3P/petfolo.jpg" alt="user avatar">
              </div>
              <h5 class="mb-1 text-white"><?php echo $petname; ?></h5>
              <h6 class="text-light">PetID: <?php echo $petid; ?></h6>
              
             </div>
              <button href="#" class="btn btn-outline-secondary text-dark px-2 py-3 mt-2 mb-2 ml-2 mr-2 nohover">Update Image</button>
             <a href="Profile_edit.php" class="btn btn-primary btn-outline-secondary text-white px-2 py-3  mb-2 ml-2 mr-2">Edit Profile</a>
             </div>
           </div>
        </div> 
        

        <!-- <div class="row"> -->

        <div class="col-lg-8">
           <div class="card z-depth-3 ">
             <div class="card-header text-white text-center bg-dark pb-1" >
               <h5 class="text-white"> Petfolio</h5>
             </div>
              <!-- <h5 class="card-title text-white text-center bg-dark">Secondary card title</h5> -->
            <div class="card-body text-dark">
                

            <div class="tab-content p-3">
                    <div class="tab-pane active">

                    <form action="Pet_edit.php" method="POST">
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">User ID</label>
                            <div class="col-lg-9">
                                <input class="form-control" type="text" readonly name="ownerid" value="<?php echo $fetch_info['userid'] ?>" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Pet Name</label>
                            <div class="col-lg-9">
                                <input class="form-control" required type="text" name="petname" pattern="[A-Za-z ]+" value="<?php echo $petname; ?>" placeholder="<?php echo $petname; ?>">
      <small class="text-muted">Only characters and spaces are allowed</small>
    </div>

                            </div>
                        </div>
                       <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Pet Type</label>
                            <div class="col-lg-9">
                                <select name="pettype" required value="" >
                            <option value="">Choose Type</option>
                            <option value="Dog">Dog</option>
                            <option value="Cat">Cat</option>
                            </select>
                            </div>
                           
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Pet Breed</label>
                            <div class="col-lg-9">
                                 <input class="form-control"  type="text" name="petbreed" pattern="[A-Za-z ]+" value="<?php echo $petbreed; ?>" placeholder="<?php echo $petbreed; ?>">
      <small class="text-muted">Only characters and spaces are allowed</small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Pet Sex</label>
                            <div class="col-lg-9">
                                <select name="gender" required value="" >
                            <option value="">Choose Sex</option>
                            <option value="Male"> Male</option>
                            <option value="Female"> Female </option>
                            </select>
                            </div>
                           
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label"></label>
                            <div class="col-lg-9">
                                 <input type="submit" name="update_cancel1" class="btn  btn-primary btn-outline-secondary text-dark pl-4 pr-4 nohover" value="Cancel">
                                <input type="submit" name="submit" class="btn btn-primary btn-outline-secondary text-white" value="Save Changes">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
      </div>
        
    </div>
</div>
</header>






<!-- JavaScript Libraries -->
<script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
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


<!--<?php 
// $connection = mysqli_connect('localhost', 'root', '');
// $db = mysqli_select_db($connection,'formuser1');
// //if user signup button
// if(isset($_POST['submit'])){
    // $ownerid = $_POST['ownerid'];
    // $petname = $_POST['petname'];

    // $pettype = $_POST['pettype'];
    // // $address = mysqli_real_escape_string($con, $_POST['address']);
    

    // $petbreed = $_POST['petbreed'];
    // $gender = $_POST['gender'];


    // $query = "INSERT INTO pets (`ownerid`, `petname`, `pettype`, `petbreed`, `gender`)
    //                     VALUES('$ownerid', '$petname','$pettype', '$petbreed', '$gender')";
    // $query_run = mysqli_query($connection, $query);

    // if($query_run)
    // {
    //     echo '<script type="text/javascript">alert("Data Saved")</script>';

    // }
    // else
    // {
    //     echo '<script type="text/javascript">alert("Data Not Saved")</script>';
    // }
// echo '<script type="text/javascript">alert("Data Saved")</script>';

// }
// else{
//     echo '<script type="text/javascript">alert("Data Not Saved")</script>';

// }
?> -->

