<?php
$str = '';

//read onlyで開く
$file = fopen('data/todo.txt', 'r');
flock($file, LOCK_EX);

//一行毎に読み込んで表示する
if($file){
  //順番に中身を取り出してタグに入れて$strに追加する
  while($line = fgets($file)){
    $str .= "<tr><td>{$line}</td></tr>";
  }
}

flock($file, LOCK_UN);
fclose($file);


?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>textファイル書き込み型todoリスト（一覧画面）</title>
</head>

<body>
  <fieldset>
    <legend>textファイル書き込み型todoリスト（一覧画面）</legend>
    <a href="todo_txt_input.php">入力画面</a>
    <table>
      <thead>
        <tr>
          <th>todo</th>
          <?= $str ?>
        </tr>
      </thead>
      <tbody>

      </tbody>
    </table>
  </fieldset>
</body>

</html>