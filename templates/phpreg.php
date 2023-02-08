<body>
<?php 

if (isset($_POST['regbutton']) && isset($_POST['fname']) && isset($_POST['uname']) && isset($_POST['email']) && isset($_POST['lname']) && isset($_POST['pass']) && isset($_POST['cpass']) && isset($_POST['gender']))  {
	include "db_conn.php";

	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$uname = $_POST['uname'];
	$email = $_POST['email'];
	$pass = $_POST['pass'];
	$cpass = $_POST['cpass'];
	$gender = $_POST['gender'];
	
	$fetch = mysqli_query($conn, "SELECT * FROM account WHERE username='$uname'");
	$result_matched = mysqli_num_rows($fetch);
		if ($result_matched > 0) {
			?>
			<div class="popup" id="popup">
				<img src="../images/alert.png">
				<h2>Registration Failed!</h2>
				<p>Username Already used. Please try Again!</p>
				<a href="register.php"><button type="button">Ok</button></a>
			</div>
			<?php		
		} else {
			if($pass !== $cpass){
				?>
				
				<div class="popup" id="popup">
					<img src="../images/alert.png">
					<h2>Registration Failed!</h2>
					<p>Your Password Don't Match. Please Try Again!</p>
					<a href="register.php"><button type="button">Ok</button></a>
				</div>
				<?php
				//header("Location: register.php");
	
			}
			elseif($pass == $cpass){
				// Insert into Database
				//$passw = password_hash($password,PASSWORD_DEFAULT);
				$sql = "INSERT INTO account(firstname,username,email,lastname,password,gender,usertype) VALUES('$fname','$uname','$email','$lname','$pass','$gender','User')";
					mysqli_query($conn, $sql);
					?>
					
					<div class="popup" id="popup">
						<img src="../images/check.png">
						<h2>Register Complete!</h2>
						<p>You details has been successfully submitted!</p>
						<a href="register.php"><button type="button">Ok</button></a>
					</div>
					<?php		
			}
		}

}else {
	?>
	
	<div class="popup" id="popup">
		<img src="../images/error.png">
		<h2>Registration Failed!</h2>
		<p>You Forgot to Choose your Gender. Please Try Again!</p>
		<a href="register.php"><button type="button">Ok</button></a>
	</div>
	<?php
}
?>
</body>


	<style type="text/css">
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');
		body{			
			background: linear-gradient(120deg,#b92997, #44ad6c);
        	font-family: 'Poppins',sans-serif;
		}
		p{
			margin-top:25px;
			font-size: 15px;
		}
		.popup{
			width: 400px;
			background: wheat;
			border-radius: 6px;
			position:absolute;
			top: 50%;
			left: 50%;
			transform: translate(-50%,-50%)scale(1);
			text-align: center;
			padding: 0 30px 30px;
			color: #333;
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
			.popup img{
			width: 100px;
			margin-top: -50px;
			border-radius: 50px;
			box-shadow: 0 2px 5px rgba(0,0,0,0.2);
			}
        
	</style>
