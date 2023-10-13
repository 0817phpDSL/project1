<?php
define("ROOT", $_SERVER["DOCUMENT_ROOT"]."/project1/src/"); // 웹서버 root 패스 생성
require_once(ROOT."lib/delete_lib.php"); // DB관련 라이브러리

// 삭제할 대상 = 챌린지id? 게시글id? 게시글id로 구별해야됨. 챌린지id는 중복이 있기때문
// 삭제 취소하면 돌아갈 페이지
// $create_id = $_GET["create_id"]; // create_id : 게시글 구별하는 id
// $page_flg = $_GET["page_flg"];	// 페이지 구별하는 플래그. "0":in_pro(진행중), "1":com(완료). 삭제 취소하거나 삭제하면 원래 있던 페이지로 돌아감

// $create_id = [
// 	"create_id" => $create_id
// ];
// $page_flg = [
// 	"page_flg" => $page_flg
// ];


$arr_get = [];
// 빈 배열로 선언해주고 시작해야됨.

$conn = null;
// try {
	if(!my_db_conn($conn)) {
		throw new Exception("DB Error : PDO Instance");
	}
	
	// print_r($_GET);
	
	
	$http_method = $_SERVER["REQUEST_METHOD"];

	if($http_method === "GET") {
		$arr_get = $_GET;
	
		$result = db_select_boards_id($conn, $arr_get);
	
		// 예외 처리
		if($result === false) {
			throw new Exception("DB Error : Select id");
		}
	} else {
		try{
			$arr_post = $_POST;

			$conn->beginTransaction();

			if(!db_delete_boards_id($conn, $arr_post)) {
				throw new Exception("delete Error");
			}
			
			$conn->commit();
			if($arr_post["page_flg"] === "0") {
				header("Location: in-progress.php");
			} else if($arr_post["page_flg"] === "1") {
				header("Location: complete.php");
			}
			exit;
		} catch(Exception $e) {
			$conn->rollBack();
			echo $e->getMessage();
			exit;
		}
	}
	
	// method가 get일때. 게시글 조회하는 동작.
	// if($http_method === "GET") {
		// 	$create_id = isset($_GET["create_id"]) ? $_GET["create_id"] : "";
		// 	$page_flg = isset($_GET["page_flg"]) ? $_GET["page_flg"] : "";
		



		// print_r($arr_get);
		// print_r($result);
		// print_r($_POST);
		// } else if(!(count($result) === 1)) {
		// 	// result가 true면 갯수를 세고, 갯수가 1이 아니면 예외발생?
		// 	throw new Exception("DB Error : Select id Count");
		// }
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
	<link rel="stylesheet" href="./css/delete.css">
	<title>Delete</title>
</head>

<body class="delete_body">
	<div class="abc">
		<table class="cancel_box" >
				<tr>
					<td>
						<?php echo $result[0]["c_name"]; ?>
					</td>
				</tr>
				<tr>
					<td>
						<p><?php if($result[0]["c_com_at"] === null) {
							echo "진행중인";
						 } else if($result[0]["c_com_at"] != null) {
							echo "완료된"; } ?> 페이지를 삭제하시겠습니까?</p>
					</td>
				</tr>
				<tr>
					<td>
					<form action="delete.php" method="post">
						<input type="hidden" name="page_flg" value="<?php echo $arr_get["page_flg"] ?>">
						<button class="btn2" type='submit' name="create_id" value="<?php echo $result[0]["create_id"] ?>">ㅇㅇ..</button>
						<a class="btn1" href="<?php if($arr_get["page_flg"] === "0") {
							echo "in-progress.php";
						} else if($arr_get["page_flg"] === "1") {
							echo "complete.php";
						} 
						?>">ㄴㄴ..</a>
					</form>
					</td>
				</tr>
		</table>
	</div>
</body>

</html>
