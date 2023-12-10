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
interface loginInterface
{
	// Function declaration to be used
	public function userLogin($user_name, $user_pass);
}


// Investment Types Interface
interface investInterface
{
	// Function declaration to be used
	public function fetchInvestments();
}

// Investment records Interface
interface investRecords
{
	// Function declaration to be used
	public function fetchRecords($typeID);
}

// Investment insertion Interface
interface addInvestments
{
	// Function declaration to be used
	public function addInvestments($p_name, $p_typeID, $p_recordPrice);
};

// Investment records  fetch using ID Interface
interface recordGetbyID
{
	// Function declaration to be used
	public function getRecordbyID($recordID);
}

// Investment editing of records list Interface
interface editRecordbyID
{
	// Function declaration to be used
	public function editRecbyID($recordID, $Name, $typeID, $price);
}

// Disabling records Interface
interface disableRecord
{
	// Function declaration to be used
	public function disa_record($recordID);
}

// Disabled records list Interface
interface disabledRecords
{
	// Function declaration to be used
	public function getRecord();
}

// Deleting records Interface
interface deleteRecord
{
	// Function declaration to be used
	public function deletebyID($recordID);
}

// Record fetching of username Interface
interface usernameInterface
{
	// Function declaration to be used
	public function getUsername($uid);
}

// Users List Interface
interface userList
{
	// Function declaration to be used
	public function getUsers();
}
// Disabled Users list Interface
interface disabledUsers
{
	// Function declaration to be used
	public function getUsers();
}
//User Information fetching using ID Interface
interface userGetbyID
{
	// Function declaration to be used
	public function getUserbyID($uid);
}
// Disabling Users Interface
interface userDisable
{
	// Function declaration to be used
	public function disableUser($uid);
}

// Insertion of Users Interface
interface addEditbyID
{
	// Function declaration to be used
	public function addUserbyID($fname, $lname, $cnum, $email, $rid, $uname, $pass);
}

// Updating of Users Interface
interface editEditbyID
{
	// Function declaration to be used
	public function editUserbyID($uid, $fname, $lname, $cnum, $email, $rid, $uname, $pass);
}

// Delete User by ID Interface
interface deleteEditbyID
{
	// Function declaration to be used
	public function deletebyID($uid);
}
// Pigs List Records Interface
interface pigList
{
	// Function declaration to be used
	public function display_pigList();
}
// Pigs Sold List Records Interface
interface pigSold
{
	// Function declaration to be used
	public function display_pigSold();
}

// Pigs Price List Records Interface
interface pigPrice
{
	// Function declaration to be used
	public function display_pigPrice();
}

interface editPigSold
{
	// Function declaration to be used
	public function editPigSoldbyID($soldID, $soldCount, $houseID, $priceID);
}


interface editPigPrice
{
	// Function declaration to be used
	public function editPigPricebyID($priceID, $priceDate, $price);
}

// Archived Pigs List Records Interface
interface archpigList
{
	// Function declaration to be used
	public function displayarch_pigList();
}
// Archived Pigs Sold List Records Interface
interface archpigSold
{
	// Function declaration to be used
	public function displayarch_pigSold();
}
// Archived Pigs Price List Records Interface
interface archpigPrice
{
	// Function declaration to be used
	public function displayarch_pigPrice();
}
// Paper Information Records Interface
interface paperInfo
{
	// Function declaration to be used
	public function display_paperInfo();
}

// Archived Paper Information Records Interface
interface archpaperInfo
{
	// Function declaration to be used
	public function displayarch_paperInfo();
}
// Disabling of paper record by id Interface
interface disapaper
{
	// Function declaration to be used
	public function disa_paper($uid);
}
// Disabling of Pigs list record by id Interface
interface disaPiglist
{
	// Function declaration to be used
	public function disa_Piglist($uid);
}
// Disabling of Pigs price list record by id Interface
interface disaPigprice
{
	// Function declaration to be used
	public function disa_Pigprice($uid);
}
// Disabling of Pigs sold list record by id Interface
interface disaPigsold
{
	// Function declaration to be used
	public function disa_Pigsold($uid);
}

// Count of pigs sold per month records Interface
interface countOFPigs
{
	// Function declaration to be used
	public function getList();
}

// Count of pigs deceased per month records Interface
interface countOFDeceased
{
	// Function declaration to be used
	public function getList();
}

// Records of expenses per month records Interface
interface expensesList
{
	// Function declaration to be used
	public function getList();
}

// Records of Percent Rate of profit per Month
interface percentRate
{
	// Function declaration to be used
	public function getList();
}


// Records of restimated profit per month records Interface
interface EstimatedProfit
{
	// Function declaration to be used
	public function getList();
}


// Updating of Pig List Interface
interface editPigList
{
	// Function declaration to be used
	public function getListbyID($pid);
}


// Updating of Paper List Interface
interface editPaper
{
	// Function declaration to be used
	public function getListbyID($pid);
}

// Updating of Pig List Data Interface
interface editPigListData
{
	// Function declaration to be used
	public function editListbyID($hid, $pc, $pd, $pid);
}


// Updating of Paper Data Interface
interface editPaperData
{
	// Function declaration to be used
	public function editPaperbyID($ptype, $pimage, $pid);
}

// Insertion of Pigs List Interface
interface addPigListData
{
	// Function declaration to be used
	public function addListbyID($hid, $pc, $pd);
}

// Updating of Paper List Interface
interface editPaperList
{
	// Function declaration to be used
	public function getListbyID($pid);
}

// Insertion of Paper Interface
interface addPaper
{
	// Function declaration to be used
	public function addPaperData($pType, $pImage);
}

// Fetching of gross profit using created gross view
interface getGross
{
	// Function declaration to be used
	public function getGross();
}
// Fetching of gross profit using created gross view
interface sellPigs
{
	// Function declaration to be used
	public function sellbyID($pid);
}

