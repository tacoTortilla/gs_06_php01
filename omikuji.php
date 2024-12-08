<?php

//ランダム 0～4の数字の出力
$random = rand(0,4);

$result = ["大吉","中吉","小吉","吉","凶"][$random];

// if($random === 0) {
//    $result = "大吉";
// }elseif($random === 1){
//    $result = "中吉";
// }elseif($random === 2){
//    $result = "小吉";
// }elseif($random === 3){
//    $result = "吉";
// }elseif($random === 4){
//    $result = "凶";
// }

//var_dump($result);
//exit();

?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        span {
            color: blue; /* 文字色を青に設定 */
        }
    </style>
</head>
<body>
    <h1>おみくじの結果は<span><?= $result ?></span>です</h1>
</body>
</html>
