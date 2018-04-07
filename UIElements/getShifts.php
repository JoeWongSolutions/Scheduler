<?php
//This will need to be changed, its hardcoded
$managerID = 1;
$staffPosition = "cashier";

//Array holding days of the week
$weekdays = array("Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday");

//Parse the week data and turn it into integers
$weekParts = explode("-W", $_GET["week"]);
if($weekParts){
    $year = (int)$weekParts[0];
    $week_no = $weekParts[1];
    $week_start = new DateTime();
    $week_start->setISODate($year,$week_no);
} else {
    echo "No week was selected";
    exit;
}

//Database connection
require_once "db.conf";
$mysqli = new mysqli($servername, $username, $password, $dbname);
if ($mysqli->connect_error) {
    echo('Error: ' . $mysqli->connect_errno . ' ' . $mysqli->connect_error);
    exit;
}

if (!($stmt = $mysqli->prepare("SELECT staffPosition, TIME(startTime) AS startTime, TIME(endTime) AS endTime, active, maxBid FROM shifts WHERE managerID = (?) AND DATE(startTime) = (?) AND (staffPosition = (?) OR staffPosition = 'any') ORDER BY startTime"))) {
    echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
}

//Build the Schedule
echo '<div class="row mx-0 px-0">';
foreach($weekdays as $weekday){
    echo '<div id="'.$weekday.'" class="col-lg mx-0 px-1">
            <div class="card">
                <div class="card-body">
                    <h5 class="text-center">'.$weekday.'</h5>
                    <p class="text-center">'.$week_start->format('M-d-Y').'</p>
                </div>
            </div>';
                $week_start_string = $week_start->format('Y-m-d');
                if (!$stmt->bind_param("iss", $managerID, $week_start_string, $staffPosition)) {
                    echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
                }
                if (!$stmt->execute()) {
                    echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
                }
                if (!($res = $stmt->get_result())) {
                    echo "Getting result set failed: (" . $stmt->errno . ") " . $stmt->error;
                }
                while ($row = $res->fetch_assoc()) { 
                    echo '<div class="card">
                            <div class="card-body btn" data-toggle="modal" data-target="#editShiftModal" data-shiftID="'.$row["staffPosition"].'" data-startTime="'.$row["startTime"].'" data-endTime="'.$row["endTime"].'" data-maxBid="'.$row["maxBid"].'" data-active="'.$row["active"].'">
                                <h6>'.$row["staffPosition"].'</h6>
                                <small>'.$row["startTime"].' - '.$row["endTime"].'</small>
                            </div>
                        </div>';    
                }
                $res->free();
                $week_start->add(new DateInterval('P1D'));
        echo '</div>';
}
?>