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
<!doctype html>
<html lang="en">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	  <!-- Boxicon -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

	<!-- Bootstrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link rel="stylesheet" href="https://allyoucan.cloud/cdn/icofont/1.0.1/icofont.css" integrity="sha384-jbCTJB16Q17718YM9U22iJkhuGbS0Gd2LjaWb4YJEZToOPmnKDjySVa323U+W7Fv" crossorigin="anonymous">
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

	<title>My Bookings</title>
</head>
<style>
	body{
		margin-top:20px;
		background:#eee;
	}
/* My Account */
.payments-item img.mr-3 {
	width: 47px;
}
.order-list .btn {
	border-radius: 2px;
	min-width: 121px;
	font-size: 13px;
	padding: 7px 0 7px 0;
}
.osahan-account-page-left .nav-link {
	padding: 18px 20px;
	border: none;
	font-weight: 600;
	color: #535665;
}
.osahan-account-page-left .nav-link i {
	width: 28px;
	height: 28px;
	background: #535665;
	display: inline-block;
	text-align: center;
	line-height: 29px;
	font-size: 15px;
	border-radius: 50px;
	margin: 0 7px 0 0px;
	color: #fff;
}
.osahan-account-page-left .nav-link.active {
	background: #f3f7f8;
	color: #282c3f !important;
}
.osahan-account-page-left .nav-link.active i {
	background: #282c3f !important;
}
.osahan-user-media img {
	width: 90px;
}
.card offer-card h5.card-title {
	border: 2px dotted #000;
}
.card.offer-card h5 {
	border: 1px dotted #daceb7;
	display: inline-table;
	color: #17a2b8;
	margin: 0 0 19px 0;
	font-size: 15px;
	padding: 6px 10px 6px 6px;
	border-radius: 2px;
	background: #fffae6;
	position: relative;
}
.card.offer-card h5 img {
	height: 22px;
	object-fit: cover;
	width: 22px;
	margin: 0 8px 0 0;
	border-radius: 2px;
}
.card.offer-card h5:after {
	border-left: 4px solid transparent;
	border-right: 4px solid transparent;
	border-bottom: 4px solid #daceb7;
	content: "";
	left: 30px;
	position: absolute;
	bottom: 0;
}
.card.offer-card h5:before {
	border-left: 4px solid transparent;
	border-right: 4px solid transparent;
	border-top: 4px solid #daceb7;
	content: "";
	left: 30px;
	position: absolute;
	top: 0;
}
.payments-item .media {
	align-items: center;
}
.payments-item .media img {
	margin: 0 40px 0 11px !important;
}
.reviews-members .media .mr-3 {
	width: 56px;
	height: 56px;
	object-fit: cover;
}
.order-list img.mr-4 {
	width: 70px;
	height: 70px;
	object-fit: cover;
	box-shadow: 0 .125rem .25rem rgba(0, 0, 0, .075)!important;
	border-radius: 2px;
}
.osahan-cart-item p.text-gray.float-right {
	margin: 3px 0 0 0;
	font-size: 12px;
}
.osahan-cart-item .food-item {
	vertical-align: bottom;
}

.h1, .h2, .h3, .h4, .h5, .h6, h1, h2, h3, h4, h5, h6 {
	color: #000000;
}

.shadow-sm {
	box-shadow: 0 .125rem .25rem rgba(0,0,0,.075)!important;
}

.rounded-pill {
	border-radius: 50rem!important;
}
a:hover{
	text-decoration:none;
}



#myBtn {
  display: none; /* Hidden by default */
  position: fixed; /* Fixed/sticky position */
  bottom: 20px; /* Place the button at the bottom of the page */
  right: 30px; /* Place the button 30px from the right */
  z-index: 99; /* Make sure it does not overlap */
  border: none; /* Remove borders */
  outline: none; /* Remove outline */
  background-color: red; /* Set a background color */
/*  color: white; /* Text color */*/
  cursor: pointer; /* Add a mouse pointer on hover */
  padding: 15px; /* Some padding */
  border-radius: 10px; /* Rounded corners */
/*  font-size: 18px; /* Increase font size */*/


}

#myBtn:hover {
  background-color: #555; /* Add a dark-grey background on hover */
}


.btn {
  background-color: orange; /* Blue background */
  border: none; /* Remove borders */
  color: white; /* White text */
  padding: 12px 16px; /* Some padding */
  font-size: 16px; /* Set a font size */
  cursor: pointer; /* Mouse pointer on hover */
}

/* Darker background on mouse-over */
.btn:hover {
  background-color: Red;
}



