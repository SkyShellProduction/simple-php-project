<div class="content">
    <h1 class="title"><?=$pages[$route]['title']?></h1>
    <div class="goods">
        <?
        $elements = 3;
        $countPages = pdo()->query("SELECT COUNT(*) FROM goods");
        $countPages = $countPages->fetch();
        $howMuch = ceil($countPages[0] / $elements);
        $thisPage = $_GET['page'] ?? 1;
        $off = $_GET['page'] ? +($_GET['page']-1) * $elements : 0;
        $myGoods = pdo()->prepare("SELECT * FROM goods ORDER by goods_id DESC LIMIT $elements OFFSET $off");
        $myGoods->execute();
        $myGoods = $myGoods->fetchAll(PDO::FETCH_ASSOC);
        foreach($myGoods as $food) :
        ?>
        <div class="goods__item">
            <div class="goods__img">
                <a href="./tools/addBusket.php?l=<?=$_SESSION['user_login']?>&g=<?=$food['goods_id']?>" class="goods__favourite">Добавить в корзину</a>
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
    <div class="pagination">
        <?for($i = 1; $i <= $howMuch; $i++) :?>
            <a href="/?route=goods&page=<?=$i?>" class="link <?=$thisPage == $i ? 'active' : ''?>"><?=$i?></a>
        <?endfor;?>    
    </div>
</div>