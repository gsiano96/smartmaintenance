<!DOCTYPE html>
<html>

<head>
    <title>Mainteners Timeslots</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap core CSS -->
    <!--<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet"
        media="screen">-->
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

        #timeslot1:checked~label[for="timeslot1"],
        #timeslot2:checked~label[for="timeslot2"],
        #timeslot3:checked~label[for="timeslot3"],
        #timeslot4:checked~label[for="timeslot4"],
        #timeslot5:checked~label[for="timeslot5"],
        #timeslot6:checked~label[for="timeslot6"],
        #timeslot7:checked~label[for="timeslot7"] {
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

    <br>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2 text-right">
                <h2>Week n°:</h2>
            </div>
            <div class="col-md-1 bg-light text-center">
                <h2>{week}</h2>
            </div>
            <div class="col-md-3 text-right">
                <h2>Activity to Assign:</h2>
            </div>
            <div class="col-md-6 bg-light text-center">
                <h2>{maintenanceDescription}</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2 text-right">
                <h2>{dayString}</h2>
            </div>
            <div class="col-md-1 bg-light text-center">
                <h2>{dayNumber}</h2>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-2 text-center bg-light" style="padding:10px">
                <h4>Workspace Notes</h4>
            </div>
            <div class="col-md-9 text-right bg-light" style="padding:10px;">
                <h4>Availability {mantainerName}:</h4>
            </div>
            <div class="col-md-1 text-center" style="background-color:{bgcolorDayAvailability};padding:10px;border-radius: 5px 0px 0px 5px;">
                <h4>{dayAvailability}</h4>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-2 form-group">
                <textarea class="form-control" rows="10" id="comment">{workspaceNotes}</textarea>
            </div>
            <div class="col-md-10 table-responsive">
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
                        <form action="mainteners_timeslots" method="GET">
                            <input type="hidden" name="week" value="{week}">
                            <input type="hidden" name="activityId" value="{activityId}">
                            <input type="hidden" name="activityInfo" value="{activityInfo}">
                            <input type="hidden" name="maintainerId" value="{maintainerId}">
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
                                    <input type="checkbox" name="timeslot1" id="timeslot1" value="{timeslot1}" />
                                    <label style="background-color: {bgColorSlot1};" for="timeslot1">{timeslot1}
                                        min</label>
                                </td>
                                <td>
                                    <input type="checkbox" name="timeslot2" id="timeslot2" value="{timeslot2}" />
                                    <label style="background-color: {bgColorSlot2};" for="timeslot2">{timeslot2}
                                        min</label>
                                </td>
                                <td>
                                    <input type="checkbox" name="timeslot3" id="timeslot3" value="{timeslot3}" />
                                    <label style="background-color: {bgColorSlot3};" for="timeslot3">{timeslot3}
                                        min</label>
                                </td>
                                <td>
                                    <input type="checkbox" name="timeslot4" id="timeslot4" value="{timeslot4}" />
                                    <label style="background-color: {bgColorSlot4};" for="timeslot4">{timeslot4}
                                        min</label>
                                </td>
                                <td>
                                    <input type="checkbox" name="timeslot5" id="timeslot5" value="{timeslot5}" />
                                    <label style="background-color: {bgColorSlot5};" for="timeslot5">{timeslot5}
                                        min</label>
                                </td>
                                <td>
                                    <input type="checkbox" name="timeslot6" id="timeslot6" value="{timeslot6}" />
                                    <label style="background-color: {bgColorSlot6};" for="timeslot6">{timeslot6}
                                        min</label>
                                </td>
                                <td>
                                    <input type="checkbox" name="timeslot7" id="timeslot7" value="{timeslot7}" />
                                    <label style="background-color: {bgColorSlot7};" for="timeslot7">{timeslot7}
                                        min</label>
                                </td>
                            </tr>
                            <!-- END MaintenersTimeslots -->

                            <tr>
                                <td style="text-align: center;" colspan="9">
                                    <input type="submit" style="width: 13%; height: 40px" class="btn btn-info"
                                        name="status" value="Send" />
                                </td>
                            </tr>
                        </form>
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
        <!-- BEGIN onSubmit -->
        <div class="row">
            <div class="col-md-12 text-center alert {alertStyle}" role="alert">
                {messageStatus}
            </div>
        </div>
        <!-- END onSubmit -->
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>-->

    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.4/js/bootstrap.min.js"></script>-->
</body>

</html>