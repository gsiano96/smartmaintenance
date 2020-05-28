<!DOCTYPE html>
<html>
<head>
    <title>Activities list</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap core CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet" media="screen">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.2/html5shiv.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.js"></script>
    <![endif]-->
</head>
<body>

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
                        <th scope="col">Type</th>
                        <th scope="col">Estimated Intervetion Time [min]</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>

                    <tbody>
                    <!-- BEGIN Activities -->
                    <tr>
                        <td>{id}</td>
                        <td>{area}</td>
                        <td>{type}</td>
                        <td>{estimatedInterventionTime}</td>
                        <td>
                            <input type="submit" class="btn btn-info" value="select">
                            <input type="hidden" name={activityId}>
                        </td>
                    </tr>
                    <!-- END Activities -->
                    </tbody>

                    <tfoot>
                        <!-- BEGIN NoActivities -->
                        <tr>
                            <td colspan="5" class="text-danger text-center">
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

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.4/js/bootstrap.min.js"></script>

</body>
</html>