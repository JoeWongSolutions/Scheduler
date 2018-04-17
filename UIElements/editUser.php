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
if(!($pass = empty($_POST['password']) ? false : testInput($_POST['password']))){
    echo "Password needs to be filled out";
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
$sql = "SELECT * FROM users WHERE userID=(?) AND pass=(?)";
if (!($stmt = $mysqli->prepare($sql))) {
    echo "Original User Data Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
    exit;
}
if (!$stmt->bind_param("ss", $userName, $pass)) {
    echo "Original User Data Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
    exit;
}
if (!$stmt->execute()) {
    echo "Original User Data Execute failed: (" . $stmt->errno . ") " . $stmt->error;
    exit;
}

$sql = "INSERT INTO users (realName, userID, pass, ssn, birthday, address, phone, email) VALUES
((?),(?),(?),(?),(?),(?),(?),(?))";
if (!($stmt = $mysqli->prepare($sql))) {
    echo "Update User Data Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
    exit;
}
if (!$stmt->bind_param("ssssssss", $name, $userName, $pass, $ssn, $birthday, $address, $phone, $email)) {
    echo "Update User Data Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
    exit;
}
if (!$stmt->execute()) {
    echo "Update User Data Execute failed: (" . $stmt->errno . ") " . $stmt->error;
    exit;
}
$mysqli->close();
header("Location: index.php");
echo "success";
?>