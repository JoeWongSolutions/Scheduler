<?php
	if(!session_start()) {
		header("Location: error.php");
		exit;
	}
	
	$loggedIn = empty($_SESSION['loggedin']) ? false : $_SESSION['loggedin'];
	
	if (!$loggedIn) {
		header("Location: login.php");
		exit;
	}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <?php include("bootstrap/bscss.php"); ?>
	<title>Change Password</title>
    <script>
        
    </script>
</head>
<body>
    <?php
            if($_SESSION["accessLevel"] == "managers"){
                include("templates/nav_manager.php");
               
            } else {
                include("templates/nav_default.php");
            }
        ?>
    
        <div class="container-fluid" id="password" role="tabpanel" aria-labelledby="password-tab">
        <h1>Change Password</h1>
        <?php
            if ($alert) print "<div>$alert</div>\n";
        ?>
         <div class="jumbotron">
            <div class="container-fluid">
                <div class="row">
                
                    <!--left column-->
                    <div class="col-lg-6">
                        <form action="changePassword.php" method="POST">
                            <div class="form-group row">
                                <input type="hidden" name="action" value="do_change">
                                <label for="currentPass" class="col-lg-4 col-form-label">Current Password:
                                </label>
                                <div class="col-lg-5">
                                    <input type="password" id="currentPass" name="currentPass" autofocus required class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                
                                <label for="newPass" class="col-lg-4 col-form-label">New Password:</label>
                                <div class="col-lg-5">
                                    <input type="password" id="newPass" name="newPass" required onkeyup='check();' class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="confirmPass" class="col-lg-4 col-form-label">Confirm Password:</label>
                                <div class="col-lg-5">
                                    <input type="password" id="confirmPass" name="confirmPass" required onkeyup='check();' class="form-control">
                                </div>
                            </div>
                            <span id='message'></span>
                            <div class="col-lg-4 m-0 p-0">
                                <input id='submit' type="submit" value="Submit" class="form-control">
                            </div>
                            
                        </form>
                    </div>
                    
<!--                    right column -->
                    <div class="col-lg-6">
                        <span><img src="password.png" class="img-responsive" alt="" style="width:400px;height:320px;"/></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <!-- Optional JavaScript -->
        <script src="scripts/changePassword.js"></script>
</body>
</html>