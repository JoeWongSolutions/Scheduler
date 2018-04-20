<?php
if(!session_start()) {
    header("Location: error.php");
    exit;
}

if(!empty($_SESSION['loggedin'])){
    $userID = $_SESSION['loggedin'];
    if(!($shiftID = empty($_POST['shiftID']) ? false : testInput($_POST['shiftID']))){
        echo "The shiftID is not present";
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

//Check to make sure the shift isn't maxed out
$sql = "SELECT bids, maxBid FROM shifts WHERE shiftID = (?)";
if (!($stmt = $mysqli->prepare($sql))) {
    echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
    $mysqli->close();
    exit;
}
if (!$stmt->bind_param("i", $shiftID)) {
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
    if ($row['bids'] >= $row['maxBid']) {
        $mysqli->close();
        echo "failed to bid for shift, someone beat you to it! Auto-redirecting...";
        header("refresh:3; url = schedule.php");
        exit;
    }
}

//Increment bids on shift table
$sql = "UPDATE shifts SET bids = bids + 1 WHERE shiftID = (?) AND bids < maxBid";
if (!($stmt = $mysqli->prepare($sql))) {
    echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
    $mysqli->close();
    exit;
}
if (!$stmt->bind_param("i", $shiftID)) {
    echo "Binding parameters failed in increment: (" . $stmt->errno . ") " . $stmt->error;
    $mysqli->close();
    exit;
}
if (!$stmt->execute()) {
    echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
    $mysqli->close();
    exit;
}

//Make addition to assignedShifts table
$sql = "INSERT INTO assignedShifts VALUES
((?),(?))";
if (!($stmt = $mysqli->prepare($sql))) {
    echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
    $mysqli->close();
    exit;
}
if (!$stmt->bind_param("is", $shiftID, $userID)) {
    echo "Binding parameters failed in add: (" . $stmt->errno . ") " . $stmt->error;
    $mysqli->close();
    exit;
}
if (!$stmt->execute()) {
    echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
    $mysqli->close();
    exit;
}

$mysqli->close();
echo "<h1 style='text-align:center'>Success! You are expected to show up for the shift<h1>";
header("refresh:2; url=schedule.php");
?>