<?php
require_once '../Conn/connection.php';

// ======== Select Year Function's Activity Start Here ON deleteall.php Page ========
function selectYear() {
    if ( isset( $_POST['seeMonthData'] ) ) {
        $year = $_POST['years'];
        echo "<option class='yearvalue' value='$year'>$year</option>";
    } //Ending Of If Condition For Fixed Year On Year Select Field
} //Ending Of selectYear() Function For See-Month-Data Button

// ======== Select Year Function's Activity Start Here ON deleteall.php Page ========
function selectMonth() {
    if ( isset( $_POST['seeMonthData'] ) ) {
        $month = $_POST['allmonth'];
        echo "<option class='monthvalue' value='$month'>$month</option>";
    } //Ending Of If Condition For Fixed Month On Month Select Field
} //Ending Of selectMonth() Function For See-Month-Data Button

// ======== viewTable() Function's Activity Start Here ON deleteall.php Page ========
function viewTable( $conn ) {
    if ( isset( $_POST['seeMonthData'] ) ) {
        $year = $_POST['years'];
        $month = $_POST['allmonth'];

        $start = $year."-".$month."-01";
        $end = $year."-".$month."-31";

        if ( empty( $year ) || empty( $month ) ) {
            echo "<script>alert('Date and Month Must Be Selected Before See Data.')</script>";
        } //Ending of Empty-Year-Month If Condition on See-Month-Data Button
        else {
            $query = "SELECT * FROM crud WHERE date BETWEEN '$start' AND '$end' ORDER BY date";
            $result = mysqli_query( $conn, $query );
            echo "<table class='table'>
                    <thead>
                        <tr>
                            <th scope='col'>#</th>
                            <th scope='col'>Date</th>
                            <th scope='col'>Taka</th>
                            <th scope='col'>CauseOfCost</th>
                        </tr>
                    </thead>
                    <tbody>";
            $rowResult = 0;
            $serialNumber = 1;
            if ( mysqli_num_rows( $result ) > 0 ) {
                while ( $row = mysqli_fetch_assoc( $result ) ) {
                    $date = $row['date'];
                    $taka = $row['taka'];
                    $coc = $row['CauseOfCost'];
                    echo "<tr>
                        <th scope='row'>$serialNumber</th>
                            <td>$date</td>
                            <td>$taka</td>
                            <td>$coc</td>
                        </tr>";
                    $rowResult++;
                    $serialNumber++;
                } //Ending Of While Loop
                echo "<p class='pb'><b>$rowResult Results</b></p>";
            } //Ending Of while loop's If
            else {
                echo "<p class='pb'><b>$rowResult Result</b></p>";
            } //Ending Of  While Loop's Else
            echo "</tbody>
                </table>";
        } //Ending of Empty-Year-Month Else Condition on See-Month-Data Button
    } //Ending of Isset-If Condition on See-Month-Data Button
} //Ending Of viewTable() Function

?>