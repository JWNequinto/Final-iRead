<!DOCTYPE html>
<!-- loginsystem -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login to iREAD</title>
  </head>
  <body>
<a href="homepage.php" id="a">Back</a>
    <div class="center">
      <h1>Login</h1>
      <form action="phploginsystem.php" method="post">
        <div class="txt_field">
          <input type="text" name="uname" required>
          <span></span>
          <label>Username</label>
        </div>
        <div class="txt_field">
          <input type="password" name="pword" required>
          <span></span>
          <label>Password</label>
        </div>
        <div class="pass">Forgot Password?</div>
        <input type="submit" value="Login" name="login">
        <div class="signup_link">
          Not a member? <a href="register.php">Signup</a>
        </div>
      </form>
    </div>

  </body>


    <style type="text/css">
        @import url('https://fonts.googleapis.com/css2?family=Noto+Sans:wght@700&family=Poppins:wght@400;500;600&display=swap');
        *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: "Poppins", sans-serif;
        }
        body{
        margin: 0;
        padding: 0;
        background: linear-gradient(120deg,#b92997, #44ad6c);
        height: 100vh;
        overflow: hidden;
        }

        
        #a{
          background-color:#f9004d;
          color: white;
          text-decoration: none;
          border: 2px solid transparent;
          font-weight: bold;
          padding: 13px 30px;
          margin-left: 20px;
          top: 20px;
          position: relative;
          margin-top: 50%;
          border-radius: 30px;
          transition: .4s; 
          font-size: 20px;
        }
        #a:hover{
          background-color: #e00045;
          border: 2px solid #e00045;
          cursor: pointer;
        }
        .center{
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 400px;
        background: white;
        border-radius: 10px;
        box-shadow: 10px 10px 15px rgba(0,0,0,0.05);
        }
        .center h1{
        text-align: center;
        padding: 20px 0;
        border-bottom: 1px solid silver;
        }
        .center form{
        padding: 0 40px;
        box-sizing: border-box;
        }
        form .txt_field{
        position: relative;
        border-bottom: 2px solid #adadad;
        margin: 30px 0;
        }
        .txt_field input{
        width: 100%;
        padding: 0 5px;
        height: 40px;
        font-size: 16px;
        border: none;
        background: none;
        outline: none;
        }
        .txt_field label{
        position: absolute;
        top: 50%;
        left: 5px;
        color: #adadad;
        transform: translateY(-50%);
        font-size: 16px;
        pointer-events: none;
        transition: .5s;
        }
        .txt_field span::before{
        content: '';
        position: absolute;
        top: 40px;
        left: 0;
        width: 0%;
        height: 2px;
        background: #2691d9;
        transition: .5s;
        }
        .txt_field input:focus ~ label,
        .txt_field input:valid ~ label{
        top: -5px;
        color: #2691d9;
        }
        .txt_field input:focus ~ span::before,
        .txt_field input:valid ~ span::before{
        width: 100%;
        }
        .pass{
        margin: -5px 0 20px 5px;
        color: #a6a6a6;
        cursor: pointer;
        }
        .pass:hover{
        text-decoration: underline;
        }
        input[type="submit"]{
        width: 100%;
        height: 50px;
        border: 1px solid;
        background: #2691d9;
        border-radius: 25px;
        font-size: 18px;
        color: #e9f4fb;
        font-weight: 700;
        cursor: pointer;
        outline: none;
        }
        input[type="submit"]:hover{
        border-color: #2691d9;
        transition: .5s;
        }
        .signup_link{
        margin: 30px 0;
        text-align: center;
        font-size: 16px;
        color: #666666;
        }
        .signup_link a{
        color: #2691d9;
        text-decoration: none;
        }
        .signup_link a:hover{
        text-decoration: underline;
        }
    
    
        .container{
            width: 100%;
            height: 100vh;
            font-family: sans-serif;
            background: rgb(187,187,245);
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .card{
            width: 350px;
            height: 500px;
            box-shadow: 0 0 40px 20px rgba(0,0,0,0.26);
            perspective: 1000px;
        }
        .inner-box{
            position: relative;
            width: 100%;
            height: 100%;
            transform-style: preserve-3d;
            transition: transform 1s;
        }
        .card-front, .card-back{
            position: absolute;
            width: 100%;
            height: 100%;
            background-position: center;
            background-size: cover;
            background-image: linear-gradient(rgba(0,0,100,0.8),rgba(0,0,100,0.8)),url(background.png);
            padding: 55px;
            box-sizing: border-box;
            backface-visibility: hidden;
        }
        .card-back{
            transform: rotateY(180deg);
        }
        .card h2{
            font-weight: normal;
            font-size: 24px;
            text-align: center;
            margin-bottom: 20px;
        }
        .input-box{
            width: 100%;
            background: transparent;
            border: 1px solid #fff;
            margin: 6px 0;
            height: 32px;
            border-radius: 20px;
            padding: 0 10px;
            box-sizing: border-box;
            outline: none;
            text-align: center;
            color: #fff;
        }
        ::placeholder{
            color: #fff;
            font-size: 12px;
        }
        .button{
            width: 100%;
            background: transparent;
            border: 1px solid #fff;
            margin: 35px 0 10px;
            height: 32px;
            font-size: 12px;
            border-radius: 20px;
            padding: 0 10px;
            box-sizing: border-box;
            outline: none;
            color: #fff;
            cursor: pointer;
        }
        .submit-btn{
            position: relative;
        }
        .submit-btn::after{
            content: '\27a4';
            color: #333;
            line-height: 32px;
            font-size: 17px;
            height: 32px;
            width: 32px;
            border-radius: 50%;
            background: #fff;
            position: absolute;
            right: -1px;
            top: -1px;
        }
    
    </style>

</html>