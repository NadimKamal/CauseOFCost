<?php
// ======== Table's Individual Delete Button's Delete Activity Start Here ON index.php Page ========

if ( isset( $_GET['deleteinfo'] ) ) {
    $sl = $_GET['deleteinfo'];

    $sql = "DELETE FROM crud WHERE slno = $sl";
    if ( mysqli_query( $conn, $sql ) ) {
        echo "<script> alert('Data Deleted Successfully.')</script>";
    } //Ending of Individual Data Deleted Successfully If Condition on Delete Button
    else {
        echo "Error deleting record: ".mysqli_error( $conn );
    } //Ending of Deleting Error Else Condition on Delete Button

    //mysqli_close($conn);
    header( 'location:index.php' );
} //Ending of Isset-If Condition on Individual Delete Button

?>