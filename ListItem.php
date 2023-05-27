<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table {
            border-collapse: collapse;
            margin: 0 auto;
            text-align: center;
        }
    </style>
</head>
<body>

    <a href="listCart.php"><button>Giỏ hàng</button></a>

    <table border="1" width="700px">
        <tr>
            <th>Mã hàng</th>
            <th>Tên hàng</th>
            <th>Số lượng</th>
            <th>Đơn giá</th>
            <th>Hình ảnh</th>
            <th>Chọn mua</th>
        </tr>

        <?php 
            $file = fopen("hang.txt", "r") or die("bug");
            while(!feof($file)) {
                $line = fgets($file);
                if($line != "") {
                    $product = explode("\t",$line);
                ?>
                    <tr>
                        <td><?= $product[0]?></td>
                        <td><?= $product[1]?></td>
                        <td><?= $product[3]?></td>
                        <td><?= $product[4]?></td>
                        <td><img src="<?= $product[5]?>" alt="Ảnh" width="150px"></td>
                        <td>
                            <a href="MuaHang.php?ma=<?=$product[0]?>&ten=<?=$product[1]?>&dongia=<?= $product[4]?>"><button type="button">Mua</button></a>
                        </td>
                    </tr>
                    <?php
                }
            }
            fclose($file);
        ?>
    </table>
</body>
</html>
