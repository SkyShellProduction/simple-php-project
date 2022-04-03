<div class="content">
    <h1 class="title"><?=$pages[$route]['title']?></h1>
    <form action="" class="form" method="POST" enctype="multipart/form-data">
        <span class="self__span">Логин</span>
        <input type="text" class="input" name="login" value="<?=$logistic['login']?>" required>
        <span class="self__span">Имя</span>
        <input type="text" class="input" name="name" value="<?=$logistic['name']?>" required>
        <span class="self__span">Почта</span>
        <input type="email" class="input" name="email" value="<?=$logistic['email']?>" required>
        <input type="file" name="img" class="input" accept=".png,.jpg,.webp,.svg,.gif">
        <button class="btn">Изменить</button>
    </form>
    <?
    if(isset($_POST['login'])){
        $loginUser = myStrip($_POST['login']);
        $nameUser = myStrip($_POST['name']);
        $emailUser = myStrip($_POST['email']);
        $qwe = pdo()->prepare("SELECT * FROM users WHERE login = ?");
        $qwe->execute([$loginUser]);
        $qwe = $qwe->fetch();
        $go = "<script>setTimeout(() => {window.location = '/?route=self'}, 2000)</script>";
        if($loginUser == $logistic['login']){
            echo $go;
            changeLogin($loginUser, $nameUser, $emailUser, $_FILES, $logistic);

        }
        elseif($qwe){
            echo "<div class=\"error__info\">Пользователь с таким логином уже существует</div>";
        }
        else{
            echo $go;
            changeLogin($loginUser, $nameUser, $emailUser, $_FILES, $logistic);
        }
    }
    ?>
</div>