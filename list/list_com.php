<!-- xcopy D:\workspace\project1 C:\Apache24\htdocs\project1 /E /Y -->

<?php

?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
    <link rel="stylesheet" href="header.css">
    <link rel="stylesheet" href="challenge_bar.css">
    <link rel="stylesheet" href="status.css">
    <link rel="stylesheet" href="list_com.css">
</head>
<body>
    <?php
    require_once("challenge_bar.html");
    ?>
    <header class="h_header">
	갓생살기
    </header>

    <section class="section-nav">
		<div class="section-div">
		<p class="p-nav">Status</p>
		<br>
		<p class="box-in"></p><a href=""> in progress</a>
		<br>
		<p class="box-com"></p><a href=""> complete</a>
	</div>
	</section>

    <main class="list_com_main">
        <div class="list_com">
            <p class="list_com_title">다이어트</p>
            <ul>
                <li>물 2L 이상 마시기</li>
                <hr>
                <li>매끼 단백질 섭취</li>
                <li>플랭크 30~40초 5세트하기</li>
                <li>하루 10000보 걷기</li>
            </ul>
        </div>
    </main>
</body>
</html>