<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP lv 2</title>
    <link rel="stylesheet" href="./styles/style.css?<?=time()?>">
</head>
<body>
<header class="header">
    <nav class="header__nav">
        <?if(isset($_SESSION['user_login'])) :?>
            <div class="autentification">
                <?
                $co = pdo()->prepare("SELECT COUNT(*) FROM busket WHERE busket_login=?");
                $co->execute([$_SESSION['user_login']]);
                $co = $co->fetch();
                $logistic = pdo()->prepare("SELECT * FROM users WHERE login=? LIMIT 1");
                $logistic->execute([$_SESSION['user_login']]);
                $logistic = $logistic->fetch();
                ?>
                <a href="" class="user__name busket__btn">Корзина: <?=$co[0]?></a>
                <img src="<?=$logistic['img']?>" alt="user-avatar">
                <a href="" class="user__name"><?=$logistic['login']?></a>
                <a href="./tools/exit.php" class="exit">Выход</a>
            </div>
            <form class="goods__form" method="POST" action="/?route=order">
                <?
                if($co[0] > 0) :
                    $so = pdo()->prepare("SELECT * from busket WHERE busket_login=?");
                    $so->execute([$_SESSION['user_login']]);
                    $so = $so->fetchAll();
                    foreach($so as $bus) :
                        $info = pdo()->prepare("SELECT * FROM goods WHERE goods_id=?");
                        $info->execute([$bus['busket_good']]);
                        $info = $info->fetch();
                    ?>
                    <div class="goods__food-item">
                        <a href="../tools/delBusket.php?delItem=<?=$bus['busket_id']?>" class="goods__food-close">&#215;</a>
                        <input type="number" hidden name="busket-price<?=$bus['busket_id']?>" value="<?=$info['price']?>">
                        <img src="<?=$info['img']?>" alt="">
                        <div class="goods__food-txt">
                            <input class="input" value="<?=$info['name']?>" name="busket-dish<?=$bus['busket_id']?>" readonly>
                            <div class="goods__food-calc">
                                <a href="#" class="goods__button" data-symbol="-">-</a>
                                <input type="number" value="1" readonly class="goods-inp" name="dish-count<?=$bus['busket_id']?>">
                                <a href="#" class="goods__button" data-symbol="+">+</a>
                            </div>
                            <span class="goods__price"><?=$info['price']?></span>
                            <input type="number" hidden name="busket-order<?=$bus['busket_id']?>" value="<?=$bus['busket_id']?>">
                            <a href="/?route=oneGood&food=<?=$info['goods_id']?>" class="goods__link">Подробнее</a>
                        </div>
                    </div>
                    <?endforeach;?>
                    <button class="goods__link" style="width: max-content; margin: 0 auto;">Заказать</button>
                    <?else :?>
                        <p>Ваша корзина пуста</p>
                    <?endif;?>
                </form>
        <?else :?>
        <div class="login">
            <a href="/?route=login" class="login__link">Войти</a>
            <a href="/?route=register" class="login__link">Регистрация</a>
        </div>
        <?endif;?>
    </nav>
</header>
<div class="header__abs"></div>
   