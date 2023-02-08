<body>
<?php
include "db_conn.php";
session_start();
if (isset($_POST['denybook']) && isset($_POST['btitle'])) {
	$title = $_POST['btitle'];
    $sql = "UPDATE books SET status = 'Denied' WHERE title = '$title'";
        mysqli_query($conn, $sql);
		?>
		
		<div class="popup" id="popup">
			<img src="../images/check.png">
			<h2>Success!</h2>
			<p><?=$title?> is Denied!</p>
			<a href="adminonly.php"><button type="button">Continue</button></a>
		</div>
	<?php
	}else{
		echo "E R R O R";
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
