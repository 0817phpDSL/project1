<?php

require_once($_SERVER["DOCUMENT_ROOT"]."/project1/list/bar_lib.php");
require_once($_SERVER["DOCUMENT_ROOT"]."/project1/detail/in_lib.php");


if(!my_db_conn($conn)) {
	// DB Instance 에러
	throw new Exception("DB Error : PDO Instance");
}
$http_method = $_SERVER["REQUEST_METHOD"];
if($http_method === "GET") {
	$arr_get = $_GET;
	$arr_get["create_id"] = isset($arr_get["create_id"]) ? $arr_get["create_id"] : "1";

} else {
	try{
		$arr_post = $_POST;
		$arr_post["l_id"] = isset($arr_post["l_id"]) ? $arr_post["l_id"] : "";

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

	<!-- <link rel="stylesheet" href="../list/header.css"> -->
	<link rel="stylesheet" href="../list/status.css">
	<link rel="stylesheet" href="../list/challenge_bar.css">
	<title>Document</title>
</head>
<body>
	<?php
    // require_once("../list/header.html");
    require_once("../list/status.html");
	require_once("../list/challenge_bar.php");
    ?>
	<section class="section-in">
		<form class="form-in" action="in-progress.php" method="post">
			<p class="create_at">2023년 10월 10일</p>
			<?php
			foreach($list_name as $tit) { ?>
			<p class="ch-name"><?php echo $tit["c_name"]; ?></p>
			<?php } ?>
			<progress class="progress" value="50" max="100"></progress>
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
	<form action="../delete/delete.php" method="get">
		<input type="hidden" name="page_flg" value="0">
		<button name="create_id" value="<?php echo $arr_get["create_id"]; ?>" onclick="location.href('../delete/delete.php')" class="trash"></button>
	</form>
	</section>
</body>
</html>