<?
$id = myStrip($_GET['id']);
$com = pdo()->prepare("SELECT text FROM comments WHERE comment_id=?");
$com->execute([$id]);
$com = $com->fetch();
?>

<div class="content">
    <h1 class="title"><?=$pages[$route]['title']?></h1>
    <form action="" class="form" method="POST">
        <textarea name="text" placeholder="Ваш комментарий" class="input input__area" required><?=$com['text']?></textarea>
        <button class="btn">Изменить</button>
    </form>
</div>
<?
if(isset($_POST['text'])){
$text = htmlspecialchars($_POST['text']);
$date = date('d.m.y H:i:s');
$qwe = pdo()->prepare("UPDATE comments SET text=?, date=? WHERE comment_id=?");
$qwe->execute([$text, $date, $id]);
echo "<script>window.location = '/?route=comments'</script>";
}
?>