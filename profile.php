<?php
include('connection.php');
session_start();
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Movies</title>
	
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Movies</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
	  <li class="nav-item active">
        <a class="nav-link" href="#">Profile <span class="sr-only"></span></a>
      </li>
     
    
    </ul>
    <ul class="nav navbar-nav navbar-right ">
	</li>
	   <li class="nav-item">
        <b class="navbar-brand">Hi <?php echo $_SESSION['username']; ?><span class="sr-only"></b>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="index.php?logout=1">Log out <span class="sr-only">(current)</span></a>
      </li>
      
    </ul>
  </div>
</nav>

 <div class="col-md-offset-3 col-md-6">
<h1>General Profile Settings : </h1>
<table class="table">

  <tbody>
    <tr>
      
      <td>Username</td>
      <td><?php echo $_SESSION['username']; ?></td>
	  <td><form id="changeuser" name="changeuser" method="get"><input id="changeu" name="changeu"><button type="submit">Update</button></form></td>
    </tr>
    <tr>
      <tr>
      <td>Email</td>
      <td><?php echo $_SESSION['email']; ?></td>
	  <td><form id="changeemail" name="changeemail" method="post"><input id="changee" name="changee"><button type="submit">Update</button></form></td>
	  </tr>
	  <tr>
	   <td>Password</td>
      <td>hidden</td>
	  <td><form id="changepass" name="changepass" method="post">
	  Current Password:<br><input id="currentpassword" name="currentpassword"><br>
	  New Password:<br><input id="password" name="password"><br>
	  Confirm Password:<br><input id="password2" name="password2">
	  <br><button type="submit">Update</button></form></td>
    </tr>
  </tbody>
</table>
</div>

<form method="post" id="updateusernameform"> 
<div class="modal fade" id="updateusername" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">Update Username?</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
	  <div id="forgotpassmessage"></div>
	  
      <div class="modal-body mx-3">
        <div class="md-form mb-5">
          <i class="fas fa-envelope prefix grey-text"></i>
          <input type="text" id="updateusern" class="form-control validate">
          <label data-error="wrong" data-success="right" for="updateusern">New Username</label>
        </div>

 
      <div class="modal-footer d-flex justify-content-center">
        <button class="btn  btn-primary" type="submit" name="login">Submit</button>
		
      </div>
    </div>
  </div>
</div>
</div>


</form>

<form method="post" id="updateemailform"> 
<div class="modal fade" id="updateemail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">Update Email?</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
	  <div id="forgotpassmessage"></div>
	  
      <div class="modal-body mx-3">
        <div class="md-form mb-5">
          <i class="fas fa-envelope prefix grey-text"></i>
          <input type="email" id="updatee" class="form-control validate">
          <label data-error="wrong" data-success="right" for="updatee">New Email</label>
        </div>

 
      <div class="modal-footer d-flex justify-content-center">
        <button class="btn  btn-primary">Update</button>
		
      </div>
    </div>
  </div>
</div>
</div>


</form>

<form method="post" id="updatepassform"> 
<div class="modal fade " id="updatepassword" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">Update Password?</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
	  <div id="forgotpassmessage"></div>
	  
	   <div class="modal-body mx-3">
	  <div class="md-form mb-4">
          <i class="fas fa-lock prefix grey-text"></i>
          <input type="password" id="update-cpass" class="form-control validate">
          <label data-error="wrong" data-success="right" for="update-cpass">Current Password</label>
        </div>
		
		<div class="md-form mb-4">
          <i class="fas fa-lock prefix grey-text"></i>
          <input type="password" id="update-npass" class="form-control validate">
          <label data-error="wrong" data-success="right" for="update-npass">New Password</label>
        </div>
       
	    <div class="md-form mb-4">
          <i class="fas fa-lock prefix grey-text"></i>
          <input type="password" id="update-ncpass" class="form-control validate">
          <label data-error="wrong" data-success="right" for="update-ncpass">Confirm Password</label>
        </div>
 </div>
      <div class="modal-footer d-flex justify-content-center">
        <button class="btn  btn-primary">Update</button>
		
      </div>
    </div>
  </div>
</div>
</div>