interface getProfit{
	// Function declaration to be used
	public function getProfit();
}



// Connection Class
class connGateway
{
	private $server = "localhost";
	private $username = "root";
	private $password = "";
	private $dbname = "poultryfarm";
	public $conn;

	// Function declaration to be used
	public function __construct()
	{
		try {
			$this->conn = new mysqli($this->server, $this->username, $this->password, $this->dbname);
		} catch (Exception $e) {
			echo "Connection failed" . $e->getMessage();
		}
	}
}

// Login Class
class loginClass extends connGateway implements loginInterface
{

	// Function declaration to be used
	public function userLogin($user_name, $user_pass)
	{
		// Query declaration to be executed
		$query = "SELECT * FROM useraccounts WHERE u_username = ? and u_password = ?";

		//  Preparing of query to be binded with parameters
		if ($stmt = $this->conn->prepare($query)) {
			//  Binding of parameters
			$stmt->bind_param("ss", $user_name, $user_pass);

			//  Query Execution
			$stmt->execute();
			//  Storing of fetched data to the vairable
			$results = $stmt->get_result();
			if (($results) == true) {

				//  Data fetching using while loop and fetch assoc
				while ($row = $results->fetch_assoc()) {
					$_SESSION['u_id'] = $row['userID'];
					echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script><script>let timerInterval; Swal.fire({ title: "Login Success!", html: "Welcome to Financial Management System.", timer: 2000, timerProgressBar: true, didOpen: () => { Swal.showLoading(); const timer = Swal.getPopup().querySelector("b"); timerInterval = setInterval(() => { timer.textContent = `${Swal.getTimerLeft()}`; }, 100); }, willClose: () => { clearInterval(timerInterval); } }).then((result) => { /* Read more about handling dismissals below */ if (result.dismiss === Swal.DismissReason.timer) { console.log("I was closed by the timer"); } });</script>';

					redirect("index.php");
				}
			} else {
				//  Message flash and location change
				echo "<script>alert('Wrong Username of Password!')</script>";
			}

			//  Closing mysqli object
			$stmt->close();
		}
	}
}


// Fetching Investments Class
class investClass extends connGateway  implements investInterface
{

	// Function declaration to be used
	public function fetchInvestments()
	{

		// Query declaration to be executed
		$query = "SELECT * FROM investmenttype";

		// Query execution and if success will return a value/execute mysql query
		if ($stmt = $this->conn->query($query)) {

			$num_of_rows = $stmt->num_rows;
			//  Fetching of rows selected using the query
			while ($row = $stmt->fetch_assoc()) {
				//  Storing of values to php array
				$data[] = $row;
			}
			//  Closing mysqli object
			$stmt->close();
		}
		//  Returning of data fetched
		return $data;
	}
}

// Fetching Filtered Class
class recordClass extends connGateway  implements investRecords
{

	// Function declaration to be used
	public function fetchRecords($typeID)
	{

		// Query declaration to be executed
		$query = "SELECT * FROM `investmentrecords` WHERE typeID = ? and CreatedAt is not null and DeletedAt is null";

		//  Preparing of query to be binded with parameters
		if ($stmt = $this->conn->prepare($query)) {
			//  Binding of parameters
			$stmt->bind_param("s", $typeID);
			//  Query Execution
			$stmt->execute();
			$result = $stmt->get_result();
			while ($row = $result->fetch_assoc()) {
				//  Storing of values to php array
				$data[] = $row;
			}
			//  Closing mysqli object
			$stmt->close();
			if (empty($data)) {
				// Handle the case when no data is found
				echo "No records found for typeID: $typeID";
			} else {
				//  Returning of data fetched
				return $data;
			}
		}
	}
}

// Inserting Investments Class using stored procedure
class addInvestClass extends connGateway  implements addInvestments
{

	// Function declaration to be used
	public function addInvestments($p_name, $p_typeID, $p_recordPrice)
	{


		// Query declaration to be executed
		$query = "CALL insert_investment(?,?,?)";

		//  Preparing of query to be binded with parameters
		if ($stmt = $this->conn->prepare($query)) {
			//  Binding of parameters
			$stmt->bind_param('sss', $p_name, $p_typeID, $p_recordPrice);
			//  Query Execution
			$stmt->execute();
			//  Closing mysqli object
			$stmt->close();
			//  Message flash and location change
			echo "<script>alert('Investment Record Successful!'); window.location = 'Bills.php'</script>";
		}
	}
}// Inserting Investments Class using stored procedure
class sellPigsClass extends connGateway  implements sellPigs
{

	// Function declaration to be used
	public function sellbyID($pid)
	{


		// Query declaration to be executed
		$query = "CALL sell_pigs(?)";

		//  Preparing of query to be binded with parameters
		if ($stmt = $this->conn->prepare($query)) {
			//  Binding of parameters
			$stmt->bind_param('s', $pid);
			//  Query Execution
			$stmt->execute();
			//  Closing mysqli object
			$stmt->close();
			//  Message flash and location change
			echo "<script>alert('Pigs Sold Successfully!'); window.location = 'pigsold.php'</script>";
		}
	}
}

// Fetching Investments by ID Class
class recordGet extends connGateway  implements recordGetbyID
{

	// Function declaration to be used
	public function getRecordbyID($recordID)
	{

		// Query declaration to be executed
		$query = "SELECT * FROM `investmentrecords` where recordID = ?";

		//  Preparing of query to be binded with parameters
		if ($stmt = $this->conn->prepare($query)) {
			//  Binding of parameters
			$stmt->bind_param("s", $recordID);
			//  Query Execution
			$stmt->execute();
			//  Storing of fetched data to the vairable
			$results = $stmt->get_result();
			//  Data fetching using while loop and fetch assoc
			while ($row = $results->fetch_assoc()) {
				//  Data storing to self declared php associative array
				$data = array("Name" => "{$row['Name']}", "typeID" => "{$row['typeID']}", "recordPrice" => "{$row['recordPrice']}");
			}
			//  Closing mysqli object
			$stmt->close();

			//  Returning of data fetched
			return $data;
		}
	}
}


