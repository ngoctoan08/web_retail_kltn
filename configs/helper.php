<?php

if (!function_exists('currency_format')) {
    function currency_format($number, $suffix = 'đ') {
        if (!empty($number)) {
            return number_format($number, 0, ',', '.') . "{$suffix}";
        }
    }
}

if(!function_exists('converSlugUrl')){
    function converSlugUrl($str) {
        $str = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", 'a', $str);
        $str = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", 'e', $str);
        $str = preg_replace("/(ì|í|ị|ỉ|ĩ)/", 'i', $str);
        $str = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", 'o', $str);
        $str = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", 'u', $str);
        $str = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", 'y', $str);
        $str = preg_replace("/(đ)/", 'd', $str);
        $str = preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", 'A', $str);
        $str = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", 'E', $str);
        $str = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", 'I', $str);
        $str = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", 'O', $str);
        $str = preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", 'U', $str);
        $str = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", 'Y', $str);
        $str = preg_replace("/(Đ)/", 'D', $str);
        $str = preg_replace("/(\“|\”|\‘|\’|\,|\!|\&|\;|\@|\#|\%|\~|\`|\=|\_|\'|\]|\[|\}|\{|\)|\(|\+|\^)/", '-', $str);
        $str = preg_replace("/( )/", '-', $str);
        return strtolower($str);
    }
}
if(!function_exists('checkFile')){
    function checkFile($fileName, $fileSize)
    {
        // validate file
        $flag = true;
        $fileType = ['png', 'jpg', 'jpeg'];
        // Lam the nao de chi upload hinh anh jpg, jpeg, png, ...
        $myFileType = strtolower(pathinfo($fileName, PATHINFO_EXTENSION)); //duoi file: jpg, png, ...
        if(!in_array($myFileType, $fileType)) {
            $flag = false;
        }
        // Lam the na de gioi han dung luong upload
        if($fileSize >= 1000000) {
            $flag = false;
        }
        return $flag;
    }
}


// check active thanh nav 
if(!function_exists('checkActive')){
    function checkActive($value = 'home')
    {
        $page = isset($_GET['page']) ? $_GET['page'] : 'home';
        if($page == $value) {
            return 'active';
        }
    }
}

// check active phân trang
if(!function_exists('addActive')){
    function addActive($value = 1)
    {
        $nav = isset($_GET['nav']) ? $_GET['nav'] : 1;
        if($nav == $value) {
            return 'active';
        }
    }
}

if(!function_exists('convertMethodUrl')){
    function convertMethodUrl($categoryId)
    {
        if($categoryId == '1') {
            return 'giay-tay';
        }
        else if ($categoryId == '2') {
            return 'giay-luoi';
        }
        else 
            return '';
    }
}

if(!function_exists('checkPageDetail')){
    function checkPageDetail($param = -1)
    {
        $param = isset($_GET['page']) ? $_GET['page'] : '';
        if(isset($_GET['id']) || $param == 'success') {
            return 'color-product-detail';
        }
        else return '';

    }
} 

if(!function_exists('checkStatus')) {
    function checkStatus($value) {
        if($value == 1)
            return "Chưa xử lý";
        elseif ($value == 2) {
            return "Đang xử lý";
        }
        elseif ($value == 3) {
            return "Đang giao hàng";
        }
        elseif ($value == 4) {
            return "Đã hoàn thành";
        }
        elseif ($value == 5) {
            return "Đã hủy";
        }
        else {
            return "";
        }
    }
}


if(!function_exists('addColorStatus')) {
    function addColorStatus($value) {
        if($value == 1)
            return "status--denied";
        elseif ($value == 2) {
            return "status--process";
        }
        elseif ($value == 3) {
            return "status--process";
        }
        elseif ($value == 4) {
            return "status--process";
        }
        elseif ($value == 5) {
            return "status--denied";
        }
        else {
            return "";
        }
    }
}

if(!function_exists('payment')) {
    function payment($value) {
        if($value == "code")
            return "Thanh toán sau khi nhận hàng";
        elseif ($value == "vnpay") {
            return "Thanh toán bằng VNPAY";
        }
        else {
            return "";
        }
    }
}

if(!function_exists('nextStatusOrder')) {
    function nextStatusOrder($status) {
        if($status < 4) {
            for($i=1; $i<4; $i++){
                if($status == $i)
                    return $i + 1;
            }
        }
    }
}

if(!function_exists('listStatus')) {
    function listStatus($value) {
        
        if($value == 1){
            return "Chưa xử lý";
        }
        elseif($value == 2) {
            return "Đang xử lý";
        }
        elseif($value == 3){
            return "Đang giao hàng";
        }
        elseif($value == 4){
            return "Đã hoàn thành";
        }
        elseif($value == 5){
            return "Đã hủy";
        }
        
    }
}

if(!function_exists('addSelected')) {
    function addSelected($status, $value) {
        if($status == $value)
            return "selected";
    }
}

if(!function_exists('checkStatusProduct')) {
    function checkStatusProduct($value, $active = 1) {
        if($active == 1) {
            if($value == "")
                return "Chưa nhập hàng";
            if($value == 0)
                return "Hết hàng";
            if($value > 0)
                return "Đang hoạt động";
        }
        else
            return "Dừng hoạt động";
    }
}

if(!function_exists('doneMoney')) {
    function doneMoney($status, $payment, $money) {
        if($status == 4 || $payment == 'vnpay') {
            return $money;
        }
        else
            return '';
    }
}

if(!function_exists('addColorStatusProduct')) {
    function addColorStatusProduct($value, $active = 1) {
        if($active == 1) {
            if($value == "")
                return "status--denied";
            if ($value == 0) 
                return "status--denied";
            if ($value > 0) 
                return "status--process";
        }
        else
            return "status--denied";
    }
}


