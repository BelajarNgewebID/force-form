<?php

$answer = @$_POST['answer'];
if($answer == "") {
    $answer = base64_decode(@$_GET['a']);
}

$data = file_get_contents("./answer.json");
$data = json_decode($data, true);

$data['savedAnswer'] = $answer;
$data = json_encode($data, true);

$open = fopen("./answer.json", "w");
$write = fwrite($open, $data);
fclose($open);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="./assets/google.css">
    <link rel="stylesheet" href="./assets/style.css">
    <link rel="shortcut icon" href="./assets/icon.png">
    <style>
        #description {
            margin-top: 20px;
            font-size: 14px;
        }
    </style>
</head>
<body>
    
<div class="container header">
    <div class="border"></div>
    <div class="wrap">
        <h1 id="title"></h1>
        <p id="description">Tanggapan Anda "<b><?= $answer ?></b>" telah direkam.</p>
        <p>
            <a href="./">Kirim tanggapan lain</a>
        </p>
    </div>
</div>

<script src="lib.js"></script>
<script>
    get('./data.json').then(res => {
        let data = res

        bind('title', data.title)
        bind('#title', data.title)
    })
</script>

</body>
</html>