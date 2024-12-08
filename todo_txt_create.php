<?php

// var_dump($_POST);
// exit();

$todo = $_POST['todo'];
$deadline = $_POST['deadline'];

$write_data = "{$deadline} {$todo}\n";

//file openして なければ作成する 'a'
//file openして ロックして、書いて解除して、閉じる
$file = fopen('data/todo.txt', 'a');
flock($file, LOCK_EX);
fwrite($file, $write_data);
flock($file, LOCK_UN);
fclose($file);

//ページ移動する。元のページを指定
header('LOCATION:todo_txt_input.php');
exit();
