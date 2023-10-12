<!-- xcopy D:\workspace\project1 C:\Apache24\htdocs\project1 /E /Y -->
<?php
require_once("insert_lib.php");

try{
	// DB접속
	if(!my_db_conn($conn)){
		throw new exception ("DB Error : PDO Instance")
	}
}

?>
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
	require_once("../list/header.html");
	require_once("../list/status.html");
	?>
<form action="" method="post">
	<div class="container">
		<p class="create_at">2023년 10월 10일</p>

		<label for="chk1" class="div_1 div_css">
		<input type="radio" name="chk" id="chk1" value="1">
				<h3>건강한 아침 챌린지</h3>
				<br>		
					스트레칭 하기 0/1
					<br>
					물 마시기 0/1
					<br>
					햇볓 쬐기 0/1
					<br>
					아침 식사 0/1
		</label>

			<label for="chk2" class="div_1 div_css">
			<input type="radio" name="chk" id="chk2" value="2">
				<h3>좋은 수면 챌린지</h3> 
				<br>
					스트레칭 하기 0/1
					<br>
					자기 전 카페인 섭취하지 않기 0/1
					<br>
					하루 7시간 이상 취침 0/1
					<br>
					독서하기 0/1		
			</label>

				<br>
				<label for="chk3" class="div_1 div_css">
				<input type="radio" name="chk" id="chk3" value="3">
					<h3>뇌 건강 챌린지</h3>
					<br>
					20분 산책하기 0/1
					<br>
					견과류 먹기 0/1 
					<br>
					독서하기 0/1
					<br>
					일기 쓰기 0/1
				</label>

				<label for="chk4" class="div_1 div_css">
				<input type="radio" name="chk" id="chk4" value="4">
					<h3>다이어트 챌린지</h3>
					<br>
					물 2리터 이상 마시기 0/1
					<br>
					매끼 단백질 섭취 0/1
					<br>
					플랭크 30~40초 5세트 하기 0/1
					<br>
					하루 10000보 걷기
				</label>
			<br>
			<label for="chk5" class="div_1 div_css">
			<input type="radio" name="chk" id="chk5" value="5">
					<h3>갓생살기</h3> 
					<br>
					하루 sns 금지 0/1
					<br>
					매일 3000원 저금하기 0/1
					<br>
					오후 11시전 취침 0/1
					<br>
					채식 하루 도전 0/1
			</label>	
			<footer>
				<button class="button_yes div_css" type="submit">확인</button>
				<button class="button_no div_css"><a class="a_button" href="../project1/list/main.php">취소</a></button>
			</footer>
	</div>	

</form>	
</body>
</html>