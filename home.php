<?php
session_start();
if (!isset( $_SESSION['user'])) {
    header("Location: Log_in.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>omar</title>
</head>
<body>
<?php echo 'welcome ' .$_SESSION['user'];?>

 <br><br> 

<button  style="margin:  10px 30px 0px 30px;padding: 15px;" ><a style="color: black;text-decoration: none;" href="log_out.php">logout?</a></button>

<div align="center">
    <fieldset align="center" style="width:70%">
        <form action="home.php" method="post" enctype="multipart/form-data">
            <label>Brand: </label>
            <select name="brand">
                <option value="sl">Select</option>
                <?php
                include 'sqql.php';
                $sql = "SELECT * FROM brands";
                $query = $conn->query($sql);

                if ($query) {
                    while ($row = $query->fetch_row()) {
                        echo "<option value='" . $row[0] . "'>" . $row[1] . "</option>";
                    }
                } else {
                    echo "<option>Error loading brands</option>";
                }

                $conn->close();
                ?>
            </select>
            <br><br>

            <label>المقاسات</label><br>
            <input type="radio" name="size" value="32"><label>32</label>
            <input type="radio" name="size" value="27"><label>27</label>
            <input type="radio" name="size" value="24"><label>24</label>
            <br><br>

            <label>الهرتز</label><br>
            <select name="hz">
                <option>اختار الهرتز</option>
                <option>60</option>
                <option>120</option>
                <option>144</option>
                <option>220</option>
                <option>240</option>
            </select>
            <br>

            <label>الدقه</label><br>
            <select name="qc">
                <option>اختار الدقه</option>
                <option>Full HD</option>
                <option>1920x1080 بكسل</option>
                <option>4k</option>
                <option>3840x2160 بكسل</option>
                <option>2k</option>
            </select>
            <br><br>

            <label>تفاصيل</label>
            <input type="text" name="note">
            <br><br>

            <label for="صوره">صورة الشاشه</label>
            <input type="file" name="image">
            <br><br>

            <input type="submit" name="submit" value="Submit">
        </form>
    </fieldset>
</div>
</body>
</html>
<?php
if (isset($_POST["submit"])) {
            $file_loc = 'img/';
            $filename = basename($_FILES["image"]["name"]);
            $path = $file_loc . time() . '-' . $filename;

            if (move_uploaded_file($_FILES["image"]["tmp_name"], $path)) {
                include 'sqql.php';

               
                $size = $_POST['size'];
                $hz = $_POST['hz'];
                $qc = $_POST['qc'];
                $note = $_POST['note'];
                $brnd = $_POST['brand'];

                $sql = "INSERT INTO home (size, hz, qc, note, image, bno) VALUES ('$size', '$hz', '$qc','$note', '$path', '$brnd')";

                if ($conn->query($sql) === TRUE) {
                    echo "info has been inserted.";
                } else {
                    echo "Error: " . $conn->error;
                }
                $conn->close();
            } else {
                echo "Error uploading the file.";
            }
        }
        ?>
