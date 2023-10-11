<?php

require_once("bar_lib.php");

$conn = null;


try {
    // DB 접속
    if(!my_db_conn($conn)) {
        // DB Instance 에러
        throw new Exception("DB Error : PDO Instance"); // 강제 예외발생 : DB Instance
    }

	$challenge = db_select_challenge($conn);
	if($challenge === false) {
		throw new Exception("select_challenge Error");
	}

    $challenge[]
    


} catch(Exception $e) {
    echo $e->getMessage(); // 예외발생 메세지 출력
    exit; // 처리 종료
} finally {
    db_destroy_conn($conn); // DB 파기
}

?>

<!-- <link rel="stylesheet" href="challenge_bar.css"> -->
<div class="challenge_bar box1">
<form action="">
<header class="challenge_header">
<p class="challenge_title">Challenge</p>
<button class="insert_button">+</button>
</header>
<section>
<?php
foreach($challenge as $item) {
    for($i = 0; $i <= ; $i++) { ?>
    <button class="challenge_list_select challenge_list_shadow"><?php echo ;?></button> <br>
    <?php
    } 
    } ?>
</section>
</form>
</div>