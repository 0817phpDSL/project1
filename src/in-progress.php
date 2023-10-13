<?php

define("ROOT", $_SERVER["DOCUMENT_ROOT"]."/project1/src/");
define("FILE_HEADER", ROOT."html/header.html");
define("FILE_STATUS", ROOT."status.php");
define("FILE_CHALLENGE", ROOT."challenge_bar.php");
require_once(ROOT."lib/in_lib.php");
require_once(ROOT."lib/bar_lib.php");

$com = [];

if(!my_db_conn($conn)) {
	// DB Instance 에러
	throw new Exception("DB Error : PDO Instance");
}

// $challenge_first = db_challenge_first($conn);
// if($challenge_first === false) {
// 	// DB Instance 에러
// 	throw new Exception("challenge_first Error");
// }

$http_method = $_SERVER["REQUEST_METHOD"];
if($http_method === "GET") {
	$arr_get["create_id"] = isset($_GET["create_id"]) ? $_GET["create_id"] : "1";

} else {
	try{
		$arr_post = [];
		$arr_post["create_id"] = isset($_POST["create_id"]) ? $_POST["create_id"] : "";
		$arr_post["l_id"] = isset($_POST["l_id"]) ? $_POST["l_id"] : "";

		$arr_get = $arr_post;

		$conn->beginTransaction();
		$com_list = db_complete_list($conn, $arr_post);
		if($com_list === false) {
		throw new Exception("complete_list Error");
		}

		$com_check = db_select_complete_check($conn, $arr_post);
		if($com_check === false) {
			throw new Exception("complete_check Error");
		}

		foreach($com_check as $value) {
			if($value["l_com_at1"] != "" && $value["l_com_at2"] != "" && $value["l_com_at3"] != "" && $value["l_com_at4"] != "") {
				$c_com = ["create_id" => $value["create_id"]];
				if(db_complete_at($conn, $c_com) === false) {
					throw new Exception("complete_at Error");
				}
			}
		}

		$conn->commit();
	} catch(Exception $e) {
		$conn->rollBack();
		echo $e->getMessage(); // Exception 메세지 출력
		exit;
	}
}

$list = db_select_list($conn, $arr_get);
if($list === false) {
	// DB Instance 에러
	throw new Exception("list Error");
}

$list_name = db_select_list_name($conn, $arr_get);
if($list_name === false) {
	throw new Exception("list_name Error");
}

$list_per = db_complete_num($conn, $arr_get);
if($list_per === false) {
	throw new Exception("list_name Error");
}

$list_created_at = db_select_list_created_at($conn, $arr_get);
if($list_created_at === false) {
	// DB Instance 에러
	throw new Exception("list_created_at Error");
}

$in_progress_c_id = $arr_get["create_id"];
?>

<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="./css/in-progress.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Black+Han+Sans&family=Nanum+Pen+Script&family=Noto+Sans+KR:wght@300;400&display=swap" rel="stylesheet">

	<!-- <link rel="stylesheet" href="./css/header.css"> -->
	<link rel="stylesheet" href="./css/status.css">
	<link rel="stylesheet" href="./css/challenge_bar.css">
	<title>Document</title>
</head>
<body>
	<?php
    // require_once(FILE_HEADER);
	require_once(FILE_STATUS);
	require_once(FILE_CHALLENGE);
    ?>
	<section class="section-in">
		<form class="form-in" action="in-progress.php" method="post">
			<p class="create_at"><?php echo $list_created_at[0]["DATE(c_created_at)"]; ?></p>
			<?php
			foreach($list_name as $tit) { ?>
			<p class="ch-name"><?php echo $tit["c_name"]; ?></p>
			<?php } ?>
			<progress class="progress" value="<?php echo $list_per[0]["per"]; ?>" max="100"></progress>
			<?php
			foreach($list as $item) { ?>
			<input type="hidden" name="create_id" value="<?php echo $item["create_id"] ?>">
			<?php
			if($item["l_id"] == 1 && $item["l_com_at1"] != "") {
			?>	<button class="button-com" name="l_id" value="<?php echo $item["l_id"];?>"><?php
			} else if($item["l_id"] == 2 && $item["l_com_at2"] != "") {
			?>	<button class="button-com" name="l_id" value="<?php echo $item["l_id"];?>"><?php
			} else if($item["l_id"] == 3 && $item["l_com_at3"] != "") {
			?>	<button class="button-com" name="l_id" value="<?php echo $item["l_id"];?>"><?php
			} else if($item["l_id"] == 4 && $item["l_com_at4"] != "") {
			?>	<button class="button-com" name="l_id" value="<?php echo $item["l_id"];?>"><?php
			} else {
			?>	<button class="button-in" name="l_id" value="<?php echo $item["l_id"];?>"><?php
			}
			?>
			<p class="pro-menu" ><?php echo $item["l_name"] ?></p>
			<p class="pro-clear"><?php if($item["l_id"] == 1 && $item["l_com_at1"] != "") {
				echo "1/1";
			} else if($item["l_id"] == 2 && $item["l_com_at2"] != "") {
				echo "1/1";
			} else if($item["l_id"] == 3 && $item["l_com_at3"] != "") {
				echo "1/1";
			} else if($item["l_id"] == 4 && $item["l_com_at4"] != "") {
				echo "1/1";
			} else {
				echo "0/1";
			} ?></p>
		</button>
		<?php } ?>
	</form>
	<form action="delete.php" method="get">
		<input type="hidden" name="page_flg" value="0">
		<button name="create_id" value="<?php echo $arr_get["create_id"]; ?>" onclick="location.href('../delete/delete.php')" class="trash"></button>
	</form>
	</section>
</body>
</html>