<?php
include "db_conn.php";
$fetch = mysqli_query($conn, "SELECT CONCAT(firstname,' ',lastname) as fullname FROM online");
if (isset($_POST['logout'])) {
   	$clear = mysqli_query($conn, "DELETE FROM online");
    $result_matched = mysqli_num_rows($clear);
    if ($result_matched > 0) {
        echo "<script>alert('A Problem Occur When Logging Out');</script>";
    } else {
        echo "<script>alert('You Have Successfully Logged Out');</script>";
		include_once("login.php");
    }
}
?>
<!DOCTYPE html>
<html lang="en"
<head>
    <meta charset="UTF-8">
    <title>iREAD</title>
</head>
<body>
    <section>
        <div class="circle"></div>
        <header>
            <a href="main.php"><img src="../images/logo.png" class="logo"></a>
            <ul>
                <li><a href="main.php">Home</a></li>      
                <li><a href="readnow.php">Read Now</a></li>
                    <?php
                        while($row = mysqli_fetch_array($fetch)) {
                    ?>               
                        <li><a id="fname"><?=$row['fullname']?></a></li>
                    <?php
                        }
                    ?>
                <a><button class="btn btn1" onclick="openPopup()">Logout</button></a>
            </ul>
        </header>
        <div class="content">
            <div class="textBox">
                <h2>Reading is Fun<br>Read with <span>iREAD</span></h2>
                <p>Tons of newly published novels from writers that are well-experience in giving their audience the thrill and fun while reading. We also offer educational books for young readers to learn while making reading a habit!</p>
                <a href="about.html">Learn More</a>
            </div>
            <div>
            <div class="imgBox">
                <img src="../images/img1.png" class="book1">
            </div>
        </div>
        <ul class="thumb">
            <li><img src="../images/thumb1.png" onclick="imgSlider('../images/img1.png');changeCircleColor('#016064')"></li>
            <li><img src="../images/thumb2.png" onclick="imgSlider('../images/img2.png');changeCircleColor('#e18aaa')"></li>
            <li><img src="../images/thumb3.png" onclick="imgSlider('../images/img3.png');changeCircleColor('#63c5da')"></li>
        </ul>
        <ul class="sci">
            <li><a href="#"><img src="../images/facebook.png"></a></li>
            <li><a href="#"><img src="../images/twitter.png"></a></li>
            <li><a href="#"><img src="../images/instagram.png"></a></li>
        </ul>
        
        <div class="popup" id="popup">
            <img src="../images/alert.png">
            <h2>Reminder!</h2>
            <p>Are you sure you want to Log Out?</p>
            <table>
                <tr>
                    <td>
                        <a href="homepage.php"><button type="button" onclick="closePopup()">Yes</button></a>
                    </td>
                    <td>                    
                        <button type="button" onclick="closePopup()">Cancel</button>
                    </td>
                </tr>
            </table>
        </div>

    </section>

    <!--book1-->

    <section class="book4">
		<div class="main">
			<img src="../images/book1.jpg">
			<div class="book1-text">
				<h2>THE HOODIE GIRL</h2>
				<h5>By <span>Yuen Wright</span></h5>
				<p>My hoodie is freakishly oversized. It covers my body in a way that makes me feel comfortable. Safe. Invisible.</p>
				<a href="book1.php"><button type="button">READ NOW</button></a>
			</div>
		</div>
	</section>

    <!--book2-->

    <section class="book2">
		<div class="main">
			<img src="../images/book2.jpg">
			<div class="book2-text">
				<h2>HOW TO BE THE BEST THIRD WHEEL</h2>
				<h5>By <span>Loridee De Villa</span></h5>
				<p>A clean teen romance comedy about figuring out where you belong when all the constants in your life begin to change.

                    It’s the last year of highschool, and everything has changed . . .
                    
                    After spending summer vacation in the Philippines with family, Lara returns to school eager to catch up with her close knit group of girlfriends. But within minutes of reuniting with her friends, she learns that not one, not two, but all three of them are now in relationships that blossomed over the summer. And to make matters worse, Lara’s long time frenemy, James, won’t stop bugging her in class and eventually forces her into tutoring him everyday after school.
                    
                    Surviving high school was never easy to begin with, but with occupied friends, a hectic Filipino family, and her annoying childhood enemy pestering her more than ever, Lara tries to juggle everything, while trying to figure out her own place in the chaos</p>
                    <a href="book2.php"><button type="button">READ NOW</button></a>
			</div>
		</div>
	</section>

    <!--book3-->

    <section class="book3">
		<div class="main">
			<img src="../images/book3.jpg">
			<div class="book3-text">
				<h2>LOCKDOWN IN LONDON LANE</h2>
				<h5>By <span>Beth Reekles</span></h5>
				<p>For the inhabitants of London Lane, a simple slip of paper underneath each of their doors is about to change their lives in a hundred different ways.

                    URGENT!!! Due to the current situation, building management has decided to impose a seven-day quarantine on all apartment buildings on London Lane.
                    
                    With nowhere else to go . . .
                    
                    Ethan and Charlotte wonder whether absence really does make the heart grow fonder when they end up on either side of a locked door.
                    
                    A fierce debate over pineapple on pizza ignites a series of revelations about Zach and Serena’s four-year relationship.
                    
                    Liv realizes rolling with the punches is sometimes much harder than it looks after her bridesmaids’ party goes off the rails, leaving the group at each other’s throats.
                    
                    Isla and Danny’s new romance is put to the test as they jump ten steps ahead on the relationship timeline.
                    
                    And Imogen and Nate’s one-night stand is about to get six do-overs they never really asked for—not awkward at all.
                    
                    Through make ups, breakups, love-ins, and blowouts, friendships are tested as everyone scrambles to make it through the week unscathed. Amidst all the drama, one thing remains constant: life is full of surprises.</p>
				<a href="book3.php"><button type="button">READ NOW</button></a>
			</div>
		</div>
	</section>

    <script type="text/javascript">
        function imgSlider(anything){
            document.querySelector('.book1').src = anything;
        }

        function changeCircleColor(color){
            const circle = document.querySelector('.circle');
            circle.style.background = color;
        }

        
        let popup = document.getElementById("popup");

        function openPopup(){
        popup.classList.add("open-popup");
        }
        function closePopup(){
        popup.classList.remove("open-popup");
        }
    </script>
