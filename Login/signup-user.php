<?php require_once "controllerUserData.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Signup Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
</head>
<body>
<div class = "banner">
        <video autoplay muted loop>
            <source src="catn.mp4" type="video/mp4">
        </video>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-5 offset-md-8 form">
                <form action="signup-user.php"  method="POST" autocomplete="">
                    <h2 class="text-center">Signup</h2>
                    <p class="text-center">It's quick and easy.</p>
                    <?php   
                    if(count($errors) == 1){
                        ?>
                        <div class="alert alert-danger text-center">
                            <?php
                            foreach($errors as $showerror){
                                echo $showerror;
                            }
                            ?>
                        </div>
                        <?php
                    }elseif(count($errors) > 1){
                        ?>
                        <div class="alert alert-danger">
                            <?php
                            foreach($errors as $showerror){
                                ?>
                                <li><?php echo $showerror; ?></li>
                                <?php
                            }
                            ?>
                        </div>
                        <?php
                    }
                    ?>
                    <div class="form-group">
                        <input class="form-control" id="myform_name" type="text" name="name" placeholder="Full Name" required value="<?php echo $name ?>">
                         <small class="form-text text-primary">
                           <i class="fa fa-info-circle" aria-hidden="true"></i>
                         Only letters & a Space
                         </small>
                    </div>
                    <div class="form-group">
                        <input class="form-control" id="myform_email" type="email" name="email" placeholder="Email Address" required value="<?php echo $email ?>">
                         <small class="form-text text-primary">
                           <i class="fa fa-info-circle" aria-hidden="true"></i>
                         Only xyz@gmail.com
                         </small>
                    </div>

                    <div class="form-group">
                        <input class="form-control" id="myform_phone" type="phone" name="phone" placeholder="Phone number" required value="<?php echo $phone ?>">
                          <small class="form-text text-primary">
                           <i class="fa fa-info-circle" aria-hidden="true"></i>
                         Only Numbers
                         </small>
                    </div>

                  <!--  <div class="form-group">
                        <input class="form-control" type="address" name="address" placeholder="Address" required>
                    </div>  -->

                    <div class="form-group">
                        <input class="form-control" id="myform_password"  type="password" name="password" placeholder="Password" required>
                        <i class="far fa-eye" onClick="makePasswordVisible(event)"></i>
                         <small class="form-text text-primary">
                           <i class="fa fa-info-circle" aria-hidden="true"></i>
                        8+ characters, Special character, digit
                        </small>
                    </div>
        

                    <div class="form-group">
                      <input class="form-control" id="myform_cpassword"  type="password" name="cpassword" placeholder="Confirm password" required>
                      <i class="far fa-eye" onClick="makePasswordVisible(event)"></i>
                       <small class="form-text text-primary">
                           <i class="fa fa-info-circle" aria-hidden="true"></i>
                        Should match the password
                        </small>
                      </div>

                    <div class="form-group">
                        <input  type="submit" name="signup" value="Signup" class="form-control button" id="signupBtn">
                    </div>
                    <div class="link login-link text-center">Already a member? <a href="login-user.php">Login here</a></div>
                </form>
            </div>
        </div>
    </div>
<script type="text/javascript" src="js/formValidate.js"></script>
</body>
</html>
