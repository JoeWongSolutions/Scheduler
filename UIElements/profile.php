<?php

    if(!session_start()) {
		header("Location: error.php");
		exit;
	}
	
	$loggedIn = empty($_SESSION['loggedin']) ? false : $_SESSION['loggedin'];
	
	if ($loggedIn) {
		header("Location: schedule.php");
		exit;
	}

    require_once 'db.conf';
     
    if(!empty($_SESSION['loggedin'])){
        if($_SESSION["accessLevel"] == "managers"){
            $managerID = empty($_SESSION['loggedin']) ? false : $_SESSION['loggedin'];
        } elseif($_SESSION["accessLevel"] == "users"){
            $managerID = empty($_SESSION['managerID']) ? false : $_SESSION['managerID'];
            $userID = empty($_SESSION['loggedin']) ? false : $_SESSION['loggedin'];
        }
    } else {
        header("location: index.php");
        echo "Error you are not logged in";
        exit;
    }

    $mysqli = new mysqli($hostname, $username, $password, $dbname);
    if ($mysqli->connect_error) {
        $error = 'Error: ' . $mysqli->connect_errno . ' ' . $mysqli->connect_error;
        require "loginForm.php";
        exit;
    }
    
    /*
    $output = mysqli_query($connect, $sql);
    $row = mysqli_fetch_array($output);

    if($accessLevel == 'users'){
        $query = "SELECT * FROM users WHERE userID = '$loginUsername'";
        $mysqliResult = $mysqli->query($query);
        if ($mysqliResult) {
            $row = $mysqliResult->fetch_row();
            $_SESSION['managerID'] = $row[1];
            if($_SESSION['managerID'] == ''){
                //echo "U"
            }
            if($row[2] == true){
                $_SESSION['staffPosition'] = $row[3];
            }
            $mysqliResult->close();
            $mysqli->close();
        } 
    } 
    
    */

    if($accessLevel == 'users'){
        $query = "SELECT * FROM users WHERE userID = '$loginUsername'";
        $row = mysqli_fetch_array($output);
        echo "User Profile <br>
        Name: " . $row['name'] . "<br>"
        "SSN:" . $row['ssn'] . "<br>"
        "Email: " . $row['email'] . "<br>"
        "Address: " . $row['address'] . "<br>"
        "Phone: " . $row['phone'] . " <br>"
        "Birthday: " . $row['birthday'] . "<br>"
        "UserID: " . $row['userID'] . "<br>"
        "Password: " . $row['pass'] . "<br>";
        $mysqli->close();
    }else if($accessLevel == 'managers'){
        $query = "SELECT * FROM managers WHERE managerID = '$loginUsername'";
        $row = mysqli_fetch_array($output);
        echo "User Profile <br>
        Name: " . $row['name'] . "<br>"
        "OrgID:" . $row['orgID'] . "<br>"
        "Creation Date: " . $row['CreationDate'] . "<br>"
        "Username: " . $row['managerID'] . "<br>"
        "Password: " . $row['pass'] . "<br>";
        $mysqli->close();
    }

    mysqli_close($db)
?>