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
            <p>This is a content managers and users can see.</p>
            <?php 
                if(strcmp($_SESSION['accessLevel'], 'managers') == 0){
                    echo '<p>This is Protected content only managers can see';
                }  
            ?>
        </div>
        <p><a href='logout.php'>Logout</a></p>
    </div>
</body>
</html>