@import url(https://fonts.googleapis.com/css?family=Oswald:400);

.navigation {
  width: 100%;
  background-color: black;
}

.navigation i{
   width: 25px;
  border-radius: 50px;
  float: left;
}
/*img {
  width: 25px;
  border-radius: 50px;
  float: left;
}*/

.logout {
  font-size: .8em;
  font-family: 'Oswald', sans-serif;
  position: relative;
  right: -18px;
  bottom: -4px;
  overflow: hidden;
  letter-spacing: 3px;
  opacity: 0;
  transition: opacity .45s;
  -webkit-transition: opacity .35s;
  
}

.button {
  text-decoration: none;
  float: right;
  padding: 15px;

  margin: 15px;
  color: white !important; 
  width: 55px;
  background-color: black;
  transition: width .35s;
  -webkit-transition: width .35s;
  overflow: hidden
}

a:hover {
  width: 140px;
}

a:hover .logout{
	color: orange;
  opacity: .9;
  font-weight: bold;
}

a {
  text-decoration: none;
}

.button1 {
  text-decoration: none;
  float: left;
  padding: 15px;

  margin: 15px;
  color: white !important;
  width: 55px;
  background-color: black;
  transition: width .35s;
  -webkit-transition: width .35s;
  overflow: hidden
}

</style>
<body>
	   <div class="navigation">

          <a class="button" href="login-user.php">
              <i class='bx bx-log-out-circle bx-sm' ></i>
              <div class="logout">LOGOUT</div>

          </a>
          <a class="button1" href="index.php">
              <i class='bx bx-home bx-sm' ></i>
              <div class="logout">BACK</div>

          </a>

      </div>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="osahan-account-page-right shadow-sm bg-white p-4 h-100">
					<div class="tab-content" id="myTabContent">
						<div class="tab-pane  fade  active show" id="orders" role="tabpanel" aria-labelledby="orders-tab"> 
							<h4 class="font-weight-bold mt-0 mb-4"><i class='bx bxs-receipt' ></i>Past Orders</h4>
							<?php
							$email = $_SESSION['email'];
							$query = "SELECT * FROM bookings,petusers,petscust, walkers WHERE bookings.email = petusers.email AND bookings.email = '$email' AND petscust.ownerid = petusers.userid AND walkers.walkerid = bookings.walker_id ORDER BY bookings.created DESC";
							// $query = "SELECT *
              // FROM bookings
              // INNER JOIN petusers ON bookings.email = petusers.email
              // INNER JOIN petscust ON petscust.ownerid = petusers.userid
              // LEFT JOIN walkers ON walkers.walkerid = bookings.walker_id
              //  WHERE bookings.email = '$email'
              //  ORDER BY bookings.created DESC";

							$query_run = mysqli_query($con, $query);
							if(mysqli_num_rows($query_run) > 0) {
								while($row = mysqli_fetch_assoc($query_run)) {
									?>
									<div id="booking-details">
									<div class="bg-white card mb-4 order-list shadow-sm">
										<div class="gold-members p-4">
											<div class="row">
												<div class="col-md-6">
													<h6 class="mb-2">
														<a href="#" class="text-black"><i class='bx bxs-barcode'></i>Booking ID: <?php echo $row['bookingid']; ?></a>

													</h6>
													<p class="text-gray mb-1"><i class='bx bxs-calendar'><i class='bx bxs-time-five' ></i></i> <?php echo $row['created']; ?></p>
													<p class="text-gray mb-1"><i class='bx bxs-user-circle' ></i> <?php echo $row['name']; ?></p>
													<p class="text-gray mb-1"><i class='bx bxs-dog'></i> <?php echo $row['petname']; ?></p>
													
													<p class="text-gray mb-1"><i class='bx bx-trip'></i> <?php echo $row['pndaddress']; ?></p>
													<p class="text-gray mb-1"><i class='bx bxs-package' ></i> <?php echo $row['package']; ?></p>
														<p class="text-gray mb-1"><i class="icofont-money"></i><i class='bx bxs-wallet'></i> Payment: <?php echo $row['payment']; ?></p>
												</div>
												<div class="col-md-6 border-left">
												
													<p class="mb-0 text-black text-primary pt-2 mb-1"><span class="text-black font-weight-bold"> Total Amount:</span> <?php echo $row['price']; ?></p>
													<p class="mb-0 text-black text-primary pt-2 mb-1"><span class="text-black font-weight-bold"> Walker:</span> <?php echo $row['walker_id']; ?></p>
													<p class="mb-0 text-black text-primary pt-2 mb-1"><span class="text-black font-weight-bold"> Walker name:</span> <?php echo $row['walker_name']; ?></p>
													<p class="mb-0 text-black text-primary pt-2 mb-1"><span class="text-black font-weight-bold"> Walker contact:</span> <?php echo $row['walker_phone']; ?></p>
													<p class="mb-0 text-black text-primary pt-2 mb-1"><span class="text-black font-weight-bold"> Order State:</span> <?php echo $row['orderstatus']; ?></p>
																		<p class="mb-0 text-black text-primary pt-2 mb-1"><span class="text-black font-weight-bold"> Payment State:</span> <?php echo $row['paymentstatus']; ?></p>
												
														<!-- <a class="btn btn-sm btn-outline-primary" href="#"><i class="icofont-headphone-alt"></i> HELP</a> -->
														<!-- <a class="btn btn-sm btn-primary" href="#"><i class='bx bx-loader-alt bx-spin' ></i> Status</a> -->
												
														<!-- <div class="float-right">
														
															<button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class='bx bx-loader-alt bx-spin' ></i> Status</button>
														</div> -->
													
															

													
																		
																		<!-- <p class="mb-0 text-black text-primary pt-2 mb-1"><span class="text-black font-weight-bold"> Amount:</span> <?php echo $row['price']; ?></p> -->
																		<!-- <p class="mb-0 text-black text-primary pt-2 mb-1"><span class="text-black font-weight-bold"> Payment Mode:</span> <?php echo $row['payment']; ?></p> -->




													
												</div>
											</div>
										</div>
									</div>
									</div>
									<?php
								} 
							}
							else {
								echo "No Record Found";
							}
							?>
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>


  
 

	<!-- Optional JavaScript; choose one of the two! -->

 <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>

	<!-- Option 1: Bootstrap Bundle with Popper -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>