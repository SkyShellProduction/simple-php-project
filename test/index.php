<?
$test = 'this is php';
$test2 = 'awesome';//string type
// echo $test . ' ' . $test2;
// echo "{$test} {$test2} sdrfsaf asdfsdf";
$num = 500; //integer type
$num3 = 500.54;//double type
$bool = true;//boolean type
class Test{};
$obj = new Test();//object type
$arr = [1,2,3,4,5]; //ARR
//gettype - тип данных элемента
// echo gettype($arr);

// $hello = "somesdf";
// if($hello == 'some'){
//     echo "some text";
// }
// elseif($hello == 'test'){
//     echo "test text";
// }
// else {
//     echo "i dont know";
// }

// $numer = 3;
// switch ($numer) {
//     case 3:
//         echo "three";
//         break;
//     case 2:
//         echo "two";
//         break;
//     case 1:
//         echo "one";
//         break;
//     default:
//         echo "what are you???";
//         break;
// }

// $i = 11;
// while ($i < 10) {
//     echo "<h2 class=\"title\">$i</h2>";
//     $i++;
// }
// do {
//     echo "<h2 class=\"title\">$i</h2>";
//     $i++;
// } while ($i <= 10);

// for ($i=1; $i <= 10; $i++) { 
//     if($i%2 == 0){
//         continue;
//     }
//     if($i == 7){
//         break;
//     }
//     echo "<h2 class=\"title\">$i</h2>";
// }
$fruits = [
    'apple'=>[
        'name'=>'green',
        'weight'=>50
    ],
    'cherry'=>[
        'name'=>'red',
        'weight'=>500
    ],
    'banana'=>[
        'name'=>'yellow',
        'weight'=>10
    ],
    'pineapple'=>[
        'name'=>'orange',
        'weight'=>3
    ],
];
// foreach($fruits as $item => $value){
//     echo "<h2>$item</h2>";
//     echo "<p>Название {$value['name']}</p>";
//     echo "<p>Вес {$value['weight']}</p>";
// }
// function say($name = 'Matt', $age = 26){
//     return "I am a web developer. My name is $name. Age is $age";
// }
// $asd = say('vova',22);
// echo $asd;
date_default_timezone_set('Asia/Tashkent');//
// echo date_default_timezone_get();//получаем временную зону
// echo time(); //кол-во сек с 1 января 1970 года
// echo microtime();//кол-во мин с 1 января 1970 года
// echo date('r');//краткая инфа о текущей дате
// echo date('H:i:s A');//время текущее
// echo date('D l d j');//день недели и число
// echo date('m n M F');//номер месяца и название
// echo date('y Y');//текущий год

?>
<a href="class.php">ООП PHP</a>
<a href="form.php">form PHP</a>
