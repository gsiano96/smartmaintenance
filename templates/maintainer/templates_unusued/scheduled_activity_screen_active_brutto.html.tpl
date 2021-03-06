<!doctype html>
<html lang="it">
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
    <title>Bootstrap_3</title>
</head>
<body>
<div class="container">
    <h1>Scheduled Activities</h1>
    <table class="table">
        <tbody>
            <!-- BEGIN ActivityParametersRow -->
            <tr>
                <td><a href="#">{DescriptionData}</a></td>
                <td>{TimeData}</td>
            </tr>
            <!-- END ActivityParametersRow -->
            <tr>
                <td><button type="button" class="btn btn-success btn-block btn-sm">Start <i class="fa fa-clock-o"></i></button></td>
                <!-- BEGIN ActivityStartParameter -->
                <td><input type="text" readonly>{TimeData}</td>
                <!-- END ActivityStartParameter -->
            </tr>
            <tr>
                <td><button type="button" class="btn btn-danger btn-block btn-sm">Stop <i class="fa fa-clock-o"></i></button></td>
                <!-- BEGIN ActivityStopParameter -->
                <td><input type="text" readonly>{TimeData}</td>
                <!-- END ActivityStopParameter -->
            </tr>
        </tbody>
    </table>
    <button type="button" class="btn btn-danger btn-lg btn-block"> Call <i class="fa fa-bell"></i></button>
    <button type="button" class="btn btn-secondary btn-lg btn-block"> Materials <i class="fa fa-gavel"></i></button>
    <button type="button" class="btn btn-success btn-lg btn-block"> Notes <i class="fa fa-sticky-note"></i></button>
</div>
</body>
</html>