// Updating Investments using stored proceduere Class
class recordGet1 extends connGateway  implements recordGetbyID
{

	// Function declaration to be used
	public function getRecordbyID($recordID)
	{

		// Query declaration to be executed
		$query = "SELECT * FROM `pigprice` where priceID = ?";

		//  Preparing of query to be binded with parameters
		if ($stmt = $this->conn->prepare($query)) {
			//  Binding of parameters
			$stmt->bind_param("s", $recordID);
			//  Query Execution
			$stmt->execute();
			//  Storing of fetched data to the vairable
			$results = $stmt->get_result();
			//  Data fetching using while loop and fetch assoc
			while ($row = $results->fetch_assoc()) {
				//  Data storing to self declared php associative array
				$data = array("priceDate" => "{$row['priceDate']}", "price" => "{$row['price']}");
			}
			//  Closing mysqli object
			$stmt->close();

			//  Returning of data fetched
			return $data;
		}
	}
}

// Fetching of Pigs sold by ID Class
class recordGet2 extends connGateway  implements recordGetbyID
{

	// Function declaration to be used
	public function getRecordbyID($recordID)
	{

		// Query declaration to be executed
		$query = "SELECT * FROM `pigsold` where soldID = ?";

		//  Preparing of query to be binded with parameters
		if ($stmt = $this->conn->prepare($query)) {
			//  Binding of parameters
			$stmt->bind_param("s", $recordID);
			//  Query Execution
			$stmt->execute();
			//  Storing of fetched data to the vairable
			$results = $stmt->get_result();
			//  Data fetching using while loop and fetch assoc
			while ($row = $results->fetch_assoc()) {
				//  Data storing to self declared php associative array
				$data = array("soldCount" => "{$row['soldCount']}", "priceID" => "{$row['priceID']}", "houseID" => "{$row['houseID']}");
			}
			//  Closing mysqli object
			$stmt->close();

			//  Returning of data fetched
			return $data;
		}
	}
}


// Updating Investments by ID Class
class editRecordClass extends connGateway  implements editRecordbyID
{

	// Function declaration to be used
	public function editRecbyID($recordID, $Name, $typeID, $recordPrice)
	{


		// Query declaration to be executed
		$query = "CALL update_investment(?,?,?,?)";

		//  Preparing of query to be binded with parameters
		if ($stmt = $this->conn->prepare($query)) {
			//  Binding of parameters
			$stmt->bind_param('ssss', $recordID, $Name, $typeID, $recordPrice);
			//  Query Execution
			$stmt->execute();
			//  Closing mysqli object
			$stmt->close();
			//  Message flash and location change
			echo "<script>alert('Account Updated Successful!'); window.location='Bills.php'</script>";
		}
	}
}

// Disabling Investments by ID Class
class disableRecordClass extends connGateway  implements disableRecord
{

	// Function declaration to be used
	public function disa_record($recordID)
	{


		// Query declaration to be executed
		$query = "UPDATE `investmentrecords` SET `DeletedAt` = curdate() WHERE `investmentrecords`.`recordID` = ?";

		//  Preparing of query to be binded with parameters
		if ($stmt = $this->conn->prepare($query)) {
			//  Binding of parameters
			$stmt->bind_param('s', $recordID);
			//  Query Execution
			$stmt->execute();
			//  Closing mysqli object
			$stmt->close();
			//  Message flash and location change
			echo "<script>alert('Investment Record Disabled Successful!'); window.location='Bills.php'</script>";
		}
	}
}

// Fetching of Pigs sold by ID Class
class disabled_recordsClass extends connGateway  implements disabledRecords
{

	// Function declaration to be used
	public function getRecord()
	{

		// Query declaration to be executed
		$query = "SELECT * FROM `investmentrecords` where DeletedAt is not null";

		// Query execution and if success will return a value/execute mysql query
		if ($stmt = $this->conn->query($query)) {

			$num_of_rows = $stmt->num_rows;
			//  Fetching of rows selected using the query
			while ($row = $stmt->fetch_assoc()) {
				//  Storing of values to php array
				$data[] = $row;
			}
			//  Closing mysqli object
			$stmt->close();
		}
		if (empty($data)) {
			// Handle the case when no data is found
			echo "No records found.";
		} else {
			//  Returning of data fetched
			return $data;
		}
	}
}

// Deletion of investment record Class
class deleteRecordClass extends connGateway  implements deleteRecord
{

	// Function declaration to be used
	public function deletebyID($recordID)
	{


		// Query declaration to be executed
		$query = "DELETE FROM `investmentrecords` WHERE recordID = ?";

		//  Preparing of query to be binded with parameters
		if ($stmt = $this->conn->prepare($query)) {
			//  Binding of parameters
			$stmt->bind_param('s', $recordID);
			//  Query Execution
			$stmt->execute();
			//  Closing mysqli object
			$stmt->close();
			//  Message flash and location change
			echo "<script>alert('Investment Record Deleted Successful!'); window.location='disabledinvestment.php'</script>";
		}
	}
}

