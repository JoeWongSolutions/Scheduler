<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php include("bootstrap/bscss.php"); ?>	
    <title>Login</title>
</head>
    
<body>
    <h1 class="text-center">Scheduler</h1>
    <div class="jumbotron">
        <div class="container-fluid">
            <div class="row">
                
<!--                left column-->
                <div class="col-lg-6">
                    <span><img src="/tests/calendarClock.png" class="img-responsive" alt="" style="width:420px;height:420px;"/></span>
                </div>
                
<!--                right column-->
                <div class="col-lg-6">
                    <form action="login.php" method="POST">
                        <br>
                        <h2>Login</h2>
                        <br>
                        <?php
                        if ($error) print "<div>$error</div>\n";
                        ?>
                        <input type="hidden" name="action" value="do_login">
                        <div class="box">
                            <div class="form-group row">
                                <label for="loginUsername" class="col-lg-2 col-form-label">Username:</label>
                                <div class="col-lg-5">
                                    <input type="text" id="loginUsername" name="loginUsername" autofocus placeholder="Username" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="loginPassword" class="col-lg-2 col-form-label">Password:</label>
                                <div class="col-lg-5">
                                     <input type="password" id="loginPassword" name="loginPassword" placeholder="Password" class="form-control">
                                </div>
                            </div>
<!--                            -->
                            <div class="radio">
                                <label><input type="radio" name="accessLevel" value="managers">Manager</label>
                            </div>
                            <div class="radio">
                                <label><input type="radio" name="accessLevel" value="users" checked>User</label>
                            </div>
<!--                            -->
                            <button class="btn btn-success full-width py-1 my-3"><span>Login</span></button>
                        </div>
                    </form>
                    <button class="btn-sm btn-secondary" data-toggle="modal" data-target="#createUserModal">Register</button>
                </div>
            </div>
        </div>
    </div>
    
<!--    include modal-->
    <?php include("templates/createUserModal.template"); ?>
<!--    jquery -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<!--    popper -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<!--    bootstrap -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>


