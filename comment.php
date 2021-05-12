<?php
include('db/connection.php');
session_start();

if (isset($_POST['submit'])) {
	 
	 $title=$_POST['title'];
	 $comment=addslashes($_POST['comment']);
	 $status=$_POST['status'];

	 $user_id = $_SESSION['id'];

	 $query=mysqli_query($conn,"insert into user_cmt (user_id,title,cmt,status) VALUES ('$user_id','$title','$comment','$status') ");

	 if($query){
	 	echo "<script> alert('Added');</script>";
	 	header("location: home.php");
	 }else{
	 		echo "<script> alert('not Added');</script>";
	 		header("location: home.php");
	 }


}


?>