<?php
require "header.php";
?>

<header class="header">
    <div class="row">
        <div class="col-md-12 text-center">
   <a class="logo"><img src="" alt="logo"></a>
   </div>
        <div class="col-md-12 text-center">
            <button style="margin-top:200px; "; type="button" onclick="window.location.href='reservation.php'" class="btn btn-outline-light btn-lg"><em>Make a Reservation Now!</em></button>
        </div>
    </div>
</header>



<!--about us section-->

<!----end of gallery -->

<br><br>


<?php

if (isset($_POST['check_schedule'])) {

    require 'includes/dbh.inc.php';

    $date = $_POST['date'];

    $sql = "SELECT * FROM schedule WHERE date = '$date'";
    $result = $conn->query($sql);
    if ($result->num_rows == 1) {
        while ($row = $result->fetch_assoc()) {
            echo "
                <table class='table table-sm table-striped table-dark text-center'>
                   <thead>
                    <tr>
                    <th scope='col'>Date</th>
                    <th scope='col'>Open Time</th>
                    <th scope='col'>Close Time</th>
                    </tr>
                   </thead>
                   <tbody>
                    <tr>
                    <th scope='row'><em>" . $date . "</em></th>
                    <td>" . $row['open_time'] . "</td>
                    <td>" . $row['close_time'] . "</td>
                    </tr>
                   </tbody>
                </table>";
        }
    } else {
        echo "
                <table class='table table-striped table-dark text-center'>
                   <thead>
                    <tr>
                    <th scope='col'>Date</th>
                    <th scope='col'>Open Time</th>
                    <th scope='col'>Close Time</th>
                    </tr>
                   </thead>
                   <tbody>
                    <tr>
                    <th scope='row'><em>" . $date . "</em></th>
                    <td>12:00</td>
                    <td>00:00</td>
                    </tr>
                   </tbody>
                </table>";
    }

    //close connection
    mysqli_close($conn);
}
?>

<?php

?>