<?
include_once('./functions.php');
include_once('./components/header.php');
?>
<main class="main">
    <div class="wrapper">
        <?
        include_once('./components/aside.php');
        include_once("./pages/$route.php");
        ?>
    </div>
</main>
<?include_once('./components/footer.php')?>