// Fetching user account by id Class
class usernameClass extends connGateway  implements usernameInterface
{
	// Function declaration to be used
	public function getUsername($uid)
	{

		// Query declaration to be executed
		$query = "SELECT * FROM `viewUsers` where userID = ?";

		//  Preparing of query to be binded with parameters
		if ($stmt = $this->conn->prepare($query)) {
			//  Binding of parameters
			$stmt->bind_param("s", $uid);
			//  Query Execution
			$stmt->execute();
			//  Storing of fetched data to the vairable
			$results = $stmt->get_result();

			//  Data fetching using while loop and fetch assoc
			while ($row = $results->fetch_assoc()) {
				//  Storing of values to php array
				$data[] = $row;
			}
			//  Closing mysqli object
			$stmt->close();
		}
		//  Returning of data fetched
		return $data;
	}
}


// Fetching user accounts Class
class usersClass extends connGateway  implements userList
{

	// Function declaration to be used
	public function getUsers()
	{

		// Query declaration to be executed
		$query = "SELECT * FROM `viewusers` where CreatedAt is not null and DeletedAt is null";

		// Query execution and if success will return a value/execute mysql query
		if ($stmt = $this->conn->query($query)) {

			$num_of_rows = $stmt->num_rows;
			if ($num_of_rows > 0) {
				//  Fetching of rows selected using the query
				while ($row = $stmt->fetch_assoc()) {
					//  Storing of values to php array
					$data[] = $row;
				}
				//  Closing mysqli object
				$stmt->close();
				//  Returning of data fetched
				return $data;
			}
		}
	}
}



// Fetching alive pigs per month Class
class getPigCounts extends connGateway  implements countOFPigs
{

	// Function declaration to be used
	public function getList()
	{

		// Query declaration to be executed
		$query = "SELECT * FROM `pigsold_permonth`";

		// Query execution and if success will return a value/execute mysql query
		if ($stmt = $this->conn->query($query)) {

			//  Fetching of rows selected using the query
			while ($row = $stmt->fetch_assoc()) {
				$data = [$row["Jan"], $row["Feb"], $row["March"], $row["April"], $row["May"], $row["June"], $row["July"], $row["Aug"], $row["Sept"], $row["Oct"], $row["Nov"], $row["Decs"]];
			}
			//  Closing mysqli object
			$stmt->close();
		}
		//  Returning of data fetched
		return $data;
	}
}


// Fetching deceased pigs per month Class
class getPigDeceased extends connGateway  implements countOFDeceased
{

	// Function declaration to be used
	public function getList()
	{

		// Query declaration to be executed
		$query = "SELECT * FROM `pigdeceased_permonth`";

		// Query execution and if success will return a value/execute mysql query
		if ($stmt = $this->conn->query($query)) {

			//  Fetching of rows selected using the query
			while ($row = $stmt->fetch_assoc()) {
				$data = [$row["Jan"], $row["Feb"], $row["March"], $row["April"], $row["May"], $row["June"], $row["July"], $row["Aug"], $row["Sept"], $row["Oct"], $row["Nov"], $row["Decs"]];
			}
			//  Closing mysqli object
			$stmt->close();
		}
		//  Returning of data fetched
		return $data;
	}
}


// Fetching revenue/gross profit Class
class getGrossClass extends connGateway  implements getGross
{

	// Function declaration to be used
	public function getGross()
	{

		// Query declaration to be executed
		$query = "SELECT * FROM `grossprofit`";

		// Query execution and if success will return a value/execute mysql query
		if ($stmt = $this->conn->query($query)) {

			//  Fetching of rows selected using the query
			while ($row = $stmt->fetch_assoc()) {
				$data = ["profits" => $row["totalProfit"]];
			}
			//  Closing mysqli object
			$stmt->close();
		}
		//  Returning of data fetched
		return $data;
	}
}

// Fetching extimated monthly profit Class
class getEstimatedProfit extends connGateway  implements EstimatedProfit
{

	// Function declaration to be used
	public function getList()
	{

		// Query declaration to be executed
		$query = "SELECT * FROM `estimatedprofit_permonth`";

		// Query execution and if success will return a value/execute mysql query
		if ($stmt = $this->conn->query($query)) {

			//  Fetching of rows selected using the query
			while ($row = $stmt->fetch_assoc()) {
				$data = [$row["Jan"], $row["Feb"], $row["March"], $row["April"], $row["May"], $row["June"], $row["July"], $row["Aug"], $row["Sept"], $row["Oct"], $row["Nov"], $row["Decs"]];
			}
			//  Closing mysqli object
			$stmt->close();
		}
		//  Returning of data fetched
		return $data;
	}
	// Function declaration to be used
	public function getList1()
	{

		// Query declaration to be executed
		$query = "SELECT * FROM `estimatedprofit_permonth`";

		// Query execution and if success will return a value/execute mysql query
		if ($stmt = $this->conn->query($query)) {

			//  Fetching of rows selected using the query
			while ($row = $stmt->fetch_assoc()) {
				$data = [0, (float)$row["Jan"], (float)$row["Feb"], (float)$row["March"], (float)$row["April"], (float)$row["May"], (float)$row["June"], (float)$row["July"], (float)$row["Aug"], (float)$row["Sept"], (float)$row["Oct"], (float)$row["Nov"], (float)$row["Decs"]];
			}
			//  Closing mysqli object
			$stmt->close();
		}
		//  Returning of data fetched
		return $data;
	}
	// Function declaration to be used
	public function getList2()
	{

		// Query declaration to be executed
		$query = "SELECT * FROM `recordofprofits`";

		// Query execution and if success will return a value/execute mysql query
		if ($stmt = $this->conn->query($query)) {

			//  Fetching of rows selected using the query
			while ($row = $stmt->fetch_assoc()) {
				$data = [0, (float)$row["Jan"], (float)$row["Feb"], (float)$row["March"], (float)$row["April"], (float)$row["May"], (float)$row["June"], (float)$row["July"], (float)$row["Aug"], (float)$row["Sept"], (float)$row["Oct"], (float)$row["Nov"], (float)$row["Decs"]];
			}
			//  Closing mysqli object
			$stmt->close();
		}
		//  Returning of data fetched
		return $data;
	}
	
}

