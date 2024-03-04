<?php
// ======== Table's Individual Update Button's Update Activity Start Here ON index.php Page ========

if ( isset( $_GET['updateinfo'] ) ) {
    $sl = $_GET['updateinfo'];
    $sql = "SELECT date, taka, CauseOfCost FROM crud where slno = $sl";
    $result = mysqli_query( $conn, $sql );
    $row = mysqli_fetch_assoc( $result );
    $date = $row['date'];
    $taka = $row['taka'];
    $coc = $row['CauseOfCost'];

    /*
$date = $_GET['date']; //get date from url
$taka = $_GET['taka']; //get taka from url
$coc = $_GET['coc']; //get coc from url
 */
} //Ending Of GET Variable (From URL) If Condition On Update Button

if ( isset( $_POST['update'] ) ) {
    $date = $_POST['date'];
    $taka = $_POST['taka'];
    $coc = $_POST['coc'];
    $sl = $_GET['updateinfo']; //get slno from url

    if ( empty( $date ) || empty( $taka ) || empty( $coc ) ) {
        echo "<script>alert('Date-Taka-Cost Fields are Must Be Fillable Before Update.')</script>";
    } //Ending of Empty-Date-Taka-COC If Condition on Update Button
    else {
        $sql = "UPDATE crud SET date = '$date', taka = '$taka', CauseOfCost = '$coc' WHERE slno = '$sl'";

        if ( mysqli_query( $conn, $sql ) ) {
            echo "<script>alert('Data Updated Successfully')</script>";
        } //Ending of Successfully Updated If Condition on Update Button
        else {
            echo "Error updating record: ".mysqli_error( $conn );
        } //Ending of Updating Error Else Condition on Update Button
        mysqli_close( $conn );
        header( 'location:update.php' );
    } //Ending of Empty-Date-Taka-COC Else Condition on Update Button
} //Ending of Isset-If Condition on Update Button

?>