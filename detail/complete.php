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

        // 제목 조회
        $result = db_select_create_information_title($conn);
        if(!$result) {
            // Select 에러
            throw new Exception("DB Error : SELECT"); // 강제 예외 발생 : SELECT board
        }
        // 리스트 조회

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
    
    ?>

    <main class="list_com_main">
    <div class="list_section">
        <div class="list_com_bg">
            <div class="list_com_border">

                <div class="list_header">
                    <?php
                    //리스트 생성
                    foreach($result as $item) {
                    ?>
                    <p class="list_com_title"><?php echo $item["c_name"]; ?></p>
                    <p class="list_date"> 2023/10/01 ~ <span class="red">2023/10/03 <span> </p>
                </div>
            <ul>
            <li><div class="bullet"></div><?php echo $item["l_name"]; ?></li>
            <div class="border_line"></div>
                <li><div class="bullet"></div><?php echo $item["l_name"]; ?></li>
                <div class="border_line"></div>
                <li><div class="bullet"></div><?php echo $item["l_name"]; ?></li>
                <div class="border_line"></div>
                <li><div class="bullet"></div><?php echo $item["l_name"]; ?></li>
                <div class="border_line"></div>
                <?php } ?>
            </ul>
            <a class="list_delete" href=""><img src="../src/icon_trash_.png" alt="" width="20"></a>
        </div>
        </div>
        <div class="list_com_bg">
            <div class="list_com_border">

                <div class="list_header">
                    <p class="list_com_title">다이어트</p>
                    <p class="list_date"> 2023/10/01 ~ <span class="red">2023/10/03 <span> </p>
                </div>
            <ul>
            <li><div class="bullet"></div>물 2L 이상 마시기</li>
            <div class="border_line"></div>
                <li><div class="bullet"></div>매끼 단백질 섭취</li>
                <div class="border_line"></div>
                <li><div class="bullet"></div>플랭크 30~40초 5세트하기</li>
                <div class="border_line"></div>
                <li><div class="bullet"></div>하루 10000보 걷기</li>
                <div class="border_line"></div>
            </ul>
            <a class="list_delete" href=""><img src="../src/icon_trash_.png" alt="" width="20"></a>
        </div>
        </div>
        <div class="list_com_bg">
            <div class="list_com_border">

                <div class="list_header">
                    <p class="list_com_title">다이어트</p>
                    <p class="list_date"> 2023/10/01 ~ <span class="red">2023/10/03 <span> </p>
                </div>
            <ul>
            <li><div class="bullet"></div>물 2L 이상 마시기</li>
            <div class="border_line"></div>
                <li><div class="bullet"></div>매끼 단백질 섭취</li>
                <div class="border_line"></div>
                <li><div class="bullet"></div>플랭크 30~40초 5세트하기</li>
                <div class="border_line"></div>
                <li><div class="bullet"></div>하루 10000보 걷기</li>
                <div class="border_line"></div>
            </ul>
            <a class="list_delete" href=""><img src="../src/icon_trash_.png" alt="" width="20"></a>
        </div>
        </div>
        <div class="list_com_bg">
            <div class="list_com_border">

                <div class="list_header">
                    <p class="list_com_title">다이어트</p>
                    <p class="list_date"> 2023/10/01 ~ <span class="red">2023/10/03 <span> </p>
                </div>
            <ul>
            <li><div class="bullet"></div>물 2L 이상 마시기</li>
            <div class="border_line"></div>
                <li><div class="bullet"></div>매끼 단백질 섭취</li>
                <div class="border_line"></div>
                <li><div class="bullet"></div>플랭크 30~40초 5세트하기</li>
                <div class="border_line"></div>
                <li><div class="bullet"></div>하루 10000보 걷기</li>
                <div class="border_line"></div>
            </ul>
            <a class="list_delete" href=""><img src="../src/icon_trash_.png" alt="" width="20"></a>
        </div>
        </div>
        <!--  -->
        <div class="list_com_bg">
            <div class="list_com_border">

                <div class="list_header">
                    <p class="list_com_title">다이어트</p>
                    <p class="list_date"> 2023/10/01 ~ <span class="red">2023/10/03 <span> </p>
                </div>
            <ul>
            <li><div class="bullet"></div>물 2L 이상 마시기</li>
            <div class="border_line"></div>
                <li><div class="bullet"></div>매끼 단백질 섭취</li>
                <div class="border_line"></div>
                <li><div class="bullet"></div>플랭크 30~40초 5세트하기</li>
                <div class="border_line"></div>
                <li><div class="bullet"></div>하루 10000보 걷기</li>
                <div class="border_line"></div>
            </ul>
            <a class="list_delete" href=""><img src="../src/icon_trash_.png" alt="" width="20"></a>
        </div>
        </div>
        <!-- -->
        <div class="list_com_bg">
            <div class="list_com_border">

                <div class="list_header">
                    <p class="list_com_title">다이어트</p>
                    <p class="list_date"> 2023/10/01 ~ <span class="red">2023/10/03 <span> </p>
                </div>
            <ul>
            <li><div class="bullet"></div>물 2L 이상 마시기</li>
            <div class="border_line"></div>
                <li><div class="bullet"></div>매끼 단백질 섭취</li>
                <div class="border_line"></div>
                <li><div class="bullet"></div>플랭크 30~40초 5세트하기</li>
                <div class="border_line"></div>
                <li><div class="bullet"></div>하루 10000보 걷기</li>
                <div class="border_line"></div>
            </ul>
            <a class="list_delete" href=""><img src="../src/icon_trash_.png" alt="" width="20"></a>
        </div>
        </div>
        </div>
    </main>
</body>
</html>