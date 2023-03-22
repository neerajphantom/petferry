
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
 
if(isset($_POST['submit'])) {
 $mailto = "petwalkwithferry@gmail.com";  //My email address
 //getting customer data
 $name = $_POST['name']; //getting customer name
 $fromEmail = $_POST['email']; //getting customer email
 $subject = $_POST['subject']; //getting subject line from client
 $subject2 = "Confirmation: Message was submitted successfully | PetFerry"; // For customer confirmation
 
 //Email body I will receive
 $message = "Name: " . $name . "\n"
 ."Reply-To: ". $fromEmail ."\n"
 . "Subject: " . $subject . "\n\n"
 . "Message: " . "\n" . $_POST['message'];

 
 //Message for client confirmation
 $message2 = "Dear" . $name . "\n"
 . "Thank you for contacting us. We will get back to you shortly!" . "\n\n"
 . "You submitted the following message: " . "\n" . $_POST['message'] . "\n\n"
 . "Regards," . "\n" . "- PetFerry";
 
 //Email headers
 $headers = "From: " . $fromEmail; // Client email, I will receive
 $headers2 = "From: " . $mailto; // This will receive client
 
 //PHP mailer function
 
  $result1 = mail($mailto, $subject, $message, $headers2); // This email sent to My address
  $result2 = mail($fromEmail, $subject2, $message2, $headers); //This confirmation email to client
 
  //Checking if Mails sent successfully
 
  if ($result1 && $result2) {
     // $notification = "Your Message was sent Successfully!";
      // Store notification in session variable
      $_SESSION['notification'] = "Your Message was sent Successfully!";
      // Redirect to the same page after a delay
      header("Refresh:1; url=conemail.php");
      exit(); // Make sure to call exit after header
  } else {
    // $notification = "Sorry! Message was not sent, Try again Later.";
     // Store notification in session variable
      $_SESSION['notification'] = "Sorry! Message was not sent, Try again Later.";
      // Redirect to the same page after a delay
      header("Refresh:1; url=conemail.php");
      exit(); // Make sure to call exit after header
  }
 
}
 
?>
