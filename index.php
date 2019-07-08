<?php  

   include('config/dbConnect.php');

   $sql = 'SELECT id, title, created_by, is_completed FROM items ORDER BY created_at';

   $result = mysqli_query($conn, $sql);

   $items = mysqli_fetch_all($result, MYSQLI_ASSOC);
  
   	mysqli_free_result($result);

	mysqli_close($conn);
	
?>

<!DOCTYPE html>
<html>
    <head>
    	<title>Shoping List</title>
    	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    	<link href="https://fonts.googleapis.com/css?family=Bree+Serif&display=swap" rel="stylesheet">
    	<link href="https://fonts.googleapis.com/css?family=Permanent+Marker&display=swap" rel="stylesheet">
    	<style type="text/css">
    		input{
             text-align:center;
            }
            .font1 {
            	font-family: 'Bree Serif', serif;
            }
            .font2 {
            	font-family: 'Permanent Marker', cursive;
            }
    	</style>
    </head>
    <body class="purple lighten-4">
        <nav class="white z-depth-0">
        	<div class="container">
        		<h2 class="center black-text font2">Shoping List</h2>
        	</div>
        </nav>
        <h4 class="center black-text font1">whats your wife want?</h4>    
        <div class="container">
        	<div class="row">
                <ul>
        		<?php foreach ($items as $item) { ?>
                    <li>
        			<div class="col s12 m12 card z-depth-0 blue">
        			 <div class="card-content center">
        				 	<h4 class="font2"><?php echo htmlspecialchars($item['title']); ?></h4>
        				 	<h6 class="font1">created by: <?php echo htmlspecialchars($item['created_by']); ?></h6>
        				 	<div style="display: flex; justify-content: center;">
        				 	<?php include('comp/deleteItems.php') ?>
        				 	<?php include('comp/isCompletedItem.php') ?>
        				 </div>
        			 </div>
        			</div>
                </li>
        		<?php } ?>
            </ul>
        	</div>
        	<?php include('comp/addItems.php') ?>
        </div>
    


    </body>
</html>