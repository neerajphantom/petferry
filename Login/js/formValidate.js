
let signupBtn = $('#signupBtn').val()
console.log(signupBtn)
$('#signupBtn').addClass('disable')



function validatePhoneNumber(input_str) {
    var re = /^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/im;
    return re.test(input_str);
}

function validateEmail(input_str){
  var re = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
  return re.test(input_str);
}

function validateName(input_str){
  var re =  /^[A-Za-z\s]*$/;
  return re.test(input_str);
}


// To check a password between 7 to 15 characters which contain at least one numeric digit and a special character
function validatePassword(input_str){
  var re = /^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{8,15}$/;
  return re.test(input_str);
}

function validatecpassword(input_str){
  var re = /^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{8,15}$/;
  return re.test(input_str);
}




  $(document).on("keyup", "#myform_phone", function(e) {
   var phone = document.getElementById('myform_phone').value;
    if (!validatePhoneNumber(phone) || phone == '' ||  phone.length > 10 ) {
      //  document.getElementById('phone_error').classList.remove('hidden');
     $('#signupBtn').addClass('disable')
    } else {
       // $(this).next().html('Please insert valid phone');
       $('#signupBtn').removeClass('disable')
    }
          });

  

   $(document).on("keyup", "#myform_email", function(e) {
            var email =  document.getElementById('myform_email').value;
            if (!validateEmail(email) || email == "" || !email){
           $('#signupBtn').addClass('disable')
           } else {
          $('#signupBtn').removeClass('disable')
            }
          });


   $(document).on("keyup", "#myform_name", function(e){
            var name = document.getElementById('myform_name').value;
            if(!validateName(name) || name == "" || name.length < 3){
              // $(this).next().html('Please insert valid Name');
               $('#signupBtn').addClass('disable')
              
           } else {
          $('#signupBtn').removeClass('disable')
          
            }      
   });
   




   $(document).on("keyup", "#myform_password", function(e){
            var password = document.getElementById('myform_password').value;
            if(!validatePassword(password) || password == "" || password.length < 8){
               $('#signupBtn').addClass('disable')
           } else {
          $('#signupBtn').removeClass('disable')
            }

            
   });

      $(document).on("keyup", "#myform_cpassword", function(e){
            var cpassword = document.getElementById('myform_cpassword').value;
            if(!validatecpassword(cpassword) || cpassword == "" || cpassword.length < 8){
               $('#signupBtn').addClass('disable')
           } else {
          $('#signupBtn').removeClass('disable')
            }
            
   });



function makePasswordVisible(event) {
  const target = event.target,
        input = target.previousElementSibling;
  
  if (target.className === 'far fa-eye') {
    target.className = 'far fa-eye-slash';
    input.type = 'text';
  } else {
    target.className = 'far fa-eye';
    input.type = 'password';
  }
  
}