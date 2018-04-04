<!DOCTYPE html>
<html lang="en">
    <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <?php 
        require_once("bscdn.html"); 
    ?>
    <script src="main.js"></script>
    
    <title>ABCScheduler</title>
    </head>
    <body>
        
        <?php require_once("nav_default.php"); ?>
        
        <div class="container-fluid">
            <div class="jumbotron jumbotron-fluid text-center mb-0">
                <h1>Schedule</h1>
            </div>
            <form action="#" method="get">
                    <div class="col-lg-3 my-3 mx-auto row">
                        <input type="week" class="form-control">
                    </div>
                </form>
            <div class="container-fluid px-0">
                <div class="row mx-0 px-0">
                    <div id="sunday" class="col-lg mx-0 px-1">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="text-center">Sunday</h5>
                                <p class="text-center">04/01/2018</p>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body btn" data-toggle="modal" data-target="#editShiftModal" data-shiftID="1">
                                <h6>Example Shift</h6>
                                <small>10:00AM - 3:00PM</small>
                            </div>
                        </div>
                    </div>
                    <div id="monday" class="col-lg mx-0 px-1">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="text-center">Monday</h5>
                                <p class="text-center">04/01/2018</p>
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
                                <p class="text-center">04/01/2018</p>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body btn" data-toggle="modal" data-target="#editShiftModal">
                                <h6>Example Shift</h6>
                                <small>10:00AM - 3:00PM</small>
                            </div>
                        </div>
                    </div>
                    <div id="wednesday" class="col-lg mx-0 px-1">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="text-center">Wednesday</h5>
                                <p class="text-center">04/01/2018</p>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body btn" data-toggle="modal" data-target="#editShiftModal">
                                <h6>Example Shift</h6>
                                <small>10:00AM - 3:00PM</small>
                            </div>
                        </div>
                    </div>
                    <div id="thursday" class="col-lg mx-0 px-1">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="text-center">Thursday</h5>
                                <p class="text-center">04/01/2018</p>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body btn" data-toggle="modal" data-target="#editShiftModal">
                                <h6>Example Shift</h6>
                                <small>10:00AM - 3:00PM</small>
                            </div>
                        </div>
                    </div>
                    <div id="friday" class="col-lg mx-0 px-1">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="text-center">Friday</h5>
                                <p class="text-center">04/01/2018</p>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body btn" data-toggle="modal" data-target="#editShiftModal">
                                <h6>Example Shift</h6>
                                <small>10:00AM - 3:00PM</small>
                            </div>
                        </div>
                    </div>
                    <div id="saturday" class="col-lg mx-0 px-1">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="text-center">Saturday</h5>
                                <p class="text-center">04/01/2018</p>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body btn" data-toggle="modal" data-target="#editShiftModal">
                                <h6>Example Shift</h6>
                                <small>10:00AM - 3:00PM</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>