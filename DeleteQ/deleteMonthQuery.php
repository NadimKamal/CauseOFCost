<?php
require_once '../Conn/connection.php';

// ======== Delete Month's Deleting Activity Start Here ON deleteall.php Page ========
if ( isset( $_POST['deleteMonth'] ) ) {

    $year = $_POST['years'];
    $month = $_POST['allmonth'];
    $start = $year."-".$month."-"."01";
    $end = $year."-".$month."-"."31";
    if ( empty( $year ) || empty( $month ) ) {
        echo "<script>alert('Select Year and Month Before Delete Month.')</script>";
    } //Ending of Empty-Year-Month If Condition on Delete Month Button
    else {
        $sql = "DELETE FROM crud WHERE date BETWEEN '$start' AND '$end'";

        if ( mysqli_query( $conn, $sql ) ) {
            echo "<script>alert('Month Deleted Successfully')</script>";
        } //Ending of Month Deleted Successfully If Condition on Delete Month Button
        else {
            echo "Error deleting record: ".mysqli_error( $conn );
        } //Ending of Deleting Month Error Else Condition on Delete Month Button
        header( 'location:deleteall.php' );
    }
} //Ending of Isset-If Condition on Delete Month Button

?>