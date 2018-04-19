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
if(!($orgID = empty($_POST['orgID']) ? false : testInput($_POST['orgID']))){
    echo "Store ID needs to be filled out";
    exit;
}

//Database connection
require_once "db.conf";
$mysqli = new mysqli($servername, $username, $password, $dbname);
if ($mysqli->connect_error) {
    echo('Error: ' . $mysqli->connect_errno . ' ' . $mysqli->connect_error);
    exit;
}
$sql = "SELECT * FROM organizations WHERE orgID=(?)";
if (!($stmt = $mysqli->prepare($sql))) {
    echo "Original Org Data Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
    exit;
}
if (!$stmt->bind_param("i", $orgID)) {
    echo "Original Org Data Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
    exit;
}
if (!$stmt->execute()) {
    echo "Original Org Data Execute failed: (" . $stmt->errno . ") " . $stmt->error;
    exit;
}
if ($res = $stmt->get_result()) {
    if(($res->num_rows) == 0){
        echo "Org does not exist";
        exit;
    }else{
        $row = $res->fetch_assoc();
    }
}

if(!($name = empty($_POST['name']) ? false : testInput($_POST['name']))){
    $name = $row["name"];
}
if(!($locationCity = empty($_POST['locationCity']) ? false : testInput($_POST['locationCity']))){
    $locationCity = $row["locationCity"];
}
if(!($locationState = empty($_POST['locationState']) ? false : testInput($_POST['locationState']))){
    $locationState = $row["locationState"];
}
if(!($storeNumber = empty($_POST['storeNumber']) ? false : testInput($_POST['storeNumber']))){
    $storeNumber = $row["storeNumber"];
}

$sql = "UPDATE organizations SET orgName = (?), locationCity = (?), locationState = (?), storeNumber = (?) WHERE orgID = (?)";
if (!($stmt = $mysqli->prepare($sql))) {
    echo "Update Org Data Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
    exit;
}
if (!$stmt->bind_param("sssii", $orgName, $locationCity, $locationState, $storeNumber, $orgID)) {
    echo "Update Org Data Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
    exit;
}
if (!$stmt->execute()) {
    echo "Update Org Data Execute failed: (" . $stmt->errno . ") " . $stmt->error;
    exit;
}
$mysqli->close();
header("Location: index.php");
echo "success";
?>