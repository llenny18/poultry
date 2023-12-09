<?php

/* 
Developers: Aliester Alinsunurin, Allen Eidrian S. Ramos
Application Type: Poultry and Piggery Financial Management System

This is the Home File (addpaper.php)
Contents:
1. All the OOP based functions Using SOLID Principle: Encapsulation, Polymorphism, Inheritance and Abstraction
 */

 // Set Cookie time to 20 hours
 session_set_cookie_params(72000);

// Set cookie lifetime for 100 days (60sec * 60mins * 24hours * 100days) for Config File
ini_set('session.cookie_lifetime', 60 * 60 * 24 * 100);
ini_set('session.gc_maxlifetime', 60 * 60 * 24 * 100);

   

// Session start for data handling
 session_start();

// Login Interface
interface loginInterface {
	public function userLogin($user_name, $user_pass);
}


// Investment Types Interface
interface investInterface {
	public function fetchInvestments();
}

// Investment records Interface
interface investRecords {
	public function fetchRecords($typeID);
}

// Investment insertion Interface
interface addInvestments {
	public function addInvestments($p_name, $p_typeID, $p_recordPrice);
};

// Investment records  fetch using ID Interface
interface recordGetbyID {
	public function getRecordbyID($recordID);
}

// Investment editing of records list Interface
interface editRecordbyID {
	public function editRecbyID($recordID, $Name, $typeID, $price);
}

// Disabling records Interface
interface disableRecord {
	public function disa_record($recordID);
}

// Disabled records list Interface
interface disabledRecords {
	public function getRecord();
}

// Deleting records Interface
interface deleteRecord {
	public function deletebyID($recordID);
}

// Record fetching of username Interface
interface usernameInterface {
	public function getUsername($uid);
}

// Users List Interface
interface userList {
	public function getUsers();
}
// Disabled Users list Interface
interface disabledUsers {
	public function getUsers();
}
//User Information fetching using ID Interface
interface userGetbyID {
	public function getUserbyID($uid);
}
// Disabling Users Interface
interface userDisable {
	public function disableUser($uid);
}

// Insertion of Users Interface
interface addEditbyID {
	public function addUserbyID($fname,$lname,$cnum,$email,$rid,$uname,$pass);
}

// Updating of Users Interface
interface editEditbyID {
	public function editUserbyID($uid, $fname,$lname,$cnum,$email,$rid,$uname,$pass);
}

// Delete User by ID Interface
interface deleteEditbyID {
	public function deletebyID($uid);
}
// Pigs List Records Interface
interface pigList {
	public function display_pigList();
}
// Pigs Sold List Records Interface
interface pigSold {
	public function display_pigSold();
}

// Pigs Price List Records Interface
interface pigPrice {
	public function display_pigPrice();
}

interface editPigSold {
	public function editPigSoldbyID($soldID, $soldCount, $houseID, $priceID);
}

interface pigPrice {
	public function display_pigPrice();
}

interface editPigPrice {
	public function editPigPricebyID($priceID, $priceDate, $price);
}

// Archived Pigs List Records Interface
interface archpigList {
	public function displayarch_pigList();
}
// Archived Pigs Sold List Records Interface
interface archpigSold {
	public function displayarch_pigSold();
}
// Archived Pigs Price List Records Interface
interface archpigPrice {
	public function displayarch_pigPrice();
}
// Paper Information Records Interface
interface paperInfo {
	public function display_paperInfo();
}

// Archived Paper Information Records Interface
interface archpaperInfo {
	public function displayarch_paperInfo();
}
// Disabling of paper record by id Interface
interface disapaper {
	public function disa_paper($uid);
}
// Disabling of Pigs list record by id Interface
interface disaPiglist {
	public function disa_Piglist($uid);
}
// Disabling of Pigs price list record by id Interface
interface disaPigprice {
	public function disa_Pigprice($uid);
}
// Disabling of Pigs sold list record by id Interface
interface disaPigsold {
	public function disa_Pigsold($uid);
}