</body>




    <style type="text/css">@import url('http://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800,900&display=swap');
*
{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
}
section
{
    position: relative;
    width: 100%;
    min-height: 100vh;
    padding: 100px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    background: rgb(255, 193, 193);
}
header
{
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    padding: 20px 100px;
    display: flex;
    justify-content: space-between;
    align-items: center;
}
header .logo
{
    position: relative;
    max-width: 200px;
}
header ul
{
    position: relative;
    display: flex;
}
header ul li
{
    list-style: none;
}
header ul li a
{
    display: inline-block;
    color: #333;
    font-weight: 400;
    font-size: 20px;
    margin-left: 40px;
    text-decoration: none;
}
#fname:hover{
    background:transparent;
}
#fname{
font-weight: bold;
}
.content
{
    position: relative;
    width: 100%;
    display: flex;
    justify-content: space-between;
    align-items: center;
}
.content .textBox
{
    position: relative;;
    text-align: justify;
    max-width: 600px;
}
.content  .textBox h2
{
    color: #333;
    font-size: 4em;
    line-height: 1.4em;
    font-weight: 500;
}
.content .textBox h2 span
{
    color: #fc6a03;
    font-size: 1.2em;
    font-weight: 900;
}
.content .textBox p
{
    color: #333;
}
.content .textBox a
{
    display: inline-block;
    margin-top: 20px;
    padding: 8px 20px;
    background: #fc6a03;
    color: #fff;
    border-radius: 40px;
    font-weight: 500;
    letter-spacing: 1px;
    text-decoration: none;
}
.content .imgBox
{
    width: 600px;
    display: flex;
    justify-content: flex-end;
    padding-right: 50px;
    margin-top: 50px;
}
.content .imgBox img
{
    max-width: 600px;
}
.thumb
{
    position: absolute;
    left: 50%;
    bottom: 20px;
    transform: translateX(-50%);
    display: flex;
}
.thumb li
{
    list-style: none;
    display: inline-block;
    margin: 0 0.2px;
    cursor: pointer;
}
.thumb li:hover
{
    transform: translateY(-15px);
}
.thumb li img
{
    max-width: 150px;
}

