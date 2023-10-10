<!-- xcopy D:\workspace\project1 C:\Apache24\htdocs\project1 /E /Y -->
<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="insert.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Black+Han+Sans&family=Nanum+Pen+Script&family=Noto+Sans+KR:wght@300;400&display=swap" rel="stylesheet">

<link rel="stylesheet" href="../list/header.css">
<link rel="stylesheet" href="../list/status.css">

<title>Document</title>
	
</head>
<body>
	<?php
;
	require_once("../list/header.html");
	require_once("../list/status.html");
	?>
<form action="">
	<div class="container">
		<p class="create_at">2023년 10월 10일</p>

			<button class="div_1 div_css">
				<h3>건강한 아침 챌린지</h3>
				<br>		
					스트레칭 하기 0/1
					<br>
					물 마시기 0/1
					<br>
					햇볓 쬐기 0/1
					<br>
					아침 식사 0/1
				</button>

			<button class="div_2 div_css">
				<h3>좋은 수면 챌린지</h3> 
				<br>
					스트레칭 하기 0/1
					<br>
					자기 전 카페인 섭취하지 않기 0/1
					<br>
					하루 7시간 이상 취침 0/1
					<br>
					독서하기 0/1		
			</button>
				<br>
				<button class="div_3 div_css">
					<h3>뇌 건강 챌린지</h3>
					<br>
					20분 산책하기 0/1
					<br>
					견과류 먹기 0/1 
					<br>
					독서하기 0/1
					<br>
					일기 쓰기 0/1
				</button>
			<button class="div_4 div_css">
					<h3>다이어트 챌린지</h3>
					<br>
					물 2리터 이상 마시기 0/1
					<br>
					매끼 단백질 섭취 0/1
					<br>
					플랭크 30~40초 5세트 하기 0/1
					<br>
					하루 10000보 걷기
			</button>
			<br>
			<button class="div_5 div_css">
					<h3>갓생살기</h3> 
					<br>
					<div class="div_content">
					하루 sns 금지 0/1
					<br>
					매일 3000원 저금하기 0/1
					<br>
					오후 11시전 취침 0/1
					<br>
					채식 하루 도전 0/1
			</button>
			<footer>
				<button class="button_no">안해</button>
				<button class="button_yes">화이팅</button>
			</footer>
	</div>	

</form>	
</body>
</html>