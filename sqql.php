<?php
$conn = new mysqli("localhost","root","","project");

if ($conn->connect_error) {
    die ("Error. connect failed : " . $conn->connect_error);
}
?>