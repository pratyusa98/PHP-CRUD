<?php

    echo $id = $_GET['id'];
   include('db/connection.php');

  
     $update = "UPDATE user_cmt SET status = 'OFF' WHERE id = '$id'";

    $query_result = mysqli_query($conn, $update);

    if(!$query_result) {
        
        echo mysqli_error($conn);
    }
    
    header('Location: home.php?msg=Updated Successfully');
?>