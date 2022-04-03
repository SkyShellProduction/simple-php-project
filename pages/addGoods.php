<div class="content">
    <h1 class="title"><?=$pages[$route]['title']?></h1>
    <form action="" method="POST" enctype="multipart/form-data" class="form">
        <label>
            <span class="self__span">Название товара</span>
            <input type="text" class="input" name="name" placeholder="Название товара" required>
        </label>
        <label>
            <span class="self__span">Цена товара</span>
            <input type="number" class="input" name="price" placeholder="Цена товара" required>
        </label>
        <label>
            <span class="self__span">Описание товара</span>
            <textarea class="input input__area" name="text" placeholder="Описание товара" required></textarea>
        </label>
        <label>
            <span class="self__span">Фото товара</span>
            <input type="file" class="input" name="img" required>
        </label>
        <label>
            <span class="self__span">Категория товара</span>
            <select name="category" class="input">
                <option>burger</option>
                <option>pizza</option>
                <option>hotdog</option>
            </select>
        </label>
        <button class="btn">Добавить</button>
    </form>
    <?
    if(isset($_POST['name'])){
        $rand = getRandom();
        $path = $_FILES['img']['tmp_name'];
        $ext = pathinfo($_FILES['img']['name'], PATHINFO_EXTENSION);
        $to = "./images/goods/goods_image$rand.$ext";
        $name = myStrip($_POST['name']);
        $text = myStrip($_POST['text']);
        $price = myStrip($_POST['price']);
        $category = myStrip($_POST['category']);
        move_uploaded_file($path, $to);
        $g = pdo()->prepare("INSERT INTO goods (name, price, text, img, category) VALUES (?,?,?,?,?)");
        $g->execute([$name, $price, $text, $to, $category]);
        echo "<div class=\"error__info\">Товар добавлен</div>";
        unset($_POST);
    }
    
    ?>
</div>