<body>
<?php
include "db_conn.php";
session_start();
if (isset($_POST['submit']) && isset($_POST['uname']) && isset($_POST['comment']) && isset($_POST['title']) && isset($_POST['rate'])) {
	$uname = $_POST['uname'];
	$title = $_POST['title'];
	$comment = $_POST['comment'];
	$srate = $_POST['rate'];
    $sql = "INSERT INTO feedback(username,title,comment,star_rate) VALUES('$uname','$title','$comment','$srate')";
        mysqli_query($conn, $sql);
		?>
		
		<div class="popup" id="popup">
			<img src="../images/check.png">
			<h2>Success!</h2>
			<p>Your Feeback Successfully Submitted!</p>
			<a href="feedback.php"><button type="button">Ok</button></a>
		</div>
		<?php

	?>
	<?php
	}else{    
	?>
	 
	<div class="popup" id="popup">
		<img src="../images/error.png">
		<h2>Failed!</h2>
		<p>Missing some important details. Please Try Again!</p>
		<a href="feedback.php"><button type="button">Ok</button></a>
	</div>
	<?php
}
?>

</body>


	<style type="text/css">
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');
		body{			
            background: rgb(255, 193, 193);
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
