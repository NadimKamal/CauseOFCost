<?php
require_once '../Conn/connection.php';
require_once '../TableShow/deleteAllTableShow.php';
require_once '../DeleteQ/deleteAllQuery.php';
?>
<!-- ======== PHP End Here ======== -->
<!-- ======== HTML Start Here ======== -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DeleteDate</title>
    <!-- CSS -->
    <link rel="stylesheet" href="../CSS/bootstrap.min.css">
    <link rel="stylesheet" href="../CSS/sajuguju.css">
    <link rel="stylesheet" href="../CSS/deletePHP.css">
</head>
<body>
    <div class="container">
        <form class="row g-3" method="post" action="">
            <!-- Year -->
            <div class="col-md-3">
                <label class="col-md-3 form-label label">1. Year:</label>
                <select name="years" id="years" class="dates">
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
            <div class="col-md-3">
                <label class="col-md-3 form-label label" name="datelabel">2. Month:</label>
                <select name="allmonth" id="allmonth" class="dates">
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
            <!-- Find Data Button -->
            <div class="col-3">
                <button type="submit" class="btn btn-dark FindButton" name="finddate">Find Date</button>
            </div>
            <div class="col-md-3">
                <label class="col-md-3 form-label label" name="datelabel">3. Date:</label>
                <select name="dates" id="dates" class="dates">
                    <?php selectDate();?>
                    <option class="datevalue" value="">Select</option>
                    <?php
if ( isset( $_POST['finddate'] ) ) {
    while ( $row = mysqli_fetch_assoc( $result ) ) {
        ?>
                    <option class="datevalue" value="<?php echo $row['date']; ?>"><?php echo $row['date']; ?></option>
                    <?php
}
}
?>
                </select>
  </div>

  <br><br><br><br>


            <!-- ======== Buttons ======== -->
            <!-- Insert Button -->
            <div class="col-3">
                <a href='../Pages/index.php' type="submit" class="btn btn-success submit" name="home">Home</a>
            </div>
            <!-- See Data Button -->
            <div class="col-3">
                <button type="submit" class="btn btn-warning submit" name="seedata">See Data</button>
            </div>
            <!-- Delete Button -->
            <div class="col-3">
                <button type="submit" class="btn btn-danger submit" name="deletedate">Delete Date</button>
            </div>
            <!-- Delete Button -->
            <div class="col-3">
                <a href='../Pages/deleteall.php' type="submit" class="btn btn-primary submit" name="deleteall">Delete All</a>
            </div>
            <!-- View Button -->
            <!-- <div class="col-3">
                <button type="submit" class="btn btn-primary submit" name="view">CocSee</button>
            </div> -->
        </form>
<br><br><br>

        <!-- TABLE -->
        <?php
viewdata( $conn );
?>

    </div>  <!-- Container Div End Here -->
<!-- JavaScript -->
<script src='../JS/JavaScript.js'></script>
</body>
</html>