class getProfitClass extends connGateway  implements getProfit
{

	// Function declaration to be used
	public function getProfit()
	{

		// Query declaration to be executed
		$query = "SELECT *
		FROM yearly_profits
		GROUP BY ProfitYear;";

		// Query execution and if success will return a value/execute mysql query
		if ($stmt = $this->conn->query($query)) {

			//  Fetching of rows selected using the query
			while ($row = $stmt->fetch_assoc()) {
				$data[] = $row;
			}
			//  Closing mysqli object
			$stmt->close();
		}
		//  Returning of data fetched
		return $data;
	}
}

// Fetching monthly expenses Class
class getExpenses extends connGateway  implements expensesList
{

	// Function declaration to be used
	public function getList()
	{

		// Query declaration to be executed
		$query = "SELECT * FROM `expenses_permonth`";

		// Query execution and if success will return a value/execute mysql query
		if ($stmt = $this->conn->query($query)) {

			//  Fetching of rows selected using the query
			while ($row = $stmt->fetch_assoc()) {
				$data = [$row["Jan"], $row["Feb"], $row["March"], $row["April"], $row["May"], $row["June"], $row["July"], $row["Aug"], $row["Sept"], $row["Oct"], $row["Nov"], $row["Decs"]];
			}
			//  Closing mysqli object
			$stmt->close();
		}
		//  Returning of data fetched
		return $data;
	}
}

// Fetching monthly expenses Class
class getPercentRate extends connGateway  implements percentRate
{

	// Function declaration to be used
	public function getList()
	{

		// Query declaration to be executed
		$query = "SELECT * FROM `permonth_rate`";

		// Query execution and if success will return a value/execute mysql query
		if ($stmt = $this->conn->query($query)) {

			//  Fetching of rows selected using the query
			while ($row = $stmt->fetch_assoc()) {
				$data = [$row["Jan"]*100, $row["Feb"]*100, $row["March"]*100, $row["April"]*100, $row["May"]*100, $row["June"]*100, $row["July"]*100, $row["Aug"]*100, $row["Sept"]*100, $row["Oct"]*100, $row["Nov"]*100, $row["Decs"]*100];
			}
			//  Closing mysqli object
			$stmt->close();
		}
		//  Returning of data fetched
		return $data;
	}
}

// Fetching disabled useraccounts list Class
class disabled_usersClass extends connGateway  implements disabledUsers
{

	// Function declaration to be used
	public function getUsers()
	{

		// Query declaration to be executed
		$query = "SELECT * FROM `viewusers` where DeletedAt is not null";

		// Query execution and if success will return a value/execute mysql query
		if ($stmt = $this->conn->query($query)) {

			$num_of_rows = $stmt->num_rows;
			//  Fetching of rows selected using the query
			while ($row = $stmt->fetch_assoc()) {
				//  Storing of values to php array
				$data[] = $row;
			}
			//  Closing mysqli object
			$stmt->close();
		}
		//  Returning of data fetched
		return $data;
	}
}

// Insertion of user account Class
class adduserClass extends connGateway  implements addEditbyID
{

	// Function declaration to be used
	public function addUserbyID($fname, $lname, $cnum, $email, $rid, $uname, $pass)
	{


		// Query declaration to be executed
		$query = "CALL insert_employee(?,?,?,?,?,?,?)";

		//  Preparing of query to be binded with parameters
		if ($stmt = $this->conn->prepare($query)) {
			//  Binding of parameters
			$stmt->bind_param('sssssss', $fname, $lname, $cnum, $email, $rid, $uname, $pass);
			//  Query Execution
			$stmt->execute();
			//  Closing mysqli object
			$stmt->close();
			//  Message flash and location change
			echo "<script>alert('Account Register Successful!'); window.location='userlist.php'</script>";
		}
	}
}
// Deleting user account Class
class deleteuserClass extends connGateway  implements deleteEditbyID
{

	// Function declaration to be used
	public function deletebyID($uid)
	{


		// Query declaration to be executed
		$query = "CALL delete_employee(?)";

		//  Preparing of query to be binded with parameters
		if ($stmt = $this->conn->prepare($query)) {
			//  Binding of parameters
			$stmt->bind_param('s', $uid);
			//  Query Execution
			$stmt->execute();
			//  Closing mysqli object
			$stmt->close();
			//  Message flash and location change
			echo "<script>alert('Account Deleted Successful!'); window.location='disabledusers.php'</script>";
		}
	}
}


// Updating of user accounts Class
class edituserClass extends connGateway  implements editEditbyID
{

	// Function declaration to be used
	public function editUserbyID($uid, $fname, $lname, $cnum, $email, $rid, $uname, $pass)
	{


		// Query declaration to be executed
		$query = "CALL update_employee(?,?,?,?,?,?,?,?)";

		//  Preparing of query to be binded with parameters
		if ($stmt = $this->conn->prepare($query)) {
			//  Binding of parameters
			$stmt->bind_param('ssssssss', $uid, $fname, $lname, $cnum, $email, $rid, $uname, $pass);
			//  Query Execution
			$stmt->execute();
			//  Closing mysqli object
			$stmt->close();
			//  Message flash and location change
			echo "<script>alert('Account Updated Successful!'); window.location='userlist.php'</script>";
		}
	}
}
// Disabling user account Class
class disableUserClass extends connGateway  implements userDisable
{

	// Function declaration to be used
	public function disableUser($uid)
	{


		// Query declaration to be executed
		$query = "UPDATE `useraccounts` SET `DeletedAt` = curdate() WHERE `useraccounts`.`userID` = ?";

		//  Preparing of query to be binded with parameters
		if ($stmt = $this->conn->prepare($query)) {
			//  Binding of parameters
			$stmt->bind_param('s', $uid);
			//  Query Execution
			$stmt->execute();
			//  Closing mysqli object
			$stmt->close();
			//  Message flash and location change
			echo "<script>alert('Account Disabled Successful!'); window.location='userlist.php'</script>";
		}
	}
}



