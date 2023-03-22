<?php require_once "controllerAdminData.php"; ?>
<?php
include("connection.php");
ob_start();
if(isset($_POST['send'])){
    // Retrieve form data
    $walker_name = $_POST['walker_name'];
    $walker_email = $_POST['walker_email'];
    $walker_phone = $_POST['walker_phone'];
    $walker_address = $_POST['walker_address'];
    $walker_area = $_POST['walker_area'];

    // Check if all input fields are filled
    if(!empty($walker_name) && !empty($walker_email) && !empty($walker_phone) && !empty($walker_address) && !empty($walker_area)) {
        // Insert data into database
        $query = "INSERT INTO walkers (walker_name, walker_email, walker_phone, walker_address, walker_area) 
            VALUES ('$walker_name', '$walker_email', '$walker_phone', '$walker_address', '$walker_area')";
        $res = $con->query($query);
        if($res === TRUE){

             // Store notification in session variable
      $_SESSION['notification'] = "New Walker added successfully";
      // Redirect to the same page after a delay
      header("Refresh:1; url=indexadmin.php");
      exit(); // Make sure to call exit after header
        }
        else {
            // Store notification in session variable
      $_SESSION['notification'] = "Walkers data not submitted";
      // Redirect to the same page after a delay
      header("Refresh:1; url=indexadmin.php");
      exit(); // Make sure to call exit after header
        }
    }
    else {
        // Store notification in session variable
      $_SESSION['notification'] = "please retry again!";
      // Redirect to the same page after a delay
      header("Refresh:1; url=indexadmin.php");
      exit(); // Make sure to call exit after header
    }
}

ob_end_flush();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Add Walkers</title>
	 <link href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.min.css" rel="stylesheet">
     <!-- Boxicon -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<style>
	body{
/*    background-color: #dee9ff;*/
   background: rgb(249,152,47);
background: linear-gradient(219deg, rgba(249,152,47,1) 0%, rgba(16,2,22,1) 54%);
}

.registration-form{
	padding: 50px 0;
    margin-bottom: 65px;
}

.registration-form form{
    background-color: #221F26 ;
    max-width: 600px;
    margin: auto;
    padding: 50px 70px;
    border-top-left-radius: 30px;
    border-top-right-radius: 30px;
    border-bottom-left-radius: 30px;
    border-bottom-right-radius: 30px;
    box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.075);
}

.registration-form .form-icon{
	text-align: center;
    background-color: #5891ff;
    border-radius: 50%;
    font-size: 40px;
    color: white;
    width: 100px;
    height: 100px;
    margin: auto;
    margin-bottom: 50px;
    line-height: 100px;
}

.registration-form .item{
	border-radius: 20px;
    margin-bottom: 25px;
    padding: 10px 20px;
    background-color: #dee9ff;

}

.registration-form .create-account{
    border-radius: 30px;
    padding: 10px 20px;
    font-size: 18px;
    font-weight: bold;
    background-color: #f9982f;
    border: none;
    color: white;
    margin-top: 20px;
}

.registration-form .social-media{
    max-width: 600px;
    background-color: #fff;
    margin: auto;
    padding: 35px 0;
    text-align: center;
    border-bottom-left-radius: 30px;
    border-bottom-right-radius: 30px;
    color: #9fadca;
    border-top: 1px solid #dee9ff;
    box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.075);
}

.registration-form .social-icons{
    margin-top: 30px;
    margin-bottom: 16px;
}

.registration-form .social-icons a{
    font-size: 23px;
    margin: 0 3px;
    color: #5691ff;
    border: 1px solid;
    border-radius: 50%;
    width: 45px;
    display: inline-block;
    height: 45px;
    text-align: center;
    background-color: #fff;
    line-height: 45px;
}

.registration-form .social-icons a:hover{
    text-decoration: none;
    opacity: 0.6;
}

