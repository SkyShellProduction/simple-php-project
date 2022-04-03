<?
require '../functions.php';
$item = myStrip($_GET['delItem']);
$del = pdo()->prepare("DELETE FROM busket WHERE busket_id=?");
$del->execute([$item]);
echo "<script>window.location = '/?route=main'</script>";
?>