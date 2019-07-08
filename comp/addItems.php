<?php

  include('config/dbConnect.php');

  $name= $title = '';

  $errors = ['name' => '', 'title' => ''];

  if(isset($_POST['submit'])) {

  	if(empty($_POST['name'])) {
  		$errors['name'] = 'Who moved my cheese??';
  	} else { $name = $_POST['name']; }

    if(empty($_POST['title'])) {
    	$errors['title'] = 'what should i buy?';
    } { $title = $_POST['title']; }

  


  if(array_filter($errors)){
			//echo 'errors in form';
		} 
		else {
			$name = mysqli_real_escape_string($conn, $_POST['name']);
			$title = mysqli_real_escape_string($conn, $_POST['title']);

			$sql = "INSERT INTO items(title,created_by) VALUES('$title','$name')";

			if(mysqli_query($conn, $sql)){
				header('Location: index.php');
			} else {
				echo 'query error: '. mysqli_error($conn);
			}

		}
	}

 ?>

 <form class="col s6 m4 grey text-center" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
 	<input type="text" name="title" placeholder="add an item" value="<?php echo htmlspecialchars($title) ?>">
 	<div class="red-text"><?php echo $errors['title']; ?></div>
 	<input type="text" name="name" placeholder="who are u?" value="<?php echo htmlspecialchars($name) ?>">
 	<div class="red-text"><?php echo $errors['name']; ?></div>
 	<div class="center">
	  <input type="submit" name="submit" value="Submit" class="btn brand blue z-depth-0">
	</div>
 </form>