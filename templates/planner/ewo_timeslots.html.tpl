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
        table tr td input[type="checkbox"] {
            display: none;
        }

        table tr td label {
            display: inline-block;
            width: 100%;
            /*height: 30px;*/
            text-align: center;
            /*color: black;*/
            border: 1px solid #ddd;
            border-radius: 5px;
            line-height: 35px;
            /*50px*/
            cursor: pointer
        }

        input[type="checkbox"]:checked~label{
            /*color: white;*/
            opacity: 0.5;
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
                    <li class="nav-item active"><a class="nav-link" href="ewo_compilation?logout=yes">Logout</a></li>
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

        <div class="row">
            <div class="col-sm-2"><h2>Week n°</h2></div>
            <div class="col-sm-1 "><h2>{week}</h2></div>
            <div class="col-sm-3"><h2>Activity to assign</h2></div>
            <div class="col-sm-4 bg-light"><h2>{activInfo}</h2></div>
            <div class="col-sm-2 bg-light"><h2>Required time {activTime}</h2></div>
        </div>
        <div class="row">
            <div class="col-sm-3 bg-light"><h2>{dayString}</h2></div>
            <div class="col-sm-2 bg-light"><h2>{day}</h2></div>

            <!--<div class="col-sm-2">Assigned time {time}</div>-->
            <div class="col-sm-7 bg-light text-right"><h2>Time to be assigned {time}</h2></div>
        </div>
        <hr>
        <form action="ewo_timeslots" method="GET">
            <div class="row">
                <div class="col-md-4"><h3>Workspace Notes</h3></div>
                <div class="col-md-4"><h3>Maintainers Avaiability </h3></div>
                <div class="col-md-4"><input type="submit" name="submit" value="Send"></div>
            </div>
            <div class="row">
                <div class="col-sm-2 bg-light">{workspaceNotes}</div>
                <div class="col-sm-10">
                    <table class="table table-striped">
                        <thead>
                            <th>Maintener</th>
                            <th>Skills</th>
                            <th>08:00-09:00</th>
                            <th>09:30-10:00</th>
                            <th>10:00-11:00</th>
                            <th>11:00-12:00</th>
                            <th>14:00-15:00</th>
                            <th>15:00-16:00</th>
                            <th>16:00-17:00</th>
                        </thead>

                        <tbody>

                            <input type="hidden" name="week" value="{week}">
                            <input type="hidden" name="activId" value="{activId}">
                            <input type="hidden" name="activInfo" value="{activInfo}">
                            <input type="hidden" name="day" value="{day}">

                            <!-- BEGIN MaintenersTimeslots -->
                            <tr>
                                <td>
                                    {maintenerName}
                                </td>
                                <td style="background-color: {bgColorSkill};">
                                    {skillsNumber}/{requiredSkillsNumber}
                                </td>
                                <td>
                                    <input type="checkbox" name="{maintTime0}" id="{maintTime0}" value="{timeslot0}" />
                                    <label style="background-color: {bgColorSlot0};" for="{maintTime0}">{timeslot0}
                                        min</label>
                                </td>
                                <td>
                                    <input type="checkbox" name="{maintTime1}" id="{maintTime1}" value="{timeslot1}" />
                                    <label style="background-color: {bgColorSlot1};" for="{maintTime1}">{timeslot1}
                                        min</label>
                                </td>
                                <td>
                                    <input type="checkbox" name="{maintTime2}" id="{maintTime2}" value="{timeslot2}" />
                                    <label style="background-color: {bgColorSlot2};" for="{maintTime2}">{timeslot2}
                                        min</label>
                                </td>
                                <td>
                                    <input type="checkbox" name="{maintTime3}" id="{maintTime3}" value="{timeslot3}" />
                                    <label style="background-color: {bgColorSlot3};" for="{maintTime3}">{timeslot3}
                                        min</label>
                                </td>
                                <td>
                                    <input type="checkbox" name="{maintTime4}" id="{maintTime4}" value="{timeslot4}" />
                                    <label style="background-color: {bgColorSlot4};" for="{maintTime4}">{timeslot4}
                                        min</label>
                                </td>
                                <td>
                                    <input type="checkbox" name="{maintTime5}" id="{maintTime5}" value="{timeslot5}" />
                                    <label style="background-color: {bgColorSlot5};" for="{maintTime5}">{timeslot5}
                                        min</label>
                                </td>
                                <td>
                                    <input type="checkbox" name="{maintTime6}" id="{maintTime6}" value="{timeslot6}" />
                                    <label style="background-color: {bgColorSlot6};" for="{maintTime6}">{timeslot6}
                                        min</label>
                                </td>
                            </tr>
                            <!-- END MaintenersTimeslots -->
                        </tbody>

                        <tfoot>
                            <!-- BEGIN NoMainteners -->
                            <tr>
                                <td colspan="9" style="text-align: center;">No maintener to show</td>
                            </tr>
                            <!-- END NoMainteners -->
                        </tfoot>
                    </table>
                </div>
            </div>
            <div class="row" style="padding-top: 20px">
                <div class="col-sm-4"><label>Skills needed</label></div>
            </div>
            <div class="row">
                <div class="col-sm-4 form-group">
                    <textarea class="form-control" rows="5">
                        {skillsList}
                    </textarea>
                </div>
            </div>
        </form>
        <!-- BEGIN onSubmit -->
        <div class="row">
            <div class="col-md-12 text-center {alertStyle}">
                {messageStatus}
            </div>
        </div>
        <!-- END onSubmit -->
    </div>

</body>

</html>