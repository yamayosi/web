<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

define('HOST', 'localhost');
define('USER', 'victory');
define('PASS', 'Victory123');
define('DB', 'victory');
?>

<html>
    
    <head>
        <title>Victory文具</title>
        <meta charset="UTF-8">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <link rel="stylesheet" href="./css/swiper.min.css">
    </head>
    <?php
    $n = 1;
    $count = 1;
    //送信されたデータが空白でない場合の処理
//        if ((isset($_POST['sub'])) && ($_POST['sub'] != '')) {
    /**
     * 接続処理
     */
    /**
     * 接続
     */
    if (!$conn = mysqli_connect(HOST, USER, PASS, DB)) {
        //接続できないとき
        die('接続できません');
    }

    //クエリの文字コード
    mysqli_set_charset($conn, 'utf8');

    /**
     * エスケープ
     */
    $keyword = mysqli_real_escape_string($conn, $keyword);

    /**
     * データベース操作処理
     */
    $sql = 'SELECT id,name,url FROM Product';

    //ステートメント準備
    $stmt = mysqli_prepare($conn, $sql);
    /**
     * ステートメント実行
     */
    mysqli_stmt_execute($stmt);
    /**
     * 結果を転送
     */
    mysqli_stmt_store_result($stmt);
    /**
     * 件数
     */
    $num = mysqli_stmt_num_rows($stmt);

    /**
     * 表示
     */
//        printf("<p>%s件</p>\n", $num);
    /**
     * データ取得
     */
    $result = mysqli_query($conn, $sql);

//            $row = mysqli_fetch_array($result, MYSQLI_NUM);
//            printf("%s (%d)\n", $row[0], $row[1]);

    mysqli_stmt_bind_result($stmt, $id, $name, $url);

//    print "<div id='wrapper'>\n
//            <main id='main'>\n
//                <div id='write' class='content'>\n";
//
//    print "<table border='2' class='box'>\n";

    $cnt = 0;

    //列数指定
    $col = 3;
//            
//            while (mysqli_stmt_fetch($stmt)) {
//                
//                print "<tr><td width='150' height='150'><img src='".$url."'></td></tr>";
//                print "<tr><td width='150' height='70'><a href='".$id."'>".$name."</a></td></tr>";
//            }

    while ($row = mysqli_fetch_array($result)) {
        $t_id[$cnt] = $row['id'];
        $t_name[$cnt] = $row['name'];
        $t_url[$cnt] = $row['url'];
        $cnt++;
    }
    ?>
    <?php
//    echo <<< EOM
//    <head>
//        <title>Victory文具</title>
//        <meta charset="UTF-8">
//        <meta name="viewport" content="width=device-width, initial-scale=1.0">
//        <link rel="stylesheet" href="./css/swiper.min.css">
//
//        <!--ここから-->
//////        <style>
//////            /*            html, body {
//////                            position: relative;
//////                            height: 100%;
//////                        }
//////                        body {
//////                            background: #eee;
//////                            font-family: Helvetica Neue, Helvetica, Arial, sans-serif;
//////                            font-size: 14px;
//////                            color:#000;
//////                            margin: 0;
//////                            padding: 0;
//////                        }*/
//////            .swiper-container {
//////                width: 100%;
//////                height: 100%;
//////
//////            }
//////            .swiper-slide {
//////                text-align: center;
//////                font-size: 18px;
//////                background: #fff;
//////
//////                /* Center slide text vertically */
//////                display: -webkit-box;
//////                display: -ms-flexbox;
//////                display: -webkit-flex;
//////                display: flex;
//////                -webkit-box-pack: center;
//////                -ms-flex-pack: center;
//////                -webkit-justify-content: center;
//////                justify-content: center;
//////                -webkit-box-align: center;
//////                -ms-flex-align: center;
//////                -webkit-align-items: center;
//////                align-items: center;
//////            }
//////        </style>
//////        <!--ここまで-->
////    </head>
////    <body>
//////        <header id="header">
//////            <!--ここから-->
//////            <div class="swiper-container">
//////                <div class="swiper-wrapper">
//////                    <div class="swiper-slide"><img src="./img/night.jpg" alt="sceen"></div>
//////                    <div class="swiper-slide"><img src="./img/green.jpg" alt="sceen"></div>
//////                    <div class="swiper-slide"><img src="./img/temple.jpg" alt="sceen"></div>
//////                    <!--                    <div class="swiper-slide">Slide 4</div>
//////                                        <div class="swiper-slide">Slide 5</div>
//////                                        <div class="swiper-slide">Slide 6</div>
//////                                        <div class="swiper-slide">Slide 7</div>
//////                                        <div class="swiper-slide">Slide 8</div>
//////                                        <div class="swiper-slide">Slide 9</div>
//////                                        <div class="swiper-slide">Slide 10</div>-->
//////                </div>
//////                Add Pagination 
//////                <div class="swiper-pagination"></div>
//////            </div>
//////            <!--ここまで-->
//////        </header>
//////        <div id="wrapper">
//////            <main id="main">
//////                <div id="write" class="content">
//////     
//////
//    <table border='2' class='box'>
//EOM;
    
    print "<table border='2' class='box'>";
    for ($i = 0; $i < count($t_url); $i+=$col) {
        print "\t<tr>\n";
        for ($j = 0; $j < $col; $j++) {
            if (count($t_url) == $i + $j) {
                break;
            }
            print "\t\t<td width='150' height='150'><img src='" . $t_url[$i + $j] . "'></td>\n";
        }
        print "\t</tr>\n\t<tr>\n";
        for ($j = 0; $j < $col; $j++) {
            if (count($t_url) == $i + $j) {
                break;
            }
            print "\t\t<td width='150' height='60'><a href='http://2016.b-sim.net/user/item/".$t_id[$i + $j]."'>".$t_name[$i + $j]."</a></td>\n";
        }
        print "\t</tr>\n";
    }
    
    print "</table>\n";
    
