<!DOCTYPE html>
<html>
<head>
    <title>Bootstrap 4 Website Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

    <style>
        .row{

            padding: 4px;
        }
        label{

            background-size: 20px;
            font-size: large;
            font-family: "Arial Black";
        }
    </style>
</head>
<body>
    <?php

    ?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <!-- BEGIN MaintainerName -->
        <div class="navbar-header">
            <label class="navbar-brand"> {Planner}</label>
        </div>
        <!-- END MaintainerName -->
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav">
                <!-- BEGIN HomeReferenceBlock -->
                <li class="nav-item active"><a class="nav-link" href="../../index.php">Home</a></li>
                <!-- END HomeReferenceBlock -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">Scheduled Activities</a>
                    <div class="dropdown-menu">
                        <!-- BEGIN ScheduledActivitiesStats -->
                        <label class="dropdown-item disabled"> {Statistic} </label>
                        <a class="dropdown-item" href="../../index.php">
                            Go To
                            <i class="fa fa-arrow-right"></i>
                        </a>
                        <!-- END ScheduledActivitiesStats -->
                    </div>
                </li>
                <li class="nav-item dropdown ">
                    <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">On Call Activities</a>
                    <div class="dropdown-menu">
                        <!-- BEGIN OnCallActivitiesStats -->
                        <label class="dropdown-item disabled"> {Statistic} </label>
                        <a class="dropdown-item" href="../../index.php">
                            Go To
                            <i class="fa fa-arrow-right"></i>
                        </a>
                        <!-- END OnCallActivitiesStats -->
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">Extra Activities</a>
                    <div class="dropdown-menu">
                        <!-- BEGIN ExtraActivitiesStats -->
                        <label class="dropdown-item disabled"> {Statistic} </label>
                        <a class="dropdown-item" href="../../index.php">
                            Go To
                            <i class="fa fa-arrow-right"></i>
                        </a>
                        <!-- END ExtraActivitiesStats -->
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="container">
    <form name="controls" method="GET">
    <div class="row">
        <div class="col-sm-3"><label>Week n°</label></div>
        <div class="col-sm-3">{week}</div>
        <div class="col-sm-3"><label>activity to assign</label></div>
        <div class="col-sm-3">{attività}</div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-4" ><label>Workspace Notes</label></div>
        <div class="col-md-4"><label>Intervention description</label></div>
        <div class="col-md-4"><label>skills needed</label></div>
    </div>
    <div class="row">
        <div class="col-sm-4"><input type="text" /> </input></div>
        <div class="col-sm-4">{intervention description}</div>
        <div class="col-md-4">{skills nedded}</div>
    </div>
    <div class="row" style="padding: 20px">
        <div class="col-md-4"> </div>
        <div class="col-md-4"> <input type="file"></div>
        <div class="col-md-4"> <input type="submit"></div>
    </div>
    </form>
</div>



</body>
</html>