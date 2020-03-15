<?php

/**
 * Сформировать массив из 10 случайных дат в формате ДД-ММ-ГГГГ. Далее при помощи 
 * регулярных выражений преобразовать эти даты в формат ГГГГ.ДД.ММ
 * Task 1
 */

function getRandomDate()
{
    $array = [];
    for ($i = 1; $i <= 10; $i++) {
        $day = rand(1, 31);
        if (strlen($day) == 1) {
            $day = '0' . $day;
        }
        $month = rand(1, 12);
        if (strlen($month) < 2) {
            $month = '0' . $month;
        }
        $year = rand(1960, 2020);
        $array[] = $day . '-' . $month . '-' . $year;
    }
    return $array;
}

$arr = getRandomDate();
// print_r($arr);

function getDateFromFormat($brr)
{
    $pattern = '/[0-9]{2,}/u';
    $result = [];
    for ($i = 0; $i < count($brr); $i++) {
        $match = [];
        preg_match_all($pattern, $brr[$i], $match);
        $result[] = $match[0][2] . '.' . $match[0][0] . '.' . $match[0][1];
    }
    return $result;
}

$result = getDateFromFormat($arr);
// print_r($result);

/**
 * С помощью preg_match определите, что переданная строка является email. 
 * Примеры email для тестирования mymail@mail.ru, my.mail@mail.ru, e-my-mail.ru, 
 * my-mail@mail.ru, my_mail@mail.ru, mail@mail.com, mail@mailby, mail@yandex.ru, 
 * email@gmail.com, e-mail@com.
 * Task 2
 */
function correctEmail($a)
{
    $pattern = '/[a-z]{0,}\.{0,1}\-{0,}\_{0,}[a-z]{0,}\@{1}[a-z]{1,}\.{1}[a-z]{1,}/u';
    $result = [];
    for ($i = 0; $i < count($a); $i++) {
        $match = preg_match($pattern, $a[$i]);
        if ($match) {
            $result[] = $a[$i];
        }
    }
    return $result;
}

$mail = [
    'mymail@mail.ru', 'my.mail@mail.ru', 'e-my-mail.ru', 'my-mail@mail.ru',
    'my_mail@mail.ru', 'mail@mail.com', 'mail@mailby', 'mail@yandex.ru',
    'email@gmail.com', 'e-mail@com'
];
$email = correctEmail($mail);
// print_r($email);

/**
 * Распознать все ip-адресы
 * Task 3
 */

function correctIp($ip)
{
    $pattern = '/[0-9]{0,3}\.[0-9]{0,3}\.[0-9]{0,3}\.[0-9]{0,3}/u';
    $match = preg_match($pattern, $ip);
    if ($match) {
        return $ip;
    }
}

$ips = ['1.15.100.12', '256.14.68.4'];
$resultIp = [];
for ($i = 0; $i < count($ips); $i++) {
    $resultIp[] = correctIp($ips[$i]);
}
// print_r($resultIp);

/**
 * Распознать все mac-адресы
 * Task 4
 */
$subject = file_get_contents('mac.txt');
// echo $subject;
$pattern = '/(([a-fA-F0-9]{2}\:){5}([a-fA-F0-9]){2})/u';
$match = [];
preg_match_all($pattern, $subject, $match);
// print_r($match[1]);


/**
 * Дана строка с целыми числами. Найдите числа, стоящие в кавычках и увеличьте их в два раза.
 *  Пример: из строки 1aaa'3'bbb'4' сделаем строку 1aaa'6'bbb'8'.
 * Task 5
 */
function getDoubleString($abc)
{
    $pattern = '/\'([0-9])\'/u';
    $match = [];
    preg_match_all($pattern, $abc, $match);
    for ($i = 0; $i < count($match[1]); $i++) {
        $abc = str_replace($match[1][$i], $match[1][$i] * 2, $abc);
    }
    return $abc;
}
// echo getDoubleString("1aaa'3'bbb'4'");


/**
 * Сформировать массив из 10 случайных строк (в каждой строке по 10 случайных символов [ABCD]),
 *  далее при помощи регулярных выражений заменить в этих строках все повторяющиеся вхождения 
 * на число повторений с соответствующим символом (Например AABCDDDBCC - 2ABC3DB2C).
 * Task 6
 */

function getRandomString($n, $m)
{
    $letter = ['A', 'B', 'C', 'D'];
    $result = [];
    for ($i = 0; $i < $n; $i++) {
        $str = "";
        for ($j = 0; $j < $m; $j++) {
            $str .= $letter[rand(0, 3)];
        }
        $result[] = $str;
        $str = "";
    }
    return $result;
}

$words = getRandomString(10, 10);

function getCountString($subject)
{
    $pattern = '/A{1,}|B{1,}|C{1,}|D{1,}/u';
    $result = [];
    for ($i = 0; $i < count($subject); $i++) {
        $match = [];
        preg_match_all($pattern, $subject[$i], $match);
        print_r($match[0]);
        $str = "";
        for ($j = 0; $j < count($match[0]); $j++) {
            if (strlen($match[0][$j]) > 1) {
                $str .= strlen($match[0][$j]) . substr($match[0][$j], 0, 1);
            } else {
                $str .= $match[0][$j];
            }
        }
        $result[] = $str;
        $str = "";
    }
    return $result;
}
// print_r(getCountString($words));

/**
 * Дана база клиентов в файле в одну строку. Распознать данную базу и вывести на 
 * экран клиентов в виде таблицы.
 * Task 7
 */
$patternName = '/[А-я]+ [А-я]+/u';
$patternPhone = '/\+7\([0-9]{3}\)\-[0-9]{3}\-[0-9]{2}\-[0-9]{2}/u';
$patternDate = '/[0-9]{1,2}\.[0-9]{1,2}\.[0-9]{1,4}/u';

$subject = file_get_contents('client.txt');

$matchName = [];
$matchPhone = [];
$matchDate = [];
preg_match_all($patternName, $subject, $matchName);
preg_match_all($patternPhone, $subject, $matchPhone);
preg_match_all($patternDate, $subject, $matchDate);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <table border=1>
        <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Phone</th>
                <th scope="col">Date</th>
            </tr>
        </thead>
        <tbody>
            <?php
            for ($i = 0; $i < count($matchName[0]); $i++) {
                echo '<tr>';
                echo '<td>' . $matchName[0][$i] . '</td>';
                echo '<td>' . $matchPhone[0][$i] . '</td>';
                echo '<td>' . $matchDate[0][$i] . '</td>';
                echo '</tr>';
            }
            ?>
        </tbody>
    </table>
</body>

</html>