@media (max-width: 576px) {
    .registration-form form{
        padding: 50px 20px;
    }

    .registration-form .form-icon{
        width: 70px;
        height: 70px;
        font-size: 30px;
        line-height: 70px;
    }
}


.floating-menu {
  position: fixed;
  top: 0;
  right: 0;
}

.floating-menu a {
  display: block;
  padding: 10px;
  font-size: 16px;
  text-align: center;
  text-decoration: none;
  color: #fff;
  background-color: #333;
  border-radius: 4px;
  margin-top: 10px;
}

.floating-menu a:hover {
  background-color: #555;
}

.back-btn {
/*  margin-right: 1360px;*/
 margin-right: 1270px;
   float: left;
   width: 120px;

}

.logout-btn {
/*  margin-right: 20px;*/
 margin-right: 10px;
   float: right;
   width: 120px;
}

/* Media query for screens smaller than 768px */
@media (max-width: 1024px) {
  .floating-menu {
    bottom: 10px;
    right: 10px;
  }
  
  .back-btn,
  .logout-btn {
    font-size: 14px;
    padding: 8px;
    margin-right: 5px;
  }
}

/* Media query for screens smaller than 480px */
@media (max-width: 480px) {
  .back-btn,
  .logout-btn {
    font-size: 12px;
    padding: 6px;
    margin-right: 2px;
  }
}

#ion1{
  width: 25px;
  border-radius: 50px;
  float: left;
}

#ion{
     width: 25px;
  border-radius: 50px;
    float: right;
}
</style>
<body>
 <div class="floating-menu">
  <a href="indexadmin.php" class="back-btn"><i class='bx bx-home bx-sm' id="ion1"></i> Back</a>
  <a href="login-admin.php" class="logout-btn">  <i class='bx bx-log-out-circle bx-sm' id="ion"></i> Logout</a>
</div>

    <!-- Notification script setting and unsetting notified message-->
<div class="container pt-5 ">
  <div class="row">
    <div class="col-md-4">
       <!-- <h1 class="text-white">Bookings</h1>  -->
    </div>
    <div class="col-md-8 text-center">
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
</div>
</div>




	 <div class="registration-form">
        <form action="" method="post" enctype="multipart/form-data">
            
            <div class="form-group">
                <input type="text" required class="form-control item" name="walker_name" id="fullname" placeholder="Walker Name">
            </div>
            <div class="form-group">
                <input type="email" required class="form-control item" name="walker_email" id="email" placeholder="Walker Email">
            </div>
            <div class="form-group">
                <input type="phone" required class="form-control item" name="walker_phone" id="phone" placeholder="Walker Contact">
            </div>
            <div class="form-group">
                <input type="text" required class="form-control item" name="walker_address" id="address" placeholder="Walker Address">
            </div>
            			 <div class="panel-body">
          <div class="form-group">
            <label class="col-sm-4 control-label">Alloted Area</label>
            <div class="col-sm-10">
              <select name="walker_area" required class="form-control" value="">
                <option value="">Assign a region</option>
                <option value="Ghatkopar (east)">Ghatkopar (east)</option>
                <option value="Ghatkopar (west)">Ghatkopar (west)</option>
                <option value="Sion (east)">Sion (east)</option>
                <option value="Sion (west)">Sion (west)</option>
                <option value="Vidyavihar (east)">Vidyavihar (east)</option>
                 <option value="Vidyavihar (west)">Vidyavihar (west)</option>
              </select>
            </div>
          </div>
            <div class="form-group">
                <button type="submit" class="btn btn-block create-account" value="submit" name="send">Submit</button>
            </div>
        </form>




    </div>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
    <!-- <script src="assets/js/script.js"></script> -->
    <script>
    	$(document).ready(function(){
  $('#birth-date').mask('00/00/0000');
  $('#phone-number').mask('0000-0000');
 })
    	// Add the following code if you want the name of the file appear on select
$(".custom-file-input").on("change", function() {
  var fileName = $(this).val().split("\\").pop();
  $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});
    </script>

</body>
</html>