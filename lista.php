<?php

function combinations($size) {
    $string = str_repeat('a',$size);
    $endLoopTest = str_repeat('z',$size);
    $endLoopTest++;
    while ($string != $endLoopTest) {
        echo $string++."<br />".PHP_EOL;
    }
}

combinations(3);
?>