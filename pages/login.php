<div class="content">
    <h1 class="title"><?=$pages[$route]['title']?></h1>
    <form action="./tools/auth.php" class="form form__login" method="POST">
        <input type="text" placeholder="Введите логин" name="login" class="input" required>
        <input type="password" name="pass" placeholder="Введите пароль" class="input" required>
        <button class="btn">Вход</button>
    </form>
    <div class="error__info"></div>
</div>