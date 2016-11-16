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
        <link rel="stylesheet" href="./css/victory.css">
        <title>Test</title>
    </head>
    <body>
        <form aciton="view.php" method="post">
            <button type="sabumit" name="sub" value="表示">表示</button>
        </form>

        <?php
        $n = 1;
        $count = 1;
        //送信されたデータが空白でない場合の処理
        if ((isset($_POST['sub'])) && ($_POST['sub'] != '')) {
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
            printf("<p>%s件</p>\n", $num);
            /**
             * データ取得
             */
            $result = mysqli_query($conn, $sql);

//            $row = mysqli_fetch_array($result, MYSQLI_NUM);
//            printf("%s (%d)\n", $row[0], $row[1]);

            mysqli_stmt_bind_result($stmt, $id, $name, $url);

            print "<table border='1'>";

            $count = 0;
            
            while (mysqli_stmt_fetch($stmt)) {
                
                print "<tr><td width='150' height='150'><img src='".$url."'></td></tr>";
                print "<tr><td width='150' height='70'><a href='".$id."'>".$name."</a></td></tr>";
            }
            print "</table>";
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
        }
        ?>
    </body>
</html>