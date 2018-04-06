<?php
	if(!session_start()) {
		header("Location: error.php");
		exit;
	}
	
	$loggedIn = empty($_SESSION['loggedin']) ? false : $_SESSION['loggedin'];
	
	if ($loggedIn) {
		header("Location: page1.php");
		exit;
	}
	
	$action = empty($_POST['action']) ? '' : $_POST['action'];
	
	if ($action == 'do_login')
		handle_login();
	else
		login_form();
	
    function handle_login() {
		$loginUsername = empty($_POST['loginUsername']) ? '' : $_POST['loginUsername'];
		$loginPassword = empty($_POST['loginPassword']) ? '' : $_POST['loginPassword'];
		$accessLevel = empty($_POST['accessLevel']) ? '' : $_POST['accessLevel'];
        
        require_once 'db.conf';
        
        $mysqli = new mysqli($hostname, $username, $password, $dbname);

        if ($mysqli->connect_error) {
            $error = 'Error: ' . $mysqli->connect_errno . ' ' . $mysqli->connect_error;
			require "login_form.php";
            exit;
        }
        
        $loginUsername = $mysqli->real_escape_string($loginUsername);
        $loginPassword = $mysqli->real_escape_string($loginPassword);
        
        $loginPassword = sha1($loginPassword); 
        
//		$query = "SELECT id FROM '$accessLevel' WHERE userName = '$loginUsername' AND password = '$loginPassword'";
         $query = "SELECT * FROM users WHERE name = '$loginUsername' AND pass = '$loginPassword'";
		
		$mysqliResult = $mysqli->query($query);
        
        if ($mysqliResult) {
            $match = $mysqliResult->num_rows;
            $mysqliResult->close();
            $mysqli->close();

  		    if ($match == 1) {
                $_SESSION['loggedin'] = $loginUsername;
             
//                $_SESSION['accessLevel'] = $accessLevel
                header("Location: page1.php");
                exit;
            }
            else {
                $error = 'Error: Incorrect username or password';
                require "loginForm.php";
                exit;
            }
        } else {
          $error = 'Login Error: Please contact the system administrator.';
          require "loginForm.php";
          exit;
        }
	}


    function login_form() {
		$username = "";
		$error = "";
		require "loginForm.php";
	}
?>