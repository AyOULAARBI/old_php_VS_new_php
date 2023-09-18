<?php

// require"apple.php";
// require"sony.php";
// require"samsung.php";

// $iphone = new Apple\Hardware\IPhones\CreatePhone;
// $iphone->sayHi();
// $ipad = new Apple\Hardware\Tablets\CreateTablet();
// $ipad->sayHi();

//using traits in php instead of repeating the same method in every class, kinda like inheritance
trait Commentable{
    public function addComment($body){
        echo "comming from the commentable trait".$body."<br>";
    }
}

class Post{
    use Commentable;
}

class Image{
    use Commentable;
}

$post = new Post();
$post->addComment("this post is awesome");

//array destructuring instead of $a = $array[0];
$array = [1,2];
[$a,$b]= $array;
echo $b.$a."<br>";

//we now have first class viratic functions
function jm3Lmlawi(...$nums){
    echo array_sum($nums)."<br>";
}
jm3Lmlawi(1,2,3,4,5,6,7);

// function add($a,$b,$c){
//     echo "<br>".$a+$b+$c."<br>";
// }
// $rest = [3,4];
// add(1,...$rest);

//we now have generators , if you want to do something momery intensive but in an efficient way: use generators
//for example if you have a huge file you don't have to load the whole file into memory  you can use
//a generator to yield it line by line by line;
function lines($filename){
    $file = fopen($filename, "r");
    while(($line = fgets($file)) !== false){
        yield $line;
    }
    fclose($file);
}
foreach(lines("schiba.txt") as $line){
    echo $line."<br>";
}

//annonymous classes
interface Logger{
    public function Log(string $msg);
}
class Application{
    public function appLogger(Logger $logger){
        $logger->log("Log this message");
    }
}
//using anonymous cls to implement logger interface//
$app = new Application;
$app->appLogger(new class implements Logger{
    public function log($msg){
        echo $msg."<br>";
    }
});

//trailing commas
$name = "ayoub";
$email = "ayoub@test.io";
$user = compact('name','email',);
var_dump($user);
