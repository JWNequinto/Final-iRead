<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register to iREAD</title>
   </head>
<body>
  <div class="container">
    <div class="title">Registration</div>
    <div class="content">
      <form action="phpreg.php" method="POST">
        <div class="user-details">
          <div class="input-box">
            <span class="details">Firstname</span>
            <input type="text" placeholder="Enter your Firstname" name="fname" required>
          </div>
          <div class="input-box">
            <span class="details">Lastname</span>
            <input type="text" placeholder="Enter your Lastname" name="lname" required>
          </div>
          <div class="input-box">
            <span class="details">Username</span>
            <input type="text" placeholder="Enter your username" name="uname" required>
          </div>
          <div class="input-box">
            <span class="details">Email</span>
            <input type="text" placeholder="Enter your email" name="email" required>
          </div>
          <div class="input-box">
            <span class="details">Password</span>
            <input type="text" placeholder="Enter your password" name="pass" required>  
          </div>
          <div class="input-box">
            <span class="details">Confirm Password</span>
            <input type="text" placeholder="Confirm your password" name="cpass" required>
          </div>
        </div>
        <div class="gender-details">
          <input type="radio" name="gender" id="dot-1" value="Male">
          <input type="radio" name="gender" id="dot-2" value="Female">
          <input type="radio" name="gender" id="dot-3" value="Secret">
          <span class="gender-title">Gender</span>
          <div class="category">
            <label for="dot-1">
            <span class="dot one"></span>
            <span class="gender">Male</span>
          </label>
          <label for="dot-2">
            <span class="dot two"></span>
            <span class="gender">Female</span>
          </label>
          <label for="dot-3">
            <span class="dot three"></span>
            <span class="gender">Prefer not to say</span>
            </label>
          </div>
        </div>
        <div class="button">
          <input type="submit" value="Register" name="regbutton">
        </div>
      </form>
      <div class="login">
        Already have an Account? <a href="loginsystem.php">Click Here!</a>
      </div>
    </div>
  </div>
<!--onclick="openPopup()"
<div class="popup" id="popup">
    <<img src="../images/check.png">
    <h2>Register Complete!</h2>
    <p>You details has been successfully submitted. Thanks!</p>
    <button type="button" onclick="closePopup()">Ok</button>
  </div>
 

<script>

let popup = document.getElementById("popup");

function openPopup(){
  popup.classList.add("open-popup");
}
function closePopup(){
  popup.classList.remove("open-popup");
}
</script>
-->

</body>
    <style type="text/css">
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');
        *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Poppins',sans-serif;
        }
        body{
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 10px;
        background: linear-gradient(120deg,#b92997, #44ad6c);
        }
        /*
        .popup{
        width: 400px;
        background: wheat;
        border-radius: 6px;
        position:absolute;
        top: 0;
        left: 50%;
        transform: translate(-50%,-50%)scale(0.1);
        text-align: center;
        padding: 0 30px 30px;
        color: #333;
        visibility:hidden;
        transition: transform 0.4s, top 0.4s;
        }
        .popup h2{
        font-size: 38px;
        font-weight: 500;
        margin: 30px 0 10px;
        }
        .popup button{
        width: 100%;
        margin-top: 50px;
        padding: 10px 0;
        background-color: #EF4D80;
        color:#fff;
        border: 0;
        outline: none;
        font-size: 18px;
        border-radius: 4px;
        cursor: pointer;
        box-shadow: 0 5px 5px rgba(0,0,0,0.2);
        }

        .open-popup{
        visibility: visible;
        top: 50%;
        transform: translate(-50%,-50%)scale(1);
        }
        .popup img{
        width: 100px;
        margin-top: -50px;
        border-radius: 50px;
        box-shadow: 0 2px 5px rgba(0,0,0,0.2);
        }
        */
        .login{
        margin: 30px 0;
        text-align: center;
        font-size: 18px;
        color: #666666;
        }
        .login a{
        color: #2691d9;
        text-decoration: none;
        }
        .login a:hover{
        text-decoration: 2px underline;
        }
        .container{
        max-width: 700px;
        width: 100%;
        background-color: #fff;
        padding: 25px 30px;
        border-radius: 5px;
        box-shadow: 0 5px 10px rgba(0,0,0,0.15);
        }
        .container .title{
        font-size: 25px;
        font-weight: 500;
        position: relative;
        }
        .container .title::before{
        content: "";
        position: absolute;
        left: 0;
        bottom: 0;
        height: 3px;
        width: 30px;
        border-radius: 5px;
        background: linear-gradient(120deg,#b92997, #44ad6c);
        }
        .content form .user-details{
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        margin: 20px 0 12px 0;
        }
        form .user-details .input-box{
        margin-bottom: 15px;
        width: calc(100% / 2 - 20px);
        }
        form .input-box span.details{
        display: block;
        font-weight: 500;
        margin-bottom: 5px;
        }
        .user-details .input-box input{
        height: 45px;
        width: 100%;
        outline: none;
        font-size: 16px;
        border-radius: 5px;
        padding-left: 15px;
        border: 1px solid #ccc;
        border-bottom-width: 2px;
        transition: all 0.3s ease;
        }
        .user-details .input-box input:focus,
        .user-details .input-box input:valid{
        border-color: #9b59b6;
        }
        form .gender-details .gender-title{
        font-size: 20px;
        font-weight: 500;
        }
        form .category{
        display: flex;
        width: 80%;
        margin: 14px 0 ;
        justify-content: space-between;
        }
        form .category label{
        display: flex;
        align-items: center;
        cursor: pointer;
        }
        form .category label .dot{
        height: 18px;
        width: 18px;
        border-radius: 50%;
        margin-right: 10px;
        background: #d9d9d9;
        border: 5px solid transparent;
        transition: all 0.3s ease;
        }
        #dot-1:checked ~ .category label .one,
        #dot-2:checked ~ .category label .two,
        #dot-3:checked ~ .category label .three{
        background: #9b59b6;
        border-color: #d9d9d9;
        }
        form input[type="radio"]{
        display: none;
        }
        form .button{
        height: 45px;
        margin: 35px 0
        }
        form .button input{
        height: 100%;
        width: 100%;
        border-radius: 5px;
        border: none;
        color: #fff;
        font-size: 18px;
        font-weight: 500;
        letter-spacing: 1px;
        cursor: pointer;
        transition: all 0.3s ease;
        background: linear-gradient(120deg,#b92997, #44ad6c);
        }
        form .button input:hover{
        /* transform: scale(0.99); */
        background: linear-gradient(-135deg, #44ad6c, #9b59b6);
        }
        @media(max-width: 584px){
        .container{
        max-width: 100%;
        }
        form .user-details .input-box{
            margin-bottom: 15px;
            width: 100%;
        }
        form .category{
            width: 100%;
        }
        .content form .user-details{
            max-height: 300px;
            overflow-y: scroll;
        }
        .user-details::-webkit-scrollbar{
            width: 5px;
        }
        }
        @media(max-width: 459px){
        .container .content .category{
            flex-direction: column;
        }
        }
    </style>
</html>