if(!function_exists('alertColorStatusOrder')) {
    function alertColorStatusOrder($qtyStore, $qtyOrder, $active) {
        if($active == -1 || $active == 0) {
            return "status--denied";
        }
        else {
            if($qtyStore < $qtyOrder) {
                return "status--denied";
            }
            else {
                return "";
            }
        }
    }
}

if(!function_exists('alertStatusOrder')) {
    function alertStatusOrder($qtyStore, $qtyOrder, $active) {
        if($active == -1 || $active == 0) {
            return "Ngừng bán";
        }
        else {
            if($qtyStore < $qtyOrder) {
                return "Hết hàng";
            }
            else {
                return "";
            }
        }
    }
}


if(!function_exists('updateStatusBill')) {
    function updateStatusBill($value) {
        if($value == 2) {
            return "Hoàn thành";
        }
        else {
            return "Đang chờ";
        }
    }
}

if(!function_exists('roleUser')) {
    function roleUser($value) {
        if($value == 1) {
            return "role admin";
        }
        if($value == 2){
            return "role member";
        }
    }
}

if(!function_exists('titleUser')) {
    function titleUser($value) {
        if($value == 1) {
            return "Admin";
        }
        if($value == 2){
            return "Member";
        }
    }
}

if(!function_exists('classStatusUser')) {
    function classStatusUser($value) {
        if($value == 1) {
            return "status--process";
        }
        else{
            return "status--denied";
        }
    }
}

if(!function_exists('statusUser')) {
    function statusUser($value) {
        if($value == 1) {
            return "Đang hoạt động";
        }
        else{
            return "Dừng hoạt động";
        }
    }
}
## Hàm validate form

// if(!function_exists('validateForm')) {
//     function validateForm($name, $email, $phone, $address, $error) {
//         $regexName = '/^[^\d+]*[\d+]{0}[^\d+]*$/';
//         $regexPhone = '/(03|05|07|08|09|01[2|6|8|9])+([0-9]{8})\b/';
//         $regexEmail = '/(?![[:alnum:]]|@|-|_|\.)./';
//         ## name > 15 and require
//         if() {
//             $error['name']['invalid'] = 'Họ tên không hợp lệ';
//         }
//         else {

//         }
//     }
// }

if(!function_exists('contentMailForMany')) {
    function contentMailForMany($idOrder, $name, $email, $phone, $address, $payment) {
        //có một mặt hàng
        // Nội dung gửi mail là một table bao gồm các trường thông tin như dưới
        // $content = "<h3 class='txt-thank' style=''> Cảm ơn quý khách đã đặt hàng tại Laforce </h3>";
        $content = "<div class='txt-thank'>
                        <p>
                            <span> Cảm ơn quý khách đã đặt hàng tại Laforce </span>
                        </p>
                    </div>";

        $content .= "<h3 style='font-size: 0.9em; font-family: sans-serif; padding: 12px 15px; text-align: center' class=> Mã đơn hàng: ".$idOrder."</h3>";
        
        // Phần thông tin mặt hàng
        $content .= "<table style='
            border-collapse: collapse;
            margin: auto;
            font-size: 0.9em;
            font-family: sans-serif;
            min-width: 800px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
            text-align: center;'>
                    <thead>
                        <tr style='background-color: #009879;
                        color: #ffffff;
                        text-align: center;'>
                            <th style='padding: 12px 15px;'> STT</th>
                            <th> Tên sản phẩm</th>
                            <th> Size</th>
                            <th> Đơn giá</th>
                            <th> SL</th>
                            <th> Tổng tiền</th>
                        </tr>
                </thead>
                <tbody>
                ";
        $count = 0;
        $totalCheckOut = 0;
        
        foreach($_SESSION['cart'] as $id) {
            foreach($id as $product) {
                $total = $product['qty'] * $product['price'];
                $totalCheckOut += $total;
                $count ++;
                $content.="
                    <tr style='font-weight: bold;
                    color: #009879;'>
                        <td style='padding: 12px 15px;'>".$count."</td>
                        <td>".$product['name']."</td>
                        <td>".$product['size']."</td>
                        <td>".currency_format($product['price'])."</td>
                        <td>".$product['qty']."</td>
                        <td>".currency_format($total)."</td>
                    </tr>";
            }
        }
        $content.="</tbody> </table>" ;      
        $content.= "<h3 style='font-size: 0.9em; font-family: sans-serif; padding: 12px 15px; text-align: center'> Tổng tiền thanh toán: <span style='color: red;'>".currency_format($totalCheckOut)."</span></h3>";

        // Phần thông tin khách hàng
        $content.= "<table style='
        border-collapse: collapse;
            margin: auto;
            font-size: 0.9em;
            font-family: sans-serif;
            min-width: 800px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.15); 
            text-align:center'>
                <tr style='font-weight: bold; text-align:center'>
                    <td style='padding: 12px 15px; '>Khách hàng: </td>
                    <td>".$name."</td>
                </tr>
                <tr style='font-weight: bold; text-align:center'>
                    <td style='padding: 12px 15px; '>Địa chỉ giao hàng: </td>
                    <td>".$address."</td>
                </tr>
                <tr style='font-weight: bold; text-align:center'>
                    <td style='padding: 12px 15px; '>Số điện thoại: </td>
                    <td>".$phone."</td>
                </tr>
                <tr style='font-weight: bold; text-align:center'>
                    <td style='padding: 12px 15px;'>Email: </td>
                    <td>".$email."</td>
                </tr>
                <tr style='font-weight: bold; text-align:center'>
                    <td style='padding: 12px 15px;'>Phương thức thanh toán: </td>
                    <td>".payment($payment)."</td>
                </tr>
        </table>";
        return $content;
        // có nhiều mặt hàng
    }
}