// Count of pigs sold per month records Interface
interface countOFPigs {
	public function getList();
}

// Count of pigs deceased per month records Interface
interface countOFDeceased {
	public function getList();
}

// Records of expenses per month records Interface
interface expensesList {
	public function getList();
}

// Records of restimated profit per month records Interface
interface EstimatedProfit {
	public function getList();
}


// Updating of Pig List Interface
interface editPigList {
	public function getListbyID($pid);
}


// Updating of Paper List Interface
interface editPaper {
	public function getListbyID($pid);
}

// Updating of Pig List Data Interface
interface editPigListData {
	public function editListbyID($hid, $pc, $pd, $pid);
}


// Updating of Paper Data Interface
interface editPaperData {
	public function editPaperbyID($ptype,$pimage,$pid);
}

// Insertion of Pigs List Interface
interface addPigListData {
	public function addListbyID($hid, $pc, $pd);
}

// Updating of Paper List Interface
interface editPaperList {
	public function getListbyID($pid);
}

// Insertion of Paper Interface
interface addPaper {
	public function addPaperData($pType, $pImage);
}

// Fetching of gross profit using created gross view
interface getGross {
	public function getGross();
}


// Connection Class
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

// Login Class
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


// Fetching Investments Class
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

// Fetching Filtered Class
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

// Inserting Investments Class using stored procedure
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

// Fetching Investments by ID Class
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


// Updating Investments using stored proceduere Class

Class recordGet1 extends connGateway  implements recordGetbyID {

	public function getRecordbyID($recordID) {
	
		$query = "SELECT * FROM `pigprice` where priceID = ?";
	
			if ($stmt = $this->conn->prepare($query)) {
			$stmt->bind_param("s", $recordID);
			$stmt->execute();
			$results = $stmt->get_result();
			while ($row = $results->fetch_assoc()) {
				$data = array("priceDate"=>"{$row['priceDate']}", "price"=>"{$row['price']}");
			}
			$stmt->close();
		
			return $data;
		}
	
	}
}

