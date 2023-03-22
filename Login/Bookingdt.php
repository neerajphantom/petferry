
<?php
include('controllerAdminData.php');

// to delete a particular  or current booking by comparing the booking id 
if(isset($_POST['delete_btn']))
{
    $bookingid = $_POST['delete_id'];

    $query = "DELETE FROM bookings WHERE bookingid='$bookingid' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
      $_SESSION['notification'] = "Your Data is been deleted";
     // Redirect to the same page after a delay
     header("Refresh:1; url=Bookingdt.php");
     exit(); // Make sure to call exit after header

 }
 else
 {
   $_SESSION['notification'] = "Your Data is NOT deleted";
     // Redirect to the same page after a delay
     header("Refresh:1; url=Bookingdt.php");
     exit(); // Make sure to call exit after header

}    
}

// to assign a particular walker to selected booking id
if(isset($_POST['Assign_btn']))
{
    $bookingid = $_POST['bookingid'];
    $walkerid = $_POST['walkerid'];

    $query = "UPDATE bookings SET walker_id = '$walkerid'  WHERE bookingid = '$bookingid'";
    $query_run = mysqli_query($con, $query);

   
    if($query_run)
    {
       // Store notification in session variable
     $_SESSION['notification'] = "Walker is Assigned successfully";
     // Redirect to the same page after a delay
     header("Refresh:1; url=Bookingdt.php");
     exit(); // Make sure to call exit after header

 }
 else
 {
   // Store notification in session variable
     $_SESSION['notification'] = "Walker is not assigned";
     // Redirect to the same page after a delay
     header("Refresh:1; url=Bookingdt.php");
     exit(); // Make sure to call exit after header

}    
}

// to update the status of a particular booking mainly orderstatus and paymentstatus
if(isset($_POST['Status_btn']))
{
    $bookingid = $_POST['bookingid'];
    $orderstatus = $_POST['orderstatus'];
     $paymentstatus = $_POST['paymentstatus'];

    $query = "UPDATE bookings SET orderstatus = '$orderstatus', paymentstatus = '$paymentstatus'   WHERE bookingid = '$bookingid'";
    $query_run = mysqli_query($con, $query);

   
    if($query_run)
    {
      $_SESSION['notification'] = "Status updated successfully";
     // Redirect to the same page after a delay
     header("Refresh:1; url=Bookingdt.php");
     exit(); // Make sure to call exit after header 

 }
 else
 {
   $_SESSION['notification'] = "Status not updated! please try again";
     // Redirect to the same page after a delay
     header("Refresh:1; url=Bookingdt.php");
     exit(); // Make sure to call exit after header

}    
}
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>PetFerry | Admin | Bookings</title>
    <link rel="stylesheet" href="Bookingdt.css">
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
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
    <?php
    include('connection.php');
    ?>
    <!-- <div class="container-fluid"> -->

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
<div class="container pt-5 ">
  <div class="row">
    <div class="col-md-4">
       <h1 class="text-white">Bookings</h1> 
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
      <!-- Booking update, assign walker, delete booking - Admin Usage -->

      <?php
      $query = "SELECT * FROM bookings,petusers WHERE bookings.email = petusers.email ORDER BY bookings.created DESC";

      $query_run = mysqli_query($con, $query);
      ?>
      <div class="table-wrapper">
        <table class="fl-table">
            <thead>
               <tr>
                <th> bookID </th>
                <th> Ownername </th>
                <th> ownerID </th>
                <th> petID </th>
                <th>Email </th>
                <th>Pickup</th>
                <th>Area</th>
                <th>package</th>
                <!-- <th>activity</th> -->
                <!-- <th>price</th> -->
                <th>payment</th>
                <th>date</th>
                <th>Walker_id</th>
               
                 <th>Order Status</th>
                  <th>Payment Status</th>
                   <th>assign/update</th>
                  <!-- <th>Paymentid</th> -->
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
                    <td><?php  echo $row['bookingid']; ?></td>
                    <td><?php  echo $row['name']; ?></td>
                    <td><?php  echo $row['ownid']; ?></td>
                    <td><?php  echo $row['petid']; ?></td>
                    <td><?php  echo $row['email']; ?></td>
                    <td><?php  echo $row['pndaddress']; ?></td>
                    <td><?php  echo $row['addr_area']; ?></td>
                    <td><?php  echo $row['package']; ?></td>
                    <!-- <td><?php  echo $row['activities']; ?></td> -->
                    <!-- <td><?php  echo $row['price']; ?></td> -->
                    <td><?php  echo $row['payment']; ?></td>
                    <td><?php  echo $row['created']; ?></td>
                    <td><?php  echo $row['walker_id']; ?></td>
                    <td><?php  echo $row['orderstatus']; ?></td> 
                    <td><?php  echo $row['paymentstatus']; ?></td>
                     <!-- <td><?php  echo $row['paymentid']; ?></td>   -->
                    <td>
                        <?php
