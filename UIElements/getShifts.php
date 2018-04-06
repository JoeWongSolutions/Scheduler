<?php
//This will need to be changed, its hardcoded
$managerID = 1;
$staffPosition = 
    
$weekParts = explode("-W", $_GET["week"]);
if($weekParts){
    $year = $weekParts[0];
    $week_no = $weekParts[1];
    $week_start = new DateTime();
    $week_start->setISODate($year,$week_no);
} else {
    echo "No week was selected";
    exit;
}

require_once "db.conf";

$mysqli = new mysqli($hostname, $username, $password, $dbname);
if ($mysqli->connect_error) {
    echo('Error: ' . $mysqli->connect_errno . ' ' . $mysqli->connect_error);
    exit;
}

if (!($stmt = $mysqli->prepare("SELECT * FROM shifts WHERE managerID = (?) AND DATE(startTime) = (?) AND staffPosition = (?)"))) {
    echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
}
if (!$stmt->bind_param("iss", $managerID, $week_start->format('d-M-Y'), $staffPosition)) {
    echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
}

if (!$stmt->execute()) {
    echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
}

?>
<div class="row mx-0 px-0">
    <div id="monday" class="col-lg mx-0 px-1">
        <div class="card">
            <div class="card-body">
                <h5 class="text-center">Monday</h5>
                <p class="text-center"><?php echo $week_start->format('M-d-Y'); ?></p>
            </div>
        </div>
        <div class="card">
            <div class="card-body btn" data-toggle="modal" data-target="#editShiftModal" data-shiftID="2">
                <h6>Example Shift</h6>
                <small>10:00AM - 3:00PM</small>
            </div>
        </div>
    </div>
    <div id="tuesday" class="col-lg mx-0 px-1">
        <div class="card">
            <div class="card-body">
                <h5 class="text-center">Tuesday</h5>
                <p class="text-center"><?php echo $week_start->add(new DateInterval('P1D'))->format('M-d-Y'); ?></p>
            </div>
        </div>
        <div class="card">
            <div class="card-body btn">
                <h6>Example Shift</h6>
                <small>10:00AM - 3:00PM</small>
            </div>
        </div>
    </div>
    <div id="wednesday" class="col-lg mx-0 px-1">
        <div class="card">
            <div class="card-body">
                <h5 class="text-center">Wednesday</h5>
                <p class="text-center"><?php echo $week_start->add(new DateInterval('P1D'))->format('M-d-Y'); ?></p>
            </div>
        </div>
        <div class="card">
            <div class="card-body btn">
                <h6>Example Shift</h6>
                <small>10:00AM - 3:00PM</small>
            </div>
        </div>
    </div>
    <div id="thursday" class="col-lg mx-0 px-1">
        <div class="card">
            <div class="card-body">
                <h5 class="text-center">Thursday</h5>
                <p class="text-center"><?php echo $week_start->add(new DateInterval('P1D'))->format('M-d-Y'); ?></p>
            </div>
        </div>
        <div class="card">
            <div class="card-body btn">
                <h6>Example Shift</h6>
                <small>10:00AM - 3:00PM</small>
            </div>
        </div>
    </div>
    <div id="friday" class="col-lg mx-0 px-1">
        <div class="card">
            <div class="card-body">
                <h5 class="text-center">Friday</h3>
                <p class="text-center"><?php echo $week_start->add(new DateInterval('P1D'))->format('M-d-Y'); ?></p>
            </div>
        </div>
        <div class="card">
            <div class="card-body btn">
                <h6>Example Shift</h6>
                <small>10:00AM - 3:00PM</small>
            </div>
        </div>
    </div>
    <div id="saturday" class="col-lg mx-0 px-1">
        <div class="card">
            <div class="card-body">
                <h5 class="text-center">Saturday</h3>
                <p class="text-center"><?php echo $week_start->add(new DateInterval('P1D'))->format('M-d-Y'); ?></p>
            </div>
        </div>
        <div class="card">
            <div class="card-body btn">
                <h6>Example Shift</h6>
                <small>10:00AM - 3:00PM</small>
            </div>
        </div>
    </div>
    <div id="sunday" class="col-lg mx-0 px-1">
        <div class="card">
            <div class="card-body">
                <h5 class="text-center">Sunday</h3>
                <p class="text-center"><?php echo $week_start->add(new DateInterval('P1D'))->format('M-d-Y'); ?></p>
            </div>
        </div>
        <div class="card">
            <div class="card-body btn" data-toggle="modal" data-target="#editShiftModal" data-shiftID="1">
                <h6>Example Shift</h6>
                <small>10:00AM - 3:00PM</small>
            </div>
        </div>
    </div>    
</div>