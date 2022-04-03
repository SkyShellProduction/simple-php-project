<div class="content">
    <h1 class="title"><?=$pages[$route]['title']?></h1>
    <span class="self__span">Изображение пользователя</span>
    <img src="<?=$logistic['img']?>" alt="" class="avatar__img">
    <span class="self__span">Логин</span>
    <p class="self__name"><?=$logistic['login']?></p>
    <span class="self__span">Имя</span>
    <p class="self__name"><?=$logistic['name']?></p>
    <span class="self__span">Почта</span>
    <p class="self__name"><?=$logistic['email']?></p>
    <a href="/?route=change" class="btn">Изменить данные</a>
    <div class="avatar__modal">
        <div class="modal__img">
            <img src="" alt="">
        </div>
    </div>
</div>