// connect to database and fetch bookings data
                        $servername = "localhost";
                        $username = "root";
                        $password = "";
                        $dbname = "formuser1";

                        $con = mysqli_connect($servername, $username, $password, $dbname);

                        if (!$con) {
                          die("Connection failed: " . mysqli_connect_error());
                      }

                      $query = "SELECT * FROM walkers";
                      $result = mysqli_query($con, $query);

                      $walker = [];
                    

                      if (mysqli_num_rows($result) > 0) {
                          while($row = mysqli_fetch_assoc($result)) {
                            $walker[] = $row;
                            

                        }
                    }

                    mysqli_close($con);
                    ?>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#assign-walker-modal"><i class='bx bx-walk bx-sm'></i></button>

                    <!-- Modal -->
                    <div class="modal fade" id="assign-walker-modal" tabindex="-1" aria-labelledby="assign-walker-modal-label" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content bg-primary">
                          <div class="modal-header bg-primary">
                            <h5 class="modal-title" id="assign-walker-modal-label">Assign a Walker</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form method="post" action="Bookingdt.php">
                            <div class="modal-body">
                              <div class="mb-3">
                                 <label for="bookingid" class="form-label">Bookingid</label>
                                  <input type="id" required class="form-control item mb-3" name="bookingid" id="bookingid" placeholder="Please confirm booking ID" required>
                                <label for="walkerid" class="form-label">Select a Walker:</label>
                                <select class="form-select" id="walkerid" name="walkerid" required>
                                  <?php foreach ($walker as $walkers): ?>
                                    <option value="<?php echo $walkers['walkerid']; ?> <?php echo $walkers['walker_name']; ?>">ID:<?php echo $walkers['walkerid']; ?> Name:<?php echo $walkers['walker_name']; ?> Area:<?php echo $walkers['walker_area']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>

                      <button type="submit" name="Assign_btn" class="btn btn-primary">Assign Walker</button>
                  </div>
              </form>
          </div>
      </div>
  </div>
   <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#status-modal"><i class='bx bx-stats bx-sm' ></i></button>

                    <!-- Modal -->
                    <div class="modal fade" id="status-modal" tabindex="-1" aria-labelledby="status-modal-label" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content bg-primary">
                          <div class="modal-header bg-primary">
                            <h5 class="modal-title" id="status-modal-label">Update Status</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form method="post" action="Bookingdt.php">
                            <div class="modal-body">
                              <div class="mb-3">
                                 <label for="bookingid" class="form-label">Bookingid</label>
                                  <input type="id" required class="form-control item mb-3" name="bookingid" id="bookingid" placeholder="Please confirm booking ID">
                                  
                              <label for="orderstatus" class="form-label">Order Status</label>
                            <select class="form-select" required id="orderstatus" name="orderstatus">
                                <option selected value="">Order current state</option>
                                <option value="Pending">Pending</option>
                                <option value="Ongoing">Ongoing</option>
                                <option value="Completed">Completed</option>
                                <option value="Pickedup">Pickedup</option>
                            </select>
                      
                                <label for="paymentstatus" class="form-label">Payment Status</label>
                                <select class="form-select" required id="paymentstatus" name="paymentstatus">
                                     <option selected value="">Order Payment state</option>
                                <option value="Paid">Paid</option>
                                <option value="Unpaid">Unpaid</option>
                                
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>

                      <button type="submit" name="Status_btn" class="btn btn-primary">Update</button>
                  </div>
              </form>
          </div>
      </div>
  </div>

                                        <!-- <input type="hidden" name="delete_id" value="<?php echo $row['bookingid']; ?>">
                                        <button class="btn" type="submit" name="delete_btn" > DELETE</button> 
                                        <button class="btn" type="submit" name="delete_btn" ><i class='bx bxs-trash bx-tada bx-sm' ></i></button>
                                        
                                    </form> -->
                                </td>
                                <td>
                                    <form action="Bookingdt.php" method="post">
                                        <input type="hidden" name="delete_id" value="<?php echo $row['bookingid']; ?>">
                                        <!-- <button class="btn" type="submit" name="delete_btn" > DELETE</button> -->
                                        <button class="btn" id="icond" type="submit" name="delete_btn" ><i class='bx bxs-trash bx-tada bx-sm' ></i></button>
                                        
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
                    <tbody>
                    </table>
                </div>


            




                <button onclick="topFunction()" id="myBtn" title="Go to top"><i class='bx bxs-hand-up bx-fade-up bx-md' ></i></button>
   

      
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
</body>
</html>