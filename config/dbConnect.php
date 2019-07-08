<?php 
	$conn = mysqli_connect('localhost', 'yogi', 'yoGi123', 'shopingList');
	if(!$conn){
		echo 'Connection error: '. mysqli_connect_error();
	}

?>