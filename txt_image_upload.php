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

// 画像が送信されているか確認
if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
    $uploadDir = 'uploads/'; // アップロード先ディレクトリ
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true); // ディレクトリを作成
    }

    $uploadedFile = $_FILES['image']['tmp_name'];
    $fileName = basename($_FILES['image']['name']);
    $targetFilePath = $uploadDir . $fileName;

    // ファイルを移動
    if (move_uploaded_file($uploadedFile, $targetFilePath)) {
        echo "画像をアップロードしました: " . $targetFilePath;
    } else {
        echo "画像のアップロードに失敗しました。";
    }
} else {
    echo "画像が正しく送信されていません。";
}

//ページ移動する。元のページを指定
// header('LOCATION:todo_txt_input.php');
// exit();
