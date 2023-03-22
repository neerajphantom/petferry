<?php include('controllerAdminData.php'); ?>
<?php

include('connection.php');

if(isset($_POST['delete_btn']))
{
    $pcid = $_POST['delete_id'];

    $query = "DELETE FROM pet_clinics WHERE pcid='$pcid' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        // Store notification in session variable
     $_SESSION['notification'] = "Your Data is Deleted";
     // Redirect to the same page after a delay
     header("Refresh:1; url=petclinics.php");
     exit(); // Make sure to call exit after header

 }
 else
 {
   // Store notification in session variable
     $_SESSION['notification'] = "Your Data is Not Deleted";
     // Redirect to the same page after a delay
     header("Refresh:1; url=indexadmin.php");
     exit(); // Make sure to call exit after header

}    
}
?>

<?php
include("connection.php");
ob_start();
if(isset($_POST['Clinic_btn'])){
    // Retrieve form data
    $type = $_POST['type'];
    $name = $_POST['name'];
    $address = $_POST['address'];
    $phone_number = $_POST['phone_number'];
    $map_link = $_POST['map_link'];

    // Check if all input fields are filled
    if(!empty($type) && !empty($name) && !empty($address) && !empty($phone_number) && !empty($map_link)) {
        // Insert data into database
        $query = "INSERT INTO pet_clinics (type, name, address, phone_number, map_link) 
            VALUES ('$type', '$name', '$address', '$phone_number', '$map_link')";
        $res = $con->query($query);
        if($res === TRUE){
             $_SESSION['notification'] = "Data submitted successfully";
     // Redirect to the same page after a delay
     header("Refresh:1; url=petclinics.php");
     exit(); // Make sure to call exit after header

        }
        else {
            $_SESSION['notification'] = "Data Failed to Submit";
     // Redirect to the same page after a delay
     header("Refresh:1; url=indexadmin.php");
     exit(); // Make sure to call exit after header
        }
    }
    else {
          $_SESSION['notification'] = "Please fill all the required fields";
     // Redirect to the same page after a delay
     header("Refresh:1; url=petclinics.php");
     exit(); // Make sure to call exit after header
    }
}

ob_end_flush();
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>PetFerry | Admin | Pet Clinics</title>
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

<div class="container pt-5 ">
  <div class="row">
    <div class="col-4">
       <h1 class="text-white">CLINICS, NGOs</h1> 
    </div>
    
    <div class="col-md-6 text-center">
      
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
  
    
    <div class="col-2">
    <button type="button" class="btn btn-primary px-3 py-2" data-bs-toggle="modal" data-bs-target="#clinic-modal">Add</button>
    </div>
  </div>
</div>
                    <!-- Modal -->
                    <div class="modal fade" id="clinic-modal" tabindex="-1" aria-labelledby="clinic-modal-label" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content bg-primary">
                          <div class="modal-header bg-primary">
                            <h5 class="modal-title" id="clinic-modal-label">Add Clinic/ NGO</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form method="post" action="petclinics.php">
                            <div class="modal-body">
                              <div class="mb-3">
                                 <!-- <label for="bookingid" class="form-label">Bookingid</label> 
                                  <input type="id" class="form-control item mb-3" name="pcid" id="pcid" placeholder="Please confirm booking ID"> -->
                                   <!-- <label for="type" class="form-label">Type</label> -->
                                <select class="form-select mb-3" id="type" name="type">
                                     <option selected value="">Type of entry</option>
                                <option value="Clinic">Clinic</option>
                                <option value="NGO">NGO</option>
                                
                            </select>
                                  <!-- <input type="id" class="form-control item mb-3" name="type" id="type" placeholder="Please confirm booking ID"> -->
                                  <input type="name" class="form-control item mb-3" name="name" id="name" placeholder="Clinic/ NGO Name">
                                  <input type="address" class="form-control item mb-3" name="address" id="address" placeholder="Address">
                                  <input type="phone_number" class="form-control item mb-3" name="phone_number" id="phone_number" placeholder="Contact">
                                  <input type="map_link" class="form-control item mb-3" name="map_link" id="map_link" placeholder="Map Link">
                                  
                           
                        </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>

                      <button type="submit" name="Clinic_btn" class="btn btn-primary">Add</button>
                  </div>
              </form>
          </div>
      </div>
  </div>
      <?php
                $query = "SELECT * FROM pet_clinics";
                $query_run = mysqli_query($con, $query);
            ?>
      <div class="table-wrapper">
        <table class="fl-table">
            <thead>
               <tr>
                <th> PCID </th>
                 <th>Type</th>
                <th> Name </th>
                <th> Address </th>
                <th> Contact </th>
                <!-- <th>Map Link </th> -->
               
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
                    <td><?php  echo $row['pcid']; ?></td>
                     <td><?php  echo $row['type']; ?></td>
                    <td><?php  echo $row['name']; ?></td>
                    <td><?php  echo $row['address']; ?></td>
                    <td><?php  echo $row['phone_number']; ?></td>
                    <!-- <td><?php  echo $row['map_link']; ?></td> -->
                               <td>
                                    <form action="petclinics.php" method="post">
                                        <input type="hidden" name="delete_id" value="<?php echo $row['pcid']; ?>">
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