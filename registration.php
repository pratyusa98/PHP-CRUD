<?php

include('db/connection.php');

if (isset($_POST['submit'])) {

  $name=$_POST['name'];
  $pwd=$_POST['pswd'];

  $select_query = "SELECT * FROM user WHERE name='$name'";

  $select_query_result = mysqli_query($conn,$select_query);

 if(mysqli_num_rows($select_query_result) > 0 ){
        echo "<script>alert('Name already exist');</script>";
    }else{
if($name !="" || $pwd !=""){
  $query=mysqli_query($conn,"insert into user (name,password) VALUES ('$name','$pwd') ");

  if ($query) {
  	 header("location: index.php");
  	 echo "<script> alert('sucess'); </script>";

  }else{
  	echo "failed";
  }
}else{
	echo "<script> alert('filed all '); </script>";
}
}
}


?>
