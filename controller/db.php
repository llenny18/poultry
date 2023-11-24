<?php
session_set_cookie_params(720000);

//set cookie lifetime for 100 days (60sec * 60mins * 24hours * 100days)
ini_set('session.cookie_lifetime', 60 * 60 * 24 * 100);
ini_set('session.gc_maxlifetime', 60 * 60 * 24 * 100);

   
session_start();
Class Model {
		private $server = "localhost";
		private $username = "root";
		private $password = "";
		private $dbname = "poultryfarm";
		private $conn;

		public function __construct() {
			try {
				$this->conn = new mysqli($this->server, $this->username, $this->password, $this->dbname);	
			} catch (Exception $e) {
				echo "Connection failed" . $e->getMessage();
			
            }
        }

        public function userLogin($user_name, $user_pass) {
			$query = "SELECT * FROM useraccounts WHERE userName = ? and userPassword = ?";

			if ($stmt = $this->conn->prepare($query)) {
				$stmt->bind_param("ss", $user_name, $user_pass);
                
				$stmt->execute();
                
                $results = $stmt->get_result();
                if(($results)==true) {
                
                    while ($row = $results->fetch_assoc()) {
                    $_SESSION['u_id'] = $row['uID'];
                    redirect("index.php");
                }
					
				}
                else{
                    echo "<script>alert('Wrong Username of Password!')</script>";

                }
                
				$stmt->close();
			}
        }

        public function fetchFeeds() {

			$query = "SELECT * FROM feedsinvestment";

			if ($stmt = $this->conn->query($query)) {
			
            $num_of_rows = $stmt->num_rows;
            while ($row = $stmt->fetch_assoc()) {
                $data[] = $row;
            }
            $stmt->close();
        }
        return $data;
    }

    }
	function redirect($location=Null){
		if($location!=Null){
			echo "<script>window.location='{$location}'</script>";	
		}else{
			echo 'error location';
		}
		 
	}

	
	


?>