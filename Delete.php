<?php
 if (isset($_GET['no'])) {
    $no = $_GET['no'];
include 'sqql.php';

    $sql="delete from home where no=$no";
if ($conn->query($sql)){
 
echo'<script>
alert("product successfully deleted");
window.location.href ="home2.php";
</script>';
header('locatinon: home2.php');
mysqli_close($conn);
}

 }
?>