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
    <link rel="stylesheet" href="../css/addstory.css"
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
                <form action="upload.php"
                    method="post"
                    enctype="multipart/form-data">

                    <div class="divsearch">
                        <table>
                            <tr width="1500px" height="80px">
                                <td width="600px" height="80px">
                                    <label for="title">Title</label>                            
                                    <input type="text" name="title" placeholder="Book Title">
                                </td>
                                <td>
                                    <label for="my_image">Book Poster</label>     
                                    <input type="file" class="addfile" name="my_image">                            
                                </td>
                            </tr>
                            <tr width="1500px" height="80px">
                                <td width="600px" height="80px">
                                    <label for="author">Author</label>                            
                                    <input type="text" id="author" name="author" placeholder="Author Name">
                                </td>
                                <td width="700px" height="80px">
                                    <label for="genretype">Genre</label>          
                                    <select name="genretype">
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
                            </tr>
                        </table>
                    </div>

                    <div class="lob">
                        <h1>S T O R Y</h1>
                        <textarea class="textarea" name="story" placeholder="Enter a message..."></textarea>
                    </div>
                    
                    <div class="divsend">
                        <table>
                            <tr>
                                <td>
                                    <input type="submit" class="ubtn" name="submit" value="Upload">
                                </td>     	
                            </tr>
                        </table>
                    </div>
                </form>
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
            padding-bottom: 20px;
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
        }
        .listofbooks .lob{
            display: flex;
            margin-left: auto;
            margin-right: auto;
            margin-top: 0;
            margin-bottom: 0;
            padding-bottom: 50px;
            background: #ffe5ec;
            justify-content: center;
            align-items: center;
            flex-wrap: wrap;
            max-width: 1260px;
            width: 100%;
            max-height: 1200px;
            height: 100%;
            border-radius: 20px;
        }

        .listofbooks .lob h1{
            margin-top: 20px;
            width: 1500px;
            text-align: center;
        }
        .alb {
            margin-top: 50px;
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
        #fname:hover{
            background:transparent;
        }

        .listofbooks .divsend{
            display: flex;
            margin-left: auto;
            margin-right: auto;
            margin-top: 10px;
            margin-bottom: 10px;
            padding-bottom: 10px;
            background: wheat;
            justify-content: center;
            align-items: center;
            flex-wrap: wrap;
            max-width: 1400px;
            width: 100%;
            max-height: 200px;
            height: 100%;
            border-radius: 20px;
            box-shadow: 0 10px 15px rgb(39, 37, 37);
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
            font-size: 30px;
            padding: 5px;   
            font-weight: bold;  
        }


        table tr td select{
            height: 70px;
            max-width: 540px;
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
            width: 490px;
            font-size: 25px;
            text-align: center;
            font-weight: bold;
            border: solid 1.5px;
            border-radius: 13px;
        }
        table tr td input[type="text"]#author{
            max-height: 70px;
            height: 100%;
            width: 450px;
            font-size: 25px;
            text-align: center;
            font-weight: bold;
            border: solid 1.5px;
            border-radius: 13px;
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
            font-size: 20px;
        }
        .ubtn:hover{
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
            height: 1000px;
            transition: all 0.2s;
            resize: none;
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
    </style>

</html>