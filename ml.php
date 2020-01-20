<?php
include("connection.php");
session_start();
if(!isset($_SESSION['userid'])){
    header("location: index.php");
}
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
 <a class="navbar-brand" href="Profile.php">Profile</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
    
	  
     
    
    </ul>
    <ul class="nav navbar-nav navbar-right ">
	</li>
	   <li class="nav-item">
        <b class="navbar-brand">Hi <?php echo $_SESSION['username'] ; ?><span class="sr-only"></b>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="index.php?logout=1">Log out <span class="sr-only">(current)</span></a>
      </li>

<select class="custom-select" name="genresearch" id="genresearch">
  <option value="Genre" disabled selected>Genre</option>
  <option value="All" class="genre" >All</option>
  <option value="Action" class="genre">Action</option>
  
  <option value="Drama" class="genre">Drama</option>
  <option value="Thriller" class="genre">Thriller</option>
  <option value="Romance" class="genre">Romance</option>
  </select>

</div>

 
      </li>
      
    </ul>
  </div>
</nav>

<div class="jumbotron">
  <h1 class="display-3">Hit the PlAY button to watch!</h1>
  <p class="lead">Read the Movie Info on your play screen</p>
  <hr class="my-2">
  <p>Type a movie in the search box</p>
  <p class="lead">
    
  <form class="form-inline" method="post" id="searchform">
    <input class="form-control mr-sm-2" type="text" name="valuesearch" id="empty" placeholder="Search Movie">
    <button class="btn btn btn-primary my-2 my-sm-0" type="submit" name="moviesearch">Search</button>
	



	
<div id="searchmessage" class="searchdiv">
<br></br>
<?php
  $query="SELECT * FROM `Movies` WHERE 1";
$final_result=mysqli_query($conn,$query);?>
<div class="card-columns" >
   <?php while($row = mysqli_fetch_array($final_result, MYSQLI_ASSOC)):?>
   <div class="card">
  <img class="card-img-top" src="<?php echo $row['picture'];?>" alt="Card image cap">
  <div class="card-body">
    <h4 class="card-title"><?php echo $row['name'];?></h4>
	<?php echo '<div class="btn btn-outline-primary"><a href="seemovie.php?link=' . $row['link'] . '&id=' . $row['name'] . '">PLAY</a></div>'?>
  
  </div>
</div>
<?php endwhile; ?>
</div>
 </div>
  </form>




  </p>
</div>



<form method="post" id="form1">

<div class="modal fade" id="modalRegisterForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">Sign Up</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
	  
	 <div id="s1"> </div>
	  
      <div class="modal-body mx-3">
	  <div class="md-form mb-5">
          <i class="fas fa-envelope prefix grey-text"></i>
          <input type="text" id="signupForm-user" class="form-control validate" name="username">
          <label data-error="wrong" data-success="right" for="signupForm-user">Username</label>
        </div>
        <div class="md-form mb-5">
          <i class="fas fa-envelope prefix grey-text"></i>
          <input type="email" id="signupForm-email" class="form-control validate" name="email">
          <label data-error="wrong" data-success="right" for="signupForm-email">Email</label>
        </div>

<div class="md-form mb-4">
          <i class="fas fa-lock prefix grey-text"></i>
          <input type="password" id="signupForm-pass" class="form-control validate" name="password">
          <label data-error="wrong" data-success="right" for="signupForm-pass">Password</label>
        </div>
       
	    <div class="md-form mb-4">
          <i class="fas fa-lock prefix grey-text"></i>
          <input type="password" id="signupForm-pass2" class="form-control validate" name="password2">
          <label data-error="wrong" data-success="right" for="signupForm-pass2">Confirm Password</label>
        </div>

      </div>
      <div class="modal-footer d-flex justify-content-center">
        <button id="buttonsign" class="btn btn-primary" type="submit" name="signup">Sign up</button>
      </div>
    </div>
	
  </div>
</div>
</form>

<form method="post" id="forgotpassform"> 
 <div id="forgotpassmessage"></div>
<div class="modal fade" id="modalforgotForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">Forgot password? Enter Your Email</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
	 
	  
      <div class="modal-body mx-3">
        <div class="md-form mb-5">
          <i class="fas fa-envelope prefix grey-text"></i>
          <input type="email" id="forgotpassForm-email" class="form-control validate">
          <label data-error="wrong" data-success="right" for="forgotpassForm-email">Your Email</label>
        </div>

 
      <div class="modal-footer d-flex justify-content-center">
        <input class="btn green" name="login" type="submit" value="Send Link">

		
      </div>
    </div>
  </div>
</div>
</div>


</form>


<form method="post" id="loginform"> 
<div class="modal fade" id="modalLoginForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">Login</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
	  <div id="loginmessage"></div>
	  
      <div class="modal-body mx-3">
        <div class="md-form mb-5">
          <i class="fas fa-envelope prefix grey-text"></i>
          <input type="email" id="defaultForm-email" name="loginemail" class="form-control validate">
          <label data-error="wrong" data-success="right" for="defaultForm-email">Your Email</label>
        </div>

 <div class="md-form mb-4">
          <i class="fas fa-lock prefix grey-text"></i>
          <input type="password" id="defaultForm-pass" name="loginpassword" class="form-control validate">
          <label data-error="wrong" data-success="right" for="defaultForm-pass">Your Password</label>
        </div>

        <div>
		<div class="checkbox">
		<label>
		<input type="checkbox" name="rememberme" id="rememberme"> Remember me</label>
		<a class="pull-right" style="cursor:pointer" href="#" data-toggle="modal" data-target="#modalforgotForm" data-dismiss="modal">      | Forgot password?</a>
		</div>
      <div class="modal-footer d-flex justify-content-center">
        <button class="btn  btn-primary" type="submit" name="login">Login</button>
		 <button class="btn  btn-default" data-dismiss="modal" data-toggle="modal" data-target="#modalRegisterForm" >Sign Up</button>
      </div>
    </div>
  </div>
</div>
</form>
<div>
<script>




function apicall(){
	$.getJSON('http://www.omdbapi.com/?t=Iron Man 2').then(function(response){
		console.log(response);
	});
}
apicall();
 
</script>





    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script src="index7.js"></script>
	
  </body>
  
</html>