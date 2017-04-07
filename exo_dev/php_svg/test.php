<?php
/*$c = array(10,12,5,7,8,16,20,10,4,9,3,14,22,10,18,2,3);




foreach ($c as $index) {
echo ($index >= 10 ? $index : '');


}

*/

$a = array(10,12,5,7,8,16,20,10,4,9,3,14,22,10,18,2,3);
$b = array(12,5,7,8,16,20,10,4,9,3,14,22,10,18,2,3,8);


foreach ($a as $i => $value) {
   if($value > $b[$i] ){
       print ( $value .', ');
   }else {

       print ($b[$i].', ');
   }
}