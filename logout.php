<?php
$loggedout=$_GET['logout'];
if(isset($_SESSION['userid']) && $loggedout == 1){
    
    setcookie("rememberme", "", time()-3600);
    
}

?>