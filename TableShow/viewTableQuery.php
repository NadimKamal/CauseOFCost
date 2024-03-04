<?php
/* =====  selectyear() and selectmonth() function created in groupByTableShow.php file.
Which are placed on index.html file's Select tag  ===== */

// ======== View Table Function Start Here ========
function viewTable( $conn ) {
    if ( isset( $_POST['view'] ) ) {
        $year = $_POST['years'];
        $month = $_POST['allmonth'];
        $start = $year.'-'.$month.'-'.'01';
        $end = $year.'-'.$month.'-'.'31';
        if ( empty( $year ) || empty( $month ) ) {
            echo "<script>alert('Select Date and Month To See Order By Data.')</script>";
        } ////Ending of Empty-Year-Month If Condition on OrderBy Button
        else {
            $sql = "SELECT slno, date, taka, CauseOfCost FROM crud WHERE date BETWEEN '$start' AND '$end' ORDER BY date asc";
            $result = mysqli_query( $conn, $sql );
            echo "<table class='table'>
                    <thead>
                        <tr>
                            <th scope='col'>slno</th>
                            <th scope='col'>Date</th>
                            <th scope='col'>Taka</th>
                            <th scope='col'>CauseOfCost</th>
                            <th scope='col'>Update</th>
                            <th scope='col'>Delete</th>
                        </tr>
                    </thead>
                    <tbody>";
            $rowResult = 0;
            if ( mysqli_num_rows( $result ) > 0 ) {
                // output data of each row
                while ( $row = mysqli_fetch_assoc( $result ) ) {
                    $sl = $row['slno'];
                    $date = $row['date'];
                    $taka = $row['taka'];
                    $coc = $row['CauseOfCost'];
                    echo "<tr>
                        <th scope='row'>$sl</th>
                        <td>$date</td>
                        <td>$taka</td>
                        <td>$coc</td>
                        <td><a href='update.php?updateinfo=$sl' class ='btn btn-warning UpdateButton'>Update</a></td>
                        <td><a href='index.php?deleteinfo=$sl' class ='btn btn-danger DeleteButton'>Delete</a></td>
                    </tr>";
                    $rowResult++;
                } //Ending Of while Loop
                echo "<p class='pb'><b>$rowResult Results</b></p>";
            } //Ending Of while loop's If
            else {
                echo "<p class='pb'><b>$rowResult Results</b></p>";
            } //Ending Of  While Loop's Else
            echo "</tbody>
            </table>";
            //mysqli_close($conn);
        } //Ending of Empty-Year-Month Else Condition on OrderBy Button
    } //Ending of Isset-If Condition on OrderBy Button
} //Ending Of viewTable() Function

?>