<?php  
    include 'sqql.php';
    session_start();  

    // التحقق من أن المستخدم قام بتسجيل الدخول
    if (isset($_SESSION['user']) && isset($_SESSION['level'])) {
        $username = $_SESSION['user'];  // اسم المستخدم
        // جلب مستوى المستخدم من الجلسة
        $user_level = $_SESSION['level'];  // مستوى المستخدم من الجلسة
    } else {
        $user_level = 0;  // إذا لم يكن هناك مستخدم مسجل في الجلسة أو لم يتم تعيين المستوى
    }

    // استعلام لجلب البيانات من جدول 'home'
    $sql = "SELECT size, hz, qc, note, image, bno, `no` FROM home"; 
    $query = $conn->query($sql);

     echo 'welcome ' .$_SESSION['user'];
     echo "<br> <br>";
     echo '<button  style="margin:  10px 30px 0px 30px;padding: 15px;" ><a style="color: black;text-decoration: none;" href="log_out.php">logout?</a></button>';

    if ($query && $query->num_rows > 0) {
        echo '<table>';
        echo '<tr><th>Brand</th><th>Screens</th><th>Image</th><th>Details</th>';

        // التحقق من مستوى المستخدم وعرض زر Delete فقط إذا كان المستخدم Admin (level 1)
        if ($user_level == 1) {
            echo '<th>Delete</th>';
        }

        echo '</tr>';

        // عرض البيانات
        while ($row = $query->fetch_row()) {
            $sqll = "SELECT bname FROM brands WHERE bno = " . $row[5];
            $query1 = $conn->query($sqll);
            $row1 = $query1->fetch_assoc();

            echo '<tr align="center">';
            echo '<td>' . $row1["bname"] . '</td>';
            echo '<td>' . $row[0] . '</td>';
            echo '<td><img src="' . $row[4] . '" width="50" height="60"></td>';
            echo '<td><a href="Details.php?no=' . $row[6] . '"><button>Details</button></a></td>';

            // عرض زر Delete فقط إذا كان المستخدم Admin (level 1)
            if ($user_level == 1) {
                echo '<td><a href="Delete.php?no=' . $row[6] . '" onclick="return confirm(\'Are you sure you want to delete this?\');"><button>Delete</button></a></td>';
            }
            

            echo '</tr>';
        }

        echo '</table>';
    } else {
        echo "No records found.";
        
    }

    if ($user_level == 1) {
    echo '<button  style="margin:  10px 30px 0px 30px; padding: 15px;" ><a style="color: black;text-decoration: none;" href="home.php">home</a></button>'; 
}
    $conn->close();  // إغلاق الاتصال بقاعدة البيانات
?>
