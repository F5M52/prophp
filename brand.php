<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Brand</title>
</head>
<body>
    <?php
    if (isset($_POST["submit"])) {
        $brand = $_POST['brand'];
        
     
        include 'sqql.php';

        $sql = "INSERT INTO brands (bname) VALUES ('$brand')";

        if ($conn->query($sql) === TRUE) {
            echo "Brand has been inserted";
        } else {
            echo "Error: " . $conn->error;
        }
        $conn->close();
    }
    ?>
    <legend> <h1>Add Brand</h1> </legend>
    <form action="brand.php" method="post">
    <input type="text" name="brand" placeholder="Brand"><br><br>
        <input type="submit" name="submit" value="INSERT">
    </form>
</body>
</html>
