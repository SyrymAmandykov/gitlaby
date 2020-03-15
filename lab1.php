<?php
$br = '<br>';
/* 
переменную $br если поставить в начале кода,то мы можем 
в дальнейшем использовать ее в коде. пример на 13-ой строке.
*/
$a = rand(0,100);
$b = rand(0,100);
$c = rand(0,100);

echo 'Digits: A = ' . $a . ' B = ' . $b . ' C = ' . $c . $br;
echo abs($a - $b);
echo $br;
echo abs($a - $c);
echo $br;

/*
echo abs(-5,8); -  (5,8) в результате мы увидем значение 
                  без отрицания

*/

if(abs($a - $b) > abs($a - $c)) {
    echo 'Min interval: C =' . abs($a - $c); 
}else {
        echo 'Min interval: B =' . abs($a - $b);
    } 
echo $br;
if(abs($a - $b) < abs($a - $c)) {
        echo ' Max interval: B1 =' . abs($a - $c); 
    }else {
            echo ' Max interval: C1 =' . abs($a - $b);
        }
echo '<hr>';
/*
Даны два целых числа A и B (A < B). 
Вывести в порядке возрастания все целые числа, 
расположенные между A и B (включая сами числа A и B), 
а также количество N этих чисел.
A = 10
B = 20
10 11 12 13 14 15 16 17 18 19 20 
*/

$a = rand(0,50);
$b = rand(51,100);

echo 'Digits: A =' . $a . ' B = ' . $b . $br;
$count = 0;
for($i = $a; $i <= $b; $i++){
    echo $i . ' ';
    $count++;
}
echo 'Count: ' . $count . $br;
echo '<hr>';

/*
Даны два целых числа A и B (A < B). 
Найти сумму квадратов всех целых чисел от A до B включительно.
*/
$a = rand(0,50);
$b = rand(51,100);
echo 'Digits: A =' . $a . ' B = ' . $b . $br;
$sum = 0;
for($i = $a; $i <= $b; $i++){
    $sum += $i*$i;
}
echo $br . 'Sum: ' . $sum . $br;
echo '<hr>';

/*
Даны целые числа A и B (A < B).
Вывести все целые числа от A до B включительно; 
при этом число A должно выводиться 1 раз, 
число A + 1 должно выводиться 2 раза и т. д.
*/

$a = rand(0,10);
$b = rand(11,15);
echo 'Digits: A =' . $a . ' B = ' . $b . $br;
for($i=$a; $i<=$b; $i++){
    for($j=0; $j<=$i-$a; $j++){
        echo $i . ' ';
    }
    echo $br;
}

//полная расшифровка на тетради
// $a = 9;
// $b = 11;
// $i = $a;
// A: 
// if($i<=$b) {
//     $j=0;
//     B:
//     if($j<=$i-$a) {
//         echo $i . ' ';
//         $j++;
//         goto B;
//     }
//     echo $br;
//     $i++;
//     goto A;
// }
