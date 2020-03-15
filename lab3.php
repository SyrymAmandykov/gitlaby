<?php
/*Описать функцию isEven(A) логического типа,
 возвращающую TRUE ,
если целый параметр A является четным, 
и FALSE в противном случае.
*/

function isEven($a)
{
    if($a % 2 ==0){
        return 'true';
    }else{
        return 'false';
    }
}
echo isEVen(10);
echo '<hr>';
/*Даны два случайных набора целых чисел 
(может быть, с повторениями).
 Выдать без повторений в порядке возрастания все те числа,
  которые встречаются в обоих наборах. 
  Решить задачу при помощи процедур. 

*/

function randArr($n)
{
    $arr = [];
    for ($i = 0; $i < $n; $i++) {
        $arr[] = rand(1, 100);
    }

    return $arr;
}
$a = randArr(5);
$b = randArr(3);
print_r($a);
print_r($b);

function getArraySort($x, $y)
{
    $arr = [];
    for ($i = 0; $i < count($x); $i++) {
        for ($j = 0; $j < count($y); $j++) {
            if ($x[$i] == $y[$j]) {
                $arr[] = $x[$i];
            }
        }
    }
    return $arr;
}

$array = getArraySort($a, $b);
print_r ($array);
sort($array);
print_r($array);

echo '<hr>';

// Написать функцию проверяющую строку на палиндром.

$name1 = 'Daniyar';
$name2 = 'Kazak';
$name3 = 'Aida';
function getpolindrom ($str)
{
    $strlen = strlen($str);
    $pol = '';
    for($i = $strlen - 1; $i >= 0; $i--){
        $pol .= $str[$i];
    }
    if($str ===$pol){
        echo 'Палиндром';
    }else {
        echo 'Не палиндром';
    }
  
}
getpolindrom ($name1);

echo '<hr>';

/*
Дана строка состоящая из слов разделенных пробелами, 
найти количество слов и собрать массив из слов.
*/

function getwords($str)
{
    $word = "";
    $arr = [];
    for($i = 0; $i < strlen($str); $i++){
        if($str[$i] !== " ") {
            $word .= $str[$i];
        } else {
            $arr[] = $word;
            $word = "";
        }
    }
    $arr[] = $word;
    return $arr;
}
print_r(getwords('men kazak dom'));
echo '<hr>';

/*
Описать функцию getSize(), 
которая находит размер бумаги по стандартному формату. 
 А0, А1, А2, А3, А4, …. 
 (https://ru.wikipedia.org/wiki/ISO_216)
 */

 function getSize($a)
 {
     if($a == 0){
         return [841,1189];
            } else{
                $size = getSize($a - 1);
                return [floor($size[1]/2)], $size[0]];

     }
 }