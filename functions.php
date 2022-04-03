<?
date_default_timezone_set('Asia/Tashkent');
session_start();
$route = $_GET['route'] ?? 'main';
$pages = [
    'main'=>[
        'title'=>'Главная',
        'role'=>'usual'
    ],
    'self'=>[
        'title'=>'Профиль',
        'role'=>'auth'
    ],
    'comments'=>[
        'title'=>'Комментарии',
        'role'=>'auth'
    ],
    'change'=>[
        'title'=>'Изменение данных',
    ],
    'calc'=>[
        'title'=>'Калькулятор',
        'role'=>'usual'
    ],
    'table'=>[
        'title'=>'Таблица умножения',
        'role'=>'usual'
    ],
    'slider'=>[
        'title'=>'Слайдер',
        'role'=>'usual'
    ],
    'email'=>[
        'title'=>'Почта',
        'role'=>'usual'
    ],
    'telegram'=>[
        'title'=>'Телеграм',
        'role'=>'usual'
    ],
    'goods'=>[
        'title'=>'Товары',
        'role'=>'auth'
    ],
    'addGoods'=>[
        'title'=>'Добавить товар',
        'role'=>'admin'
    ],
    'login'=>[
        'title'=>'Войти',
    ],
    'register'=>[
        'title'=>'Регистрация',
    ],
    'changecomment'=>[
        'title'=>'Изменение комментария',
    ],
    'oneGood'=>[
        'title'=>'Информация о товаре',
    ],
    'order'=>[
        'title'=>'Ваш заказ',
    ],
    'category'=>[
        'title'=>'Категория',
    ],
];

function drawSlider(){
    $p = scandir('./images/slider/');
    $indicator = '';
    $slide = '';
    foreach($p as $key){
        $extension = pathinfo($key, PATHINFO_EXTENSION);
        $re = '/\'png|jpg|gif|svg|jpeg|webp\'/m';
        $result = preg_match($re, $extension);
        if($result){
           $slide .= "
                <div class=\"slide\">
                    <img src=\"./images/slider/$key\" alt=\"\">
                </div>
           ";
           $indicator .= "<li class=\"indicators-i\"></li>";
        }
    }
    $slider = "
        <div class=\"slider\">
            <div class=\"slideLines\">
                $slide
            </div>
            <ul class=\"indicators\">
                $indicator
            </ul>
            <div class=\"controls\">
                <div class=\"prev\">&lt;</div>
                <div class=\"next\">&gt;</div>
            </div>
        </div>
    ";
    return $slider;
}
function getRandom(){
    $char = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $random = '';
    for ($i=0; $i < 20; $i++) { 
       $random .= $char[rand(0, (strlen($char)-1))];
    }
    return $random;
}
function myStrip($text){
    return trim(strip_tags($text));
}
// st-fr15-00
function pdo(){
    $dbname = 'st-fr15-00';
    $dbuser = 'root';
    $dbpass = '';
    $host = '127.0.0.1';
    return new PDO("mysql:host=$host;dbname=$dbname;", $dbuser, $dbpass);
}


function changeLogin($argUser, $argName, $argEmail, $files, $argParam){
    $to = '';
    $old = './images/default.png';
    if(!empty($files['img']['name'])){
        $path = $files['img']['tmp_name'];
        $ext = pathinfo($files['img']['name'], PATHINFO_EXTENSION);
        $to = "./images/users/$argUser.$ext";
        if($old != $argParam['img']){
            unlink($argParam['img']);
        }
        move_uploaded_file($path, $to);
    }
    else{
        if($old != $argParam['img']){
            $ext = pathinfo($argParam['img'], PATHINFO_EXTENSION);
            $to = "./images/users/$argUser.$ext";
            rename($argParam['img'], $to);
        }
        else{
            $to = $argParam['img'];
        }
    }
    $sao = pdo()->prepare("UPDATE users SET login=?, name=?, email=?, img=? WHERE users_id=?");
    $sao->execute([$argUser, $argName, $argEmail, $to, $argParam['users_id']]);
    $_SESSION['user_login'] = $argUser;
    echo "<div class=\"error__info\">Данные успешно сохранены, вас перебросит на страницу профиля через 2 сек</div>";
}
foreach($pages as $link => $value){
    if($_GET['route'] === $link){
        $route = $link;
        break;
    }
    else{
        $route = 'main';
    }
}


if(!$_SESSION['user_login']){
    switch($route){
        case 'self':
            $route = 'main';
            break;
        case 'change':
            $route = 'main';
            break;
        case 'comments':
            $route = 'main';
            break;
        case 'changecomment':
            $route = 'main';
            break;
        case 'addGoods':
            $route = 'main';
            break;
        case 'oneGood':
            $route = 'main';
            break;
        case 'order':
            $route = 'main';
            break;
        case 'category':
            $route = 'main';
            break;
    }
}
if(isset($_SESSION['user_login']) && $_SESSION['user_role'] == 'guest'){
    switch ($route) {
        case 'login':
            $route = 'main';
            break;
        case 'register':
            $route = 'main';
            break;
        case 'addGoods':
            $route = 'main';
            break;
    }
}

?>
