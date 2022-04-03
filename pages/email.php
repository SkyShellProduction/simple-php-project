<div class="content">
    <h1 class="title"><?= $pages[$route]['title'] ?></h1>
    <form action="./tools/mail.php" class="form form__email" method="POST" enctype="multipart/form-data">
        <input type="email" name="email" class="input" placeholder="Введите почту" required> <input type="text" name="subject" class="input" placeholder="Введите тему сообщения" required>
        <textarea name="text" placeholder="Введите сообщение" class="input input__area" required></textarea>
        <input type="file" name="img" class="input" accept=".jpg,.png,.svg,.webp,.gif">
        <button class="btn">Отправить</button>
    </form>
    <div class="error__info"></div>
</div>