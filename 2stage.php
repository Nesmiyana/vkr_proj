<?php

if(isset($_POST['1']))
{
$duration = htmlentities($_POST['1']);

$phys_model = "Нет";
$soft_model = "Нет";
$lab_model = "Нет";

if(isset($_POST['2'])) $phys_model = "Да";
if(isset($_POST['3'])) $soft_model = "Да";
if(isset($_POST['4'])) $lab_model = "Да";


$output = "
<html>
<meta charset='utf-8'>
<body>
<H1>Отчет о защите ВКР</H1>
Длительность выступления $duration
<br>
Физическое макетирование программно-аппаратных средств телекоммуникационной системы, обеспечивающих безопасность передаваемой информации: $phys_model
<br>
Моделирование на ЭВМ программно-аппаратных средств телекоммуникационной системы, обеспечивающих безопасность передаваемой информации: $soft_model
<br>
Создание лабораторного стенда для исследования программно-аппаратных средств телекоммуникационной системы, обеспечивающих безопасность передаваемой информации: $lab_model<br>
Результат проверки системой Антиплагиант по количеству заимствований: $ap<br><br></body></html>";
echo $output;

$output = "
Длительность выступления $duration
<br>
Физическое макетирование программно-аппаратных средств телекоммуникационной системы, обеспечивающих безопасность передаваемой информации: $phys_model
<br>
Моделирование на ЭВМ программно-аппаратных средств телекоммуникационной системы, обеспечивающих безопасность передаваемой информации: $soft_model
<br>
Создание лабораторного стенда для исследования программно-аппаратных средств телекоммуникационной системы, обеспечивающих безопасность передаваемой информации: $lab_model
<br>
<br>";

$report = fopen("/var/www/html/report.html", "a");

if (fwrite($report,$output))
echo "Запись произведена успешно<br>";
else
echo "Произошла ошибка при записи данных<br>";
fclose($report);


$mark = fopen("/var/www/html/marks.txt", "a");
fwrite($mark, $duration.PHP_EOL);
fclose($mark);

echo "<a href=\"main.html\">Вернуться на главную</a>";
}
else
{
echo "Введенные данные некорректны";
}
?>