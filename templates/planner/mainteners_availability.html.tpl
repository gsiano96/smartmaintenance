<!DOCTYPE html>
<html>

<head>
    <title>Mainteners Availability</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.2/html5shiv.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.js"></script>
    <![endif]-->
    <style>
        table tr td {
            padding-right: 1px;
            padding-left: 1px;
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
                        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">Unplanned Activities
                            (EWO)</a>
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
    <br>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2 text-right">
                <h2>Week n°:</h2>
            </div>
            <div class="col-md-1 bg-light text-center">
                <h2 class="font-weight-bold">{week}</h2>
            </div>
            <div class="col-md-3 text-right">
                <h2>Activity to Assign:</h2>
            </div>
            <div class="col-md-6 bg-light text-center">
                <h2 class="font-weight-bold">{maintenanceDescription}</h2>
            </div>
        </div>
        <br><br>
        <div class="row">
            <div class="col-md-2 text-center bg-light" style="padding:10px">
                <h4>Skills needed</h4>
            </div>
            <div class="col-md-10 text-center bg-light" style="padding:10px">
                <h4>Mainteners availability</h4>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-2 form-group">
                <label for="comment">Comment:</label>
                <textarea class="form-control" rows="10" id="comment">{maintSkillsList}</textarea>
            </div>
            <div class="col-sm-10 table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <th class="col">Maintener</th>
                        <th class="col">Skills</th>
                        <th class="col">Monday</th>
                        <th class="col">Tuesday</th>
                        <th class="col">Weedsday</th>
                        <th class="col">Thursday</th>
                        <th class="col">Friday</th>
                        <th class="col">Saturday</th>
                        <th class="col">Sunday</th>
                    </thead>

                    <tbody>
                        <!-- BEGIN MaintenersAvailab -->
                        <tr>
                            <td class="col">
                                {maintenerName}
                            </td>
                            <td class="col">
                                <input type="button" disabled class="btn {btnSkill}" style="width:100px"
                                    value="{skillsNumber}/{requiredSkillsNumber}" />
                            </td>
                            <td class="col">
                                <form action="mainteners_timeslots" method="GET">
                                    <input type="hidden" name="week" value="{week}">
                                    <input type="hidden" name="activityId" value="{activityId}">
                                    <input type="hidden" name="activityInfo" value="{activityInfo}">

                                    <input type="hidden" name="maintainerId" value="{maintainerId}">
                                    <input type="hidden" name="day" value="1">

                                    <input type="submit" class="btn {btnMon}" style="width:100px"
                                        value="{availabilityMon}" />
                                </form>
                            </td>
                            <td class="col">
                                <form action="mainteners_timeslots" method="GET">
                                    <input type="hidden" name="week" value="{week}">
                                    <input type="hidden" name="activityId" value="{activityId}">
                                    <input type="hidden" name="activityInfo" value="{activityInfo}">

                                    <input type="hidden" name="maintainerId" value="{maintainerId}">
                                    <input type="hidden" name="day" value="2">

                                    <input type="submit" class="btn {btnTue}" style="width:100px"
                                        value="{availabilityTue}" />
                                </form>
                            </td>
                            <td class="col">
                                <form action="mainteners_timeslots" method="GET">
                                    <input type="hidden" name="week" value="{week}">
                                    <input type="hidden" name="activityId" value="{activityId}">
                                    <input type="hidden" name="activityInfo" value="{activityInfo}">

                                    <input type="hidden" name="maintainerId" value="{maintainerId}">
                                    <input type="hidden" name="day" value="3">

                                    <input type="submit" class="btn {btnWed}" style="width:100px"
                                        value="{availabilityWed}" />
                                </form>
                            </td>
                            <td class="col">
                                <form action="mainteners_timeslots" method="GET">
                                    <input type="hidden" name="week" value="{week}">
                                    <input type="hidden" name="activityId" value="{activityId}">
                                    <input type="hidden" name="activityInfo" value="{activityInfo}">

                                    <input type="hidden" name="maintainerId" value="{maintainerId}">
                                    <input type="hidden" name="day" value="4">

                                    <input type="submit" class="btn {btnThu}" style="width:100px"
                                        value="{availabilityThu}" />
                                </form>
                            </td>
                            <td class="col">
                                <form action="mainteners_timeslots" method="GET">
                                    <input type="hidden" name="week" value="{week}">
                                    <input type="hidden" name="activityId" value="{activityId}">
                                    <input type="hidden" name="activityInfo" value="{activityInfo}">

                                    <input type="hidden" name="maintainerId" value="{maintainerId}">
                                    <input type="hidden" name="day" value="5">

                                    <input type="submit" class="btn {btnFri}" style="width:100px"
                                        value="{availabilityFri}" />
                                </form>
                            </td>
                            <td class="col">
                                <form action="mainteners_timeslots" method="GET">
                                    <input type="hidden" name="week" value="{week}">
                                    <input type="hidden" name="activityId" value="{activityId}">
                                    <input type="hidden" name="activityInfo" value="{activityInfo}">

                                    <input type="hidden" name="maintainerId" value="{maintainerId}">
                                    <input type="hidden" name="day" value="6">

                                    <input type="submit" class="btn {btnSat}" style="width:100px"
                                        value="{availabilitySat}" />
                                </form>
                            </td>
                            <td class="col">
                                <form action="mainteners_timeslots" method="GET">
                                    <input type="hidden" name="week" value="{week}">
                                    <input type="hidden" name="activityId" value="{activityId}">
                                    <input type="hidden" name="activityInfo" value="{activityInfo}">

                                    <input type="hidden" name="maintainerId" value="{maintainerId}">
                                    <input type="hidden" name="day" value="7">

                                    <input type="submit" class="btn {btnSun}" style="width:100px"
                                        value="{availabilitySun}" />
                                </form>
                            </td>
                        </tr>
                        </form>
                        <!-- END MaintenersAvailab -->
                    </tbody>

                    <tfoot>
                        <!-- BEGIN NoMainteners -->
                        No maintener to show
                        <!-- END NoMainteners -->
                    </tfoot>
                </table>
            </div>
        </div>
    </div>

</body>

</html>