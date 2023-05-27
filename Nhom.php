<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <label for="MaNhom">Mã nhóm</label>
        <input type="text" name="MaNhom">

        <label for="TenNhom">Tên nhóm</label>
        <input type="text" name="TenNhom">
        
        <label for="MoTa">Mô tả</label>
        <textarea name="MoTa" id="" cols="30" rows="10"></textarea>
        <button type="submit" name="luu">Lưu</button>
    </form>
</body>
</html>

<?php 
    if(isset($_POST['luu'])) {
        $MaNhom = $_POST['MaNhom'];
        $TenNhom = $_POST['TenNhom'];
        $MoTa = $_POST['MoTa'];

        if(file_exists("category.txt")) {
            $file = fopen("category.txt", 'a');
        }
        else {
            $file = fopen("category.txt", 'w');
        }
        fwrite($file, "$MaNhom\t$TenNhom\t$MoTa\n");
        fclose($file);
        echo('Da ghi du lieu');
    }
?>