.sci
{
    position: absolute;
    top: 50%;
    right: 30px;
    transform: translateY(-50%);
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
}
.sci li
{
    list-style: none;
}
.sci li a
{
    display: inline-block;
    margin: 5px 0;
    transform: scale(0.6);
    filter: invert(1);
}
.circle
{
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: #016064;
    clip-path: circle(800px at right 1000px);
}
ul {
    list-style: none;
    background: transparent;
}
ul li {
    display: inline-block;
    position: relative;
}
ul li a {
    display: inline-block;
    padding: 20px 25px;
    color: #fff;
    text-decoration: none;
    text-align: center;
    font-size: 10px;
}
ul li ul.dropdown li {
    display: block;
}
ul li ul.dropdown {
    width: 150%;
    background: transparent;
    position: absolute;
    z-index: 999;
    display: none;
}
ul li a:hover {
    background: #e18aaa;
	border-radius: 40px;
}
ul li:hover ul.dropdown {
    display: block;
}

/*---loginsystem---*/

/*--book1--*/

.book4{
	width: 100%;
	padding: 100px 0px;
	background-color: #34c2e1;
}

.book1 img{
	height: auto;
	width: 430px;
}
.book1-text{
	width: 550px;
    text-align: justify;
}
.main{
	width: 1130px;
	max-width: 95%;
	margin: 0 auto;
	display: flex;
	align-items: center;
	justify-content: space-around;
}
.book1-text h2{
	color: #016064;
	font-size: 75px;
	text-transform: capitalize;
	margin-bottom: 20px;
}
.book1-text h5{
	color: #016064;
	letter-spacing: 2px;
	font-size: 22px;
	margin-bottom: 25px;
	text-transform: capitalize;
}
.book1-text p{
	color: #016064;
	letter-spacing: 1px;
	line-height: 28px;
	font-size: 18px;
	margin-bottom: 45px;
}
button{
	background-color:#f9004d;
	color: white;
	text-decoration: none;
	border: 2px solid transparent;
	font-weight: bold;
	padding: 13px 30px;
	margin-left: 20px;
	border-radius: 30px;
	transition: .4s; 
	font-size: 20px;
}
button:hover{
	background-color: transparent;
	border: 2px solid #f9004d;
	cursor: pointer;
}
/*--book2--*/

.book2{
	width: 100%;
	padding: 100px 0px;
	background-color: #e18aaa;
}
.book2 img{
	height: auto;
	width: 430px;
}
.book2-text{
	width: 550px;
    text-align: justify;
}
.main{
	width: 1130px;
	max-width: 95%;
	margin: 0 auto;
	display: flex;
	align-items: center;
	justify-content: space-around;
}
.book2-text h2{
	color: white;
	font-size: 75px;
	text-transform: capitalize;
	margin-bottom: 20px;
}
.book2-text h5{
	color: white;
	letter-spacing: 2px;
	font-size: 22px;
	margin-bottom: 25px;
	text-transform: capitalize;
}
.book2-text p{
	color: #fcfc;
	letter-spacing: 1px;
	line-height: 28px;
	font-size: 18px;
	margin-bottom: 45px;
}
button{
	background-color:#f9004d;
	color: white;
	text-decoration: none;
	border: 2px solid transparent;
	font-weight: bold;
	padding: 13px 30px;
	border-radius: 30px;
	transition: .4s; 
}
button:hover{
	background-color: transparent;
	border: 2px solid #f9004d;
	cursor: pointer;
}
/*--book3--*/

.book3{
	width: 100%;
	padding: 100px 0px;
	background-color: #63c5da;
}
.book3 img{
	height: auto;
	width: 430px;
}
.book3-text{
	width: 550px;   
    text-align: justify;
}
.main{
	width: 1130px;
	max-width: 95%;
	margin: 0 auto;
	display: flex;
	align-items: center;
	justify-content: space-around;
}
.book3-text h2{
	color: white;
	font-size: 75px;
	text-transform: capitalize;
	margin-bottom: 20px;
}
.book3-text h5{
	color: white;
	letter-spacing: 2px;
	font-size: 22px;
	margin-bottom: 25px;
	text-transform: capitalize;
}
.book3-text p{
	color: #fcfc;
	letter-spacing: 1px;
	line-height: 28px;
	font-size: 18px;
	margin-bottom: 45px;
}
button{
	background-color:#f9004d;
	color: white;
	text-decoration: none;
	border: 2px solid transparent;
	font-weight: bold;
	padding: 13px 30px;
	border-radius: 30px;
	transition: .4s; 
}
button:hover{
	background-color: transparent;
	border: 2px solid #f9004d;
	cursor: pointer;
}


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
        width: 150px;
        margin-top: 50px;
        margin-left: 2px;
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
        .popup table{
            width: 100%;
        }
    </style>

</html>