<?php
require_once '../Conn/connection.php';

// ======== Select Year Function's Activity Start Here ON delete.php Page ========
function selectyear() {
    if ( isset( $_POST['finddate'] ) || isset( $_POST['seedata'] ) ) {
        $year = $_POST['years'];
        echo "<option class='datevalue' value='$year'>$year</option>";
    } //Ending Of If Condition For Fixed Year On Year Select Field
} //Ending Of selectyear() Function For Find Date and See Data Buttons

// ======== Select Month Function's Activity Start Here ON delete.php Page ========
function selectmonth() {
    if ( isset( $_POST['finddate'] ) || isset( $_POST['seedata'] ) ) {
        $month = $_POST['allmonth'];
        echo "<option class='datevalue' value='$month'>$month</option>";
    } //Ending Of If Condition For Fixed Month On Month Select Field
} //Ending Of selectmonth() Function For Find Date and See Data Buttons

if ( isset( $_POST['finddate'] ) ) {

    $year = $_POST['years'];
    $month = $_POST['allmonth'];
    $start = $year.'-'.$month.'-'.'01';
    $end = $year.'-'.$month.'-'.'31';
    if ( empty( $year ) || empty( $month ) ) {
        echo "<script></script>";
    } //Ending of Empty-Year-Month If Condition on Find Date Button
    else {
        $query = "SELECT DISTINCT date FROM crud WHERE date BETWEEN '$start' AND '$end' ORDER BY date";
        $result = mysqli_query( $conn, $query );
    } //Ending of Empty-Year-Month Else Condition on Find Date Button
} //Ending of Isset-If Condition on Find Date Button

// ======== Select Date Function's Activity Start Here ON delete.php Page ========
function selectDate() {
    if ( isset( $_POST['seedata'] ) ) {
        $date = $_POST['dates'];
        echo "<option class='datevalue' value='$date'>$date</option>";
    } //Ending Of If Condition For Fixed Date On Date Select Field
} //Ending Of selectDate() Function For See Data Button

// ======== viewdata() Function's Activity Start Here ON delete.php Page ========
function viewdata( $conn ) {

    if ( isset( $_POST['seedata'] ) ) {

        // $year = $_POST['years'];
        // $month = $_POST['allmonth'];
        // $start = $year.'-'.$month.'-'.'01';
        // $end = $year.'-'.$month.'-'.'31';
        // $result = resultpass( $result );
        $date = $_POST['dates'];
        if ( empty( $date ) ) {
            echo "<script>alert('At First Find Date, then Select Date Before See Data.')</script>";
        } //Ending of Empty-Date If Condition on See Data Button
        else {

            $sql = "SELECT slno, date, taka, CauseOfCost FROM crud WHERE date ='$date' ORDER BY slno";
            $result = mysqli_query( $conn, $sql );
            echo "<table class='table'>
                    <thead>
                        <tr>
                            <th scope='col'>slno</th>
                            <th scope='col'>Date</th>
                            <th scope='col'>Taka</th>
                            <th scope='col'>CauseOfCost</th>
                        </tr>
                    </thead>
                    <tbody>";

            $rowResult = 0;
            if ( mysqli_num_rows( $result ) > 0 ) {
                while ( $row = mysqli_fetch_assoc( $result ) ) {
                    $sl = $row['slno'];
                    $taka = $row['taka'];
                    $coc = $row['CauseOfCost'];
                    echo "<tr>
                        <th scope='row'>$sl</th>
                            <td>$date</td>
                            <td>$taka</td>
                            <td>$coc</td>
                        </tr>";
                    $rowResult++;
                } //Ending Of While Loop
                // echo "<p class='pb'><b>$rowResult Results</b></p>";
            } //Ending Of while loop's If
            else {
                echo "<p class='pb'><b>$rowResult Result</b></p>";
            } //Ending Of  While Loop's Else
            echo "</tbody>
                </table>";
        } //Ending of Empty-Date Else Condition on See Data Button
    } //Ending of Isset-If Condition on See Data Button
} //Ending Of viewdata() Function

?>