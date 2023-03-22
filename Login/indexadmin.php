<?php require_once "controllerAdminData.php"; ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	  <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous"> -->
       <!-- Boxicon -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    
	<link rel="preconnect" href="https://fonts.gstatic.com">
 <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;400;700;800&display=swap" rel="stylesheet">
 <link rel="stylesheet" type="text/css" href="adminin.css">
	<title>Admin Dashboard</title>
</head>
<body>
	<!-- <h1>Helllo Admin</h1>  -->
  <!-- Notification script setting and unsetting notified message-->
<!-- <div class="container pt-5 ">
  
</div> -->
<div class="container">

    <div class="left-col">
        <nav>
           <img src="https://i.postimg.cc/JzKwwG16/arrow.png" class="back-btn">

            <ul>
                <li><a href="#" class="active">Home</a></li>
                <li><a href="Bookingdt.php">Bookings</a></li>
                <li><a href="petclinics.php">Petclincs</a></li>
                <li><a href="addwalkers.php">AddWalkers</a></li>
                <li><a href="petwalker.php">PetWalkers</a></li>
                <li><a href="adminown1.php">PetOwners</a></li>
                 <li><a href="adminpetown.php">Pets</a></li>
                <li><a href="login-admin.php">Logout</a></li>
            </ul>
        </nav>
    </div>

    <section>
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
        <header>
           <svg  class="menu-btn" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg" >
<path d="M20 5V2H0V5H20ZM20 11V8H0V11H20ZM20 17V14H0V17H20Z" fill="white"/> 
</svg>
            <p class="logo">Pet Ferry</p>

        </header>
        <div class="cv">
            <div class="content">
                <h1>सुस्वागतम </h1>
                <p>Lets rock our business!</p>

                <a href="Bookingdt.php" class="cta">Go to Bookings</a>
            </div>
        </div>
    </section>

</div>
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script> -->
<script>
const menuBtn = document.querySelector(".menu-btn");
      backBtn = document.querySelector(".back-btn");
      menu = document.querySelector("nav");

menuBtn.addEventListener("click", () => {
    menu.style.transform = "translateX(0)";
})

backBtn.addEventListener("click", () => {
    menu.style.transform = "translateX(-100%)";
})

/*window.addEventListener('resize', event => {
    if(document.body.clientWidth >= 1000)
        menu.style.transform = 'translateX(0)'
    else
        menu.style.transform = 'translateX(-100%)'
})*/

</script>

</body>
</html>