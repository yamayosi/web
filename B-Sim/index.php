<!DOCTYPE html>
<!--
テスト用ページ
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        $img = array('イメージ1', 'イメージ2', 'イメージ3', 'イメージ4', 'イメージ5');
        $name = array('商品1', '商品2', '商品3', '商品4', '商品5');
        /**
         * カウンタ
         */
        
        //列数指定
        $col = 3;
        
        print "<table border='1'>";
        
        for($i = 0; $i < count($img); $i+=$col){
            print "<tr>";
            for($j = 0; $j < $col; $j++){
                if(count($img) == $i + $j){
                    break;
                }
                print "<td>{$img[$i+$j]}</td>";
            }
            print "</tr>\n<tr>";
            for($j = 0; $j < $col; $j++){
                if(count($img) == $i + $j){
                    break;
                }
                print "<td>{$name[$i+$j]}</td>";
            }
            print "</tr>\n";
        }
        
        print "</table>\n";

        /**
         * テーブル開始
         */
        
      
        ?>

</body>
</html>
