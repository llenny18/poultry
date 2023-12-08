<?php
session_set_cookie_params(720000);

//set cookie lifetime for 100 days (60sec * 60mins * 24hours * 100days)
ini_set('session.cookie_lifetime', 60 * 60 * 24 * 100);
ini_set('session.gc_maxlifetime', 60 * 60 * 24 * 100);

   
session_start();

interface loginInterface {
	public function userLogin($user_name, $user_pass);
}

interface feedInterface {
	public function fetchFeeds();
}

interface usernameInterface {
	public function getUsername($uid);
}

interface userList {
	public function getUsers();
}
interface disabledUsers {
	public function getUsers();
}
interface userGetbyID {
	public function getUserbyID($uid);
}
interface userDisable {
	public function disableUser($uid);
}


interface addEditbyID {
	public function addUserbyID($fname,$lname,$cnum,$email,$rid,$uname,$pass);
}

interface editEditbyID {
	public function editUserbyID($uid, $fname,$lname,$cnum,$email,$rid,$uname,$pass);
}

Class connGateway {
		public $server = "localhost";
		public $username = "root";
		public $password = "";
		public $dbname = "poultryfarm";
		public $conn;

		public function __construct() {
			try {
				$this->conn = new mysqli($this->server, $this->username, $this->password, $this->dbname);	
			} catch (Exception $e) {
				echo "Connection failed" . $e->getMessage();
			
            }
        }

	}

Class loginClass extends connGateway implements loginInterface {

        public function userLogin($user_name, $user_pass) {
			$query = "SELECT * FROM useraccounts WHERE u_username = ? and u_password = ?";

			if ($stmt = $this->conn->prepare($query)) {
				$stmt->bind_param("ss", $user_name, $user_pass);
                
				$stmt->execute();
                $results = $stmt->get_result();
                if(($results)==true) {
                
                    while ($row = $results->fetch_assoc()) {
                    $_SESSION['u_id'] = $row['userID'];
                    echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script><script>let timerInterval; Swal.fire({ title: "Login Success!", html: "Welcome to Financial Management System.", timer: 2000, timerProgressBar: true, didOpen: () => { Swal.showLoading(); const timer = Swal.getPopup().querySelector("b"); timerInterval = setInterval(() => { timer.textContent = `${Swal.getTimerLeft()}`; }, 100); }, willClose: () => { clearInterval(timerInterval); } }).then((result) => { /* Read more about handling dismissals below */ if (result.dismiss === Swal.DismissReason.timer) { console.log("I was closed by the timer"); } });</script>';

                    redirect("index.php");
                }
					
				}
                else{
                    echo "<script>alert('Wrong Username of Password!')</script>";

                }
                
				$stmt->close();         
			}
        }
	}

Class feedClass extends connGateway  implements feedInterface {

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

Class usernameClass extends connGateway  implements usernameInterface {
	public function getUsername($uid) {

	$query = "SELECT * FROM `viewUsers` where userID = ?";

	if ($stmt = $this->conn->prepare($query)) {
	$stmt->bind_param("s", $uid);
	$stmt->execute();
    $results = $stmt->get_result();
                
	while ($row = $results->fetch_assoc()) {
		$data[] = $row;
	}
	$stmt->close();
	}
	return $data;
	}

    }


	Class usersClass extends connGateway  implements userList {

public function getUsers() {

	$query = "SELECT * FROM `viewusers` where CreatedAt is not null and DeletedAt is null";

	if ($stmt = $this->conn->query($query)) {
	
	$num_of_rows = $stmt->num_rows;
	if($num_of_rows >0){
	while ($row = $stmt->fetch_assoc()) {
		$data[] = $row;
	}
	$stmt->close();
return $data;

}

}
}

}


Class disabled_usersClass extends connGateway  implements disabledUsers {

public function getUsers() {

	$query = "SELECT * FROM `viewusers` where DeletedAt is not null";

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

Class adduserClass extends connGateway  implements addEditbyID {

public function addUserbyID($fname,$lname,$cnum,$email,$rid,$uname,$pass){

	
	$query = "CALL insert_employee(?,?,?,?,?,?,?)";

if ($stmt = $this->conn->prepare($query)) {
	$stmt->bind_param('sssssss', $fname,$lname,$cnum,$email,$rid,$uname,$pass);
	$stmt->execute();
	$stmt->close();
	echo "<script>alert('Account Register Successful!'); window.location='userlist.php'</script>";
}

}
}


Class edituserClass extends connGateway  implements editEditbyID {

public function editUserbyID($uid, $fname,$lname,$cnum,$email,$rid,$uname,$pass){

	
	$query = "CALL update_employee(?,?,?,?,?,?,?,?)";

if ($stmt = $this->conn->prepare($query)) {
	$stmt->bind_param('ssssssss',$uid, $fname,$lname,$cnum,$email,$rid,$uname,$pass);
	$stmt->execute();
	$stmt->close();
	echo "<script>alert('Account Updated Successful!'); window.location='userlist.php'</script>";
}

}
}
Class disableUserClass extends connGateway  implements userDisable {

public function disableUser($uid){

	
	$query = "UPDATE `useraccounts` SET `DeletedAt` = curdate() WHERE `useraccounts`.`userID` = ?";

if ($stmt = $this->conn->prepare($query)) {
	$stmt->bind_param('s', $uid);
	$stmt->execute();
	$stmt->close();
	echo "<script>alert('Account Disabled Successful!'); window.location='userlist.php'</script>";
}

}
}






Class userGet extends connGateway  implements userGetbyID {

public function getUserbyID($uid) {

	$query = "SELECT * FROM `viewusers` where userID = ?";

	if ($stmt = $this->conn->prepare($query)) {
	$stmt->bind_param("s", $uid);
	$stmt->execute();
    $results = $stmt->get_result();
	while ($row = $results->fetch_assoc()) {
		$data = array("ufname"=>"{$row['u_firstname']}", "ulname"=>"{$row['u_lastname']}", "urole"=>"{$row['roleID']}", "uname"=>"{$row['u_username']}", "upass"=>"{$row['u_password']}", "cnum"=>"{$row['u_contactnum']}", "email"=>"{$row['u_email']}");
	}
	$stmt->close();

return $data;
}

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