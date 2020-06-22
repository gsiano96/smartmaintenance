<!doctype html>
<html>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- Optional Bootstrap Javascript -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <title>Maintainer Home</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <!-- BEGIN MaintainerName -->
        <div class="navbar-header">
            <label class="navbar-brand"> {Maintainer}</label>
        </div>
        <!-- END MaintainerName -->
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">Scheduled Activities</a>
                    <div class="dropdown-menu">
                        <!-- BEGIN ScheduledActivitiesStats -->
                        <label class="dropdown-item disabled"> {Statistic} </label>
                        <a class="dropdown-item" href="scheduled_activities?iden={IDUser}">
                            Go To
                            <i class="fa fa-arrow-right"></i>
                        </a>
                        <!-- END ScheduledActivitiesStats -->
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">Call Activities</a>
                    <div class="dropdown-menu">
                        <!-- BEGIN CallActivitiesStats -->
                        <label class="dropdown-item disabled"> {Statistic} </label>
                        <a class="dropdown-item" href="on_call_activities?iden={IDUser}">
                            Go To
                            <i class="fa fa-arrow-right"></i>
                        </a>
                        <!-- END CallActivitiesStats -->
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">Closing EWO</a>
                    <div class="dropdown-menu">
                        <!-- BEGIN ClosingEWOStats -->
                        <label class="dropdown-item disabled"> {Statistic} </label>
                        <!-- END ClosingEWOStats -->
                        <a class="dropdown-item" href="#">
                            Go To
                            <i class="fa fa-arrow-right"></i>
                        </a>
                    </div>
                </li>
                <li class="nav-item dropdown ">
                    <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">Extra Activities</a>
                    <div class="dropdown-menu">
                        <!-- BEGIN ExtraActivitiesStats -->
                        <label class="dropdown-item disabled"> {Statistic} </label>
                        <a class="dropdown-item" href="extra_activities?iden={IDUser}">
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
</body>
</html>