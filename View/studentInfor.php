<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
        <?php include_once("menu.php"); ?>
        <?php 
            $maSinhVien = $ho = $ten = $ngaySinh = $email = "";
          //  var_dump($_SERVER);
            if($_SERVER["REQUEST_METHOD"] == "POST") {
                $maSinhVien = $_REQUEST["txtMaSinhVien"];
                $ho = $_REQUEST["txtHo"];
                $ten = $_REQUEST["txtTen"];
                $ngaySinh = $_REQUEST["datNgaySinh"];
                $email = $_REQUEST["txtEmail"];
            //  var_dump($ngaySinh);
                $email = filter_var($email,FILTER_SANITIZE_EMAIL);
                if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    echo "<h1>email hop le</h1>";
                }
                else
                echo "<h1>email khong  hop le</h1>";
                var_dump($_FILES);
                if( $_FILES["fileAnh"]["name"] != "" ) {
                  //  echo "<h1>anh hop le</h1>";
                  // doan code lluu file vao sever
                    move_uploaded_file($_FILES["fileAnh"]["tmp_name"],"uploads/avatar.jpg");
                }
                else
                    echo "<h1>anh khong  hop le</h1>";
            }

        
        ?>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="formEnterData">
                <div>
                    <label for="">anh dai dien:</label>
                </div>
                <div>
                    <input type="file" name="fileAnh" id="fileAnh" value="" required>
                </div>
                <div>
                    <label for="">Mã sinh viên:</label>
                </div>
                <div>
                    <input type="text" name="txtMaSinhVien" value="<?php echo $maSinhVien?>" required>
                </div>
                <div>
                    <label for="">Họ:</label>
                </div>
                <div>
                    <input type="text" name="txtHo" value="<?php echo $ho ?>" required>
                </div>
                <div>
                    <label for="">Tên:</label>
                </div>
                <div>
                    <input type="text" name="txtTen" value="<?php echo $ten ?>" required>
                </div>
                <div>
                    <label for="">Ngày sinh</label>
                </div>
                <div>
                    <input type="date" name="datNgaySinh" value="<?php echo $ngaySinh ?>" required>
                </div>
                <div>
                    <label for="">Email</label>
                </div>
                <div>
                    <input type="email" name="txtEmail" value="<?php echo $email ?>" required>
                </div>
                <div>
                    <input type="submit" name="save" value="Lưu">
                </div>
            </div>
        </form>
</body>
</html>