<?php include "db_conn.php";
session_start();
$clear = mysqli_query($conn, "DELETE FROM currentreading");
if (isset($_POST['readnow']) && isset($_POST['btitle'])) {
    $btitle = $_POST['btitle'];
	$currentreadning = mysqli_query($conn, "INSERT INTO currentreading(title,genre,story,img_dir,author,status) SELECT title,genre,story,img_dir,author,status FROM books WHERE title='$btitle'");
    header("location: checkbook.php");
}
?>