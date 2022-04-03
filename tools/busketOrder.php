<?
require '../functions.php';
$data = explode(', ', $_POST['order-info']);
  if(isset($_POST['order-yes'])){
      foreach($data as $id) {
          $res = pdo()->prepare("DELETE FROM busket WHERE busket_id=?");
          $res->execute([$id]);
        }
        // в тг отправку и так все знают как делать
        $go = "<script>setTimeout(() => {window.location = '/?route=self'}, 2000)</script>";
        echo $go;
        echo "Ваш заказ оформлен, через 2 сек вас перебросит обратно";
  }
  elseif(isset($_POST['order-no'])){
      echo "<script>window.location = '/?route=goods'</script>";
  }
?>