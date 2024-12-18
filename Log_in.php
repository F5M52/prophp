<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>log_in</title>
    <link rel="stylesheet" href="style3.css">
</head>
<body>
<div class="box">
<h1 class="h1">log_in</h1>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
    <label class="textbar1" for="textbar1">Enter Username or Email:</label><br>
    <input class="username" name="user" type="text" placeholder="Username or Email"><br><br><br><br>

    <label class="textbar2" for="textbar2">Enter Password:</label><br>
    <input class="pws" name="pws" type="password" placeholder="Password"><br><br>

    <input class="sub" type="submit" name="sub" value="log_in">
</form>
<a href="register.php">Sign-up Here</a>

<?php
include 'sqql.php';
session_start();

$username = "";
$password = "";
$errors = array();
$_SESSION['success'] = "";


if (isset($_POST['sub'])) {
    $username = mysqli_real_escape_string($conn, $_POST['user']);
    $password = mysqli_real_escape_string($conn, $_POST['pws']);
    
    // التحقق من المدخلات
    if (empty($username)) {
        array_push($errors, "Username or Email is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }

    // إذا لم يكن هناك أخطاء
    if (count($errors) == 0) {
        // التحقق من اسم المستخدم أو البريد الإلكتروني
        $query = "SELECT * FROM users WHERE uname='$username' OR email='$username' LIMIT 1";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) == 1) {
            // إذا كان هناك مستخدم مطابق
            $user = mysqli_fetch_assoc($result);
            // التحقق من كلمة المرور باستخدام password_verify()
            if (password_verify($password, $user['pass'])) {
                // كلمة المرور صحيحة
                $_SESSION['user'] = $user['uname'];
                $_SESSION['level'] =  $user['level'];
                $_SESSION['success'] = "Logged in successfully";
                header('location: home2.php'); // Redirect إلى الصفحة الرئيسية بعد تسجيل الدخول
                exit();
            } else {
                array_push($errors, "Incorrect password");
            }
        } else {
            array_push($errors, "No user found with that username or email");
        }
    }
}

if (count($errors) > 0) {
    foreach ($errors as $error) {
        echo "<p style='color:red;'>$error</p>";
    }

    // رابط للتوجه إلى صفحة التسجيل في حال عدم وجود حساب
    echo "<p>If you don't have an account, <a href='register.php'>Register here</a>.</p>";
}
?>

</div>
</body>
</html>
