<!-- xcopy D:\workspace\project1 C:\Apache24\htdocs\project1 /E /Y -->
<?php
require_once("com_lib.php"); // DB 라이브러리
// require_once("")
// DB connect
$conn = null; // DB 커넥션 변수
try {
       // DB 접속
       if (!my_db_conn($conn)) {
        // DB Instance 에러
        //아규먼트로 에러 메세지를 출력
        throw new Exception("DB Error : PDO instance"); // 강제 예외 발생 : DB Instance
        }
        // 리스트 조회
        $result = db_select_create_information($conn);
        if(!$result) {
            // Select 에러
            throw new Exception("DB Error : SELECT"); // 강제 예외 발생 : SELECT board
        }

        $data = [];
        foreach($result as $item) {
            $arr_param = [
                "c_id" => $item["c_id"]
            ];

            // 완료 리스트 조회
             $result1 = db_select_com_list($conn, $arr_param);
             if(!$result1) {
                 // Select 에러
                 throw new Exception("DB Error : SELECT com list"); // 강제 예외 발생 : SELECT board
             }

             // 화면 표시용 데이터 배열에 데이터 삽입
             $arr_item = [
                "create_id" => $item["create_id"]
                ,"c_id" => $item["c_id"]
                ,"c_created_at" => $item["c_created_at"]
                ,"c_com_at" => $item["c_com_at"]
                ,"c_name" => $item["c_name"]
                ,"list" => $result1
             ];
             $data[] = $arr_item;
        }
        //  [
        //     [
        //         "c_id" => 1
        //         ,"c_created_at" => 20231010
        //         ,"list" => [
        //             0 => ["l_name => "이름1"]
        //             ,1 => ["l_name => "이름2"]
        //             ,2 => ["l_name => "이름3"]
        //             ,3 => ["l_name => "이름4"]
        //         ]
        //     ]
        //     ,
        //     [
        //         "c_id" => 2
        //         ,"list" => [
        //             "이름1"
        //             ,"이름2"
        //             ,"이름3"
        //             ,"이름4"
        //         ]
        //     ]
        // ];
    }
catch(Exception $e) {
        // 예외 발생 메세지 (getMessage 메소드) 출력
        echo $e->getMessage();
        // 처리 종료
        exit;
    }
finally {
        db_destroy_conn($conn); //DB 파기
    }
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Black+Han+Sans&family=Nanum+Pen+Script&family=Noto+Sans+KR:wght@300;400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../list/header.css">
    <link rel="stylesheet" href="../list/challenge_bar.css">
    <link rel="stylesheet" href="../list/status.css">
    <link rel="stylesheet" href="complete.css">
</head>
<body>
    <?php
    require_once("../list/header.html");
    require_once("../list/challenge_bar.html");
    require_once("../list/status.html");
    // var_dump($result);
    ?>
    <main class="list_com_main">
    <div class="list_section">
        <?php
            foreach($data as $item){
        ?>
                <div class="list_com_bg">
                    <div class="list_com_border">
                        <div class="list_header">
                        <p class="list_com_title"><?php echo $item["c_name"]; ?></p>
                        <p class="list_date"> <?php echo $item["c_created_at"]; ?> ~ <span class="red"><?php echo $item["c_com_at"]; ?> <span> </p>
                        </div>
                        <ul>
                        <?php
                            foreach($item["list"] as $list_name) {
                        ?>
                                    <li><div class="bullet"></div><?php echo $list_name["l_name"]; ?></li>
                                    <div class="border_line"></div>
                        <?php
                            }
                        ?>
                        </ul>
                        <a class="list_delete" href=""><img src="../src/icon_trash_.png" alt="" width="20"></a>
                    </div>
                </div>
        <?php
            }
        ?>
    </div>
    </main>
</body>
</html>