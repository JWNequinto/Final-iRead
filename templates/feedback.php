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
    <link rel="stylesheet" href="../css/ReadBook.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
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
                    <div class="comment">
                        <?php
                            
                            $sql1 = "SELECT title FROM currentreading";
                            $res1 = mysqli_query($conn,  $sql1);
                
                            if (mysqli_num_rows($res1) > 0) {
                                while ($row1 = mysqli_fetch_assoc($res1)) {    
                                $title= $row1['title'];
                            

                            $sql = "SELECT star_rate,comment,username,title FROM feedback WHERE title = '$title'";
                            $res = mysqli_query($conn,  $sql);
                
                            if (mysqli_num_rows($res) > 0) {
                                while ($row = mysqli_fetch_assoc($res)) {  ?>
                                    <table>
                                        <tr>
                                            <td>
                                                <h3>Username:</h3>
                                            </td>
                                            <td>
                                                <h2><?=$row['username']?></h2>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h3>Book Title:</h3>
                                            </td>
                                            <td>
                                                <h2 id="ttle"><?=$row['title']?></h2>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h3>Comment:</h3>
                                            </td>
                                            <td>
                                                <h2 id="comm"><?=$row['comment']?></h2>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h3>Star Rate:</h3>
                                            </td>
                                            <td>
                                                <h2 id="star"><?=$row['star_rate']?></h2>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                                <h1></h1>
                                            </td>
                                        </tr>
                                    </table>
                                    
                                    
    
                        <?php
                                    
                                }
                            }
                                }
                            }
                        ?>

                    </div>
                
                    
                    <form action="phprating.php"
                            method="post"
                            enctype="multipart/form-data">
                <div class="divbottom">
                        <table>
                            <tr>
                                <td>
                                    <!--<a href="ratingsystem.php"><input type="submit" class="ubtn" name="submit" value="Rate Book"></a>-->
                                    <div class="rdstar">
                                        <p>ADD FEEDBACK</p>
                                        <input type="radio" name="rate" id="rate-5" value="&#9733; &#9733; &#9733; &#9733; &#9733;">
                                        <label for="rate-5" class="fas fa-star"></label>
                                        <input type="radio" name="rate" id="rate-4" value="&#9733; &#9733; &#9733; &#9733;">
                                        <label for="rate-4" class="fas fa-star"></label>
                                        <input type="radio" name="rate" id="rate-3" value="&#9733; &#9733; &#9733;">
                                        <label for="rate-3" class="fas fa-star"></label>
                                        <input type="radio" name="rate" id="rate-2" value="&#9733; &#9733;">
                                        <label for="rate-2" class="fas fa-star"></label>
                                        <input type="radio" name="rate" id="rate-1" value="&#9733;">
                                        <label for="rate-1" class="fas fa-star"></label>
                                    </div>                                    
                                </td>     	
                            </tr>
                        </table>

                                               
                        <div class="divcomment">
                            <textarea cols="30" placeholder="Describe your experience.." name="comment"></textarea>
                        </div>
                            <table>
                                <tr>
                                    <td width="500px">
                                    <?php                                                                 
                                        $sql = "SELECT CONCAT(firstname,' ',lastname) as fullname FROM online";
                                        $res = mysqli_query($conn,  $sql);
                            
                                        if (mysqli_num_rows($res) > 0) {
                                            while ($row = mysqli_fetch_assoc($res)) { ?>   
                                                <label for="uname">User's Fullname:</label>      
                                                <input type="text" name="uname" value="<?=$row['fullname']?>">
                                    <?php
                                                }
                                            }
                                    ?>

                   
                                    </td>
                                    <!--
                                    <td width="300px">
                                        <?php                                                                 
                                        /*    $sql = "SELECT title FROM books";
                                            $res = mysqli_query($conn,  $sql);
                                        ?>
                                            <label for="title">Title:</label>     
                                            <select name="title">

                                        <?php
                                            while ($row = mysqli_fetch_assoc($res)) { ?>   
                                                <option value="<?=$row['title']?>"><?=$row['title']?></option>
                                        <?php
                                            } */                                           
                                        ?>
                                    </td>
                                    -->
                                    <td width="300px">
                                        <?php                                                                 
                                            $sql = "SELECT title FROM currentreading";
                                            $res = mysqli_query($conn,  $sql);
                                
                                            if (mysqli_num_rows($res) > 0) {
                                                while ($row = mysqli_fetch_assoc($res)) { ?>   
                                                    <label for="title">Title:</label>     
                                                    <input type="text" name="title" value="<?=$row['title']?>">
                                        <?php
                                                }
                                            }
                                        ?>   

                                    </td>
                                </tr>
                            </table>      
                            <table>                                
                                <tr>
                                    <td width="1000px" height="70px" colspan="2">
                                        <div class="btn">
                                            <button type="submit" name="submit">Post</button>
                                        </div>
                                    </td>
                                </tr>
                            </table>                  
                        </div>
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
        .listofbooks{
            display: flex;
            margin-left: auto;
            margin-right: auto;
            margin-top: 250px;
            margin-bottom: 30px;
            padding-top: 35px;
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
            margin-bottom: 0;
            padding-bottom: 50px;
            background: #ffe5ec;
            justify-content: center;
            align-items: center;
            flex-wrap: wrap;
            max-width: 1300px;
            width: 100%;
            max-height: 3500px;
            height: 100%;
            border-radius: 20px;
        }
        
        .listofbooks .lob h1{
            margin-top: 20px;
            width: 1500px;
            text-align: center;
        }
        
        .listofbooks .comment{
            display: flex;
            margin-left: auto;
            margin-right: auto;
            margin-top: 10px;
            margin-bottom: 0;
            padding-bottom: 50px;
            background: #dddddd;
            justify-content: center;
            align-items: center;
            flex-wrap: wrap;
            width: 1100px;
            max-height: 3500px;
            height: 100%;
            border-radius: 20px;
        }
        
        .listofbooks .comment h2 {
            margin-top: 0px;
            margin-bottom: 10px;
            max-width: 900px;
            width: 100%;
            text-align: left;
        }
        .listofbooks .comment #ttle{
            margin-top: 0px;
            margin-bottom: 10px;
            max-width: 900px;
            width: 100%;
            text-align: left;
            font-size: 22px;
        }
        .listofbooks .comment #star{
            margin-top: 0px;
            margin-bottom: 10px;
            max-width: 900px;
            width: 100%;
            color: orange;
            text-align: left;
        }
        .listofbooks .comment #comm{
            padding: 10px;
            background: #b5b5b5;
            margin-top: 0px;
            margin-bottom: 20px;
            width: 900px;
            border-radius: 15px;
            text-align: left;
            font-weight: normal;
            font-size: 22px;
        }
        .listofbooks .comment h1{
            border: solid;
        }

        .listofbooks .comment h3{
            margin-top: 0px;
            width: 120px;
            text-align: left;
            margin-right:10px;
            color: rgb(50, 49, 46);
        }

        .alb {
            margin-top: 10px;
            margin-bottom: 20px;
            width: 420px;
            height: 450px;
            padding-top: 5px;
            padding-bottom: 5px;
            padding-right: 10px;
            padding-left: 10px;
        }
        .alb img {
            width: 100%;
            height: 100%;
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
        table tr td input[type="text"]{
            height: 50px;
            width: 350px;
            font-size: 20px;
            text-align: center;
            font-weight: bold;
            border: solid 1.5px;
            border-radius: 13px;
            pointer-events: none;
        }
        table tr td select{
            height: 50px;
            width: 350px;
            font-size: 22px;
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
            font-size: 23px;
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
        .listofbooks .divbottom{
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
            max-height: 1000px;
            height: 100%;
            border-radius: 20px;
            box-shadow: 0 10px 15px rgb(39, 37, 37);
        }


       .divbottom .rdstar{
        height: 120px
       }
       .divbottom .rdstar p{
        text-align: center;
        font-weight: bold;
        margin-bottom: 30px;
        }
    .divbottom .rdstar input{
      display: none;
    }
    .rdstar label{
      font-size: 40px;
      color: grey;
      padding: 10px;
      float: right;
      transition: all 0.2s ease;
    }
    input:not(:checked) ~ label:hover,
    input:not(:checked) ~ label:hover ~ label{
      color: rgb(247, 94, 135);
    }
    input:checked ~ label{
      color: rgb(255, 68, 118);
    }
    input#rate-5:checked ~ label{
      
      color: #9e1258;
      text-shadow: 0 0 20px #ff87c3;
    }
    .divcomment{
      height: 300px;
      width: 1000px;
      overflow: hidden;
    }
    .divcomment textarea{
      height: 100%;
      width: 100%;
      outline: none;
      color: black;
      border: 3px solid rgb(250, 230, 193);
      background: #fcf0d9;
      border-radius: 15px;
      padding: 10px;
      font-size: 17px;
      resize: none;
    }
    .divcomment textarea:focus{
      border-color: #e6356d;
    }

     .btn button{
      height: 100%;
      width: 200px;
      outline: none;
      background: #9e1258;
      border: #e6356d;
      border-radius: 15px;
      color: white;
      font-size: 17px;
      font-weight: 500;
      text-transform: uppercase;
      cursor: pointer;
      transition: all 0.3s ease;
      margin-left:800px;
    }
    .btn button:hover{
      background: #d10f70;
    }
    </style>
</html>