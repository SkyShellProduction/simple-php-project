<div class="content">
    <h1 class="title"><?=$pages[$route]['title']?></h1>
    <form action="./tools/comment.php" class="form" method="POST">
        <input type="text" name="login" value="<?=$_SESSION['user_login']?>" hidden>
        <textarea name="text" placeholder="Ваш комментарий" class="input input__area" required></textarea>
        <button class="btn">Оставить</button>
    </form>
    <div class="comments">
        <?
        $comments = pdo()->prepare("SELECT * FROM comments JOIN users ON comments.comment_login=users.login");
        $comments->execute();
        $comments = $comments->fetchAll();
        foreach($comments as $com) :
        ?>
        <div class="comment">
            <div class="info">
                <span class="info__name"><?=$com['comment_login']?></span>
                <img src="<?=$com['img']?>" alt="" class="info__img">
            </div>
            <div class="info__text"><?=$com['text']?></div>
            <div class="info__time"><?=$com['date']?></div>
            <?if($com['comment_login'] == $_SESSION['user_login'] || $_SESSION['user_role'] == 'admin') :?>
            <form action="./tools/delcomment.php" class="info__form" method="POST">
                <input type="text" name="id" value="<?=$com['comment_id']?>" hidden>
                <input type="text" name="login" value="<?=$_SESSION['user_login']?>" hidden>
                <input type="text" name="role" value="<?=$_SESSION['user_role']?>" hidden>
                <input type="submit" value="удалить" class="spec__input" name="delete">
                <input type="submit" value="изменить" class="spec__input" name="change">
            </form>
            <?endif;?>
        </div>
        <?endforeach;?>
    </div>
</div>