// Disabling paper record list Class
class disablePaperClass extends connGateway  implements disapaper
{

	// Function declaration to be used
	public function disa_paper($uid)
	{


		// Query declaration to be executed
		$query = "UPDATE `paperrecords` SET `DeletedAt` = curdate() WHERE `paperrecords`.`paperID` = ?";

		//  Preparing of query to be binded with parameters
		if ($stmt = $this->conn->prepare($query)) {
			//  Binding of parameters
			$stmt->bind_param('s', $uid);
			//  Query Execution
			$stmt->execute();
			//  Closing mysqli object
			$stmt->close();
			//  Message flash and location change
			echo "<script>alert('Paper Disabled Successful!'); window.location='paperlist.php'</script>";
		}
	}
}


// Disabling pig sold list Class
class disablePLClass extends connGateway  implements disaPiglist
{

	// Function declaration to be used
	public function disa_Piglist($uid)
	{


		// Query declaration to be executed
		$query = "UPDATE `piglist` SET `DeletedAt` = curdate() WHERE `piglist`.`HouseID` = ?";

		//  Preparing of query to be binded with parameters
		if ($stmt = $this->conn->prepare($query)) {
			//  Binding of parameters
			$stmt->bind_param('s', $uid);
			//  Query Execution
			$stmt->execute();
			//  Closing mysqli object
			$stmt->close();
			//  Message flash and location change
			echo "<script>alert('Pigs list Disabled Successful!'); window.location='piglist.php'</script>";
		}
	}
}

// Disabling pig price list Class
class disablePPClass extends connGateway  implements disaPigprice
{

	// Function declaration to be used
	public function disa_Pigprice($uid)
	{


		// Query declaration to be executed
		$query = "UPDATE `pigprice` SET `DeletedAt` = curdate() WHERE `pigprice`.`priceID` = ?";

		//  Preparing of query to be binded with parameters
		if ($stmt = $this->conn->prepare($query)) {
			//  Binding of parameters
			$stmt->bind_param('s', $uid);
			//  Query Execution
			$stmt->execute();
			//  Closing mysqli object
			$stmt->close();
			//  Message flash and location change
			echo "<script>alert('Pigs Price Disabled Successful!'); window.location='pigprice.php'</script>";
		}
	}
}


// Disabling pig sold list Class
class disablePSClass extends connGateway  implements disaPigsold
{

	// Function declaration to be used
	public function disa_Pigsold($uid)
	{


		// Query declaration to be executed
		$query = "UPDATE `pigsold` SET `DeletedAt` = curdate() WHERE `pigsold`.`soldID` = ?";

		//  Preparing of query to be binded with parameters
		if ($stmt = $this->conn->prepare($query)) {
			//  Binding of parameters
			$stmt->bind_param('s', $uid);
			//  Query Execution
			$stmt->execute();
			//  Closing mysqli object
			$stmt->close();
			//  Message flash and location change
			echo "<script>alert('Pigs Sold Disabled Successful!'); window.location='pigsold.php'</script>";
		}
	}
}



// Updating of image list Class
class editImageClass extends connGateway  implements editPaperData
{

	// Function declaration to be used
	public function editPaperbyID($ptype, $pimage, $pid)
	{


		// Query declaration to be executed
		$query = "UPDATE `paperrecords` SET `p_typeID` = ?, `p_image` = ? WHERE `paperrecords`.`paperID` = ?";

		//  Preparing of query to be binded with parameters
		if ($stmt = $this->conn->prepare($query)) {
			//  Binding of parameters
			$stmt->bind_param('sss', $ptype, $pimage, $pid);
			//  Query Execution
			$stmt->execute();
			//  Closing mysqli object
			$stmt->close();
			//  Message flash and location change
			echo "<script>alert('Paper Updated Successful!'); window.location='paperlist.php'</script>";
		}
	}
}




// Update of pigs list Class
class editPigListClass extends connGateway  implements editPigListData
{

	// Function declaration to be used
	public function editListbyID($hid, $pc, $pd, $pid)
	{


		// Query declaration to be executed
		$query = "UPDATE `piglist` SET `HouseID` = ?, `PigCount` = ?, `PigDeceased` = ? WHERE `piglist`.`pigListID` = ?";

		//  Preparing of query to be binded with parameters
		if ($stmt = $this->conn->prepare($query)) {
			//  Binding of parameters
			$stmt->bind_param('ssss', $hid, $pc, $pd, $pid);
			//  Query Execution
			$stmt->execute();
			//  Closing mysqli object
			$stmt->close();
			//  Message flash and location change
			echo "<script>alert('Pigs List Update Successful!'); window.location='piglist.php'</script>";
		}
	}
}
// Insertion of pigs list Class
class addPigDClass extends connGateway  implements addPigListData
{

	// Function declaration to be used
	public function addListbyID($hid, $pc, $pd)
	{


		// Query declaration to be executed
		$query = "INSERT INTO `piglist` (`pigListID`, `HouseID`, `PigCount`, `PigDeceased`, `CreatedAt`, `DeletedAt`) VALUES (NULL, ?, ?, ?, curdate(), NULL)";

		//  Preparing of query to be binded with parameters
		if ($stmt = $this->conn->prepare($query)) {
			//  Binding of parameters
			$stmt->bind_param('sss', $hid, $pc, $pd);
			//  Query Execution
			$stmt->execute();
			//  Closing mysqli object
			$stmt->close();
			//  Message flash and location change
			echo "<script>alert('Pigs List Added Successful!'); window.location='piglist.php'</script>";
		}
	}
}
// Insertion of paper Class
class addPaperClass extends connGateway  implements addPaper
{

