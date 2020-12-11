<?php
// здесь происходит подключение к БД и вывод на экран всего содержимого
require_once 'connectPDO.php';
 
// Посылаем серверу запрос выборки всех элементов в массив rows
$stmtPerson = $db->query('SELECT * from table_person');
$rowsPerson = $stmtPerson->fetchAll();

$stmtUser = $db->query('SELECT * from table_user');
$rowsUser = $stmtUser->fetchAll();

function printBD($records1, $records2) {
  echo '<table id="tableBD" border="1px" cellpadding="5px" align="center" width="40%">';
  echo '<tr><td>Имя пользователя<td>Телефон<td>Логин<td>Пароль</tr>';
  for ($i = 0; $i < count($records1); $i++) {
    echo '<tr>';
    echo '<td>'.$records1[$i]['name'];
    echo '<td>'.$records1[$i]['tel'];
    echo '<td>'.$records2[$i]['login'];
    echo '<td>'.$records2[$i]['password'];
    echo '</tr>';    
  }
  echo '</table>';    
}


// выводим на экран данные БД в виде таблицы
printBD($rowsPerson, $rowsUser);
?>