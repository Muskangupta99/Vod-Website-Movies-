<!DOCTYPE html>
<head>
</head>
<body>
<?php
session_start();
include("connection.php");
$sql="SELECT * FROM `Movies` WHERE `name` LIKE '%".$_POST["valuesearch"]."%' ";
$name=$_POST["valuesearch"];
$final_result=mysqli_query($conn,$sql);
if(mysqli_num_rows($final_result)>0){
	echo '<div class="alert alert-info" role="alert">Showing results with tag ' . $name.'</div>'; ?>
<div class="card-columns">
   <?php while($row = mysqli_fetch_array($final_result, MYSQLI_ASSOC)):?>
   <div class="card">
  <img class="card-img-top" src="<?php echo $row['picture'];?>" alt="Card image cap">
  <div class="card-body">
    <h4 class="card-title"><?php echo $row['name'];?></h4>
	<?php 

if(isset($_SESSION['userid']))
echo '<div class="btn btn-outline-primary"><a href="seemovie.php?link=' . $row['link'] . '&id=' . $row['name'] . '">PLAY</a></div>'?>
	
    
  </div>
</div>
<?php endwhile; }
else{?>
	<div class="alert alert-warning" role="alert">
  <strong>Not Found!</strong>Sorry ,try searching another movie
</div>
<?php } ?>


