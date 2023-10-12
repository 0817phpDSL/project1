<?php

require_once($_SERVER["DOCUMENT_ROOT"]."/project1/list/bar_lib.php");
require_once($_SERVER["DOCUMENT_ROOT"]."/project1/detail/in_lib.php");


if(!my_db_conn($conn)) {
	// DB Instance 에러
	throw new Exception("DB Error : PDO Instance");
}
$http_method = $_SERVER["REQUEST_METHOD"];
	$arr_get = $_GET;
	$arr_get["create_id"] = isset($arr_get["create_id"]) ? $arr_get["create_id"] : "1";
if($http_method === "POST") {
	try{
		$arr_post = $_POST;
		$arr_post["l_id"] = isset($arr_post["l_id"]) ? $arr_post["l_id"] : "";
		print_r($arr_post);

		$arr_get = $arr_post;

		$com_list = db_complete_list($conn, $arr_post);
		if($com_list === false) {
		throw new Exception("complete_list Error");

		}
		$conn->commit();
		header("Location: in-progress.php");
		exit;

	} catch(Exception $e) {
		$conn->rollBack();
		echo $e->getMessage(); // Exception 메세지 출력
		exit;
	} finally {
		db_destroy_conn($conn); // DB 파기
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
			<button class="button-in" name="l_id" value="<?php echo $item["l_id"];?>"><p class="pro-menu" ><?php echo $item["l_name"] ?></p> <p class="pro-clear">1/1</p></button>
		<?php } ?>
			<a href=""><img class="trash" src="../src/trash.png" alt=""></a>
		</form>
	</section>
</body>
</html>