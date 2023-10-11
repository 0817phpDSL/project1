<?php

function my_db_conn( &$conn ) {
    $db_host    = "192.168.0.142"; // host
    $db_user    = "team3"; // user
    $db_pw      = "team3"; //password
    $db_name    = "todolist"; // DB name
    $db_charset = "utf8mb4"; //charset
    $db_dns     = "mysql:host=".$db_host.";dbname=".$db_name.";charset=".$db_charset;

    try {
        $db_options = [
            // DB의 Prepared Statement 기능을 사용하도록 설정
            PDO::ATTR_EMULATE_PREPARES      => false
            // PDO Exception을 Throws 하도록 설정
            ,PDO::ATTR_ERRMODE              => PDO::ERRMODE_EXCEPTION
            // 연상배열로 Fetch를 하도록 설정
            ,PDO::ATTR_DEFAULT_FETCH_MODE   => PDO::FETCH_ASSOC
        ];

        // PDO Class로 DB 연동
        $conn = new PDO($db_dns, $db_user, $db_pw, $db_options);
        return true;
    } catch (Exception $e){
        $conn = null;
        return false;
    }
}
 // ------------------------------------
    // 함수명        : db_destroy_conn
    // 기능          : DB destroy
    // 파라미터      : PDO    &$conn
    // 리턴          : 없음
    // ------------------------------------
 function db_destroy_conn(&$conn) {
        $conn = null;
}

// 리스트 함수
function db_select_create_information(&$conn) {

try {
    $sql =
    " SELECT ".
    " ch_inf.c_name, ch_inf.l_name, DATE(create_inf.c_created_at) as c_created_at,
        DATE(create_inf.c_com_at) as c_com_at ".
    " FROM ".
    " chal_info ch_inf ".
    " JOIN ".
    " create_information create_inf ".
    " ON ".
    " ch_inf.c_id=create_inf.c_id ".
    " AND ".
    " create_inf.create_id=1 "
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
function db_select_com_list(&$conn) {
    try {
    $sql = 
    " SELECT ".
    " * ".
    " FROM ".
    " create_information ".
    " WHERE ".
    " c_com_at IS NOT NULL"
    ;
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll();

return $result; // 정상 : 쿼리 결과 리턴

} catch(Exception $e) {
    return false; // 예외발생 : false 리턴

    }
}