<?php
//điều chỉnh kết nối db ở đây
const DBNAME = "touch_and_watch";
const DBUSER = "root";
const DBPASS = "";
const DBCHARSET = "utf8";
const DBHOST = "127.0.0.1";

const BASE_URL = "http://localhost/film_website/";
const ADMIN_URL = BASE_URL . 'admin/';
const IMG_URL = BASE_URL . 'public/images/';


function redirect($key = "", $msg = "", $url = "")
{
    $_SESSION[$key] = $msg;
    switch ($key) {
        case "errors":
            unset($_SESSION['success']);
            break;
        case "success":
            unset($_SESSION['errors']);
            break;
    }
    header('location: ' . ADMIN_URL . $url . "?msg=" . $key);
    die;
}

function route($name)
{
    return BASE_URL . $name;
}
function routeAdmin($name)
{
    return ADMIN_URL . $name;
}

function convert_slug($str)
{
    $str = trim($str); // Loại bỏ khoảng trắng ở đầu và cuối chuỗi
    $str = mb_strtolower($str, 'UTF-8'); // Chuyển đổi chuỗi thành chữ thường

    // Tạo bảng chuyển đổi ký tự đặc biệt
    $specialChars = array(
        // Chữ cái
        'à', 'á', 'ạ', 'ả', 'ã', 'â', 'ầ', 'ấ', 'ậ', 'ẩ', 'ẫ', 'ă', 'ằ', 'ắ', 'ặ', 'ẳ', 'ẵ',
        'è', 'é', 'ẹ', 'ẻ', 'ẽ', 'ê', 'ề', 'ế', 'ệ', 'ể', 'ễ',
        'ì', 'í', 'ị', 'ỉ', 'ĩ',
        'ò', 'ó', 'ọ', 'ỏ', 'õ', 'ô', 'ồ', 'ố', 'ộ', 'ổ', 'ỗ', 'ơ', 'ờ', 'ớ', 'ợ', 'ở', 'ỡ',
        'ù', 'ú', 'ụ', 'ủ', 'ũ', 'ư', 'ừ', 'ứ', 'ự', 'ử', 'ữ',
        'ỳ', 'ý', 'ỵ', 'ỷ', 'ỹ',
        'đ',
        // Chữ đặc biệt
        '!', '@', '#', '$', '%', '^', '&', '*', '(', ')', '-', '_', '=', '+', '[', ']', '{', '}', '\\', '|', ';', ':', '\'', '"', ',', '<', '>', '/', '?', '~', '`'
    );

    // Tạo bảng chuyển đổi ký tự thay thế
    $replaceChars = array(
        // Chữ cái
        'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a',
        'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e',
        'i', 'i', 'i', 'i', 'i',
        'o', 'o', 'o', 'o', 'o', 'o', 'o', 'o', 'o', 'o', 'o', 'o', 'o', 'o', 'o', 'o', 'o',
        'u', 'u', 'u', 'u', 'u', 'u', 'u', 'u', 'u', 'u', 'u',
        'y', 'y', 'y', 'y', 'y',
        'd',
        // Chữ đặc biệt
        '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''
    );

    // Thực hiện chuyển đổi
    $str = str_replace($specialChars, $replaceChars, $str);

    // Thay thế khoảng trắng bằng dấu gạch ngang
    $str = preg_replace('/\s+/', '-', $str);

    // Loại bỏ các ký tự không phù hợp với URL
    $str = preg_replace('/[^a-z0-9\-]/', '', $str);

    // Loại bỏ dấu gạch ngang lặp lại
    $str = preg_replace('/-+/', '-', $str);

    // Loại bỏ dấu gạch ngang ở đầu và cuối chuỗi
    $str = trim($str, '-');

    return $str;
}
