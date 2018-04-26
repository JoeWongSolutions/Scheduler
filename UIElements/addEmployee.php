<?php
    if(!session_start()) {
        header("Location: error.php");
        exit;
    }

    if(!empty($_SESSION['loggedin'])){
        if($_SESSION["accessLevel"] == "managers"){
            $managerID = empty($_SESSION['loggedin']) ? false : $_SESSION['loggedin'];
            $userID = empty($_POST['userName']) ? false : $_POST['userName'];
        } else {
            header("Location: index.php");
            exit;
        }
    } else {
        header("location: loginForm.php");
        echo "Error you are not logged in";
        exit;
    }

    function testInput($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }

    //Database connection
    require_once "db.conf";
    $mysqli = new mysqli($servername, $username, $password, $dbname);
    if ($mysqli->connect_error) {
        echo('Error: ' . $mysqli->connect_errno . ' ' . $mysqli->connect_error);
        $mysqli->close();
        exit;
    }

    //Check to make sure employee exists
    $sql = "SELECT userID FROM users WHERE userID = (?)";
    if (!($stmt = $mysqli->prepare($sql))) {
        echo "Prepare failed1: (" . $mysqli->errno . ") " . $mysqli->error;
        $mysqli->close();
        exit;
    }
    if (!$stmt->bind_param("s", $userID)) {
        echo "Binding parameters failed in check: (" . $stmt->errno . ") " . $stmt->error;
        $mysqli->close();
        exit;
    }
    if (!$stmt->execute()) {
        echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
        $mysqli->close();
        exit;
    }
    if (!($res = $stmt->get_result())) {
        echo "Getting result set failed: (" . $stmt->errno . ") " . $stmt->error;
    } else {
        $row = $res->fetch_assoc();
        if(!$row) {
            $mysqli->close();
            echo "Employee not found! Auto-redirecting...";
            header("refresh:3; url = employeesForm.php");
            exit;
        } 
    }
   
    $sql = "SELECT * FROM employed WHERE userID = (?) AND managerID = (?)";
    if (!($stmt = $mysqli->prepare($sql))) {
        echo "Prepare failed2: (" . $mysqli->errno . ") " . $mysqli->error;
        $mysqli->close();
        exit;
    } 
    if (!$stmt->bind_param("ss", $userID, $managerID)) {
        echo "Binding parameters failed in check: (" . $stmt->errno . ") " . $stmt->error;
        $mysqli->close();
        exit;
    }
    if (!$stmt->execute()) {
        echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
        $mysqli->close();
        exit;
    }
    
    if (!($res = $stmt->get_result())) {
        $mysqli->close();
        echo "Getting result set failed: (" . $stmt->errno . ") " . $stmt->error;
        header("refresh:3; url = schedule.php");
        exit;
    } else {
         $row = $res->fetch_assoc();
    
        if($row) {
            $mysqli->close();
            echo "Employee already works for you! Auto-redirecting...";
            header("refresh:3; url = employeesForm.php");
            exit;
        }
    }
        
    $sql = "INSERT INTO employed (userID, managerID, active, staffPosition) VALUES((?),(?),(?),(?))";
    $active = true;
    $position = 'any';

    if (!($stmt = $mysqli->prepare($sql))) {
        echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
        exit;
    }  
    if (!$stmt->bind_param("ssss", $userID, $managerID, $active, $position)) {
        echo "Binding parameters failed in check: (" . $stmt->errno . ") " . $stmt->error;
        $mysqli->close();
        exit;
    } 

    if (!$stmt->execute()) {
        echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
        exit;
    }
    
    $mysqli->close();
    echo "Employee added! Auto-redirecting...";
    header("refresh:3; url = employeesForm.php");

?>