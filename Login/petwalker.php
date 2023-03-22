<?php include('controllerAdminData.php'); ?>
<?php
  include('connection.php');

$status = $statusMsg = '';
if(isset($_POST['delete_btn']))
{
    $walkerid = $_POST['delete_id'];

    $query = "DELETE FROM walkers WHERE walkerid='$walkerid' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['notification'] = "Your Selected Data is been deleted";
       // Redirect to the same page after a delay
       header("Refresh:1; url=petwalker.php");
       exit(); // Make sure to call exit after header
       
    }
    else
    {
       $_SESSION['notification'] = "Data is not deleted";
       // Redirect to the same page after a delay
       header("Refresh:1; url=petwalker.php");
       exit(); // Make sure to call exit after header
        
    }    
}
?>


<!DOCTYPE html>
<!-- Created By CodingNepal -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>PetFerry | Admin | Pet Walkers</title>
    <link rel="stylesheet" href="adminown.css">
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <!-- CSS Alertify.js-->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
<!-- Default theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
<!-- Bootstrap theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>
  </head>
<style type="text/css">
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

#icond {
  color: white!important;
}
</style>
  <body>
    
   <section>
<?php
include('connection.php');
?>
<div class="container-fluid">

<div class="navigation">
  
  <a class="button" href="login-admin.php">
  <i class='bx bx-log-out-circle bx-sm' ></i>
  <div class="logout">LOGOUT</div>

  </a>
  <a class="button1" href="indexadmin.php">
  <i class='bx bx-home bx-sm' ></i>
  <div class="logout">BACK</div>

  </a>
  
</div>

  
<!-- Notification script setting and unsetting notified message-->
<!-- <div class="container pt-5 "> -->
  <div class="row">
    <div class="col-md-4">
       <h1 class="text-white">Pet Walkers</h1> 
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

  

    <div class="card shadow mb-0">
       <!--  <div class="card-header py-3">
            <h1 class="m-0 font-weight-bold newh1">Pets Data</h1>

        </div> -->
        <div class="card-body">
            <div class="table-responsive">
            <?php
                $query = "SELECT * FROM walkers";
                $query_run = mysqli_query($con, $query);
            ?>
                <table class="container newc">
                    <thead>
                        <tr>
                            <th> WalkerID </th>
                            <th> Fullname </th>
                            <th>Email </th>
                            <th>Contact</th>
                            <th>Address</th>
                            <th>Alotted Area</th>
                            <!-- <th>UserType</th> -->
                            <!-- <th>EDIT</th> -->
                            <th>DELETE</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if(mysqli_num_rows($query_run) > 0)        
                        {
                            while($row = mysqli_fetch_assoc($query_run))
                            {
                        ?>
                            <tr>
                                <td><?php  echo $row['walkerid']; ?></td>
                                <td><?php  echo $row['walker_name']; ?></td>
                                <td><?php  echo $row['walker_email']; ?></td>
                                <td><?php  echo $row['walker_phone']; ?></td>
                                <td><?php  echo $row['walker_address']; ?></td>
                                <td><?php  echo $row['walker_area']; ?></td>
                                <!-- <td>
                                    <form action="register_edit.php" method="post">
                                        <input type="hidden" name="edit_id" value="<?php echo $row['walkerid']; ?>">
                                        <button type="submit" name="edit_btn" > EDIT</button>
                                    </form>
                                </td> -->
                                <td>
                                    <form action="petwalker.php" method="post">
                                        <input type="hidden" name="delete_id" value="<?php echo $row['walkerid']; ?>">
                                        <!-- <button class="btn" type="submit" name="delete_btn" > DELETE</button> -->
                                        <button class="btn" type="submit" name="delete_btn" ><i class='bx bxs-trash bx-tada bx-sm' ></i></button>
                                        
                                    </form>
                                </td>
                            </tr>
                        <?php
                            } 
                        }
                        else {
                            echo "No Record Found";
                        }
                        ?>
                    </tbody>
                </table>

            </div>
        </div>
        
      <button onclick="topFunction()" id="myBtn" title="Go to top"><i class='bx bxs-hand-up bx-fade-up bx-md' ></i></button>
    </div>

</div>

   </section>
   <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
<script>
  // Get the button:
let mybutton = document.getElementById("myBtn");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  document.body.scrollTop = 0; // For Safari
  document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera


}
</script>
<!-- <script>
  alertify.set('notifier','position', 'top-center');
 alertify.success('Current position : ' + alertify.get('notifier','position'));
</script> -->

  </body>
</html>