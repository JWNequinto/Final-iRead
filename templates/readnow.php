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

            <div class="divsearch">
                <table>
                    <tr width="1500px" height="80px">                        
                        <form action="readnow.php" method="post">                                                              
                            <td width="700px" height="80px">
                                <input type="text" placeholder="Search Title" name="stitle">
                                <button class="sbtn" name="searchbutton">Search</button>
                            </td>
                            <td width="300px" height="80px">
                                <select name="genretype">
                                    <option value="">All</option>
                                    <option value="Fiction">Fiction</option>
                                    <option value="Sci-Fi">Sci-Fi</option>
                                    <option value="Adventure">Adventure</option>
                                    <option value="Horror">Horror</option>
                                    <option value="School">School</option>
                                    <option value="Love Story">Love Story</option>
                                    <option value="Educational">Educational</option>
                                    <option value="Fairy Tale">Fairy Tale</option>
                                    <option value="Action">Action</option>
                                </select>
                            </td>
                            <td>                               
                                <button class="gbtn" name="gobutton">Go</button>
                            </td>   
                        </form>   
                    </tr>
                </table>
            </div>

            <div class="lob">
                <h1>BOOKS</h1>
                <?php 
                    if (isset($_POST['searchbutton']) && isset($_POST['stitle'])) {
                        $stitle = $_POST['stitle'];
                        $sql = "SELECT img_dir,title,story FROM books WHERE title like '%$stitle%' and status='Approved' ORDER BY id ASC";
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
                    }elseif (isset($_POST['gobutton']) && isset($_POST['stitle']) && isset($_POST['genretype'])) {
                        $stitle = $_POST['stitle'];
                        $genre = $_POST['genretype'];
                        $sql = "SELECT img_dir,title,story FROM books WHERE title like'%$stitle%' and genre like '%$genre%' and status='Approved' ORDER BY id ASC";
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
                    }else {
                        $sql = "SELECT img_dir,title,story FROM books WHERE status='Approved'ORDER BY id ASC";
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
                
                        <div class="alb">
                            <form action="addstory.php" method="POST" enctype="multipart/form-data">
                                <button class="addbookbtn" name="readnow">ADD BOOK</button>
                            </form>
                        </div>      
                          
            </div>
            <!--            
            <div class="divsend">
                <table>
                    <tr>
                        <td>
                            <a href="feedback.php"><input type="submit" class="ubtn" name="submit" value="Feedback"></a>
                        </td>     	
                        </tr>
                </table>
            </div>
            -->
        </div>
        
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
        #fname{
            font-weight: bold;
        }
        #fname:hover{
            background:transparent;
            text-decoration: underline;
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
        .listofbooks{
            display: flex;
            margin-left: auto;
            margin-right: auto;
            margin-top: 250px;
            margin-bottom: 30px;
            padding-bottom: 25px;
            padding-top: 5px;
            background: #ffc2d1;
            justify-content: center;
            align-items: center;
            flex-wrap: wrap;
            max-width: 1500px;
            width: 100%;
            max-height: auto;
            height: 100%;
            border-radius: 20px;
            box-shadow: 0 10px 15px rgb(39, 37, 37);
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
        .listofbooks .divsearch{
            display: flex;
            margin-left: auto;
            margin-right: auto;
            margin-top: 10px;
            margin-bottom: 10px;
            padding-bottom: 20px;
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
        table{
            margin-top: 10px;
            max-width: 1500px;
        }
        table tr td p{
            font-size: 30px;
            margin-bottom: -20px;
            padding-bottom: 0;
        }
        table tr td select{
            max-height: 70px;
            height: 100%;
            max-width: 300px;
            width: 100%;
            font-size: 25px;
            text-align: center;
            font-weight: bold;
            border: solid 1.5px;
            margin: 15px auto;
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
        .sbtn{
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
        .gbtn{
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

        .gbtn:hover{
            background-color: #cc0580;
            border: 2px solid #cc0580;
            cursor: pointer;
        }
        .sbtn:hover{
            background-color: #cc0580;
            border: 2px solid #cc0580;
            cursor: pointer;
        }
        /*
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

        .pttle{
            width: 200px;
            border: none;
            text-align: center;
            background-color: transparent;
            font-size: 18px;
            pointer-events: none;
            text-transform: uppercase;
        }

        .addbookbtn{
            margin: auto;
            margin-top: 18px;
            margin-left: 12px;
            padding: 20px;
            height: 200px;
            background-color:#f9004d;
            color: white;
            text-decoration: none;
            border: 2px solid transparent;
            font-weight: bold;
            border-radius: 20px;
            transition: .4s; 
            font-size: 40px;
        }
        .addbookbtn:hover{
            background-color:#cc0580;
            border: 2px solid #cc0580;
            cursor: pointer;
        }
    </style>

</html>