<?php
include 'userDAO.php';
$data = new userDAO();
$user = $data->getAllUser();

$name = $_POST['Username'];
$email = $_POST['Email'];
$password = $_POST['Password'];

$item = 0;

foreach($user as $value):
    if($value['email'] == $email){
        $item = $item +1;
    } 
endforeach; 

// //Mã khóa mật khẩu
// $password = md5($password);
// echo"Ma hoa";
// echo $password;
if (!$name || !$email || !$password)
    {
        echo "Vui lòng nhập đầy đủ thông tin. <a href='javascript: history.go(-1)'>Trở lại</a>";
        header('location:register?id=1.php');
        exit;
    }
//Kiểm tra email có đúng định dạng hay không
// if (!eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$", $email))
// {
//     echo "Email này không hợp lệ. Vui long nhập email khác. <a href='javascript: history.go(-1)'>Trở lại</a>";
//     exit;
// }
if($item >0){
    echo"Email đã có người sử dụng";
    echo "Vui lòng nhập đầy đủ thông tin. <a href='javascript: history.go(-1)'>Tro lai</a>";
    header('location:register?id=2.php');
    exit;
}
else{
    $newUser = new userDAO();
    $newUser->AddUser($name, $email, $password);
    echo"Đăng ký thành công";
    header('location:register?id=3.php');
    //header('location:login.php');
}

?>

