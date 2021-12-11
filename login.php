<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>SSKA Login</title>
  <link rel="stylesheet" href="login.css">
</head>

<body>
  <div class="c-c">
    <form class="box"  method="post">
      <h1>SSKA</h1>
      <input type="text" name="username" placeholder="Username" required>
      <input type="password" name="password" placeholder="Password" required>
      <input type="submit"  name="login" value="Login">
      <p class="link">Don't have an account ?<br>
				<a href="signup.php">Sign up </a> 
			</p>
    </form>
  </div>

</body>

</html>

<?php
// استدعاء ملف الاتصال بقاعدة البيانات
require 'db.php';
// فتح جلسه
session_start();

// دالة الشرط للتحقق من ضغط زر login
if (isset($_POST['login'])) {
	// تخزين الحقول فى متغيرات
	$user = $_POST['username'];
	$pass = $_POST['password'];

	// انشاء استعلام
	// فى هذا الاستعلام استخدمنا الشرط وجود اسم المستخدم وكلمة المرور
	$qu = "select * from users where username = '$user' && password = '$pass'";

	// ارسال الاستعلام والتحقق من وجود العضو
	if (mysqli_num_rows(mysqli_query($con, $qu)) > 0) {
		// اذا تم وجود النتيجة يتم اضافة اسم العضو فى الجلسه 
		$_SESSION['username'] = $user;
		// ثم يتم الانتقال الى منطقة الاعضاء
		header("Location: cp.php");
	} else {
		// اذا لم يتم ايجاد اى قيمه 0
		echo 'اسم المستخدم او كلمة المرور خاطأ';
	}
}
?>