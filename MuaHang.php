<?php 
    //1. Đọc dữ liệu từ query params
    $ma = $_GET['ma'];
    $ten = $_GET['ten'];
    $donGia = $_GET['dongia'];

    //2. Kiểm tra giỏ hàng. Nếu có rồi thì lấy ra, chưa thì tạo mới. Giỏ là mảng kết hợp
    session_start();
    if(isset($_SESSION['cart'])) {
        $carts = $_SESSION['cart'];
    }
    else $carts = [];

    // 3. Kiểm tra đối tượng cần mua có trong giỏ chưa. Nếu có --> tăng SL lên 1, chưa có cho SL = 1
    if(array_key_exists($ma, $carts)) {
        $carts[$ma]['quanlity'] +=1;
    }
    else {
        $carts[$ma] = ['name' => $ten, 'quanlity' => 1, 'price' => $donGia];
    }

    //4. Gắn lại giỏ hàng vào session
    $_SESSION['cart'] = $carts;
    header("location: listCart.php");
?>