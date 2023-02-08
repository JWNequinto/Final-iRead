
<?php 
$utp=$_GET['type'];
if ($utp=="User") {
    header("location:main.php");
} elseif ($utp=="Admin") {
    header("location:admin_main.php");
}