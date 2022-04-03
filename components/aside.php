<aside class="aside">
    <div class="aside__btn">
        <span class="bars"></span>
        <span class="bars"></span>
        <span class="bars"></span>
    </div>
    <ul class="list">
        <?foreach($pages as $link=>$value) :?>
            <?if($value['role'] == 'usual' && !$_SESSION['user_login']) :?>
                <li><a href="/?route=<?=$link?>" class="link <?=$route === $link ? 'active' : ''?>"><?=$value['title']?></a></li>
            <?elseif($value['role'] && $value['role'] !== 'admin' && $_SESSION['user_login'] && $_SESSION['user_role'] == 'guest') :?>
                <li><a href="/?route=<?=$link?>" class="link <?=$route === $link ? 'active' : ''?>"><?=$value['title']?></a></li>
            <?elseif($value['role'] && $_SESSION['user_login'] && $_SESSION['user_role'] == 'admin') :?>
                <li><a href="/?route=<?=$link?>" class="link <?=$route === $link ? 'active' : ''?>"><?=$value['title']?></a></li>
            <?endif;?>    
        <?endforeach;?>
    </ul>
</aside>