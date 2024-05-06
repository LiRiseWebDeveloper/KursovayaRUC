<?
session_start();
$verify_login = 'LiRise';
$verify_password = '12345';
if($_SERVER["REQUEST_METHOD"] == "POST") {
    if (($_POST["login"] == $verify_login) && ($_POST["password"] == $verify_password)) {
        $_SESSION['login'] = $_POST['login'];
        header('Location: http://lab5.com/welcome.php');
    } else echo 'Неверный логин или пароль';

}

// $_SESSION["login"]= $login;


// if (($_SESSION["login"] == $verify_login) && ($_SESSION["password"] == $verify_password)) {
//     $login = $_SESSION["login"];
//     $password = $_SESSION["password"];
//     print('Добро пожаловать, ' . $login);
// } else {
//    print('Неравильный логин или пароль');
// }

?>