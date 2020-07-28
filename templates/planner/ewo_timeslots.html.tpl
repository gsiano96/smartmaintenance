<!DOCTYPE html>
<html>

<head>
    <title>Bootstrap 4 Website Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

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
    <div class="container-fluid">

        <div class="row">
            <div class="col-sm-3"><label>Week n°</label></div>
            <div class="col-sm-2">{week}</div>
            <div class="col-sm-2"><label>activity to assign</label></div>
            <div class="col-sm-3">{activInfo}</div>
            <div class="col-sm-2">Required time {activTime}</div>
        </div>
        <div class="row">
            <div class="col-sm-3">{dayString}</div>
            <div class="col-sm-2">{day}</div>
            <div class="col-sm-3"></div>
            <div class="col-sm-2">Assigned time {time}</div>
            <div class="col-sm-2">Time to be assigned {time}</div>
        </div>
        <hr>
        <form action="ewo_timeslots" method="GET">
            <div class="row">
                <div class="col-md-4"><label>Workspace Notes</label></div>
                <div class="col-md-4"><label>Maintainers Avaiability </label></div>
                <div class="col-md-4"><input type="submit" name="submit" value="Send"></div>
            </div>
            <div class="row">
                <div class="col-sm-2">{workspaceNotes}</div>
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