<?php

$date_today = date("d.m.Y");

if(isset($_POST['name']) && isset($_POST['group']) &&
isset($_POST['date']) && isset($_POST['1']) && isset($_POST['2'])
&& isset($_POST['3']) && isset($_POST['5']) && isset($_POST['6']))
{
$name = htmlentities($_POST['name']);
$group = htmlentities($_POST['group']);
$date = htmlentities($_POST['date']);

$feedback = htmlentities($_POST['1']);
$review = htmlentities($_POST['2']);
$reqESPD_ESKD = htmlentities($_POST['3']);
$article = htmlentities($_POST['5']);
$ap = htmlentities($_POST['6']);

$reference = "Нет";
if(isset($_POST['4'])) $reference = "Да";

$conference = "Нет";

$publication = "Нет";

$invention = "Нет";

$NIOKR = "Нет";

$software = "Нет";

$output = "
<html>
<meta charset='utf-8'>
<body>
<H1>Отчет о защите ВКР</H1>
Дата формирования отчета: $date_today
<br>
ФИО студента: $name
<br>
Группа: $group
<br>
Дата защиты ВКР: $date
<br>
Отзыв руководителя $feedback
<br>
Рецензия $review
<br>
ВКР оформлена в соответствии с требованиями ЕСПД и/или ЕСКД: $reqESPD_ESKD
<br>
Список источников, использованных при проектировании, превышает 30 наименований: $references
<br>
В работе используются $article
<br>
Результат проверки системой Антиплагиант по количеству заимствований: $ap
<br>
Выступление с докладом на региональной, межвузовской, российской или международной конференциях: $conference
<br>
Публикация тезисов научной статьи или докладов на региональной, межвузовской, российской или международной конференциях: $publication
<br>
Подача заявки на предполагаемое изобретение: $invention
<br>
Участие в написании отчёта о НИОКР: $NIOKR
<br>
Свидетельство об официальной регистрации программы для ЭВМ по моделированию, расчёту, вычислительному эксперименту: $software<br><br>";
echo $output;

$mark = fopen("/var/www/html/marks.txt", "w");

$report = fopen("/var/www/html/report.html", "w");

if (fwrite($report,$output))
echo "Запись произведена успешно<br>";
else
echo "Произошла ошибка при записи данных<br>";
fclose($report);

fwrite($mark, $date.PHP_EOL);
fwrite($mark, $feedback.PHP_EOL);
fwrite($mark, $review.PHP_EOL);
fwrite($mark, $reqESPD_ESKD.PHP_EOL);
fwrite($mark, $reference.PHP_EOL);
fwrite($mark, $article.PHP_EOL);
fwrite($mark, $ap.PHP_EOL);

fclose($mark);

echo "<a href=\"main.html\">Вернуться на главную</a>";
}
else
{
echo "Введенные данные некорректны";
}
?>
