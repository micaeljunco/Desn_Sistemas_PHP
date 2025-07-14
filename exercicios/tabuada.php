<?php
    function tabuada($num) {
        echo "<br>Tabuda do $num: <br>";
        
        for ($i = 0; $i <= 10; $i++) {
            $res = $num * $i;

            echo "$num x $i = $res" . "<br>";
        }
    }

    tabuada(1);
    tabuada(2);
    tabuada(3);
    tabuada(4);
    tabuada(5);
    tabuada(6);
    tabuada(7);
    tabuada(8);
    tabuada(9);
    tabuada(10);

    print "Micael Jeferson Junco";

?>