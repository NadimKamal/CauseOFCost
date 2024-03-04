<?php
require_once '../Conn/connection.php';
require_once '../UpdateQ/updateDataQuery.php';
?>
<!-- ======== PHP End Here ======== -->
<!-- ======== HTML Start Here ======== -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UpdateData</title>
    <!-- CSS -->
    <link rel="stylesheet" href="../CSS/bootstrap.min.css">
    <link rel="stylesheet" href="../CSS/sajuguju.css">
</head>
<body>
    <div class="container">
        <form class="row g-3" method="post" action="">
            <!-- TopLabel    -->
            <div class="col-md-12">
                <label class="form-label toplabel" id="toplabel"></label>
            </div>
            <!-- Date -->
            <div class="col-md-6">
                <label class="form-label label">Date</label>
                <input type="date" class="form-control input" id="date" name="date" value="<?php echo @$date ?>">
            </div>
            <!-- Taka -->
            <div class="col-md-6">
                <label class="form-label label">Taka</label>
                <input type="text" class="form-control input" id="taka" name="taka" value="<?php echo @$taka ?>">
            </div>
            <!-- CauseOFCost -->
            <div class="col-md-12">
                <label class="form-label label">CauseOfCost</label>
                <input type="text" class="form-control input" id="coc" name="coc" value="<?php echo @$coc ?>">
            </div>

            <!-- ======== Buttons ======== -->
            <!-- Insert Button -->
            <div class="col-3">
                <a href='../Pages/index.php' type="submit" class="btn btn-success submit" name="home">Home</a>
            </div>
            <!-- Update Button -->
            <div class="col-3">
                <button type="submit" class="btn btn-warning submit" name="update">Update</button>
            </div>
            <!-- Delete Button -->
            <!-- <div class="col-3">
                <button type="submit" class="btn btn-danger submit" name="delete">Delete</button>
            </div> -->
            <!-- View Button -->
            <!-- <div class="col-3">
                <button type="submit" class="btn btn-primary submit" name="view">CocSee</button>
            </div> -->
        </form>


        <!-- TABLE -->
    </div>  <!-- Container Div End Here -->
<!-- JavaScript -->
<script src='./JS/JavaScript.js'></script>
</body>
</html>