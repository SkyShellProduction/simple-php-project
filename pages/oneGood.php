<div class="content">
    <h1 class="title"><?=$pages[$route]['title']?></h1>
    <?
    $getId = myStrip($_GET['food']);
    $food = pdo()->prepare("SELECT * FROM goods WHERE goods_id=? LIMIT 1");
    $food->execute([$getId]);
    $food = $food->fetch();
    ?>
    <div class="food">
        <div class="food__right">
            <img src="<?=$food['img']?>" alt="">
        </div>
        <div class="food__left">
            <h2 class="food__title"><?=$food['name']?></h2>
            <a href="/?route=category&s=<?=$food['category']?>" class="food__type"><?=$food['category']?></a>   
            <p class="food__descr"><?=$food['text']?></p>
            <p class="goods__price" style="position: static; width: max-content; margin-bottom: 30px;"><?=$food['price']?></p>
            <a href="./tools/addBusket.php?l=<?=$_SESSION['user_login']?>&g=<?=$food['goods_id']?>" class="goods__favourite" style="position: static; width: max-content">Добавить в корзину</a>
        </div>
    </div>
</div>