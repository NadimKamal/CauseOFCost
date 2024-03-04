<?php
require_once '../Conn/connection.php';
require_once '../InsertQ/insertDataQuery.php';
require_once '../DeleteQ/deleteDataQuery.php';
require_once '../TableShow/viewTableQuery.php';
require_once '../TableShow/groupByTableShow.php';

//======== Main Delete Button's Delete Activity Start Here ========

?>
<!-- ======== PHP End Here ======== -->
<!-- ======== HTML Start Here ======== -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>
    <!-- CSS -->
    <link rel="stylesheet" href="../CSS/bootstrap.min.css">
    <link rel="stylesheet" href="../CSS/sajuguju.css">
    <link rel="stylesheet" href="../CSS/deletePHP.css">
</head>
<body>
    <div class="container">
        <form class="row g-3" method="post" action="">
            <!-- TopLabel    -->
            <div class="col-md-12">
                <label class="form-label toplabel" id="toplabel">Select Only For GoupBy And OrderBy</label>
            </div>
            <!-- Year -->
            <div class="col-md-6">
                <label class="col-md-3 form-label label">Year</label>
                <select name="years" id="years" class="col-md-3 dates">
                    <?php selectyear();?>
                    <option class="yearvalue" value="">Select</option>

                    <option class="yearvalue" value="2023">2023</option>
                    <option class="yearvalue" value="2024">2024</option>
                    <option class="yearvalue" value="2025">2025</option>
                    <option class="yearvalue" value="2026">2026</option>
                    <option class="yearvalue" value="2027">2027</option>
                    <option class="yearvalue" value="2028">2028</option>
                </select>
            </div>
            <!-- Month -->
            <div class="col-md-6">
                <label class="label col-md-3" name="datelabel">Month:</label>
                <select name="allmonth" id="allmonth" class="col-md-3 dates">
                    <?php selectmonth();?>
                    <option class="monthvalue" value="">Select</option>

                    <option class="monthvalue" value="01">January</option>
                    <option class="monthvalue" value="02">February</option>
                    <option class="monthvalue" value="03">March</option>
                    <option class="monthvalue" value="04">April</option>
                    <option class="monthvalue" value="05">May</option>
                    <option class="monthvalue" value="06">June</option>
                    <option class="monthvalue" value="07">July</option>
                    <option class="monthvalue" value="08">August</option>
                    <option class="monthvalue" value="09">September</option>
                    <option class="monthvalue" value="10">October</option>
                    <option class="monthvalue" value="11">November</option>
                    <option class="monthvalue" value="12">December</option>

                </select>
            </div>
            <br><br><br><br>
            <!-- TopLabel    -->
            <div class="col-md-12">
                <label class="form-label toplabel" id="toplabel">Use Only For Data Insert</label>
            </div>
            <!-- Date -->
            <div class="col-md-6">
                <label class="form-label label">Date</label>
                <input type="date" class="form-control input" id="date" name="date">
            </div>
            <!-- Taka -->
            <div class="col-md-6">
                <label class="form-label label">Taka</label>
                <input type="text" class="form-control input" id="taka" name="taka">
            </div>
            <!-- CauseOFCost -->
            <div class="col-md-12">
                <label class="form-label label">CauseOfCost</label>
                <input type="text" class="form-control input" id="coc" name="coc">
            </div>

            <!-- ======== Buttons ======== -->
            <!-- Insert Button -->
            <div class="col-3">
                <button type="submit" class="btn btn-success submit" name="insert">Insert</button>
            </div>
            <!-- Update Button -->
            <div class="col-3">
                <button type="submit" class="btn btn-warning submit" name="groupby">GroupBy</button>
            </div>
            <!-- Delete Button -->
            <div class="col-3">
                <a href="../Pages/delete.php" type="submit" class="btn btn-danger submit" name="delete">Delete</a>
            </div>
            <!-- View Button -->
            <div class="col-3">
                <button type="submit" class="btn btn-primary submit" name="view">OrderBy</button>
            </div>
        </form>
        <br><br><br>


        <!-- TABLE -->
        <?php
viewTable( $conn );
?>
<?php
groupby( $conn );
?>
    </div>  <!-- Container Div End Here -->
<!-- JavaScript -->
<script src='../JS/JavaScript.js'></script>
</body>
</html>