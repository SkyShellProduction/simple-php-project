<?
$num1 = +$_POST['num1'];
$num2 = +$_POST['num2'];
$sign = $_POST['sign'];
switch ($sign) {
    case '+':
        $res = $num1 + $num2;
        break;
    case '-':
        $res = $num1 - $num2;
        break;
    case '*':
        $res = $num1 * $num2;
        break;
    case '/':
        $res = $num1 / $num2;
        break;
    default:
        $res = '';
        break;
}

?>

<div class="content">
    <h1 class="title"><?=$pages[$route]['title']?></h1>
    <form action="" class="form" method="POST">
        <input type="number" placeholder="Введите число" name="num1" class="input" required>
        <input type="number" placeholder="Введите число" name="num2" class="input" required>
        <select name="sign">
            <option value="+">+</option>
            <option value="-">-</option>
            <option value="*">*</option>
            <option value="/">/</option>
        </select>
        <button class="btn">Посчитать</button>
    </form>
    <div class="answer">Ответ: <?=$res?></div>
</div>