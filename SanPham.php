<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post" enctype="multipart/form-data">
        <label for="MaHang">Mã hàng</label>
        <input type="text" name="MaHang">

        <label for="TenHang">Tên hàng</label>
        <input type="text" name="TenHang">
        
        <label for="NhomHang">Mô tả</label>
        <select name="NhomHang" id="">
            <?php 
                $read_category = fopen("category.txt", "r");
                while(!feof($read_category)) {
                    $line = fgets($read_category); //Hàm lấy ra 1 dòng
                    if(trim($line) != "") {
                        $category = explode("\t", $line); //Hàm tách chuỗi
                        echo "<option value=\"$category[0]\">$category[1]</option>";
                    }
                }
                fclose($read_category);
            ?>
        </select>

        <label for="SoLuong">Số lượng</label>
        <input type="text" name="SoLuong">
        
        <label for="DonGia">Đơn giá</label>
        <input type="text" name="DonGia">

        <label for="HinhAnh">Hình ảnh</label>
        <input type="file" name="HinhAnh">

        <button type="submit" name="luu">Lưu</button>
    </form>
</body>
</html>

<?php
    if(isset($_POST['luu'])) {
        $MaHang = $_POST['MaHang'];
        $TenHang = $_POST['TenHang'];
        $NhomHang = $_POST['NhomHang'];
        $SoLuong = $_POST['SoLuong'];
        $DonGia = $_POST['DonGia'];

        $path = "images/";
        $url = basename($_FILES['HinhAnh']['name']);
        $imgPath = $path . $url;

        if(file_exists("hang.txt")) {
            $file = fopen("hang.txt", "a");
        }
        else {
            $file = fopen("hang.txt", "w");
        }

        fwrite($file, "$MaHang\t$TenHang\t$NhomHang\t$SoLuong\t$DonGia\t$imgPath\n");
        fclose($file);

        if(!file_exists($imgPath)) {
            move_uploaded_file($_FILES['HinhAnh']['tmp_name'], $imgPath);
        }
        header("location: ListItem.php");
    }
?>