<!DOCTYPE html>
<html>
<head>
    <title>Mainteners Availability</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap core CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet" media="screen">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.2/html5shiv.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.js"></script>
    <![endif]-->
    <style>
        table tr td{
            padding-right: 1px;
            padding-left: 1px;
        }
    </style>
</head>
<body>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-2"><h2>Week n°:</h2></div>
        <div class="col-sm-2" style="background-color:lavender;"><h2>{week}</h2></div>
        <div class="col-sm-3" style="background-color:lavenderblush;"><h2>Activity to Assign</h2></div>
        <div class="col-sm-5" style="background-color:lavender;"><h2>col-sm-4</h2></div>
    </div>
    <div class="row">
        <div class="col-sm-2 text-center" style="background-color:aquamarine"><h4>Skills needed</h4></div>
        <div class="col-sm-10 text-center" style="background-color:lavender;"><h4>Mainteners availability</h4></div>
    </div>
    <hr>
    <div class="row">
        <div class="col-sm-2" style="background-color:aquamarine"><textarea></textarea></div>
        <div class="col-sm-10 table-responsive" style="background-color:lavender;">
            <table class="table-striped table-hover">
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
                            <input type="submit" class="btn btn-info" style="border-radius: 0;" name="maintener{i}2" value="{skillsNumber}/{requiredSkillsNumber}"/>
                        </td>
                        <td class="col">
                            <input type="submit" class="btn btn-info" style="border-radius: 0;" name="maintener{i}3" value="{availabilityMon}"/>
                        </td>
                        <td class="col">
                            <input type="submit" class="btn btn-info" style="border-radius: 0;" name="maintener{i}4" value="{availabilityTue}"/>
                        </td>
                        <td class="col">
                            <input type="submit" class="btn btn-info" style="border-radius: 0;" name="maintener{i}5" value="{availabilityWed}"/>
                        </td>
                        <td class="col">
                            <input type="submit" class="btn btn-info" style="border-radius: 0;" name="maintener{i}6" value="{availabilityThu}"/>
                        </td>
                        <td class="col">
                            <input type="submit" class="btn btn-info" style="border-radius: 0;" name="maintener{i}7" value="{availabilityFrid}"/>
                        </td>
                        <td class="col">
                            <input type="submit" class="btn btn-info" style="border-radius: 0;" name="maintener{i}8" value="{availabilitySat}"/>
                        </td>
                        <td class="col">
                            <input type="submit" class="btn btn-info" style="border-radius: 0;" name="maintener{i}9" value="{availabilitySun}"/>
                        </td>
                    </tr>
                    <!-- END MaintenersAvailab -->
                </tbody>

                <tfoot>
                    <!-- BEGIN NoMainteners -->
                    <!-- END NoMainteners -->
                </tfoot>
            </table>
        </div>
    </div>
</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.4/js/bootstrap.min.js"></script>
</body>
</html>