	// Function declaration to be used
	public function addPaperData($pType, $pImage)
	{


		// Query declaration to be executed
		$query = "INSERT INTO `paperrecords` (`paperID`, `p_typeID`,`p_image`, `CreatedAt`, `DeletedAt`) VALUES (NULL, ?, ?, current_timestamp(), NULL)";

		//  Preparing of query to be binded with parameters
		if ($stmt = $this->conn->prepare($query)) {
			//  Binding of parameters
			$stmt->bind_param('ss', $pType, $pImage);
			//  Query Execution
			$stmt->execute();
			//  Closing mysqli object
			$stmt->close();
			//  Message flash and location change
			echo "<script>alert('Pigs List Added Successful!'); window.location='paperlist.php'</script>";
		}
	}
}

// Fetching user information by id Class
class userGet extends connGateway  implements userGetbyID
{

	// Function declaration to be used
	public function getUserbyID($uid)
	{

		// Query declaration to be executed
		$query = "SELECT * FROM `viewusers` where userID = ?";

		//  Preparing of query to be binded with parameters
		if ($stmt = $this->conn->prepare($query)) {
			//  Binding of parameters
			$stmt->bind_param("s", $uid);
			//  Query Execution
			$stmt->execute();
			//  Storing of fetched data to the vairable
			$results = $stmt->get_result();
			//  Data fetching using while loop and fetch assoc
			while ($row = $results->fetch_assoc()) {
				//  Data storing to self declared php associative array
				$data = array("ufname" => "{$row['u_firstname']}", "ulname" => "{$row['u_lastname']}", "urole" => "{$row['roleID']}", "uname" => "{$row['u_username']}", "upass" => "{$row['u_password']}", "cnum" => "{$row['u_contactnum']}", "email" => "{$row['u_email']}");
			}
			//  Closing mysqli object
			$stmt->close();

			//  Returning of data fetched
			return $data;
		}
	}
}


// Fetching pig list Class
class getPiglistByID extends connGateway  implements editPigList
{

	// Function declaration to be used
	public function getListbyID($pid)
	{

		// Query declaration to be executed
		$query = "SELECT * FROM `piglist` WHERE piglistID = ?";

		//  Preparing of query to be binded with parameters
		if ($stmt = $this->conn->prepare($query)) {
			//  Binding of parameters
			$stmt->bind_param("s", $pid);
			//  Query Execution
			$stmt->execute();
			//  Storing of fetched data to the vairable
			$results = $stmt->get_result();
			//  Data fetching using while loop and fetch assoc
			while ($row = $results->fetch_assoc()) {
				//  Data storing to self declared php associative array
				$data = array("pid" => "{$row['pigListID']}", "hid" => "{$row['HouseID']}", "pg" => "{$row['PigCount']}", "pd" => "{$row['PigDeceased']}");
			}
			//  Closing mysqli object
			$stmt->close();

			//  Returning of data fetched
			return $data;
		}
	}
}



// Fetching paper information by id Class
class getPaperListByID extends connGateway  implements editPaperList
{

	// Function declaration to be used
	public function getListbyID($pid)
	{

		// Query declaration to be executed
		$query = "SELECT * FROM `paperinfo` WHERE paperID = ?";

		//  Preparing of query to be binded with parameters
		if ($stmt = $this->conn->prepare($query)) {
			//  Binding of parameters
			$stmt->bind_param("s", $pid);
			//  Query Execution
			$stmt->execute();
			//  Storing of fetched data to the vairable
			$results = $stmt->get_result();
			//  Data fetching using while loop and fetch assoc
			while ($row = $results->fetch_assoc()) {
				//  Data storing to self declared php associative array
				$data = array("pid" => "{$row['paperID']}", "ptm" => "{$row['p_typeName']}", "pi" => "{$row['p_image']}", "pd" => "{$row['p_typeDesc']}");
			}
			//  Closing mysqli object
			$stmt->close();

			//  Returning of data fetched
			return $data;
		}
	}
}


// Fetching pig list Class
class piglistClass extends connGateway  implements pigList
{

	// Function declaration to be used
	public function display_pigList()
	{

		// Query declaration to be executed
		$query = "SELECT * FROM `piglist`  where CreatedAt is not null and DeletedAt is null";

		// Query execution and if success will return a value/execute mysql query
		if ($stmt = $this->conn->query($query)) {

			$num_of_rows = $stmt->num_rows;
			//  Fetching of rows selected using the query
			while ($row = $stmt->fetch_assoc()) {
				//  Storing of values to php array
				$data[] = $row;
			}
			//  Closing mysqli object
			$stmt->close();
		}
		//  Returning of data fetched
		return $data;
	}
}

// Fetching pig sold list Class
class pigsoldClass extends connGateway  implements pigSold
{

	// Function declaration to be used
	public function display_pigSold()
	{

		// Query declaration to be executed
		$query = "SELECT * FROM `pigsprofit` where CreatedAt is not null and DeletedAt is null";

		// Query execution and if success will return a value/execute mysql query
		if ($stmt = $this->conn->query($query)) {

			$num_of_rows = $stmt->num_rows;
			//  Fetching of rows selected using the query
			while ($row = $stmt->fetch_assoc()) {
				//  Storing of values to php array
				$data[] = $row;
			}
			//  Closing mysqli object
			$stmt->close();
		}
		//  Returning of data fetched
		return $data;
	}
}

// Fetching pig price list Class
class pigpriceClass extends connGateway  implements pigPrice
{

