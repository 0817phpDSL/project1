<!-- xcopy D:\workspace\project1 C:\Apache24\htdocs\project1 /E /Y -->
<?php
define("ROOT", $_SERVER["DOCUMENT_ROOT"]."/project1/src/"); //웹 서버
require_once(ROOT."lib/insert_lib.php"); // DB 라이브러리

$arr_post = [];
$conn=null;


$result = db_select_chal_conn($conn);
if(!$result){
	throw new Exception("DB Error:Challenge info error");
}

// DB접속
if(!my_db_conn($conn)){
	throw new exception ("DB Error : PDO Instance");
}

// POST로 request가 왔을 때 처리
$http_method=$_SERVER["REQUEST_METHOD"]; //어떤 메소드로 요청했는지
//만약에 포스트일때; 인서트 페이지에서 포스트로 받아옴
if($http_method === "POST"){
	try{
		// // 파라미터 획득
		$arr_post[] = isset($_POST["chk"]) ? trim($_POST["chk"]) : "1";

			$conn->beginTransaction(); //트랜잭션 시작
			if(!db_insert_create_at($conn, $arr_post)) {
				//DB Insert 에러
				throw new Exception("DB Error : Insert Boards");
			}
			$conn->commit(); //모든 처리 완료 시 커밋
			// 리스트 페이지로 이동
			header("Location: in-progress.php");
			exit;
	} catch(Exception $e) {
		$conn->rollBack();
		echo $e->getMessage(); //exception 메세지 출력
		exit;
	} finally {
		db_destroy_conn($conn); //DB 파기
	}
}

?>
<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/insert.css">
	<link rel="stylesheet" href="css/header.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Black+Han+Sans&family=Nanum+Pen+Script&family=Noto+Sans+KR:wght@300;400&display=swap" rel="stylesheet">

<title>Insert</title>
	
</head>
<body>
	<?php
	require_once(ROOT."html/header.html");
	
	?>
<section class="section-in">
	<form class="boxed" action="insert.php" method="post">
			<p class="create_at"><?php echo date("Y-m-d")?></p>

		<input type="radio" name="chk" id="chk1" value="<?php echo $result[0]["c_id"] ?>">
			<label for="chk1" class="div_1">
				<h3><?php echo $result[0]["c_name"]?></h3>
					<br>
					<p><?php echo $result[0]["l_name"]?></p>
					<p><?php echo $result[1]["l_name"]?></p>
					<p><?php echo $result[2]["l_name"]?></p>
					<p><?php echo $result[3]["l_name"]?></p>
		</label>

		<input type="radio" name="chk" id="chk2" value="<?php echo $result[4]["c_id"] ?>">
			<label for="chk2" class="div_1">
				<h3><?php echo $result[4]["c_name"]?></h3>
					<br>
					<p><?php echo $result[4]["l_name"]?></p>
					<p><?php echo $result[5]["l_name"]?></p>
					<p><?php echo $result[6]["l_name"]?></p>
					<p><?php echo $result[7]["l_name"]?></p>		
		</label>
		<br>

		<input type="radio" name="chk" id="chk3" value="<?php echo $result[8]["c_id"] ?>">
			<label for="chk3" class="div_1">
				<h3><?php echo $result[8]["c_name"]?></h3>
					<br>
					<p><?php echo $result[8]["l_name"]?></p>
					<p><?php echo $result[9]["l_name"]?></p>
					<p><?php echo $result[10]["l_name"]?></p>
					<p><?php echo $result[11]["l_name"]?></p>
					
		</label>

		<input type="radio" name="chk" id="chk4" value="<?php echo $result[12]["c_id"] ?>">
			<label for="chk4" class="div_1">
				<h3><?php echo $result[12]["c_name"]?></h3>
					<br>
					<p><?php echo $result[12]["l_name"]?></p>
					<p><?php echo $result[13]["l_name"]?></p>
					<p><?php echo $result[14]["l_name"]?></p>
					<p><?php echo $result[15]["l_name"]?></p>
		
		</label>
		<br>
		<input type="radio" name="chk" id="chk5" value="<?php echo $result[16]["c_id"] ?>">
			<label for="chk5" class="div_1">
				<h3><?php echo $result[16]["c_name"]?></h3>
					<br>
					<p><?php echo $result[16]["l_name"]?></p>
					<p><?php echo $result[17]["l_name"]?></p>
					<p><?php echo $result[18]["l_name"]?></p>
					<p><?php echo $result[19]["l_name"]?></p>
			
		</label>
	
		<footer>
			<button class="button_yes div_css" type="submit">확인</button>
			<a class="a_no button_no" href="in-progress.php">취소</a>
			</footer>
	</form>	
</section>
</body>
</html>