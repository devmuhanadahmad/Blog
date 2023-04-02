<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<button class="mohanad">button</button>
</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript">
$('.mohanad').click(function(){
    $.ajax({
        url:'/moh/',
        type:'get',
        data:function(){
            console.log('done');
        }
    })
})
</script>

</html>

<?php
/*
@include('testTow.php');
//echo phpinfo();


#array

$names=['m','n'];
$nameParint=['m','n'];

if($names === $nameParint ){
    echo 'true';
}else{
    echo 'false';
}

$a=[1=>'ali',2=>'morad',3];
foreach($a as $k=>$v){
    echo '<h1>'." ".$k." "."<mark>".$val."</mark>"."</h1>";
}

#variable

$a=5;//decleare variable
$a=6;//redcleare variable
echo "<br>".$a;//6

$b=&$a;
$b=15;
echo "<br>".$b."<br>".$a; //15 15

#pre-defined variable
//print_r($_SERVER);
//echo $_SERVER['DOCUMENT_ROOT'].'<br>';
//print_r( $_SERVER['DOCUMENT_ROOT']);

#magic constants
//echo "<br>".__file__ ."<br>" ;
echo  "<br>" . __dir__ ."<br>" ;
echo "<br>" .__line__ ."<br>" ;

$i=0;

while($i<=5){
    //echo $i.'<br>';
    echo $i++;

}

$today = unixtojd(mktime(0, 0, 0, 8, 16, 2003));
print_r(cal_from_jd($today, CAL_GREGORIAN));?>

*/


