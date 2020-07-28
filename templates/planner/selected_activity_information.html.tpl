<!DOCTYPE html>
<html>
<head>
    <title>Bootstrap 4 Website Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap core CSS -->
    <!--<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet"
        media="screen">-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.2/html5shiv.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.js"></script>
    <![endif]-->

    <style>
        .row{

            padding: 4px;
        }
        label{

            background-size: 10px;
            font-size: medium;
            //font-family: "Arial Black";
            //background-color: #ededed;
        }

    </style>
</head>
<body>


<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <!-- BEGIN MaintainerName -->
        <div class="navbar-header">
            <label class="navbar-brand"> {planner}</label>
        </div>
        <!-- END MaintainerName -->
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav">
                <!-- BEGIN HomeReferenceBlock -->
                <li class="nav-item active"><a class="nav-link" href="to_do_activities?logout=yes">Logout</a></li>
                <!-- END HomeReferenceBlock -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">Planned Activities</a>
                    <div class="dropdown-menu">
                        <!-- BEGIN ScheduledActivitiesStats -->
                        <label class="dropdown-item disabled"> {plannedStatistic} </label>
                        <a class="dropdown-item" href="../../index.php">
                            Go To
                            <i class="fa fa-arrow-right"></i>
                        </a>
                        <!-- END ScheduledActivitiesStats -->
                    </div>
                </li>
                <li class="nav-item dropdown ">
                    <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">Unplanned Activities</a>
                    <div class="dropdown-menu">
                        <!-- BEGIN OnCallActivitiesStats -->
                        <label class="dropdown-item disabled"> {unplannedStatistic} </label>
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
<div class="container-fluid">
    <form action="mainteners_availability" method="GET">
    <div class="row">
        <div class="col-sm-3 "><label><h2>Week n°</h2></label></div>
        <div class="col-sm-3 bg-light"><h2 class="font-weight-bold">{week}</h2></div>
        <div class="col-sm-3"><label><h2>Activity to assign</h2></label></div>
        <div class="col-sm-3 bg-light"><h4 class="font-weight-bold">{activityInfo}</h4></div>
    </div>
    <hr>
    <div class="row">

        <div class="col-md-4 bg-light" ><label><h3>Workspace Notes</h3></label></div>
        <div class="col-md-4 bg-light"><label><h3>Intervention description</h3></label></div>
        <div class="col-md-4 bg-light"><label><h3>Skills needed</h3></label></div>

    </div>
        <!-- BEGIN Activity -->
    <div class="row">
        <div class="col-md-4">{workspacenotes}</div>
        <div class="col-md-4">{interventiondescription}</div>
        <!-- END Activity -->
        <!-- BEGIN Skill -->
        <div class="col-md-4">{skillsneeded}<br></div>

        <!-- END Skill -->
    </div>
    <div class="row" style="padding: 20px">
        <div class="col-md-4"> </div>
        <div class="col-md-4"> <input type="file"></div>
        <div class="col-md-4"> <input type="submit" class="btn btn-info"></div>
         <input type="hidden" name="week" value={week}>
        <input type="hidden" name="skillneed" value="{skillsneeded}}">
        <input type="hidden" name="activityId" value="{activityId}">
        <input type="hidden" name="activityInfo" value="{activityInfo}">
    </div>
    </form>
</div>



</body>
</html>