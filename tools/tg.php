<?
require '../functions.php';
$token = '';
$chat_id = '';
$txt = '';
foreach($_POST as $key=>$value){
    $txt .= "<b>" . myStrip($key) . ": </b>" . myStrip($value) . "%0A";
}
if(!empty($_FILES['img']['name'])){
    $path = $_FILES['img']['tmp_name'];
    $ext = pathinfo($_FILES['img']['name'], PATHINFO_EXTENSION);
    $rand = getRandom();
    $to = "../images/tg/$rand.$ext";
    move_uploaded_file($path, $to);
    $bot_url = "https://api.telegram.org/bot{$token}/";
    $url = $bot_url . "sendPhoto?chat_id={$chat_id}";
    $post_fields = [
        'chat_id'=>$chat_id,
        'photo'=>new CURLFile(realpath("$to"))
    ];
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        "Content-Type:multipart/form-data"
    ]);
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post_fields);
    $output = curl_exec($ch);
    unlink($to);
}
$sendToTelegram = fopen("https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&parse_mode=html&text={$txt}", "r");
if($sendToTelegram){
     echo "Сообщение отправлено";
}
 

?>