<!DOCTYPE html>
<html>
<body>
    <?php
    if (isset($_GET['no'])) {
        $no = $_GET['no'];

    include 'sqql.php';


        $sql = "SELECT * FROM home WHERE no=$no";
        $query = mysqli_query($conn, $sql);

        if ($query) {
            echo '<table>';
            $rslt = mysqli_fetch_assoc($query);
            echo '<tr><th colspan="2"><span>All Details</span></th></tr>';
            echo '<tr><td>Size:</td><td>' . $rslt['size'] . '</td></tr>';
            echo '<tr><td>hz:</td><td>' . $rslt['hz'] . '</td></tr>';
            echo '<tr><td>Screen resolution:</td><td>' . $rslt['qc'] . '</td></tr>';
            echo '<tr><td>note:</td><td>' . $rslt['note'] . '</td></tr>';
            echo '<tr><td colspan="2"><img width="150" height="150" src="' . $rslt['image'] . '"></td></tr>';
            echo '</table>';
        }

        mysqli_close($conn);
    }
    ?>
</body>
</html>
