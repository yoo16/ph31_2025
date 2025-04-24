<?php
// 1. 変数は 先頭に $
// 2. 行の最後は基本セミコロン ;
$message = "きょうは曇りです";
// Python
// message = "きょうは曇りです"

$title = "マイページ";
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title ?></title>
</head>
<body>
    <h1>こんにちはー</h1>
    <?php echo $message ?>
</body>
</html>