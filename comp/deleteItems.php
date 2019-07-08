<?php 
  
    include('config/dbConnect.php');
    
	if(isset($_POST['delete'])){

		$id_to_delete = mysqli_real_escape_string($conn, $_POST['id_to_delete']);

		$sql = "DELETE FROM items WHERE id = $id_to_delete";

		if(mysqli_query($conn, $sql)){
			header('Location: index.php');
		} else {
			echo 'query error: '. mysqli_error($conn);
		}
	}

 ?>

     <form action="<?php echo $_SERVER['PHP_SELF'] ?>"  method="POST">
      <input type="hidden" name="id_to_delete" value="<?php echo $item['id']; ?>">
	  <input type="submit" name="delete" value="Delete" class="btn brand red z-depth-0">
	 </form>