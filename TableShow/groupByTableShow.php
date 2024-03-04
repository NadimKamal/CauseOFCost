<?php
require_once '../Conn/connection.php';

// ======== Select Year Function's Activity Start Here ON groupByTableShow.php Page ========
//  ===== This selectyear() function also works in viewTableQuery file. =====
function selectyear() {
    if ( isset( $_POST['groupby'] ) || isset( $_POST['view'] ) ) {
        $year = $_POST['years'];
        echo "<option class='yearvalue' value='$year'>$year</option>";
    } //Ending Of If Condition For Fixed Year On Year Select Field
} //Ending Of selectyear() Function For GroupBy and View(OrderBy) Buttons ON Index.php Page

//  ===== This selectmonth() function also works in viewTableQuery file. =====
function selectmonth() {
    if ( isset( $_POST['groupby'] ) || isset( $_POST['view'] ) ) {
        $month = $_POST['allmonth'];
        echo "<option class='monthvalue' value='$month'>$month</option>";
    } //Ending Of If Condition For Fixed Month On Month Select Field
} //Ending Of selectmonth() Function For GroupBy and View(OrderBy) Buttons ON Index.php Page

function groupby( $conn ) {
    if ( isset( $_POST['groupby'] ) ) {
        $year = $_POST['years'];
        $month = $_POST['allmonth'];
        $start = $year.'-'.$month.'-'.'01';
        $end = $year.'-'.$month.'-'.'31';

        if ( empty( $year ) || empty( $month ) ) {
            echo "<script>alert('Select Date and Month To See Group By Data.')</script>";
        } //Ending of Empty-Year-Month If Condition on GroupBy Button
        else {
            $sql = "SELECT date, SUM(taka) AS taka FROM crud WHERE date BETWEEN '$start' AND '$end' GROUP BY date ORDER BY date asc";
            $result = mysqli_query( $conn, $sql );

            echo "<table class='table'>
                    <thead>
                        <tr>
                            <th scope='col'>Day(Count)</th>
                            <th scope='col'>Date</th>
                            <th scope='col'>Total Cost</th>
                        </tr>
                    </thead>
                    <tbody>";
            $rowResult = 0;
            if ( mysqli_num_rows( $result ) > 0 ) {
                $individualDay = 1;
                while ( $row = mysqli_fetch_assoc( $result ) ) {
                    $date = $row['date'];
                    $taka = $row['taka'];
                    echo "<tr>
                        <th scope='row'>$individualDay</th>
                        <td>$date</td>
                        <td>$taka</td>
                    </tr>";
                    $individualDay++;
                    $rowResult++;
                } //Ending Of While loop
                echo "<p><b class='pb'>$rowResult Results</b></p>";

            } //Ending Of while loop's If
            else {
                echo "<p><b class='pb'>$rowResult Results</b></p>";
            } //Ending Of  While Loop's Else
            echo "</tbody>
            </table>";
            //mysqli_close( $conn );
        } //Ending of Empty-Year-Month Else Condition on GroupBy Button
    } //Ending of Isset-If Condition on GroupBy Button
} //Ending Of groupby() Function
?>