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
    <link rel="stylesheet" href="../css/ReadBook.css"
</head>
<body>
        <nav>
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
                <a href="loginsystem.php"><button class="btn btn1">Logout</button></a>
            </ul>
        </nav>
        <div class="listofbooks">
            
            <?php if (isset($_GET['error'])): ?>
                <p><?php echo $_GET['error']; ?></p>
            <?php endif ?>
                <form onsubmit="return false;">

                    <div class="divtop">
                        <table>
                            
                            <tr width="1500px" height="80px">
                                <td width="500px" rowspan="2">
                                    <p class="sv">Select Voice</p>
                                    <select id="voice"></select> 
                                </td>
                                <td width="30px" rowspan="2"></td>
                                <td width="750px" colspan="3">  
                                    <button class="btns" id="play">Play</button>
                                    <button class="btns" id="pause">Pause</button>
                                    <button class="btns" id="resume">Resume</button>
                                    <button class="btns" id="reset">Reset</button>                            
                                </td>
                            </tr>
                            
                            <tr width="1500px" height="80px">
                                <td width="250px">
                                    <label>Volume</label>
                                    <input type="range" id="volume" max="1" min="0" value="1" step="0.1">
                                    <span id="volume_amount">1.0</span>
                                </td>
                                <td width="250px">
                                    <label>Speed</label>
                                    <input type="range" id="rate" max="2" min="0" value="1" step="0.1">
                                    <span id="rate_amount">1.0</span>
                                </td>
                                <td width="250px">
                                    <label>Pitch</label>
                                    <input type="range" id="pitch" max="1" min="0" value="1" step="0.1">
                                    <span id="pitch_amount">1.0</span>

                                </td>
                            </tr>
                        </table>
                    </div>

                    <div class="lob">
                        <?php                         
                            $sql = "SELECT title,story,img_dir,genre,author FROM currentreading";
                            $res = mysqli_query($conn,  $sql);
                
                            if (mysqli_num_rows($res) > 0) {
                                while ($row = mysqli_fetch_assoc($res)) {  ?>
                                    <h1><?=$row['title']?></h1>
                                    <div class="alb">
                                        <img src="bookcover/<?=$row['img_dir']?>">     
                                    </div>      
                                    <h3>Genre:</h3>
                                    <h2><?=$row['genre']?></h2>
                                    <h3>Author:</h3>
                                    <h2><?=$row['author']?></h2>
                                    <textarea class="textarea" id="text"><?=$row['story']?></textarea>
                                    <p class="bstory" id="text"><?=$row['story']?></p>
    
                        <?php
                                }
                            }
                        ?>

                    </div>

                </form>    
            <div class="divsend">
                <table>
                    <tr>
                        <td>
                            <a href="feedback.php"><input type="submit" class="ubtn" name="submit" value="Feedback"></a>
                        </td>     	
                        </tr>
                </table>
            </div>

        </div>
                    
        <div class="suggested">

<div class="lob">
    <?php
    
    $sql0 = "SELECT genre FROM currentreading";
    $res0 = mysqli_query($conn,  $sql0);
        while ($row0 = mysqli_fetch_assoc($res0)) { 
        $genre = $row0['genre']

    ?>
    <h1>Book with ''<?=$row0['genre']?>'' Genre</h1>
    <?php 
            $sql = "SELECT img_dir,title,story FROM books WHERE status='Approved' and genre='$genre' ORDER BY id ASC";
            $res = mysqli_query($conn,  $sql);

            if (mysqli_num_rows($res) > 0) {
                while ($row = mysqli_fetch_assoc($res)) {  ?>
                <div class="alb">
                        <img src="bookcover/<?=$row['img_dir']?>">
                        <form action="phpread.php" method="POST" enctype="multipart/form-data">
                            <input class="pttle" name="btitle" value="<?=$row['title']?>">
                            <button class="rbtn" name="readnow">Read Now</button>
                        </form>
                </div>                             
    <?php 
                }
            
            }
        }
    ?>
              
</div>
                
                    
        
    <script src="script.js"></script>

