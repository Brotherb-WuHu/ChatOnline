<?php
require_once("database.php");
require("./functions/phpfunctions.php");

$input = file_get_contents('php://input');
$object = json_decode($input);
$name = $object->name;

$sql="select * from online where name='{$name}'";

$row=mysqli_excute_select($sql);

echo '{"name":"'.$row[0]['name'].'","acc":"'.$row[0]['acc'].'","sex":"'.$row[0]['sex'].'"}';
