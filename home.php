<?php
  include('db/connection.php');
  session_start();
  if(strlen($_SESSION['id'])==0)
  {
  header('location:index.php');
  }
  else {
?>



<!DOCTYPE html>
<html>
<head>
	<title>home</title>

	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

</head>
<body>
     <div class="container">
     	<div class="row">
     		<div class="col-sm-6">
	 <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#"><?php echo $_SESSION['name'];?></a></div>
	 <div class="col-sm-6">
    
	    <a href="logout.php">Logout</a>
	    </div>
	    </div>
      </div>

      
<div class="container">

<div class="row">
	<div class="col-sm-6">
		<h1>Insert Data</h1>
<form action="comment.php" method="post">
  <div class="form-group">
    <label for="email">Title</label>
    <input type="text" class="form-control" placeholder="Enter Title" id="email" name="title">
  </div>

    <div class="form-group">
   
    <input type="hidden" class="form-control" id="email" name="status" value="OFF">
  </div>

  <div class="form-group">
  <label for="comment">Comment:</label>
  <textarea class="form-control" name="comment" placeholder="Enter Comment" rows="5" id="comment"></textarea>
</div>
  <input type="submit" name="submit" class="btn btn-primary" value="submit">
</form>
	</div>

	<div class="col-sm-6">
		<h1>Retrive</h1>
    <table class="table">
    <thead>
      <tr>
        <th>id</th>
        <th>Title</th>
        <th>Comment</th>
        <th>Status</th>
      </tr>
    </thead>
    <tbody>

<!-- Retrive Comment In Table -->
       <?php
           $user_id = $_SESSION['id'];

        $query=mysqli_query($conn,"select * from user_cmt WHERE user_id = '$user_id'");

        while ($row=mysqli_fetch_array($query)) {
        	
       

       ?>

       <tr>
        <td><?php echo $row['id'];?></td>
        <td><?php echo $row['title'];?></td>
        <td><?php echo $row['cmt'];?></td>

        <?php
       
        $status = $row["status"];

        if ($status == 'OFF') {
        	

        ?>
         <td><a href="on_status.php?id=<?php echo $row['id']; ?>" class="btn red  ON"><?php echo $row["status"]; ?><a/></td>
         <?php } 

         elseif ($status == 'ON') {
         
          ?>
         <td><a href="off_status.php?id=<?php echo $row['id']; ?>" class="btn red  OFF"><?php echo $row["status"]; ?><a/></td>
         	  <?php } else{

             ///////

         	  } ?>
                                         
      </tr>

  <?php } ?>


    </tbody>
  </table>
  




	</div>
	

</div>

<div class="container">
	<h1>Show Comment</h1>

	
		<?php
       
 $query=mysqli_query($conn,"select * from user_cmt where status='ON'");

       while ($row=mysqli_fetch_array($query)) {
       ?>
       <div class="card">
  <div class="card-body">
   <?php echo $row['cmt'];?>
  </div>


</div><br>
<?php }?>

	
</div>
 


	
</div>


</body>
</html>
<?php } ?>