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

interface investInterface {
	public function fetchInvestments();
}

interface investRecords {
	public function fetchRecords($typeID);
}

interface addInvestments {
	public function addInvestments($p_name, $p_typeID, $p_recordPrice);
};

interface recordGetbyID {
	public function getRecordbyID($recordID);
}

interface editRecordbyID {
	public function editRecbyID($recordID, $Name, $typeID, $price);
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

interface deleteEditbyID {
	public function deletebyID($uid);
}
interface pigList {
	public function display_pigList();
}
interface pigSold {
	public function display_pigSold();
}
interface pigPrice {
	public function display_pigPrice();
}
interface archpigList {
	public function displayarch_pigList();
}
interface archpigSold {
	public function displayarch_pigSold();
}
interface archpigPrice {
	public function displayarch_pigPrice();
}
interface paperInfo {
	public function display_paperInfo();
}
interface archpaperInfo {
	public function displayarch_paperInfo();
}
interface disapaper {
	public function disa_paper($uid);
}
interface disaPiglist {
	public function disa_Piglist($uid);
}
interface disaPigprice {
	public function disa_Pigprice($uid);
}
interface disaPigsold {
	public function disa_Pigsold($uid);
}

interface countOFPigs {
	public function getList();
}

interface countOFDeceased {
	public function getList();
}

interface expensesList {
	public function getList();
}

interface EstimatedProfit {
	public function getList();
}


interface editPigList {
	public function getListbyID($pid);
}


interface editPaper {
	public function getListbyID($pid);
}

interface addPigList {
	public function getListbyID($pid);
}

interface editPaperList {
	public function getListbyID($pid);
}



interface addPaper {
	public function getListbyID($pid);
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

Class investClass extends connGateway  implements investInterface {

	public function fetchInvestments() {

		$query = "SELECT * FROM investmenttype";

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

Class recordClass extends connGateway  implements investRecords {

	public function fetchRecords($typeID) {

		$query = "SELECT * FROM `investmentrecords` WHERE typeID = ? and CreatedAt is not null and DeletedAt is null";

		if ($stmt = $this->conn->prepare($query)) {
			$stmt->bind_param("s", $typeID);
			$stmt->execute();
			$result = $stmt->get_result();
			while ($row = $result->fetch_assoc()) {
				$data[] = $row;
			}
			$stmt->close();
			if (empty($data)) {
				// Handle the case when no data is found
				echo "No records found for typeID: $typeID";
			}
			else { 
				return $data;
			}
		}	
	}
}

Class addInvestClass extends connGateway  implements addInvestments {

	public function addInvestments($p_name, $p_typeID, $p_recordPrice){
	
		
		$query = "CALL insert_investment(?,?,?)";
	
	if ($stmt = $this->conn->prepare($query)) {
		$stmt->bind_param('sss',$p_name, $p_typeID, $p_recordPrice);
		$stmt->execute();
		$stmt->close();
		echo "<script>alert('Investment Record Successful!'); window.location = 'Bills.php'</script>";
	}
	
	}
	}

Class recordGet extends connGateway  implements recordGetbyID {

	public function getRecordbyID($recordID) {
	
		$query = "SELECT * FROM `investmentrecords` where recordID = ?";
	
			if ($stmt = $this->conn->prepare($query)) {
			$stmt->bind_param("s", $recordID);
			$stmt->execute();
			$results = $stmt->get_result();
			while ($row = $results->fetch_assoc()) {
				$data = array("Name"=>"{$row['Name']}", "typeID"=>"{$row['typeID']}", "recordPrice"=>"{$row['recordPrice']}");
			}
			$stmt->close();
		
			return $data;
		}
	
	}
}

Class editRecordClass extends connGateway  implements editRecordbyID {

	public function editRecbyID($recordID, $Name, $typeID, $recordPrice){
	
		
		$query = "CALL update_investment(?,?,?,?)";
	
	if ($stmt = $this->conn->prepare($query)) {
		$stmt->bind_param('ssss', $recordID, $Name, $typeID, $recordPrice);
		$stmt->execute();
		$stmt->close();
		echo "<script>alert('Account Updated Successful!'); window.location='Bills.php'</script>";
	}
	
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



Class getPigCounts extends connGateway  implements countOFPigs {

public function getList() {

	$query = "SELECT * FROM `pigsold_permonth`";

	if ($stmt = $this->conn->query($query)) {
	
	while ($row = $stmt->fetch_assoc()) {
		$data = [$row["Jan"],$row["Feb"],$row["March"],$row["April"],$row["May"],$row["June"],$row["July"],$row["Aug"],$row["Sept"],$row["Oct"],$row["Nov"],$row["Decs"] ];
	}
	$stmt->close();
}
return $data;
}

}


Class getPigDeceased extends connGateway  implements countOFDeceased {

public function getList() {

	$query = "SELECT * FROM `pigdeceased_permonth`";

	if ($stmt = $this->conn->query($query)) {
	
	while ($row = $stmt->fetch_assoc()) {
		$data = [$row["Jan"],$row["Feb"],$row["March"],$row["April"],$row["May"],$row["June"],$row["July"],$row["Aug"],$row["Sept"],$row["Oct"],$row["Nov"],$row["Decs"] ];
	}
	$stmt->close();
}
return $data;
}

}

Class getEstimatedProfit extends connGateway  implements EstimatedProfit {

	public function getList() {

$query = "SELECT * FROM `estimatedprofit_permonth`";

if ($stmt = $this->conn->query($query)) {

while ($row = $stmt->fetch_assoc()) {
	$data = [$row["Jan"],$row["Feb"],$row["March"],$row["April"],$row["May"],$row["June"],$row["July"],$row["Aug"],$row["Sept"],$row["Oct"],$row["Nov"],$row["Decs"] ];
}
$stmt->close();
}
return $data;
}
public function getList1() {

	$query = "SELECT * FROM `estimatedprofit_permonth`";

	if ($stmt = $this->conn->query($query)) {
	
	while ($row = $stmt->fetch_assoc()) {
		$data = [0, (float)$row["Jan"],(float)$row["Feb"],(float)$row["March"],(float)$row["April"],(float)$row["May"],(float)$row["June"],(float)$row["July"],(float)$row["Aug"],(float)$row["Sept"],(float)$row["Oct"],(float)$row["Nov"],(float)$row["Decs"] ];
	}
	$stmt->close();
}
return $data;
}
public function getList2() {

	$query = "SELECT * FROM `recordofprofits`";

	if ($stmt = $this->conn->query($query)) {
	
	while ($row = $stmt->fetch_assoc()) {
		$data = [0, (float)$row["Jan"],(float)$row["Feb"],(float)$row["March"],(float)$row["April"],(float)$row["May"],(float)$row["June"],(float)$row["July"],(float)$row["Aug"],(float)$row["Sept"],(float)$row["Oct"],(float)$row["Nov"],(float)$row["Decs"] ];
	}
	$stmt->close();
}
return $data;
}

}

Class getExpenses extends connGateway  implements expensesList {

public function getList() {

	$query = "SELECT * FROM `expenses_permonth`";

	if ($stmt = $this->conn->query($query)) {
	
	while ($row = $stmt->fetch_assoc()) {
		$data = [$row["Jan"],$row["Feb"],$row["March"],$row["April"],$row["May"],$row["June"],$row["July"],$row["Aug"],$row["Sept"],$row["Oct"],$row["Nov"],$row["Decs"] ];
	}
	$stmt->close();
}
return $data;
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
Class deleteuserClass extends connGateway  implements deleteEditbyID {

public function deletebyID($uid){

	
	$query = "CALL delete_employee(?)";

if ($stmt = $this->conn->prepare($query)) {
	$stmt->bind_param('s', $uid);
	$stmt->execute();
	$stmt->close();
	echo "<script>alert('Account Deleted Successful!'); window.location='disabledusers.php'</script>";
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



Class disablePaperClass extends connGateway  implements disapaper {

public function disa_paper($uid){

	
	$query = "UPDATE `paperrecords` SET `DeletedAt` = curdate() WHERE `paperrecords`.`paperID` = ?";

if ($stmt = $this->conn->prepare($query)) {
	$stmt->bind_param('s', $uid);
	$stmt->execute();
	$stmt->close();
	echo "<script>alert('Paper Disabled Successful!'); window.location='paperlist.php'</script>";
}

}
}


Class disablePLClass extends connGateway  implements disaPiglist {

public function disa_Piglist($uid){

	
	$query = "UPDATE `piglist` SET `DeletedAt` = curdate() WHERE `piglist`.`HouseID` = ?";

if ($stmt = $this->conn->prepare($query)) {
	$stmt->bind_param('s', $uid);
	$stmt->execute();
	$stmt->close();
	echo "<script>alert('Pigs list Disabled Successful!'); window.location='piglist.php'</script>";
}

}
}

Class disablePPClass extends connGateway  implements disaPigprice {

public function disa_Pigprice($uid){

	
	$query = "UPDATE `pigprice` SET `DeletedAt` = curdate() WHERE `pigprice`.`priceID` = ?";

if ($stmt = $this->conn->prepare($query)) {
	$stmt->bind_param('s', $uid);
	$stmt->execute();
	$stmt->close();
	echo "<script>alert('Pigs Price Disabled Successful!'); window.location='pigprice.php'</script>";
}

}
}


Class disablePSClass extends connGateway  implements disaPigsold {

public function disa_Pigsold($uid){

	
	$query = "UPDATE `pigsold` SET `DeletedAt` = curdate() WHERE `pigsold`.`soldID` = ?";

if ($stmt = $this->conn->prepare($query)) {
	$stmt->bind_param('s', $uid);
	$stmt->execute();
	$stmt->close();
	echo "<script>alert('Pigs Sold Disabled Successful!'); window.location='pigsold.php'</script>";
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


Class getPiglistByID extends connGateway  implements editPigList {

public function getListbyID($pid) {

	$query = "SELECT * FROM `piglist` WHERE piglistID = ?";

	if ($stmt = $this->conn->prepare($query)) {
	$stmt->bind_param("s", $pid);
	$stmt->execute();
    $results = $stmt->get_result();
	while ($row = $results->fetch_assoc()) {
		$data = array("pid"=>"{$row['pigListID']}", "hid"=>"{$row['HouseID']}", "pg"=>"{$row['PigCount']}", "pd"=>"{$row['PigDeceased']}");
	}
	$stmt->close();

return $data;
}

}
}



Class getPaperListByID extends connGateway  implements editPaperList {

public function getListbyID($pid) {

	$query = "SELECT * FROM `paperinfo` WHERE paperID = ?";

	if ($stmt = $this->conn->prepare($query)) {
	$stmt->bind_param("s", $pid);
	$stmt->execute();
    $results = $stmt->get_result();
	while ($row = $results->fetch_assoc()) {
		$data = array("pid"=>"{$row['paperID']}", "ptm"=>"{$row['p_typeName']}", "pi"=>"{$row['p_image']}", "pd"=>"{$row['p_typeDesc']}");
	}
	$stmt->close();

return $data;
}

}
}


Class piglistClass extends connGateway  implements pigList {

public function display_pigList(){

	$query = "SELECT * FROM `piglist`  where CreatedAt is not null and DeletedAt is null";
	
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

Class pigsoldClass extends connGateway  implements pigSold {

public function display_pigSold(){

	$query = "SELECT * FROM `pigsprofit` where CreatedAt is not null and DeletedAt is null";

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

Class pigpriceClass extends connGateway  implements pigPrice {

public function display_pigPrice(){

	$query = "SELECT * FROM `pigprice` where CreatedAt is not null and DeletedAt is null";

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


Class archpiglistClass extends connGateway  implements archpigList {

public function displayarch_pigList(){

	$query = "SELECT * FROM `piglist` where DeletedAt is not null";

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

Class archpigsoldClass extends connGateway  implements archpigSold {

public function displayarch_pigSold(){

	$query = "SELECT * FROM `pigsprofit` where DeletedAt is not null";

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

Class archpigpriceClass extends connGateway  implements archpigPrice {

public function displayarch_pigPrice(){

	$query = "SELECT * FROM `pigprice` where DeletedAt is not null";

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

Class paperListClass extends connGateway  implements paperInfo {

public function display_paperInfo(){

	$query = "SELECT * FROM `paperinfo` where CreatedAt is not null and DeletedAt is null";

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

Class archpaperListClass extends connGateway  implements archpaperInfo {

public function displayarch_paperInfo(){

	$query = "SELECT * FROM `paperinfo` where DeletedAt is not null";

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