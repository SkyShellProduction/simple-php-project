<div class="content">
    <h1 class="title"><?=$pages[$route]['title']?></h1>
    <div class="goods">
        <?
        $s = myStrip($_GET['s']);
        $myGoods = pdo()->prepare("SELECT * FROM goods WHERE category=?");
        $myGoods->execute([$s]);
        $myGoods = $myGoods->fetchAll(PDO::FETCH_ASSOC);
        foreach($myGoods as $food) :
        ?>
        <div class="goods__item">
            <div class="goods__img">
                <a href="#" class="goods__favourite">Добавить в корзину</a>
                <img src="<?=$food['img']?>" alt="" loading="lazy">
                <span class="goods__price"><?=$food['price']?></span>
            </div>
            <h3 class="goods__title"><?=$food['name']?></h3>
            <a href="/?route=category&s=<?=$food['category']?>" class="food__type"><?=$food['category']?></a>   
            <p class="goods__descr"><?=$food['text']?></p>
            <a href="/?route=oneGood&food=<?=$food['goods_id']?>" class="goods__link">Подробнее</a>
        </div>
        <?endforeach;?>
    </div>
</div>