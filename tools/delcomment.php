<?
include '../functions.php';
$id = myStrip($_POST['id']);
$login = myStrip($_POST['login']);
$role = myStrip($_POST['role']);
$pdo = pdo()->prepare("SELECT comment_login FROM comments WHERE comment_id=?");
$pdo->execute([$id]);
$pdo = $pdo->fetch();
if($_POST['delete'] && $login == $pdo['comment_login'] || $role =='admin' && $_POST['delete']){
    $t = pdo()->query("DELETE FROM comments WHERE comment_id='$id'");
    echo "<script>window.location = '/?route=comments'</script>";
}
elseif($_POST['change'] && $login == $pdo['comment_login'] || $role =='admin' && $_POST['change']){
    echo "<script>window.location = '/?route=changecomment&id=$id'</script>";
}
else {
    echo "<script>window.location = '/?route=comments'</script>";
}
?>