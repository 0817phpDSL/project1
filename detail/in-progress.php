<?php



?>

<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="in-progress.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Black+Han+Sans&family=Nanum+Pen+Script&family=Noto+Sans+KR:wght@300;400&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="../list/header.css">
	<link rel="stylesheet" href="../list/status.css">
	<link rel="stylesheet" href="../list/challenge_bar.css">
	<title>Document</title>
</head>
<body>
	<?php
    require_once("../list/header.html");
    require_once("../list/status.html");
	require_once("../list/challenge_bar.html");
    ?>
	<section class="section-in">
		<form class="form-in" action="">
			<p class="create_at">2023년 10월 10일</p>
			<p class="ch-name">건강한 아침</p>
			<progress class="progress" value="50" max="100"></progress>
			<button class="button-in"><p class="pro-menu">스트레칭하기</p> <p class="pro-clear">1/1</p></button>
			<button class="button-in"><p class="pro-menu">물 마시기</p> <p class="pro-clear">0/1</p></button>
			<button class="button-in"><p class="pro-menu">햇볕 쬐기</p> <p class="pro-clear">0/1</p></button>
			<button class="button-in"><p class="pro-menu">아침식사</p> <p class="pro-clear">0/1</p></button>
			<a href=""><img class="trash" src="../src/trash.png" alt=""></a>
		</form>
	</section>
</body>
</html>