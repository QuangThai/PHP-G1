<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tạo form</title>
</head>
<body>

    <form accept="index2.php" method="get">
        <input type="text" name="num1" value="<?php echo $_REQUEST["num1"] ?? "" ;?>" placeholder="Nhập a">
        <input type="text" name="num2" value="<?php echo $_REQUEST["num1"] ?? "" ;?>" placeholder="Nhập b">
        <select name="operator" id="" >
            <option value="none">Vui lòng cộng phép tình</option>
            <option <?php echo $_REQUEST["operator"] == "add"? "selected":""; ?> value="add">Cộng </option>
            <option <?php echo $_REQUEST["operator"] == "subtract"? "selected" : ""; ?> value="subtract">Trừ</option>
            <option <?php echo $_REQUEST["operator"] == "mutiply"? "selected" : ""; ?> value="mutiply">Nhân</option>
            <option <?php echo $_REQUEST["operator"] == "divide"? "selected" : ""; ?> value="divide">Chia</option>
        </select>
        <button type="submit" value="submit" name="submit">Tính</button>
    </form>
    <?php
       // var_dump($_REQUEST);
        //$_REQUEST, $_GET, $_POST
       // var_dump($_GET);
        if(isset($_GET["submit"]))  {
            $num1 = $_GET["num1"];
            $num2 = $_GET["num2"];
            $operator = $_GET["operator"];
            $rs = 0;
            switch ($operator) {
                case 'add':
                    $rs = $num1 + $num2;
                    break;
                case 'subtract':
                    $rs = $num1 - $num2;
                    break;
                case 'mutiply':
                    $rs = $num1 * $num2;
                    break;
                    case 'devide':
                    $rs = $num1 / $num2;
                    break;
                default:
                    # code...
                    $rs = "Vui lòng chọn phép tính";
                    break;
            }
            echo "Kết quả là : $rs";
        }
        phpinfo();
    ?>
</body>
</html>