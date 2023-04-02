<?php
$arr=array(1,2,5,0);
foreach($arr as $a){
if($a % 2 == 0){
    echo $a;
}
}

for($i=0;$i<=20;$i++){
  $c=$i++;
}
echo $c;

fun();
function fun()
{
    $A = 200;
    $C = $A + count($GLOBALS);

    echo $C;
}
