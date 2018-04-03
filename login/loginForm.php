<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<body>
    <div>
        <h1>Login</h1>
        
        <?php
            if ($error) print "<div>$error</div>\n";
        ?>
        
        <form action="login.php" method="POST">
            
            <input type="hidden" name="action" value="do_login">
            
            <div>
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" autofocus value="<?php print $username; ?>">
            </div>
            
            <div>
                <label for="password">Password:</label>
                <input type="password" id="password" name="password">
            </div>
            
            <input type="submit">
        </form>
    </div>
</body>
</html>
