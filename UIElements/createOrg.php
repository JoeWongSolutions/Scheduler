<?php
if(!session_start()) {
    header("Location: error.php");
    exit;
}

function testInput($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

//Store variables
if(!($userName = empty($_POST['userName']) ? false : testInput($_POST['userName']))){
    echo "User name needs to be filled out";
    exit;
}
if(!($orgName = empty($_POST['orgName']) ? false : testInput($_POST['orgName']))){
    echo "Organization name needs to be filled out";
    exit;
}
if(!($pass = empty($_POST['password']) ? false : testInput($_POST['password']))){
    echo "Password needs to be filled out";
    exit;
}
if(!($orgCity = empty($_POST['orgCity']) ? false : testInput($_POST['orgCity']))){
    echo "City needs to be filled out";
    exit;
}
if(!($orgState = empty($_POST['orgState']) ? false : testInput($_POST['orgState']))){
    echo "State needs to be filled out";
    exit;
}
if(!($strNumber = empty($_POST['strNumber']) ? false : testInput($_POST['strNumber']))){
    echo "Store Number needs to be filled out";
    exit;
}


//Encryped pass
$pass = hash("sha512",$pass);

//Database connection
require_once "db.conf";
$mysqli = new mysqli($servername, $username, $password, $dbname);
if ($mysqli->connect_error) {
    echo('Error: ' . $mysqli->connect_errno . ' ' . $mysqli->connect_error);
    exit;
}
$sql = "INSERT INTO organizations (orgName, locationCity, locationState, storeNumber) VALUES
((?),(?),(?),(?))";
if (!($stmt = $mysqli->prepare($sql))) {
    echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
    exit;
}
if (!$stmt->bind_param("sssi", $orgName, $orgCity, $orgState, $strNumber)) {
    echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
    exit;
}
if (!$stmt->execute()) {
    echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
    exit;
}
$sql = "INSERT INTO managers (orgName, locationCity, locationState, storeNumber) VALUES
((?),(?),(?),(?))";
if (!($stmt = $mysqli->prepare($sql))) {
    echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
    exit;
}
if (!$stmt->bind_param("sssi", $orgName, $orgCity, $orgState, $strNumber)) {
    echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
    exit;
}
if (!$stmt->execute()) {
    echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
    exit;
}
$mysqli->close();
header("Location: index.php");
echo "success";
?>