</body>








    <style type="text/css">
        @import url('http://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800,900&display=swap');
        *
        {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }
        /*
        section
        {
            position: relative;
            width: 100%;
            min-height: 20vh;
            padding: 100px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: rgb(255, 193, 193);
        }
        */
        .rbtn{
            margin: auto;
            margin-left: 12px;
            background-color:orange;
            color: white;
            text-decoration: none;
            border: 2px solid transparent;
            font-weight: bold;
            border-radius: 20px;
            transition: .4s; 
            font-size: 20px;
        }
        .rbtn:hover{
            background-color: rgb(255, 196, 86);
            border: 2px solid rgb(255, 196, 86);
            cursor: pointer;
        }

        .listofbooks .divsend{
            display: flex;
            margin-left: auto;
            margin-right: auto;
            margin-top: 10px;
            padding-bottom: 10px;
            background: wheat;
            justify-content: center;
            align-items: center;
            flex-wrap: wrap;
            max-width: 1300px;
            width: 100%;
            max-height: 200px;
            height: 100%;
            border-radius: 20px;
            box-shadow: 0 10px 15px rgb(39, 37, 37);
        }        
        .ubtn{
            margin: auto;
            margin-left: 12px;
            height: 70px;
            width: 200px;
            background-color:orange;
            color: white;
            text-decoration: none;
            border: 2px solid transparent;
            font-weight: bold;
            border-radius: 40px;
            transition: .4s; 
            font-size: 23px;
        }
        .ubtn:hover{
            background-color: rgb(255, 196, 86);
            border: 2px solid rgb(255, 196, 86);
            cursor: pointer;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-wrap: wrap;
            min-height: 100vh;
            background: rgb(255, 193, 193);
        }
        nav
        {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            padding: 20px 100px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: transparent;
        }
        nav .logo
        {
            position: relative;
            max-width: 200px;
        }
        nav ul
        {
            position: relative;
            display: flex;
        }
        nav ul li
        {
            list-style: none;
        }
        nav ul li a
        {
            display: inline-block;
            color: #333;
            font-weight: 400;
            font-size: 20px;
            margin-left: 40px;
            text-decoration: none;
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
        #fname{
            font-weight: bold;
        }
        ul li ul.dropdown {
            width: 150%;
            background: #fc6a03;
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
        
        #fname:hover{
            background:transparent;
        }
        /*
        table{
            margin: auto;    
            margin-top: 100px;
            border: solid black;
            max-width: 1100px;
            width: 100%;
            max-height: 500px;
            height: 100%;
            background: orange;
        }

        td{
            margin: 0%;
            border: solid black;
            text-align: center;
        }
        */
        .suggested{
            display: flex;
            margin-left: auto;
            margin-right: auto;
            margin-top: 30px;
            margin-bottom: 30px;
            padding-top: 15px;
            background: #f8d16e;
            justify-content: center;
            align-items: center;
            flex-wrap: wrap;
            max-width: 1500px;
            width: 100%;
            max-height: auto;
            height: 100%;
            border-radius: 20px;
            box-shadow: 0 1px 15px rgb(39, 37, 37);
            padding-bottom: 30px;            
        }
        .suggested .lob{
            display: flex;
            margin-left: auto;
            margin-right: auto;
            margin-top: 30px;
            margin-bottom: 30px;
            padding-bottom: 120px;
            background: #fce8b7;
            justify-content: center;
            align-items: center;
            flex-wrap: wrap;
            max-width: 1400px;
            width: 100%;
            max-height: 100000px;
            height: 100%;
            border-radius: 20px;
        }
        .suggested .lob h1{
            margin-top: 20px;
            width: 1500px;
            text-align: center;
        }
        .listofbooks{
            display: flex;
            margin-left: auto;
            margin-right: auto;
            margin-top: 250px;
            margin-bottom: 30px;
            padding-top: 15px;
            background: #ffc2d1;
            justify-content: center;
            align-items: center;
            flex-wrap: wrap;
            max-width: 1500px;
            width: 100%;
            max-height: auto;
            height: 100%;
            border-radius: 20px;
            box-shadow: 0 1px 15px rgb(39, 37, 37);
            padding-bottom: 30px;            
        }
        .listofbooks .lob{
            display: flex;
            margin-left: auto;
            margin-right: auto;
            margin-top: 0;
            margin-bottom: 30px;
            padding-bottom: 120px;
            background: #ffe5ec;
            justify-content: center;
            align-items: center;
            flex-wrap: wrap;
            max-width: 1400px;
            width: 100%;
            max-height: 100000px;
            height: 100%;
            border-radius: 20px;
        }

        .listofbooks .lob h1{
            margin-top: 20px;
            width: 1500px;
            text-align: center;
        }
        .alb {
            margin-top: 120px;
            width: 220px;
            height: 250px;
            padding-top: 5px;
            padding-bottom: 5px;
            padding-right: 10px;
            padding-left: 10px;
        }
        .alb img {
            width: 100%;
            height: 100%;
        }
        .listofbooks .divtop{
            display: flex;
            margin-left: auto;
            margin-right: auto;
            margin-top: 15px;
            margin-bottom: 10px;
            padding-bottom: 15px;
            background: wheat;
            justify-content: center;
            align-items: center;
            flex-wrap: wrap;
            max-width: 1400px;
            width: 100%;
            max-height: 200px;
            height: 100%;
            border-radius: 20px;
            box-shadow: 0 -5px 15px rgb(39, 37, 37);
        }

        table{
            margin-top: 10px;
            max-width: 1400px;
        }
        table tr td p{
            font-size: 30px;
            margin-bottom: -20px;
            padding-bottom: 0;
        }
        table tr td label{
            font-size: 20px;
            padding: 5px;   
            font-weight: bold;  
        }


        .divtop table tr td select{
            height: 50px;
            max-width: 450px;
            width: 100%;
            font-size: 18px;
            text-align: center;
            font-weight: bold;
            border: solid 1.5px;
            margin: auto;
            margin-top: 20px;
            margin-left: 20px;
            /*display: block;*/
            border-radius: 13px;
        }
        table tr td input[type="text"]{
            max-height: 70px;
            height: 100%;
            width: 500px;
            font-size: 25px;
            text-align: center;
            font-weight: bold;
            border: solid 1.5px;
            border-radius: 13px;
        }
        
        .pttle{
            width: 200px;
            border: none;
            text-align: center;
            background-color: transparent;
            font-size: 18px;
            pointer-events: none;
            text-transform: uppercase;
        }

        .addfile{
            background-color: white;
            border: solid 1.5px;
            height: 70px;
            border-radius: 13px;
            padding: 2px;
            font-size: 20px;
        }
        .addfile::-webkit-file-upload-button{
            background: orange;;
            /*background-image: linear-gradient(45deg,pink,black);*/
            color: white;
            height: 62px;
            padding: 8px 16px;
            border: none;
            border-radius: 13px;
            cursor: pointer;
        }
        .addfile::-webkit-file-upload-button:hover{
            background-color: rgb(255, 196, 86);
        }

        .textarea {
            background-color: #dddddd;
            color: #666666;
            padding: 1em;
            border-radius: 10px;
            border: 2px solid transparent;
            outline: none;
            font-family: "Heebo", sans-serif;
            font-weight: 500;
            font-size: 22px;
            line-height: 1.4;
            width: 1180px;
            height: 50px;
            transition: all 0.2s;
            text-align: justify;
            resize: none;
            pointer-events: none;
            visibility: hidden;
        }

        .textarea:hover {
            cursor: pointer;
            background-color: #eeeeee;
            }

        .textarea:focus {
            cursor: text;
            color: #333333;
            background-color: white;
            border-color: #333333;
        }
        .listofbooks .divtop table tr td .sv{
            width: 500px;
            margin-top: -20px;
            text-align: center;
            font-size: 25px;
            align-self: bottom;
            font-weight: bold;
        }
        .btns{
            background-color:#f9004d;
            color: white;
            text-decoration: none;
            border: 2px solid transparent;
            font-weight: bold;
            padding: 13px 30px;
            margin-left: 20px;
            border-radius: 20px;
            transition: .4s; 
            font-size: 20px;
        }
        .btns:hover{
            background-color: #cc0580;
            border: 2px solid #cc0580;
            cursor: pointer;
        }

        .listofbooks .lob h2{
            margin-top: 0px;
            margin-bottom: 10px;
            width: 1500px;
            text-align: center;
        }
        .listofbooks .lob h3{
            margin-top: 0px;
            width: 1500px;
            text-align: center;
            color: rgb(50, 49, 46);
        }
        .bstory{
            background-color: #ffccd9;
            color: black;
            padding: 1em;
            border-radius: 10px;
            border: 2px solid transparent;
            outline: none;
            font-family: "Heebo", sans-serif;
            font-weight: 500;
            font-size: 22px;
            line-height: 1.4;
            width: 1180px;
            height: auto;
            transition: all 0.2s;
            text-align: justify;
            resize: none;
            pointer-events: none;
            box-shadow: 0 1px 2px rgb(35, 37, 37);
        }
    </style>
</html>