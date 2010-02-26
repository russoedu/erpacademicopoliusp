<?php
// se nao conectar em menos de 10 segundos falar com Hélio para dar um jeito...
mysql_connect("localhost", "root", "root") or die(mysql_error());
echo "Connected to MySQL<br />";
?>

