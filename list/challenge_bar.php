<?php

require_once("bar_lib.php");

$conn = null;


try {
    // DB 접속
    if(!my_db_conn($conn)) {
        // DB Instance 에러
        throw new Exception("DB Error : PDO Instance"); // 강제 예외발생 : DB Instance
    }

    $challenge_bar = db_select_challenge_bar($conn);
    if($challenge_bar === false) {
		throw new Exception("select_challenge Error");
	}

} catch(Exception $e) {
    echo $e->getMessage(); // 예외발생 메세지 출력
    exit; // 처리 종료
} finally {
    db_destroy_conn($conn); // DB 파기
}

?>

<link rel="stylesheet" href="challenge_bar.css">
<div class="challenge_bar box1">
    <form action="/project1/detail/in-progress.php" method="get">
        <header class="challenge_header">
            <p class="challenge_title">Challenge</p>
            <button class="insert_button">+</button>
        </header>
        <section>
            <?php
            foreach($challenge_bar as $item) {
                if($item["c_com_at"] == null) { ?>
                    <button class="challenge_list_not_select challenge_list_shadow" name="create_id" value="<?php echo $item["create_id"];?>"><?php echo $item["c_name"]; ?></button> <br>
                <?php }
                if($item["c_com_at"] != "") { ?>
                    <button class="challenge_list_select_2 challenge_list_shadow" name="create_id" value="<?php echo $item["create_id"];?>"><?php echo $item["c_name"]; ?></button> <br>
                <?php }
            }
            ?>
        </section>
    </form>
</div>