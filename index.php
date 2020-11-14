

<?php
session_start();

?>

<!DOCTYPE html>
<html>
<head>
	<title>Crud</title>
	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

</head>
<body>


	<br>
	<hr>
  <div class="container-fluid">
  <h1 style="text-align: center;">Crud Application PHP !!</h1>
  <div class="row">
    <div class="col-sm-6" style="background-color:yellow;">
        <!-- Registaration Part -->
  <div class="container-fluid" style="width: 50%">
    <h1>Registration</h1>
     <form action="registration.php" method="post">
    <div class="form-group">
      <label for="email">Name:</label>
      <input type="text" class="form-control" name="name" id="email" placeholder="Enter Name">
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control"  id="pwd" placeholder="Enter password" name="pswd">
    </div>
    <div class="form-group form-check">
      <label class="form-check-label">
      
      </label>
    </div>
    <input  type="submit" name="submit" value="Submit" class="btn btn-primary"/>
  </form>
    
  </div> 
</div>
    <div class="col-sm-6" style="background-color:pink;">
     <!-- Login Part -->
  
  <div class="container-fluid" style="width: 50%">
    <h1>Login</h1>
     <form action="index.php" method="post">
    <div class="form-group">
      <label for="email">Name:</label>
      <input type="text" class="form-control" name="name" id="email" placeholder="Enter Name">
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control"  id="pwd" placeholder="Enter password" name="pswd">
    </div>
    <div class="form-group form-check">
      <label class="form-check-label">
      
      </label>
    </div>
    <input style="margin-bottom: 40px;" type="submit" name="submit" value="Submit" class="btn btn-primary"/>
  </form>
    
  </div>
    </div>
  </div>
</div>
<hr>


</body>
</html>


<!--Login  -->
    <?php
  
 include('db/connection.php');

  if (isset($_POST['submit'])) {

     $name=$_POST['name'];
  $pass=$_POST['pswd'];

  $query=mysqli_query($conn,"select * from user where name='$name' AND   password ='$pass'");

  if (!$query) {
      echo mysqli_error($conn);
  }

  $row = mysqli_fetch_array($query, MYSQLI_ASSOC);

  $id = $row['id'];
  $name = $row['name'];

 
 


    if (mysqli_num_rows($query) == 1 ) {

  
      $_SESSION['id'] = $id;
      $_SESSION['name'] = $name;
    
    header("location: home.php");
      
    }else{
       echo "<script> alert('invaild email and password');</script>";
    }

  }

    ?>