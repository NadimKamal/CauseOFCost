<?php
require_once '../Conn/connection.php';

// ======== Find Date Button's Finding Activity Start Here ON delete.php Page ========
if ( isset( $_POST['finddate'] ) ) {
    $year = $_POST['years'];
    $month = $_POST['allmonth'];
    $start = $year.'-'.$month.'-'.'01';
    $end = $year.'-'.$month.'-'.'31';
    if ( empty( $year ) || empty( $month ) ) {
        echo "<script>alert('Select Year and Month Before Find Date.')</script>";
    } //Ending of Empty-Year-Month If Condition on Find Date Button
    else {
        $query = "SELECT DISTINCT date FROM crud WHERE date BETWEEN '$start' AND '$end' ORDER BY date";
        $result = mysqli_query( $conn, $query );
    } //Ending of Empty-Year-Month Else Condition on Find Date Button
} //Ending of Isset-If Condition on Find Date Button

// ======== Delete Date Button's Delete Activity Start Here ON delete.php Page ========
if ( isset( $_POST['deletedate'] ) ) {
    $date = $_POST['dates'];
    if ( empty( $date ) ) {
        echo "<script>alert('At First Find Date, then Select Date Before Delete Date.')</script>";
    } //Ending of Empty-Date-If Condition on Delete Date Button
    else {
        $query = "DELETE FROM crud WHERE date='$date'";
        if ( mysqli_query( $conn, $query ) ) {
            echo "<script>alert('Date Deleted Successfully')</script>";
        } //Ending of Date Deleted Successfully If Condition on Delete Date Button
        else {
            echo "Error deleting record: ".mysqli_error( $conn );
        } //Ending of Deleting Error Else Condition on Delete Date Button

        header( 'location:delete.php' );
    } //Ending of Empty-Date-Else Condition on Delete Date Button
} //Ending of Isset-If Condition on Delete Date Button
