<?php 
	session_start();
	include_once("../Model/entity/user.php");
	$information ="";
	if($_SERVER["REQUEST_METHOD"] =="POST") {
		$userName = $_REQUEST["username"];
		$pw = $_REQUEST["password"];
		$user = User::authentication($userName, $pw);
		if($user == null)
			$information = "Tên đăng nhập hoặc mật khẩu không đúng";
		else {
			$_SESSTION["user"] = serialize($user);
			header("location:index.php");
		} 
	}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href="../vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin.css" rel="stylesheet">
</head>

<body>
    <div class="col-lg-5 shadow" style="background: #eee;margin: 100px auto;">
        <h3 class="text-center pt-3" style="color: red">Login</h3>
        <form method="POST" autocomplete="off" enctype="multipart/form-data">
            <div class="form-group">
                <label for="">Username</label>
                <input type="text" name="username" placeholder="Nhập username" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Password</label>
                <input type="password" name="password" placeholder="Nhập password" class="form-control">
            </div>
            <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Nhớ?</label>
            </div>
            <button type="submit" class="btn btn-block btn-success mb-1">Login</button> <br>
            <?php if( strlen($information) != 0) { ?>
            <div class="alert alert-danger">
                <?php echo $information; ?>
            </div>
            <?php } ?>
            <a href="#" class="pb-2 btn-block text-right">Quên mật khẩu?</a>
        </form>
    </div>
</body>

</html>