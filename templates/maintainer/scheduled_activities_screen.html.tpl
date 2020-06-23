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
    <script>
        function viewMaterial() {
            elem = document.getElementById("MaterialSection");
            flag = elem.style.visibility;
            if (flag == "hidden"){
                elem.setAttribute("style","visibility:visible");
            }
            else
                elem.setAttribute("style","visibility:hidden");
        }
        function viewNotes() {
            elem = document.getElementById("NotesSection");
            flag = elem.style.visibility;
            if (flag == "hidden"){
                elem.setAttribute("style","visibility:visible");
            }
            else
                elem.setAttribute("style","visibility:hidden");
        }
        function getTime($param) {
            var currentdate = new Date();
            var datetime = currentdate.getFullYear()+ "-"
                + (currentdate.getMonth()+1) + "-"
                + currentdate.getDate() + " "
                + currentdate.getHours() + ":"
                + currentdate.getMinutes() + ":"
                + currentdate.getSeconds();
            if($param==0)
                document.getElementById("ActStart").setAttribute("value",datetime);
            else
                document.getElementById("ActStop").setAttribute("value",datetime);
        }
    </script>
    <title>Simulatori</title>
</head>
<body>
<div class="container">
    <h1>Scheduled Activities</h1>
    <table class="table">
        <tbody>
        <!-- BEGIN ActivityParametersRow -->
        <tr>
            <td><label>{DescriptionData}</label></td>
            <td><label>TIME: {TimeData}</label></td>
        </tr>
        <!-- END ActivityParametersRow -->
        <form class="form-horizontal" method="post">
            <tr>
                <td><button name="timeStart" type="submit" class="btn btn-success btn-block btn-sm" onclick="getTime(0)">Start <i class="fa fa-clock-o"></i></button></td>
                <!-- BEGIN ActivityStartParameter -->
                <td><input id="ActStart" name="ActStart" type="text" value="{StartTime}" readonly></td>
                <!-- END ActivityStartParameter -->
            </tr>
            <tr>
                <td><button name="timeStop" type="submit" class="btn btn-danger btn-block btn-sm" onclick="getTime(1)">Stop <i class="fa fa-clock-o"></i></button></td>
                <!-- BEGIN ActivityStopParameter -->
                <td><input id="ActStop" name="ActStop" type="text" value="{StopTime}" readonly></td>
                <!-- END ActivityStopParameter -->
            </tr>
        </form>
        </tbody>
    </table>
    <!-- BEGIN ManageButton -->
    <button type="button" class="btn btn-danger btn-lg btn-block" {Inter} onclick="location.href='on_call_activities?iden={IDUser}';"> Call <i class="fa fa-bell"></i></button>
    <button type="button" class="btn btn-secondary btn-lg btn-block" onclick="viewMaterial()"> Materials <i class="fa fa-gavel"></i></button>
    <button type="button" class="btn btn-success btn-lg btn-block" onclick="viewNotes()"> Notes <i class="fa fa-sticky-note"></i></button>
    <!-- END ManageButton -->
</div>
    <div id="MaterialSection" style="visibility: hidden">
        <hr style=" align='left' ;size='10' ;width='300' ;color='yellow' " >
        <h3> MATERIALS </h3>
        <!-- BEGIN ActivityMaterialParameter -->
        <label>{ActivityMaterials}</label>
        </br>
        <!-- END ActivityMaterialParameter -->
    </div>
    <div id="NotesSection" style="visibility: hidden">
        <hr style=" align='left' ;size='10' ;width='300' ;color='yellow' " >
        <h3> NOTES </h3>
        <!-- BEGIN ActivityNotesParameter -->
        <label>{ActivityNotes}</label>
        </br>
        <!-- END ActivityNotesParameter -->
    </div>
</body>
</html>