 <?php
$conecta = mysql_connect("localhost", "root", "") or print (mysql_error());
mysql_select_db("DBHackathon", $conecta) or print(mysql_error());

$umidade = $_GET["field1"];
$temperatura = $_GET["field2"];


$sql = "Insert into infotalhao (data,umidade,temperatura,idTalhao) values(now(),'$umidade','$temperatura',1)";
$result = mysql_query($sql, $conecta)
or die(mysql_error());

/* Escreve resultados até que não haja mais linhas na tabela */

mysql_free_result($result);

$sql = "SELECT MAX(id_Irrigacao) as id FROM irrigacao where id_Talhao = 1";
$result = mysql_query($sql, $conecta);

$consulta = mysql_fetch_array($result);


$sql = "SELECT * FROM irrigacao where id_Irrigacao = '$consulta[id]'";

$result = mysql_query($sql, $conecta);
/*
while($consulta = mysql_fetch_array($result)) {
   print "Coluna1: $consulta[id_Irrigacao] - Coluna2: $consulta[status]<br>";
} */

$consulta = mysql_fetch_array($result);


echo $consulta[status];


mysql_free_result($result);
mysql_close($conecta);

?>
