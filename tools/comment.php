<?
include '../functions.php';
$login = myStrip($_POST['login']);
$text = htmlspecialchars($_POST['text']);
$date = date('d.m.y H:i:s');
$pdo = pdo()->prepare("INSERT INTO comments (comment_login, text, date) VALUES (?,?,?)");
$pdo->execute([$login, $text, $date]);
echo "<script>window.location = '/?route=comments'</script>";
?>