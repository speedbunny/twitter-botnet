<?php

$blah = array('0','1','2','3','4','5','6','7','8','9','a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z');

for ($a=0; $a<36; $a++)
{
for ($b=0; $b<36; $b++)
{
for ($c=0; $c<36; $c++)
{
echo $blah[$a] . $blah[$b] . $blah[$c]. "<br />"; 
}
}
}
?>