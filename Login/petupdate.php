<?php require_once "controllerUserData.php"; ?>
<?php
require_once 'connection.php';

$petname = "";
$pettype = "";
$petbreed="";
$gender="";

if(isset($_POST['submit']))
{    
    $ownerid = $_POST['ownerid'];
    $petname = $_POST['petname'];
    $pettype = $_POST['pettype'];
    $petbreed = $_POST['petbreed'];
    $gender = $_POST['gender'];

     $sql = "UPDATE petscust SET petname='$petname', pettype='$pettype', petbreed = '$petbreed', gender = '$gender' WHERE ownerid='$ownerid' ";
    // $query_run = mysqli_query($con, $sql);
  
     if (mysqli_query($con, $sql)) {
        $_SESSION['notification'] = "Pet Data updated successfully";
    header("Refresh:1; url=Petfolio1.php");
    exit(); 
     } else {
         $_SESSION['notification'] = "Something went wrong";
    header("Refresh:1; url=Petfolio1.php");
    exit(); 
     }
     // mysqli_close($con);
}



if(isset($_POST['update_profile']))
{
    $userid = $_POST['userid'];

    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    $sql = "UPDATE petusers SET name='$name', phone='$phone' WHERE userid='$userid' ";
    $query_run = mysqli_query($con, $sql);

    if($query_run)
    {
    $_SESSION['notification'] = "Updated successfully !";
    header("Refresh:1; url=profile.php");
    exit(); 
    }
    else
    {
       $_SESSION['notification'] = "Not Updated, try later!";
    header("Refresh:1; url=profile.php");
    exit(); 
    }
}


 if(isset($_POST['update_cancel'])){
        header('Location: profile.php');
    }

if(isset($_POST['update_cancel1'])){
        header('Location: Petfolio1.php');
    }

if(isset($_POST['change_password'])){
      //get POST data
     $oldpassword= $_POST['oldpassword'];
       $Newpassword= $_POST['Newpassword'];
       $passwordConfirm = $_POST['passwordConfirm'];
 
      //create a session for the data incase error occurs
      $_SESSION['oldpassword'] = $oldpassword;
      $_SESSION['Newpassword'] = $Newpassword;
      $_SESSION['passwordConfirm'] = $passwordConfirm;
 
      //connection
     
      //get user details
      $sql = "SELECT * FROM petusers WHERE email = '".$_SESSION['email']."'";
      $query = $con->query($sql);
      $row = $query->fetch_assoc();
 
      //check if old password is correct
      if(password_verify($oldpassword, $row['password'])){
         //check if new password match retype
         if($Newpassword == $passwordConfirm){
            //hash our password
            $password = password_hash($Newpassword, PASSWORD_DEFAULT);
 
            //update the new password
            $sql = "UPDATE petusers SET password = '$password' WHERE email = '".$_SESSION['email']."'";
            if($con->query($sql)){
                $_SESSION['notification'] = "Login Again!";
    
               // $_SESSION['success'] = "Password updated successfully";

               //unset our session since no error occured
               unset($_SESSION['oldpassword']);
               unset($_SESSION['Newpassword']);
               unset($_SESSION['passwordConfirm']);
               echo " not Updated successfully !";
             header("Location: login-user.php");
            }
            else{
               $_SESSION['error'] = $con->error;
            }
         }
         else{
            // $_SESSION['error'] = "New and retype password did not match";
              $_SESSION['notification'] = "New and retype password did not match";
     header("Refresh:1; url=change-password.php");
    exit(); 
         }
      }
      else{
         // $_SESSION['error'] = "Incorrect Old Password";
          $_SESSION['notification'] = "Incorrect Old Password";
     header("Refresh:1; url=change-password.php");
    exit(); 
      }
   }

   else{
      // $_SESSION['error'] = "Input needed data to update first";
        $_SESSION['notification'] = "Input needed data to update first";
     header("Refresh:1; url=change-password.php");
    exit(); 
   }

    ?>

<!--  $sql = "INSERT INTO petscust (ownerid,petname,pettype,petbreed,gender)
     VALUES ('$ownerid','$petname','$pettype','$petbreed','$gender')"; -->