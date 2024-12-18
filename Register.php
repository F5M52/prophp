<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="style3.css">
</head>
<body>
<div class="box">
<h1 class="h1">Register</h1>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
    <label for="name">Enter Name:</label><br>
    <input class="name" name="name" type="text" placeholder="Name"><br><br>

    <label for="email">Enter Email:</label><br>
    <input class="email" name="email" type="text" placeholder="Email"><br><br>

    <label for="password">Enter Password:</label><br>
    <input class="pws" name="password" type="password" placeholder="Password"><br><br>

    <label for="repassword">Re-enter Password:</label><br>
    <input class="repassword" name="repassword" type="password" placeholder="Re-enter Password"><br><br>

    <input class="sub" type="submit" name="sub" value="Register">
</form>
<a href="log_in.php">Sign in Here</a>

<?php
include 'sqql.php';
session_start();

$name = "";
$email = "";
$password = "";
$repassword = "";
$errors = array();
$_SESSION['success'] = "";


if (isset($_POST['sub'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $repassword = mysqli_real_escape_string($conn, $_POST['repassword']);

    // التحقق من المدخلات
    if (empty($name)) {
        array_push($errors, "Name is required");
    }
    if (empty($email)) {
        array_push($errors, "Email is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }
    if ($password !== $repassword) {
        array_push($errors, "Passwords do not match");
    }

    //
    $maxpass_length =32;
    $minpass_length =8;
    $pass_length = Strlen(trim($password));
    
    if ($pass_length < $minpass_length){
    
        array_push($errors, "The password must be at least 8 in length");
    
    }
    elseif ($pass_length > $maxpass_length ){
    
        array_push($errors, "The password must not be more than 32 in length");
    
    }
    //  نحقق من الباس اول حرف كابتل 
    $patternpass = "/^[a-zA-Z0-9_]+$/";
    if (!preg_match($patternpass,$password)){

        array_push($errors, "The password must contain letters from A to Z, and it can be uppercase letters and numbers");

    }
     // تحقق من الايميل 
    $pattern = "/^[a-zA-Z0-9._-]+@(outlook|gmail|yahoo).com$/";
    if (!preg_match($pattern,$email)){

        array_push($errors, "تحقق من كتابة الايمبل بشكل صحيح");
    
    } 
    //عدم تكرار اليوزر
    $vilusername = "SELECT uname FROM users WHERE uname='$name'";
   $resultusername = mysqli_query($conn,$vilusername);


   if (mysqli_num_rows($resultusername) > 0) {

       array_push($errors, "username  is taken");
   }

   //الايميل لا يتكرر
   $vilemail = "SELECT * FROM users WHERE email='$email'";
    $resultemail = mysqli_query($conn, $vilemail);

    if (mysqli_num_rows($resultemail) > 0) {
        array_push($errors, "email is taken");
    }

    // تنفيذ عملية التسجيل إذا لم توجد أخطاء
    if (count($errors) == 0) {
        $hashed_password = password_hash($password, PASSWORD_BCRYPT); // تشفير كلمة المرور
        $query = "INSERT INTO users (uname, pass, email, level) VALUES ('$name', '$hashed_password', '$email', 0)";

        if (mysqli_query($conn, $query)) {
            $_SESSION['user'] = $name;
            $_SESSION['success'] = "Registration successful";
            header('location: log_in.php');
            exit();
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    } else {
        // عرض الأخطاء
        foreach ($errors as $error) {
            echo "<p style='color:red;'>$error</p>";
        }
    }
}
?>

</div>
</body>
</html>
