<!doctype html>
<body>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<form method="post" id="loginform"> 

	  <div id="loginmessage"></div>
	  
      <div class="modal-body mx-3">
        <div class="md-form mb-5">
          <i class="fas fa-envelope prefix grey-text"></i>
          <input type="email" id="defaultForm-email" name="forgotemail" class="form-control validate">
          <label data-error="wrong" data-success="right" for="defaultForm-email">Your Email</label>
        </div>

 
          

        
        <button class="btn  btn-primary" type="submit" name="login">Submit</button>
		 
      </div>
    
  
</form>
 <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	
	</body>
	
	
	
	
	
<script>	
$('#loginform').on('submit', function (event){	

	<?php
//Start session
echo "Test";
//Start session
session_start();
//Connect to the database
include('connection.php');

//Check user inputs
    //Define error messages
$missingEmail = '<p><strong>Please enter your email address!</strong></p>';
$invalidEmail = '<p><strong>Please enter a valid email address!</strong></p>';
    //Get email
    //Store errors in errors variable
if(empty($_POST["forgotemail"])){
    $errors .= $missingEmail;   
}else{
    $email = filter_var($_POST["forgotemail"], FILTER_SANITIZE_EMAIL);
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $errors .= $invalidEmail;   
    }
}
    
    //If there are any errors
        //print error message
if($errors){
    $resultMessage = '<div class="alert alert-danger">' . $errors .'</div>';
    echo $resultMessage;
    exit;
}

    //else: No errors
        //Prepare variables for the query
$email = mysqli_real_escape_string($conn, $email);
        //Run query to check if the email exists in the users table
$sql = "SELECT * FROM `users` WHERE `email` = '$email'";
$result = mysqli_query($conn,"SELECT * FROM `users` WHERE `email` = '$email'");
if(!$result){
    echo '<div class="alert alert-danger">Error running the query!</div>'; exit;
}
$count = mysqli_num_rows($result);
//If the email does not exist
            //print error message
if($count !== 1){
    echo '<div class="alert alert-danger">That email does not exist on our database!</div>';  exit;
}
        
        //else
            //get the user_id
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
$user_id = $row['id'];
            //Create a unique  activation code
$key = bin2hex(openssl_random_pseudo_bytes(16));
            //Insert user details and activation code in the forgotpassword table
$time = time();
$status = 'pending';
$sql = "INSERT INTO `forgotpassword` (`user_id`, `keyy`, `time`, `status`) VALUES ('$user_id', '$key', '$time', '$status')";
$result = mysqli_query($conn, $sql);
if(!$result){
    echo '<div class="alert alert-danger">There was an error inserting the users details in the database!</div>'; 
    exit;
}

            //Send email with link to resetpassword.php with user id and activation code

$message = "Please click on this link to reset your password:\n\n";
$message .= "localhost/moviewebsite/resetpassword.php?user_id=$user_id&key=$key";
header("Location:resetpassword.php?user_id=$user_id&key=$key");
if(mail($email, 'Reset your password', $message, 'From:'.'gameblog406@gmail.com')){
        //If email sent successfully
                //print success message
				
       echo "<div class='alert alert-success'>An email has been sent to $email. Please click on the link to reset your password.</div>";
}

                    ?>
});
</script>
</html>