<?php

function db_select_list(&$conn, &$arr_post) {
	try {
		$sql =
        " SELECT "
        ." cr.create_id, cr.c_id, ch.l_id, ch.l_name "
        ." FROM create_information cr "
        ." JOIN "
        ." chal_info ch "
        ." ON "
        ." cr.c_id = ch.c_id "
        ." AND "
        ." cr.create_id = :create_id ";

        $arr_ps = [
            ":create_id" => $arr_post["create_id"]
        ];

        $stmt = $conn->prepare($sql);
        $stmt->execute($arr_ps);
        $result = $stmt->fetchAll();
        return $result; // 정상 : 쿼리 결과 리턴
    } catch(Exception $e) {
        return false; // 예외 발생 : false 리턴
    }
}