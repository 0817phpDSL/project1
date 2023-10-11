<?php

require_once($_SERVER["DOCUMENT_ROOT"]."/project1/list/bar_lib.php");
require_once($_SERVER["DOCUMENT_ROOT"]."/project1/detail/in_lib.php");

if(!my_db_conn($conn)) {
	// DB Instance 에러
	throw new Exception("DB Error : PDO Instance");
}

$http_method = $_SERVER["REQUEST_METHOD"];
$arr_post = $_POST;

$arr_post["create_id"] = isset($arr_post["create_id"]) ? $arr_post["create_id"] : "1";
print_r($arr_post);

$list = db_select_list($conn, $arr_post);
if($list === false) {
	// DB Instance 에러
	throw new Exception("list Error");

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
		<form class="form-in" action="">
			<p class="create_at">2023년 10월 10일</p>
			<p class="ch-name">건강한 아침</p>
			<progress class="progress" value="50" max="100"></progress>
			<?php
			foreach($list as $item) { ?>
			<button class="button-in"><p class="pro-menu"><?php echo $item["l_name"] ?></p> <p class="pro-clear">1/1</p></button>
		<?php } ?>
			<a href=""><img class="trash" src="../src/trash.png" alt=""></a>
		</form>
	</section>
</body>
</html>