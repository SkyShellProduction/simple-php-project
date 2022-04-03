<?
require "../functions.php";
$l = myStrip($_GET['l']);
$g = myStrip($_GET['g']);
$s = pdo()->prepare("INSERT INTO busket (busket_login, busket_good) VALUES (?,?)");
$s->execute([$l, $g]);
echo "<script>window.location = '/?route=goods'</script>";
?>