Class recordGet2 extends connGateway  implements recordGetbyID {

	public function getRecordbyID($recordID) {
	
		$query = "SELECT * FROM `pigsold` where soldID = ?";
	
			if ($stmt = $this->conn->prepare($query)) {
			$stmt->bind_param("s", $recordID);
			$stmt->execute();
			$results = $stmt->get_result();
			while ($row = $results->fetch_assoc()) {
				$data = array("soldCount"=>"{$row['soldCount']}", "priceID"=>"{$row['priceID']}", "houseID"=>"{$row['houseID']}");
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

// Disabling Investments by ID Class
Class disableRecordClass extends connGateway  implements disableRecord {

	public function disa_record($recordID){
	
		
		$query = "UPDATE `investmentrecords` SET `DeletedAt` = curdate() WHERE `investmentrecords`.`recordID` = ?";
	
	if ($stmt = $this->conn->prepare($query)) {
		$stmt->bind_param('s', $recordID);
		$stmt->execute();
		$stmt->close();
		echo "<script>alert('Investment Record Disabled Successful!'); window.location='Bills.php'</script>";
	}
	
	}
}

Class disabled_recordsClass extends connGateway  implements disabledRecords {

	public function getRecord() {
	
		$query = "SELECT * FROM `investmentrecords` where DeletedAt is not null";
	
		if ($stmt = $this->conn->query($query)) {
		
		$num_of_rows = $stmt->num_rows;
		while ($row = $stmt->fetch_assoc()) {
			$data[] = $row;
		}
		$stmt->close();
	}
	if (empty($data)) {
		// Handle the case when no data is found
		echo "No records found.";
	}
	else { 
		return $data;
	}
	}
	
}

Class deleteRecordClass extends connGateway  implements deleteRecord {

	public function deletebyID($recordID){
	
		
		$query = "DELETE FROM `investmentrecords` WHERE recordID = ?";
	
	if ($stmt = $this->conn->prepare($query)) {
		$stmt->bind_param('s', $recordID);
		$stmt->execute();
		$stmt->close();
		echo "<script>alert('Investment Record Deleted Successful!'); window.location='disabledinvestment.php'</script>";
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


Class getGrossClass extends connGateway  implements getGross {

public function getGross() {

	$query = "SELECT * FROM `grossprofit`";

	if ($stmt = $this->conn->query($query)) {
	
	while ($row = $stmt->fetch_assoc()) {
		$data = ["profits"=>$row["totalProfit"]];
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



Class editImageClass extends connGateway  implements editPaperData {

public function editPaperbyID($ptype, $pimage, $pid){

	
	$query = "UPDATE `paperrecords` SET `p_typeID` = ?, `p_image` = ? WHERE `paperrecords`.`paperID` = ?";

if ($stmt = $this->conn->prepare($query)) {
	$stmt->bind_param('sss', $ptype, $pimage, $pid);
	$stmt->execute();
	$stmt->close();
	echo "<script>alert('Paper Updated Successful!'); window.location='paperlist.php'</script>";
}


}

}




Class editPigListClass extends connGateway  implements editPigListData {

public function editListbyID($hid, $pc, $pd, $pid){

	
	$query = "UPDATE `piglist` SET `HouseID` = ?, `PigCount` = ?, `PigDeceased` = ? WHERE `piglist`.`pigListID` = ?";

if ($stmt = $this->conn->prepare($query)) {
	$stmt->bind_param('ssss', $hid, $pc, $pd, $pid);
	$stmt->execute();
	$stmt->close();
	echo "<script>alert('Pigs List Update Successful!'); window.location='piglist.php'</script>";
}

}
}
Class addPigDClass extends connGateway  implements addPigListData {

public function addListbyID($hid, $pc, $pd){

	
	$query = "INSERT INTO `piglist` (`pigListID`, `HouseID`, `PigCount`, `PigDeceased`, `CreatedAt`, `DeletedAt`) VALUES (NULL, ?, ?, ?, curdate(), NULL)";

if ($stmt = $this->conn->prepare($query)) {
	$stmt->bind_param('sss', $hid, $pc, $pd);
	$stmt->execute();
	$stmt->close();
	echo "<script>alert('Pigs List Added Successful!'); window.location='piglist.php'</script>";
}

}
}
Class addPaperClass extends connGateway  implements addPaper {

public function addPaperData($pType, $pImage){

	
	$query = "INSERT INTO `paperrecords` (`paperID`, `p_typeID`,`p_image`, `CreatedAt`, `DeletedAt`) VALUES (NULL, ?, ?, current_timestamp(), NULL)";

if ($stmt = $this->conn->prepare($query)) {
	$stmt->bind_param('ss', $pType, $pImage);
	$stmt->execute();
	$stmt->close();
	echo "<script>alert('Pigs List Added Successful!'); window.location='paperlist.php'</script>";
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

Class editPigPriceClass extends connGateway  implements editPigPrice {

	public function editPigPricebyID($priceID, $priceDate, $price){
	
		
		$query = "CALL update_pigPrice(?,?,?)";
	
	if ($stmt = $this->conn->prepare($query)) {
		$stmt->bind_param('sss', $priceID, $priceDate, $price);
		$stmt->execute();
		$stmt->close();
		echo "<script>alert('Pig Price Updated Successful!'); window.location='pigprice.php'</script>";
	}
	
	}
}

Class editPigSoldClass extends connGateway  implements editPigSold {

	public function editPigSoldbyID($soldID, $soldCount, $houseID, $priceID){
	
		
		$query = "CALL update_pigSold(?,?,?,?)";
	
	if ($stmt = $this->conn->prepare($query)) {
		$stmt->bind_param('ssss', $soldID, $soldCount, $houseID, $priceID);
		$stmt->execute();
		$stmt->close();
		echo "<script>alert('Pig Sold Record Updated Successful!'); window.location='pigsold.php'</script>";
	}
	
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

	$query = "SELECT * FROM `paperinfo` where DeletedAt is Not null";

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