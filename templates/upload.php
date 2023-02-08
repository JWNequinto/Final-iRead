<?php 

if (isset($_POST['submit']) && isset($_FILES['my_image']) && isset($_POST['title']) && isset($_POST['story']) && isset($_POST['genretype']) && isset($_POST['author'])) {
	include "db_conn.php";

	echo "<pre>";
	print_r($_FILES['my_image']);
	echo "</pre>";

	$img_name = $_FILES['my_image']['name'];
	$img_size = $_FILES['my_image']['size'];
	$tmp_name = $_FILES['my_image']['tmp_name'];
	$error = $_FILES['my_image']['error'];

	if ($error === 0) {
		if ($img_size > 2250000) {
			$em = "Sorry, your file is too large.";
		    header("Location: addstory.php?error=$em");
		}else {
			$img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
			$img_ex_lc = strtolower($img_ex);

			$allowed_exs = array("jpg", "jpeg", "png"); 

			if (in_array($img_ex_lc, $allowed_exs)) {
				$new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
				$img_upload_path = 'bookcover/'.$new_img_name;
				move_uploaded_file($tmp_name, $img_upload_path);
				$title = $_POST['title'];
				$story = $_POST['story'];
				$gtype = $_POST['genretype'];
				$authorname = $_POST['author'];

				// Insert into Database
				$sql = "INSERT INTO books(img_dir,title,story,genre,author,status) 
				        VALUES('$new_img_name','$title','$story','$gtype','$authorname','Pending')";
				mysqli_query($conn, $sql);
				header("Location: addstory.php");
			}else {
				$em = "You can't upload files of this type";
		        header("Location: addstory.php?error=$em");
			}
		}
	}else {
		$em = "unknown error occurred!";
		header("Location: addstory.php?error=$em");
	}

}else {
	header("Location: addstory.php");
}