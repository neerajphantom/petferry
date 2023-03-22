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
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title><?php echo $fetch_info['name'] ?> | PetFerry | Tips </title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">
<!-- Boxicon -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://allyoucan.cloud/cdn/icofont/1.0.1/icofont.css" integrity="sha384-jbCTJB16Q17718YM9U22iJkhuGbS0Gd2LjaWb4YJEZToOPmnKDjySVa323U+W7Fv" crossorigin="anonymous">
    <!-- Google Web Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans&family=Nunito:wght@600;700;800&display=swap" rel="stylesheet"> 

    <!-- Font Awesome -->
    <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet"> -->

    <!-- Flaticon Font -->
    <link href="lib/flaticon/font/flaticon.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <!-- <link href="css/style.css" rel="stylesheet"> -->
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
</head>
<style>
    /* Import Google Font - Poppins #5372F0 */
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap');
*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Poppins', sans-serif;
}
body{
  display: flex;
  align-items: center;
  justify-content: center;
  min-height: 100vh;
  background:  #f9982f;
}
.wrapper{
  width: 750px;
  background: #fff;
  border-radius: 15px;
  padding: 30px 30px 25px;
  box-shadow: 0 12px 35px rgba(0,0,0,0.1);
}
header, .content :where(i, p, span){
  color: #202842;
}
.wrapper header{
  font-size: 35px;
  font-weight: 600;
  color: #f9982f;
  text-align: center;
}
.wrapper .content{
  margin: 35px 0;
}
.content .quote-area{
  display: flex;
  justify-content: center;
}
.quote-area i{
  font-size: 15px;
}
.quote-area i:first-child{
  margin: 3px 10px 0 0;
}
.quote-area i:last-child{
  display: flex;
  margin: 0 0 3px 10px;
  align-items: flex-end;
}
.quote-area .quote{
  font-size: 22px;
  text-align: center;
  word-break: break-all;
}
.content .author{
  display: flex;
  font-size: 18px;
  margin-top: 20px;
  font-style: italic;
  justify-content: flex-end;
}
.author span:first-child{
  margin: -7px 5px 0 0;
  font-family: monospace;
}
.wrapper .buttons{
  border-top: 1px solid #ccc;
}
.buttons .features{
  display: flex;
  margin-top: 20px;
  align-items: center;
  justify-content: space-between;
}
.features ul{
  display: flex;
}
.features ul li{
  margin: 0 5px;
  height: 47px;
  width: 47px;
  display: flex;
  cursor: pointer;
/*  color: #5372F0;*/
  color:#f9982f;
  list-style: none;
  border-radius: 50%;
  align-items: center;
  justify-content: center;
  border: 2px solid #f9982f;
  transition: all 0.3s ease;
}
.features ul li:first-child{
  margin-left: 0;
}
ul li:is(:hover, .active){
  color: #fff;
  background: #f9982f;
}
ul .speech.active{
  pointer-events: none;
}
.buttons button{
  border: none;
  color: #fff;
  outline: none;
  font-size: 16px;
  cursor: pointer;
  padding: 13px 22px;
  border-radius: 30px;
/*  background: #5372F0;*/
 background:#f9982f;
}
.buttons button.loading{
  opacity: 0.7;
  pointer-events: none;
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
  <a href="index.php" class="back-btn"><i class='bx bx-home bx-sm' id="ion1"></i> Back</a>
  <a href="login-user.php" class="logout-btn">  <i class='bx bx-log-out-circle bx-sm' id="ion"></i> Logout</a>
</div>

  

     <div class="wrapper">
      <header>Tips and Tricks</header>
      <div class="content">
        <div class="quote-area">
          <!-- <i class="fas fa-quote-left"></i> -->
          <i class='bx bxs-chat bx-tada bx-sm' ></i>
          <p class="quote">Socialize your pet from a young age to ensure good behavior around people and other pets.</p>
          <i class='bx bxs-cat bx-tada bx-md' ></i>
          <!-- <i class="fas fa-quote-right"></i> -->
        </div>
        <!-- <div class="author">
          <span>__</span>
          <span class="name">Mary Kay Ash</span>
        </div> -->
      </div>
      <div class="buttons">
        <div class="features">
          <ul>
            <li class="speech"><i class="fas fa-volume-up"></i></li>
            <li class="copy"><i class="fas fa-copy"></i></li>
            <!-- <li class="twitter"><i class="fab fa-twitter"></i></li> -->
          </ul>
          <button>New Tip</button>
        </div>
      </div>
    </div>









  
               
<script>
    const tipText = document.querySelector(".quote"),
  tipBtn = document.querySelector("button"),
speechBtn = document.querySelector(".speech"),
copyBtn = document.querySelector(".copy"),
synth = speechSynthesis;

  
const tips = [
    "Regular exercise is important for your pet's physical and mental health.",
  "Make sure your pet has a nutritious and balanced diet.",
  "Take your pet for regular check-ups and vaccinations.",
  "Provide your pet with plenty of fresh water.",
  "Regular grooming can help keep your pet healthy and clean.",
  "Keep your pet's living area clean and free from hazards.",
  "Socialize your pet with other animals and people.",
  "Be aware of your pet's behavior and body language.",
  "Train your pet with positive reinforcement techniques.",
  "Be patient and consistent when training your pet.",
  "Always supervise your pet when it's outside or around other animals.",
  "Provide your pet with plenty of toys and activities to keep them mentally stimulated.",
  "Be prepared for emergencies by having a first-aid kit and knowing the nearest animal hospital.",
  "Make sure your pet is properly secured when traveling in a vehicle.",
  "Teach children how to properly interact with pets.",
  "Be mindful of your pet's age and adjust their care accordingly.",
  "Avoid giving your pet table scraps or unhealthy treats.",
  "Make sure your pet is comfortable in extreme temperatures.",
  "Consider getting pet insurance to help with unexpected medical costs.",
  "Keep your pet's nails trimmed to avoid discomfort or injury.",
  "Monitor your pet's weight and adjust their diet and exercise as needed.",
  "Provide your pet with a comfortable and supportive bed.",
  "Consider getting a microchip or other form of identification for your pet.",
  "Avoid exposing your pet to toxic substances, such as certain plants or household cleaners.",
  "Take care of your pet's dental health by brushing their teeth and providing dental treats.",
  "Be aware of your pet's breed-specific health concerns.",
  "Be prepared to give your pet plenty of attention and affection.",
  "Consider adopting a second pet to provide your current pet with a companion.",
  "Make sure your pet is properly trained for off-leash activities.",
  "Research your pet's specific dietary needs based on their breed and age.",
  "Provide your pet with plenty of opportunities for exercise and play.",
  "Train your pet to come when called in case they get loose or lost.",
  "Be aware of your pet's specific grooming needs based on their coat type and breed.",
  "Keep your pet's vaccinations up to date.",
  "Teach your pet basic commands, such as sit, stay, and come.",
  "Consider using puzzle toys to keep your pet mentally stimulated.",
  "Be aware of the signs of illness or injury in your pet.",
  "Provide your pet with a safe and secure outdoor area, such as a fenced yard.",
  "Be aware of your pet's individual personality and adjust their care accordingly.",
  "Make sure your pet is up to date on parasite prevention medication.",
  "Consider crate training your pet for safe and comfortable travel.",
  "Teach your pet not to jump on people or furniture.",
  "Provide your pet with a variety of toys to prevent boredom.",
  "Be aware of your pet's exercise limitations based on their breed and age.",
  "Keep your pet's ears clean and free from infection.",
  "Avoid leaving your pet alone for extended periods of time.",
  "Be aware of your pet's specific needs based on their breed."
  ];
function getRandomTip() {
  const randomIndex = Math.floor(Math.random() * tips.length);
  return tips[randomIndex];
}

function randomTip(){
    tipBtn.classList.add("loading");
    tipBtn.innerText = "Loading Tip...";
    setTimeout(() => {
        const tip = getRandomTip();
        tipText.innerText = tip;
        tipBtn.classList.remove("loading");
        tipBtn.innerText = "New Tip";
    }, 1000);
}

speechBtn.addEventListener("click", ()=>{
    if(!tipBtn.classList.contains("loading")){
        let utterance = new SpeechSynthesisUtterance(`${tipText.innerText}`);
        synth.speak(utterance);
        setInterval(()=>{
            !synth.speaking ? speechBtn.classList.remove("active") : speechBtn.classList.add("active");
        }, 10);
    }
});

copyBtn.addEventListener("click", ()=>{
    navigator.clipboard.writeText(tipText.innerText);
});

tipBtn.addEventListener("click", randomTip);
</script>
   
</body>

</html>