<div class="content">
    <h1 class="title"><?=$pages[$route]['title']?></h1>
    <?
    $sum = 0;
    $arr = array_chunk($_POST, 4, false);
    $orderId = [];
    foreach($arr as $item){
        $orderId[] = $item[3];
        echo "<p class=\"self__span\">{$item[1]} - {$item[2]}  ({$item[0]}сум за 1шт)</p>";
        $sum += $item[0] * $item[2];
    }
    echo "<p class=\"self__span\">Общая стоимость <span class=\"goods__title\">{$sum}</span></p>";
    //в тг отправку и так все знают как делать
    ?>
        <p class="self__name">Все верно?</p>
    <form action="../tools/busketOrder.php" method="POST" class="info__form order__form">
        <input type="text" hidden value="<?=implode(', ', $orderId)?>" name="order-info">
        <input type="submit" class="spec__input green" value="Да подтвердить заказ" name="order-yes">
        <input type="submit" class="spec__input red" value="подумать еще" name="order-no">
    </form>
</div>