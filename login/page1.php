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
<html>
<head>
	<title>Page 1</title>
</head>
<body>
    <div>
        <h1>Page 1</h1>
        <div>
            <p>This is a page containing protected content.</p>
            <p>You must be logged in to view this page.</p>
        </div>
    </div>
</body>
</html>
