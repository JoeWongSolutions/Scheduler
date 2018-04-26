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

    //Database connection
    require_once "db.conf";
    $mysqli = new mysqli($servername, $username, $password, $dbname);
    if ($mysqli->connect_error) {
        echo('Error: ' . $mysqli->connect_errno . ' ' . $mysqli->connect_error);
        $mysqli->close();
        exit;
    }

     $sql = "SELECT * FROM employed, users WHERE employed.managerID = (?) AND employed.userID = users.userID";
        if (!($stmt = $mysqli->prepare($sql))) {
            echo "Prepare failed2: (" . $mysqli->errno . ") " . $mysqli->error;
            $mysqli->close();
            exit;
        } 
        if (!$stmt->bind_param("s", $managerID)) {
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

            if(!$row) {
                $mysqli->close();
                echo "No employees found! Auto-redirecting...";
            }
        }
?>

<div class="container-fluid" id="employees">
    <div class="jumbotron jumbotron-fluid text-center mb-0">
        <h1>Employees</h1>
    </div>
    <div class="">

    </div>
    <div class="container-fluid px-0">
        <table class="table">
          <thead class="thead-dark">
            <tr>
                <th scope="col">User ID</th>
                <th scope="col">Name</th>
                <th scope="col">Position 
                    <span class="btn float-right py-0 my-0" data-toggle="modal" data-target="#addEmployeeModal">&#65291;</span>
                </th>
            </tr>
          </thead>
          <tbody>
              <?php 
                 while ($row = $res->fetch_assoc()) {
                    $remaining = $row["maxBid"] - $row["bids"];
                    $html = '<tr>
                                <th scope="row" data-toggle="modal" data-target="'.$modal.'" data-userID="'.$row["userID"].'" data-realName="'.$row["realName"].'"  data-staffPosition="'.$row["staffPosition"] . '" data-active="'.$row["active"].'">' . $row["userID"] .'</th>
                                    <td>'.$row["realName"].'</td>
                                    <td>'.$row["staffPosition"].'
                                        <button class="btn-sm btn-danger float-right">&times;</button>
                                        <button class="btn-sm btn-success float-right" data-toggle="modal" data-target="#editEmployeeModal">&#9998;</button> 
                                    </td>   
                             </tr>';
                    echo $html;
                }
              
              ?>
          </tbody>
        </table>
    </div>
</div>
