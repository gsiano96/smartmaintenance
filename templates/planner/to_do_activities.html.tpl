<!DOCTYPE html>
<html>

<head>
    <title>Activities list</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

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
                    <li class="nav-item active"><a class="nav-link" href="index">Home</a></li>
                    <!-- END HomeReferenceBlock -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">Planned Activities</a>
                        <div class="dropdown-menu">
                            <!-- BEGIN ScheduledActivitiesStats -->
                            <label class="dropdown-item disabled"> {Statistic} </label>
                            <a class="dropdown-item" href="to_do_activities">
                                Go To
                                <i class="fa fa-arrow-right"></i>
                            </a>
                            <!-- END ScheduledActivitiesStats -->
                        </div>
                    </li>
                    <li class="nav-item dropdown ">
                        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">Unplanned Activities (EWO)</a>
                        <div class="dropdown-menu">
                            <!-- BEGIN OnCallActivitiesStats -->
                            <label class="dropdown-item disabled"> {Statistic} </label>
                            <a class="dropdown-item" href="on_call_activities">
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
                            <a class="dropdown-item" href="extra_activities">
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

    <hr>

    <div class="container">
        <div class="row">
            <div class="col col-12">
                <h1>Scheduled activities</h1>
                <hr>
                <h3>Week n°: <b>{week}</b></h3>
                <hr>
                <div class="table-responsive-lg">
                    <table class="table table-hover">

                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Area</th>
                                <th scope="col">Descrizione Area</th>
                                <th scope="col">Type</th>
                                <th scope="col">Estimated Intervetion Time [min]</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>

                        <tbody>
                            <!-- BEGIN Activities -->
                            <form action=mainteners_availability method="GET">
                                <tr>
                                    <td>{id}</td>
                                    <td>{area}</td>
                                    <td>{areaName}</td>
                                    <td>{type}</td>
                                    <td>{estimatedInterventionTime}</td>
                                    <td>
                                        <input type="submit" class="btn btn-info" value="select">
                                        <input type="hidden" name="week" value={week}>
                                        <input type="hidden" name="activityId" value="{activityId}">
                                        <input type="hidden" name="activityInfo" value="{activityId} - {areaName} - {type} - {estimatedInterventionTime}'">
                                    </td>
                                </tr>
                            </form>
                            <!-- END Activities -->
                        </tbody>

                        <tfoot>
                            <!-- BEGIN NoActivities -->
                            <tr>
                                <td colspan="6" class="text-danger text-center">
                                    No Activities
                                </td>
                            </tr>
                            <!-- END NoActivities -->
                            <tr>
                                <td colspan="5"></td>
                            </tr>
                        </tfoot>

                    </table>
                </div>
            </div>
        </div>
    </div>

</body>

</html>