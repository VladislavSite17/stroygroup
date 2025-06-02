<?php
header('Content-Type: text/html; charset=utf-8');

/* Проверяем существуют ли переменные, которые передала форма обратной связи.
    Если не существуют, то мы их создаем.
    Если форма передала пустые значения мы их удаляем */
if (isset($_POST['plosad'])) {$plosad = $_POST['plosad']; if ($plosad == '') {unset($plosad);}}
/* для чекбоксов */
/*$checkboxes = ''; if (!empty($_POST["checkboxes"]) && is_array($_POST["checkboxes"]))
{    $checkboxes = implode(" ", $_POST["checkboxes"]);
}*/
if (isset($_POST['checkboxes'])) {$checkboxes = $_POST['checkboxes']; if ($checkboxes == '') {unset($checkboxes);}}
if (isset($_POST['Rab'])) {$Rab = $_POST['Rab']; if ($Rab == '') {unset($Rab);}}
if (isset($_POST['Tel'])) {$Tel = $_POST['Tel']; if ($Tel == '') {unset($Tel);}}

/* Проверяем заполнены ли все поля */
/*if (isset($name) && isset($email) && isset($text_message))*/
{

/* Убираем все лишние пробелы, а также преобразуем все теги HTML в символы*/
$plosad = htmlspecialchars(trim($plosad));
/*$Kachestvo = htmlspecialchars(trim($Kachestvo));*/
$checkboxes = htmlspecialchars(trim($checkboxes));
$Rab = htmlspecialchars(trim($Rab));
$Tel = htmlspecialchars(trim($Tel));
  

/* Формируем сообщение */
$address = "int-safe@yandex.ru";  /* Меняем на свою почту */
$from = "sait@stukatursnab.ru";
$sub = "Заказ с калькулятора по электрике";
$mes = "Площадь помещения: $plosad \nМатериал стен: $checkboxes \nНаименование работ:$Rab \nНомер телефона: $Tel";

/* Отправка сообщения */
$verify = mail ($address,$sub,$mes,"Content-type:text/plain; charset=utf-8");
      if ($verify == 'true')
     {
echo "<link rel='stylesheet' type='text/css' href='forma_modal/okno.css'/>
<table width='600' height='300' align='center'>
 <tr>
 <td class='warning_table' width='220' align='center' valign='middle'>
 <img align='center' src='forma_modal/images/Galochka.png'>
 <div align='center' class='warning_font_big'>Спасибо за обращение!</div>
 <div align='center' class='warning_font' align='left'>Ваше письмо доставлено администратору.<br />В ближайшее время с Вами обязательно свяжутся!</div>
 <p align='center'><a href='/' class='all_links'>Вернуться на сайт</a></div></p>
 </td>
 </tr>
 </table>";
}
else
{
echo "<link rel='stylesheet' type='text/css' href='forma_modal/okno.css'/>
<table width='600' height='300' align='center'>
 <tr>
 <td class='warning_table' width='220' align='center' valign='middle'>
 <img align='center' src='forma_modal/images/warning.png'>
 <div align='center' class='warning_font_big'>ОШИБКА!!!</div>
 <div align='center' class='warning_font' align='left'>Ваше письмо не доставлено. Повторите отправку немного позже!</div>
 <p align='center'><a href='/' class='all_links'>Вернуться на сайт</a></div></p>

 </td>
 </tr>
 </table>";
}
  
}?>