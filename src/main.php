<!-- xcopy D:\workspace\project1 C:\Apache24\htdocs\project1 /E /Y -->

<?php
define("ROOT", $_SERVER["DOCUMENT_ROOT"]."/project1/src/"); //웹 서버
define("FILE_HEADER", ROOT."html/header.html");
define("FILE_STATUS", ROOT."status.php");
define("FILE_CHALLENGE", ROOT."challenge_bar.php");
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css">
    <title>Document</title>
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/challenge_bar.css">
    <link rel="stylesheet" href="css/status.css">
</head>
<body>
    <?php
     require_once(FILE_HEADER);
     require_once(FILE_STATUS);
     
    ?>
<section class="section-in">
</section>
<?php
require_once(FILE_CHALLENGE);
?>
</body>
</html>