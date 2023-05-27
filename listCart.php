<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        th, td {
            padding: 10px
        }
        .btn, table{
            margin: 0 auto;
            text-align: center;
        }
    </style>
</head>
<body>
    <h1 style="color: red; text-align: center">GIỎ HÀNG</h1>
    <table width="800px" border="1" style="border-collapse: collapse;">
        <tr>
            <th>Mã hàng</th>
            <th>Tên hàng</th>
            <th>Số lượng</th>
            <th>Đơn giá</th>
            <th>Thành tiền</th>
        </tr>
        
        <?php 
            session_start();
            if(isset($_SESSION['cart'])) {
                //Lấy giỏ hàng
                $carts = $_SESSION['cart'];
                //Duyệt lần lượt từng hàng, mỗi hàng 1 dòng của bảng
                $total = 0;
                foreach($carts as $ma => $v) {
                    $total += $v['quanlity'] * $v['price'];  
                ?>

                <tr>
                    <td><?= $ma ?></td>
                    <td><?= $v['name'] ?></td>
                    <td><?= $v['quanlity'] ?></td>
                    <td><?= $v['price'] ?></td>
                    <td><?= $v['quanlity'] * $v['price'] ?></td>
                </tr>

                <?php        
                }
            }
        ?>

        <tr>
            <td colspan="4" style="text-align: right">Tổng tiền</td>
            <td><?= $total?></td>
        </tr>
    </table>

    <div class="btn" style="margin-top: 30px">      
        <button onclick="hello()" style="margin-right: 20px">Đặt hàng</button>
        <a href="ListItem.php"><button>Mua tiếp</button></a>
    </div>
    <script>
        function hello() {
            alert("Đặt hàng thành công");
        }
     </script>
</body>
</html>