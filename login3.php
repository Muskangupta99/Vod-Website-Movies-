<!doctype html>
<body>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<form method="post" id="loginform"> 

	  <div id="loginmessage"></div>
	  
      <div class="modal-body mx-3">
        <div class="md-form mb-5">
          <i class="fas fa-envelope prefix grey-text"></i>
          <input type="email" id="defaultForm-email" name="loginemail" class="form-control validate">
          <label data-error="wrong" data-success="right" for="defaultForm-email">Your Email</label>
        </div>

 
          <input type="password" id="defaultForm-pass" name="loginpassword" class="form-control validate">
          <label data-error="wrong" data-success="right" for="defaultForm-pass">Your Password</label>
        

        <div>
		<div class="checkbox">
		<label>
		<input type="checkbox" name="rememberme" id="rememberme"> Remember me</label>
		<a class="pull-right" style="cursor:pointer" href="forgotpass.php">      | Forgot password?</a>
		</div>
      <div class="modal-footer d-flex justify-content-center">
        <button class="btn  btn-primary" type="submit" name="login">Login</button>
		 <button class="btn  btn-default" data-dismiss="modal" data-toggle="modal" data-target="#modalRegisterForm" >Sign Up</button>
      </div>
    </div>
  </div>
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
session_start();
//Connect to the database
include("connection.php");
//Check user inputs
    //Define error messages
$missingEmail = '<p><stong>Please enter your email address!</strong></p>';
$missingPassword = '<p><stong>Please enter your password!</strong></p>'; 
$errors='';
    //Get email and password
echo "Processing";
    //Store errors in errors variable
if(empty($_POST["loginemail"])){
    $errors .= $missingEmail;   
}else{
    $email = filter_var($_POST["loginemail"], FILTER_SANITIZE_EMAIL);
}
if(empty($_POST["loginpassword"])){
    $errors .= $missingPassword;   
}else{
    $password = filter_var($_POST["loginpassword"], FILTER_SANITIZE_STRING);
}
    //If there are any errors
if($errors){
    //print error message
    $resultMessage = '<div class="alert alert-danger">' . $errors .'</div>';
    echo $resultMessage;   
}else{
    //else: No errors
    //Prepare variables for the query
    $email = mysqli_real_escape_string($conn,$email);
$password = mysqli_real_escape_string($conn,$password);
$password2= hash('sha256', $password);
        //Run query: Check combinaton of email & password exists
$sql = "SELECT * FROM users WHERE email='$email' AND password='$password2'";
$result = mysqli_query($conn, "SELECT * FROM `users` WHERE `email`='$email' AND `password`='$password2'");
if(!$result){
    echo '<div class="alert alert-danger">Error running the query!</div>';
    exit;
}
        //If email & password don't match print error
$count = mysqli_num_rows($result);
if($count !== 1){
    echo '<div class="alert alert-danger">Wrong Username or Password</div>';
   
    
}
else {
    //log the user in: Set session variables
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $_SESSION['userid']=$row['id'];
    $_SESSION['username']=$row['username'];
    $_SESSION['email']=$row['email'];
    
    if(empty($_POST['rememberme'])){
        //If remember me is not checked
        echo "success";
		header("Location: ml.php");
    }else{
        //Create two variables $authentificator1 and $authentificator2
        $authentificator1 = bin2hex(openssl_random_pseudo_bytes(10));
        //2*2*...*2
        $authentificator2 = openssl_random_pseudo_bytes(20);
        //Store them in a cookie
        function f1($a, $b){
            $c = $a . "," . bin2hex($b);
            return $c;
        }
        $cookieValue = f1($authentificator1, $authentificator2);
        setcookie(
            "rememberme",
            $cookieValue,
            time() + 1296000
        );
        
        //Run query to store them in rememberme table
        function f2($a){
            $b = hash('sha256', $a); 
            return $b;
        }
        $f2authentificator2 = f2($authentificator2);
        $userid = $_SESSION['userid'];
        $expiration = date('Y-m-d H:i:s', time() + 1296000);
        
        $sql = "INSERT INTO `rememberme`
        (`authentificator1`, `f2authentificator2`, `user_id`, `expiration`)
        VALUES
        ('$authentificator1', '$f2authentificator2', '$userid', '$expiration')";
        $result = mysqli_query($conn, $sql);
        if(!$result){
            echo  '<div class="alert alert-danger">There was an error storing data to remember you next time.</div>';  
        }else{
            echo "success";   
           header("Location: ml.php");
        }
    }
}
    }

            //else
                //Create two variables $authentificator1 and $authentificator2
                //Store them in a cookie
                //Run query to store them in rememberme table
                //If query unsuccessful
                    //print error
                //else
                    //print "success"
                    ?>
});
</script>
</html>