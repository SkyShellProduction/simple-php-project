<?
require '../functions.php';
$login = myStrip($_POST['login']);
$pass = myStrip($_POST['pass']);
$t = pdo()->prepare("SELECT * FROM users WHERE login=? LIMIT 1");
$t->execute([$login]);
$t = $t->fetch();
if($t && password_verify($pass, $t['pass'])){
    $_SESSION['user_login'] = $t['login'];
    $_SESSION['user_role'] = $t['role'];
    echo "yes";
}
else{
    echo "Неправильное имя пользователя или пароль";
}
?>