//    echo <<< EOM
//    </table>
//
//    <!--左サイド-->
//            <div id="left">
//                <dl class="hide">
//                    <dt>
//                    <img src="./img/st.png" alt="banner">
//                    </dt>
//                    <dd>
//                        <ul>
//                            <li>ボールペン</li>
//                        </ul>
//                    </dd>
//                </dl>
//                <dl class="hide02">
//                    <dt>
//                    <img src="./img/gazai.png" alt="banner">
//                    </dt>
//                    <dd>
//                        <ul>
//                            <li>筆</li>
//                        </ul>
//                    </dd>
//                </dl>
//            </div>
//        </div>
//        <!--右サイド-->
//        <div id="right">
//            <div id="form">
//                <form action="victory.html" method="get">
//                    <input type="text" name="serch" size="17">
//                    <div id="btn">
//                        <input type="image" name="sub" width="20" height="20" src="./img/glass.png">
//                    </div>
//                </form>
//            </div>
//        </div>
//        <!--フッター-->
//        <footer id="footer">
//            <font color="#f00"> フッター</font>
//        </footer>
//    
//EOM;
//
    /**
     * 開放
     */
    mysqli_stmt_free_result($stmt);
    /**
     * ステートメントを閉じる
     */
    mysqli_stmt_close($stmt);

    /**
     * 接続を閉じる
     */
    mysqli_close($conn);
//        }
//        print "<script src='./js/swiper.min.js'></script>\n
//        <!--Initialize Swiper--> \n
//        <script>\n
//            var swiper = new Swiper('.swiper-container', {
//                pagination: '.swiper-pagination',
//                nextButton: '.swiper-button-next',
//                prevButton: '.swiper-button-prev',
//                paginationClickable: true,
//                spaceBetween: 30,
//                centeredSlides: true,
//                autoplay: 2500,
//                autoplayDisableOnInteraction: false
//            });\n
//        </script>\n";

//    echo <<< EOM
//     <footer id="footer">
//            <font color="#f00"> フッター</font>
//        </footer>
//        <!--ここから-->
//        <script src="./js/swiper.min.js"></script>
//        <!--Initialize Swiper--> 
//        <script>
//            var swiper = new Swiper('.swiper-container', {
//                pagination: '.swiper-pagination',
//                nextButton: '.swiper-button-next',
//                prevButton: '.swiper-button-prev',
//                paginationClickable: true,
//                spaceBetween: 30,
//                centeredSlides: true,
//                autoplay: 2500,
//                autoplayDisableOnInteraction: false
//            });
//        </script>
//EOM;
    ?>
</body>
</html>