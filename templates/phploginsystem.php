<body>
<?php include "db_conn.php";
session_start();
$clear = mysqli_query($conn, "DELETE FROM online");
if (isset($_POST['login'])) {
    $uname = $_POST['uname'];
    $password = $_POST['pword'];
    $result = mysqli_query($conn, "SELECT 'fullname', 'password','username', 'usertype' FROM account
        WHERE username='$uname' and password='$password'");
    $user_matched = mysqli_num_rows($result);
    if ($user_matched > 0) {
		$online = mysqli_query($conn, "INSERT INTO online(username,firstname,lastname,usertype) SELECT username,firstname,lastname,usertype FROM account WHERE username='$uname'"); 
		$queryr=mysqli_query($conn,"SELECT * from online");
		$rowr=mysqli_fetch_array($queryr);
		$utype=$rowr['usertype'];
		header("location: check.php?type=".$utype);
    } else {
        ?>
        
        <div class="popup" id="popup">
            <img src="../images/error.png">
            <h2>Login Failed!</h2>
            <p>Email or Password is Invalid. Please Try Again!</p>
            <a href="loginsystem.php"><button type="button">Ok</button></a>
        </div>
        <?php
    }
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