</form>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
 <script>
 $('#changeuser').on('submit', function (event){	
  <?php

//start session and connect
session_start();
include ('connection.php');

//get user_id
$id = $_SESSION['userid'];

//Get username sent through Ajax
$username = $_GET['changeu'];
if($username=="");
exit;
echo $username;
//Run query and update username
//$sql = "UPDATE `users` SET `username`='$username' WHERE `id`='$id'";
$result = mysqli_query($conn,"UPDATE `users` SET `username`='$username' WHERE `id`='$id'");

if(!$result){
    echo '<div class="alert alert-danger">There was an error updating storing the new username in the database!</div>';
}
else{
	echo '<div class="alert alert-success">Updated Successfully,Changes may take time to reflect</div>';
	//$sql = "SELECT `username` FROM `users` WHERE `id`='$id'";
	$result = mysqli_query($conn,"SELECT `username` FROM `users` WHERE `id`='$id'");
	 $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    
}
?>});
</script>
<script>
$('#changeemail').on('submit', function (event){	
  <?php

//start session and connect
session_start();
include ('connection.php');

//get user_id
$id = $_SESSION['userid'];

//Get username sent through Ajax
$email = $_POST['changee'];
echo $username;
//Run query and update username
//$sql = "UPDATE `users` SET `email`='$email' WHERE `id`='$id'";
if($email=="")
	exit;
$result = mysqli_query($conn,"UPDATE `users` SET `email`='$email' WHERE `id`='$id'");

if(!$result){
    echo '<div class="alert alert-danger">There was an error updating storing the new username in the database!</div>';
}
else{
	echo '<div class="alert alert-success">Updated Successfully,Changes may take time to reflect</div>';
	//$sql = "SELECT `username` FROM `users` WHERE `id`='$id'";
	$result = mysqli_query($conn,"SELECT `email` FROM `users` WHERE `id`='$id'");
	 $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    
}
?>});
</script>
<script>
$('#changepass').on('submit', function (event){	
  <?php
//start session and connect
session_start();
include ('connection.php');

//define error messages
$missingCurrentPassword = '<p><strong>Please enter your Current Password!</strong></p>';
$incorrectCurrentPassword = '<p><strong>The password entered is incorrect!</strong></p>';
$missingPassword = '<p><strong>Please enter a new Password!</strong></p>';
$invalidPassword = '<p><strong>Your password should be at least 6 characters long and inlcude one capital letter and one number!</strong></p>';
$differentPassword = '<p><strong>Passwords don\'t match!</strong></p>';
$missingPassword2 = '<p><strong>Please confirm your password</strong></p>';

//check for errors
if(empty($_POST["currentpassword"])){
    $errors .= $missingCurrentPassword;
}else{
    $currentPassword = $_POST["currentpassword"];
    $currentPassword = filter_var($currentPassword, FILTER_SANITIZE_STRING);
    $currentPassword = mysqli_real_escape_string ($link, $currentPassword);
    $currentPassword = hash('sha256', $currentPassword);
    //check if given password is correct
    $user_id = $_SESSION["userid"];
    $sql = "SELECT `password` FROM `users` WHERE user_id='$user_id'";
    $result = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($result);
    if($count !== 1){
        echo '<div class="alert alert-danger">There was a problem running the query</div>';
    }else{
        $row = mysqli_fetch_array($result, MYSQL_ASSOC);
        if($currentPassword != $row['password']){
            $errors .= $incorrectCurrentPassword;
        }
    }
    
}

if(empty($_POST["password"])){
    $errors .= $missingPassword; 
}elseif(!(strlen($_POST["password"])>6
         and preg_match('/[A-Z]/',$_POST["password"])
         and preg_match('/[0-9]/',$_POST["password"])
        )
       ){
    $errors .= $invalidPassword; 
}else{
    $password = filter_var($_POST["password"], FILTER_SANITIZE_STRING); 
    if(empty($_POST["password2"])){
        $errors .= $missingPassword2;
    }else{
        $password2 = filter_var($_POST["password2"], FILTER_SANITIZE_STRING);
        if($password !== $password2){
            $errors .= $differentPassword;
        }
    }
}

//if there is an error print error message
if($errors){
    $resultMessage = "<div class='alert alert-danger'>$errors</div>";
    echo $resultMessage;   
}else{
    $password = mysqli_real_escape_string($conn, $password);
    $password = hash('sha256', $password);
    //else run query and update password
    $sql = "UPDATE `users` SET `password`='$password' WHERE `id`='$user_id'";
    $result = mysqli_query($conn, $sql);
    if(!$result){
        echo "<div class='alert alert-danger'>The password could not be reset. Please try again later.</div>";
    }else{
        echo "<div class='alert alert-success'>Your password has been updated successfully.</div>";
    }
    
}


?>});
</script>
</html>