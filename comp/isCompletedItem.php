<?php 
  
    include('config/dbConnect.php');
    
    $newStatus = $item['is_completed'] ? false : true ;
   
  	if(isset($_POST['done'])){

		$id_to_mark = mysqli_real_escape_string($conn, $_POST['id_to_mark']);

		$sql = "UPDATE items SET is_completed = true WHERE id = $id_to_mark";

		if(mysqli_query($conn, $sql)){
			header('Location: index.php');
		} else {
			echo 'query error: '. mysqli_error($conn);
		}
	}

 ?>

     <form action="<?php echo $_SERVER['PHP_SELF'] ?>"  method="POST">
      <input type="hidden" name="id_to_mark" value="<?php echo $item['id']; ?>">
	  <input type="submit" name="done" value="Done" class="btn brand green z-depth-0">
	 </form>