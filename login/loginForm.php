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
                <label for="loginUsername">Username:</label>
                <input type="text" id="loginUsername" name="loginUsername" autofocus value="<?php print $loginUsername; ?>">
            </div>
            
            <div>
                <label for="loginPassword">Password:</label>
                <input type="password" id="loginPassword" name="loginPassword">
            </div>
            <div class="radio">
                <label><input type="radio" name="accessLevel" value="managers">Manager</label>
            </div>
            <div class="radio">
                <label><input type="radio" name="accessLevel" value="users" checked>User</label>
            </div>
            <input type="submit">
        </form>
    </div>
</body>
</html>
