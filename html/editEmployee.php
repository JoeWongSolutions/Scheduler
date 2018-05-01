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
    echo "User name needs to be filled out edit failed";
    exit;
}

//Database connection
require_once "db.conf";
$mysqli = new mysqli($servername, $username, $password, $dbname);
if ($mysqli->connect_error) {
    echo('Error: ' . $mysqli->connect_errno . ' ' . $mysqli->connect_error);
    exit;
}

$sql = "UPDATE employed SET staffPosition=(?) WHERE userID=(?)";
if (!($stmt = $mysqli->prepare($sql))) {
    echo "Update Employee Data Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
    exit;
}
if (!$stmt->bind_param("ss", $staffPosition, $userID)) {
    echo "Update Employee Data Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
    exit;
}
if (!$stmt->execute()) {
    echo "Update Employee Data Execute failed: (" . $stmt->errno . ") " . $stmt->error;
    exit;
}
$mysqli->close();
header("Location: index.php");
echo "success";
?>