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
if(!($pass = empty($_POST['pass']) ? false : testInput($_POST['pass']))){
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

//finding user to edit
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

if ($res = $stmt->get_result()) {
    if(($res->num_rows) == 0){
        echo "User does not exist";
        exit;
    }else{
        $row = $res->fetch_assoc();
    }
}

//setting unset veriables to current values
if(!($name = empty($_POST['realName']) ? false : testInput($_POST['realName']))){
    $name = $row["realName"];
}
if(!($ssn = empty($_POST['ssn']) ? false : testInput($_POST['ssn']))){
    $ssn = $row["ssn"];
}
if(!($birthday = empty($_POST['birthday']) ? false : testInput($_POST['birthday']))){
    $birthday = $row["birthday"];
}
if(!($address = empty($_POST['address']) ? false : testInput($_POST['address']))){
    $address = $row["address"];
}
if(!($phone = empty($_POST['phone']) ? false : testInput($_POST['phone']))){
    $phone = $row["phone"];
}
if(!($email = empty($_POST['email']) ? false : testInput($_POST['email']))){
    $email = $row["email"];
}


//Updating at found user
$sql = "UPDATE users SET realName=(?), ssn=(?), birthday=(?), address=(?), phone=(?), email=(?) WHERE userID=(?) AND pass=(?)";
if (!($stmt = $mysqli->prepare($sql))) {
    echo "Update User Data Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
    exit;
}
if (!$stmt->bind_param("ssssssss", $name, $ssn, $birthday, $address, $phone, $email, $userName, $pass)) {
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