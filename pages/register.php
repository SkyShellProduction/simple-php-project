<div class="content">
    <h1 class="title"><?=$pages[$route]['title']?></h1>
    <form action="./tools/sign-up.php" class="form register__form" method="POST" enctype="multipart/form-data">
        <input type="text" placeholder="Придумайте логин" name="login" class="input" required>
        <input type="text" placeholder="Введите имя" name="name" class="input" required>
        <input type="email" placeholder="Введите почту" name="email" class="input" required>
        <input type="password" placeholder="Придумайте пароль" name="pass" class="input" required>
        <input type="password" placeholder="Повторите пароль" name="pass1" class="input" required>
        <input type="file" name="img" accept=".png,.jpg,.svg,.gif,.webp" class="input">
        <img alt="" class="register__img">
        <button class="btn" disabled>Зарегистрироваться</button>
    </form>
    <div class="error__info"></div>
</div>