<?php
// 리스트 함수
function db_select_create_information(&$conn) {
try {
    $sql =
    " SELECT DISTINCT
    ci.create_id
    ,ci.c_id
    ,date(ci.c_created_at) c_created_at
    ,date(ci.c_com_at) c_com_at
    ,ch.c_name
FROM create_information ci
    LEFT OUTER JOIN chal_info ch
        ON ci.c_id = ch.c_id
WHERE ci.c_com_at IS NOT NULL "
 ;
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->fetchAll();
return $result; // 정상 : 쿼리 결과 리턴
} catch(Exception $e) {
return false; // 예외발생 : false 리턴
}
}
// db 완료된 리스트 조회
function db_select_com_list(&$conn, &$arr_param) {
    try {
    $sql =
    " SELECT
    ch.l_name
FROM chal_info ch
WHERE ch.c_id = :c_id "
    ;

    $arr_ps = [
        ":c_id" => $arr_param["c_id"]
    ];
    $stmt = $conn->prepare($sql);
    $stmt->execute($arr_ps);
    $result = $stmt->fetchAll();
return $result; // 정상 : 쿼리 결과 리턴
} catch(Exception $e) {
    return false; // 예외발생 : false 리턴
    }
}