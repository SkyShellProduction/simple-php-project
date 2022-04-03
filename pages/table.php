<div class="content">
    <h1 class="title"><?= $pages[$route]['title'] ?></h1>
    <form action="" class="form" method="POST">
        <input type="number" name="col" class="input" placeholder="Введите кол-во колонок" required>
        <input type="number" name="row" class="input" placeholder="Введите кол-во строк" required>
        <button class="btn">Посчитать</button>
    </form>
    <div class="table">
        <? if ($_POST['col'] <= 10 && $_POST['row'] <= 10) : ?>
            <? for ($i = 1; $i <= $_POST['row']; $i++) : ?>
                <div class="table__row">
                    <!-- back  -->
                    <? for ($k = 1; $k <= $_POST['col']; $k++) : ?>
                        <div class="table__col <?= $i == $k ? 'active' : ''?>  <?=$_POST['col']+1 - $i == $k ? 'back' : ''?>"><?= $i * $k ?></div>
                    <? endfor; ?>
                </div>
            <? endfor; ?>
        <? else : ?>
            <div class="error__info">Введите числа не превышающие 10</div>
        <? endif; ?>
    </div>
</div>