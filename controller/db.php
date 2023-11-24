<?php
session_set_cookie_params(720000);

//set cookie lifetime for 100 days (60sec * 60mins * 24hours * 100days)
ini_set('session.cookie_lifetime', 60 * 60 * 24 * 100);
ini_set('session.gc_maxlifetime', 60 * 60 * 24 * 100);

   
session_start();
    $conn = new mysqli('localhost','root','','poultryfarm');
	mysqli_set_charset($conn, "utf8");
    if($conn->connect_error){
        die ("Connection failed: " .$conn->connect_error);
    }

	function redirect($location=Null){
		if($location!=Null){
			echo "<script>
					window.location='{$location}'
				</script>";	
		}else{
			echo 'error location';
		}
		 
	}

	
	


?>