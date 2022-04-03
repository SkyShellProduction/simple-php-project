<?
interface Itest{
    public function hello();
}
abstract class Article {
  protected $title;
  protected $text;
  protected $bg;
    public function __construct($title, $text, $bg){
        $this->title = $title;
        $this->text = $text;
        $this->bg = $bg;
    }
    public function printArticle(){
        echo "
        <div style=\"background: {$this->bg}; padding: 15px\">
            <h2>{$this->title}</h2>
            <p>{$this->text}</p>
        </div>
        ";
    }
}
// $arr = new Article('статья 1', 'ее текст', 'yellow');
// $arr->printArticle();
// $arr1 = new Article('статья 2', 'ее текст', 'crimson');
// $arr1->printArticle();
class Games extends Article implements Itest{
    protected $category;
    public function __construct($title, $text, $bg, $category){
        $this->category = $category;
        parent::__construct($title, $text, $bg, $category);
    }
    public function printArticle(){
        echo "
        <div style=\"background: {$this->bg}; padding: 15px\">
            <h2>{$this->title}</h2>
            <p>{$this->text}</p>
            <p>{$this->category}</p>
        </div>
        ";
    }
    public function hello(){

    }
    public function __get($name){
        echo "Нельзя обратиться к приватному свойтсву $name";
    }
    public function __set($name, $value){
        echo "вы не можете присвоить значение $value несуществующему свойству $name";
    }
    public function __call($name, $arguments){
        echo "Метода с именем $name и аргументами $arguments не существует";
    }
}
$game = new Games('cs go', 'version 3.0.3', 'orange', 'cybersport');
$game->printArticle();
// var_dump($game);
// $game->title = 'sefsdfsd';
$game->say();
// var_dump($game);
?>
