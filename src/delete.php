<?php
define("ROOT", $_SERVER["DOCUMENT_ROOT"]."/project1/src"); // 웹서버 root 패스 생성
require_once(ROOT."/delete_lib.php"); // DB관련 라이브러리

// 삭제할 대상 = 챌린지id? 게시글id?
// 삭제 취소하면 돌아갈 페이지
// $create_id = $_GET["create_id"]; // create_id : 게시글 구별하는 id
// $page_flg = $_GET["page_flg"];	// 페이지 구별하는 플래그. "0":in_pro(진행중), "1":com(완료). 삭제 취소하면 원래 있던 페이지로 돌아감

// $create_id = [
// 	"create_id" => $create_id
// ];
// $page_flg = [
// 	"page_flg" => $page_flg
// ];

$conn = null;

// try {
	if(!my_db_conn($conn)) {
		throw new Exception("DB Error : PDO Instance");
	}

	$http_method = $_SERVER["REQUEST_METHOD"];

	// method가 get일때. 게시글 조회하는 동작.
	// if($http_method === "GET") {
	// 	$create_id = isset($_GET["create_id"]) ? $_GET["create_id"] : "";
	// 	$page_flg = isset($_GET["page_flg"]) ? $_GET["page_flg"] : "";

		// $arr_param = [
		// 	"create_id" => $create_id
		// ];
		// $result = db_select_boards_id($conn, $arr_param);

		// 예외 처리
		// if($result === false) {
		// 	throw new Exception("DB Error : Select id");
		// } else if(!(count($result) === 1)) {
		// 	// result가 true면 갯수를 세고, 갯수가 1이 아니면 예외발생?
		// 	throw new Exception("DB Error : Select id Count");
		// }

		// $item = $result[0];
	// } else {
	// 	$create_id = isset($_POST["create_id"]) ? $_POST["create_id"] : "";

	// 	// Transaction 시작
	// 	// $conn->beginTransaction();

	// 	$arr_param = [
	// 		"create_id" => $create_id
	// 	];
	// }

		// 예외 처리
	// 	if(!db_delete_boards_id($conn, $arr_param)) {
	// 		throw new Exception("DB Error : Delete Boards id");
	// 	}
	// }
		// $conn->commit(); 
		// header("Location: /mini_board/src/list.php"); // 리스트 페이지로 이동
// 		exit; // 처리 종료
// } catch(Exception $e) {
// 	echo $e->getMessage();
// 	exit; 
// } finally {
// 	db_destroy_conn($conn);
// }

?>

<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/delete.css">
	<title>Delete</title>
</head>

<body class="delete_body">
	<div class="abc">
		<table class="cancel_box" >
				<tr>
					<td>
					
					</td>
				</tr>
				<tr>
					<td>
						<p>진행중완료 챌린지를 포기</p>
					</td>

				</tr>
				<tr>
					<td>
					<form action="/project1/src/delete.php" method="post">
						<input type="hidden" name="id" value="">
						<button class="btn1" type='submit'>ㅇㅇ..</button>
						<a class="btn2" href="/project1/src/detail.php/">ㄴㄴ..</a>
					</form>
					</td>
				</tr>
		</table>
	</div>
</body>

</html>
