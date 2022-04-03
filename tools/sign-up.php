<?
require '../functions.php';
$login = myStrip($_POST['login']);
$name = myStrip($_POST['name']);
$email = myStrip($_POST['email']);
$to = '';
$old = './images/default.png';
$pass = strip_tags(password_hash($_POST['pass'], PASSWORD_DEFAULT));
if(!empty($_FILES['img']['name'])){
    $path = $_FILES['img']['tmp_name'];
    $namePhoto = $_FILES['img']['name'];
    $ext = pathinfo($namePhoto, PATHINFO_EXTENSION);
    $to = "./images/users/$login.$ext";
}
else{
    $to = $old;
}
$r = pdo()->prepare("INSERT INTO users (login, name, img, email, pass) VALUES (?,?,?,?,?)");
$r->execute([$login, $name, $to, $email, $pass]);
if($r->errorInfo()[0] !== '00000'){
    echo "Пользователь с таким логином уже существует";
}
else{
    echo "Регистрация успешна";
    if($to !== $old){
        move_uploaded_file($path, ".$to");
    }
}
?>
