<?php
// ======== Insert Button's Insert Activity Start Here ON index.php page ========
if ( isset( $_POST["insert"] ) ) {
    $date = $_POST["date"];
    $taka = $_POST["taka"];
    $coc = $_POST["coc"];
    if ( empty( $date ) || empty( $taka ) || empty( $coc ) ) {
        echo "<script>alert('Date-Taka-Cost Fields are Must Be Fillable Before Insertion.')</script>";
        // $_SESSION['status'] = "Date-Taka-Cost fields are mandatory.";
        // header( "location:index.php" );
    } //Ending of Empty-Date-Taka-COC If Condition on Insert Button
    else {
        $sql = "INSERT INTO crud (date, taka, CauseOfCost)
    VALUES('$date', '$taka', '$coc')";

        if ( mysqli_query( $conn, $sql ) ) {
            echo "<script> alert('New record created successfully') </script>";
        } //Ending of Successfully Inserted If Condition on Insert Button
        else {
            echo "Error: ".$sql."<br>".mysqli_error( $conn );
        } //Ending of Insertion Error Else Condition on Insert Button
        mysqli_close( $conn );
        header( "location:index.php" );
    } //Ending of Empty-Date-Taka-COC Else Condition on Insert Button
} //Ending of Isset-If Condition on Insert Button

?>