	// Function declaration to be used
	public function display_pigPrice()
	{

		// Query declaration to be executed
		$query = "SELECT * FROM `pigprice` where CreatedAt is not null and DeletedAt is null";

		// Query execution and if success will return a value/execute mysql query
		if ($stmt = $this->conn->query($query)) {

			$num_of_rows = $stmt->num_rows;
			//  Fetching of rows selected using the query
			while ($row = $stmt->fetch_assoc()) {
				//  Storing of values to php array
				$data[] = $row;
			}
			//  Closing mysqli object
			$stmt->close();
		}
		//  Returning of data fetched
		return $data;
	}
}

// Updating pigs price using stored procedure Class
class editPigPriceClass extends connGateway  implements editPigPrice
{

	// Function declaration to be used
	public function editPigPricebyID($priceID, $priceDate, $price)
	{


		// Query declaration to be executed
		$query = "CALL update_pigPrice(?,?,?)";

		//  Preparing of query to be binded with parameters
		if ($stmt = $this->conn->prepare($query)) {
			//  Binding of parameters
			$stmt->bind_param('sss', $priceID, $priceDate, $price);
			//  Query Execution
			$stmt->execute();
			//  Closing mysqli object
			$stmt->close();
			//  Message flash and location change
			echo "<script>alert('Pig Price Updated Successful!'); window.location='pigprice.php'</script>";
		}
	}
}

// Updating pigs sold using stored procedure Class
class editPigSoldClass extends connGateway  implements editPigSold
{

	// Function declaration to be used
	public function editPigSoldbyID($soldID, $soldCount, $houseID, $priceID)
	{


		// Query declaration to be executed
		$query = "CALL update_pigSold(?,?,?,?)";

		//  Preparing of query to be binded with parameters
		if ($stmt = $this->conn->prepare($query)) {
			//  Binding of parameters
			$stmt->bind_param('ssss', $soldID, $soldCount, $houseID, $priceID);
			//  Query Execution
			$stmt->execute();
			//  Closing mysqli object
			$stmt->close();
			//  Message flash and location change
			echo "<script>alert('Pig Sold Record Updated Successful!'); window.location='pigsold.php'</script>";
		}
	}
}

// Fetching archived pigs list Class
class archpiglistClass extends connGateway  implements archpigList
{

	// Function declaration to be used
	public function displayarch_pigList()
	{

		// Query declaration to be executed
		$query = "SELECT * FROM `piglist` where DeletedAt is not null";

		// Query execution and if success will return a value/execute mysql query
		if ($stmt = $this->conn->query($query)) {

			$num_of_rows = $stmt->num_rows;
			//  Fetching of rows selected using the query
			while ($row = $stmt->fetch_assoc()) {
				//  Storing of values to php array
				$data[] = $row;
			}
			//  Closing mysqli object
			$stmt->close();
		}
		//  Returning of data fetched
		return $data;
	}
}

// Fetching archived pigs profit list Class
class archpigsoldClass extends connGateway  implements archpigSold
{

	// Function declaration to be used
	public function displayarch_pigSold()
	{

		// Query declaration to be executed
		$query = "SELECT * FROM `pigsprofit` where DeletedAt is not null";

		// Query execution and if success will return a value/execute mysql query
		if ($stmt = $this->conn->query($query)) {

			$num_of_rows = $stmt->num_rows;
			//  Fetching of rows selected using the query
			while ($row = $stmt->fetch_assoc()) {
				//  Storing of values to php array
				$data[] = $row;
			}
			//  Closing mysqli object
			$stmt->close();
		}
		//  Returning of data fetched
		return $data;
	}
}

// Fetching archived pigs sold list Class
class archpigpriceClass extends connGateway  implements archpigPrice
{

	// Function declaration to be used
	public function displayarch_pigPrice()
	{

		// Query declaration to be executed
		$query = "SELECT * FROM `pigprice` where DeletedAt is not null";

		// Query execution and if success will return a value/execute mysql query
		if ($stmt = $this->conn->query($query)) {

			$num_of_rows = $stmt->num_rows;
			//  Fetching of rows selected using the query
			while ($row = $stmt->fetch_assoc()) {
				//  Storing of values to php array
				$data[] = $row;
			}
			//  Closing mysqli object
			$stmt->close();
		}
		//  Returning of data fetched
		return $data;
	}
}

// Fetching paper information Class
class paperListClass extends connGateway  implements paperInfo
{

	// Function declaration to be used
	public function display_paperInfo()
	{

		// Query declaration to be executed
		$query = "SELECT * FROM `paperinfo` where CreatedAt is not null and DeletedAt is null";

		// Query execution and if success will return a value/execute mysql query
		if ($stmt = $this->conn->query($query)) {

			$num_of_rows = $stmt->num_rows;
			//  Fetching of rows selected using the query
			while ($row = $stmt->fetch_assoc()) {
				//  Storing of values to php array
				$data[] = $row;
			}
			//  Closing mysqli object
			$stmt->close();
		}
		//  Returning of data fetched
		return $data;
	}
}
// Fetching archived paper information Class
class archpaperListClass extends connGateway  implements archpaperInfo
{

	// Function declaration to be used
	public function displayarch_paperInfo()
	{

		// Query declaration to be executed
		$query = "SELECT * FROM `paperinfo` where DeletedAt is Not null";

		// Query execution and if success will return a value/execute mysql query
		if ($stmt = $this->conn->query($query)) {

			$num_of_rows = $stmt->num_rows;
			//  Fetching of rows selected using the query
			while ($row = $stmt->fetch_assoc()) {
				//  Storing of values to php array
				$data[] = $row;
			}
			//  Closing mysqli object
			$stmt->close();
		}
		//  Returning of data fetched
		return $data;
	}
}



// Redirection Function
function redirect($location = Null)
{
	if ($location != Null) {
		echo "<script>window.location='{$location}'</script>";
	} else {
		echo 'error location';
	}
}
