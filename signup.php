<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>SSKA Signup</title>
  <link rel="stylesheet" href="signup.css">
</head>

<body>
  <div class="c-c">
    <form class="box"  method="post">
      <h1>SSKA</h1>
      <input type="text" name="username" placeholder="Username" required>
      <input type="password" name="password" placeholder="Password" required>
      <input type="email" name="email" placeholder="Email" required>
      <button type="submit"  name="signup" value="Submit" onclick="return mess();">Signup</button>
        <script type="text/javascript">
            function mess() {
                return "login.php";
            }
        </script>

    </form>
  </div>

</body>

</html>




<?php
require 'db.php';


// هنا اضفنا دالة الشرط للتحقق من ضغط زر signup
if (isset($_POST['signup'])) {
	// عند تحقق الضغط يتم تخزين حقول البيانات فى متغيرات
	$user = $_POST['username'];
	$pass = $_POST['password'];
	$email = $_POST['email'];

	// هنا قمنا بانشاء استعلام لقاعدة البيانات لاضافة بيانات العضو الى الجدول
	// عامود id يتم ملئه اوتوماتيكيا كما اخترنا فى البدايه
	$qu = "insert into users (username,password,email) value ('$user','$pass','$email')";

	// التحقق من نجاح الاستعلام
	if (mysqli_query($con, $qu)) {
		header("Location: signup.php");
		exit;
	}
}

?>