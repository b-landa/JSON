<?php
//-------------------------- Parte 1: Converter JSON para PHP --------------------------

//Array de strings ---------------------------------

$jsonTeste = '["quero","concluir","e aprender"]'; 
//var_dump($jsonTeste); //aqui mostrou que é um array

$jsonph = json_decode($jsonTeste,true);
//echo $jsonph[0]; // imprmiu apenas 1 valor da array, com índice 0. E os outros elementos?

for ($i=0; $i <=2 ; $i++) { 
	echo $i." = ".$jsonph[$i]."<br>";
}

//Este é um objeto ------------------------------

$jsonObj = '[{"titulo":"testes de JSON",
"objetivo":"aprender e descobrir o que fiz de errado",
"situacao":"convertendo JSON-PHP"}]';

$jsonObjphp = json_decode($jsonObj);
//var_dump($jsonObjphp); //Array de um índice, um objeto com 3 strings e 3 valores.
echo "Título: ".$jsonObjphp[0]->titulo."<br>";
echo "Objetivo: ".$jsonObjphp[0]->objetivo."<br>";
echo "Situacao: ".$jsonObjphp[0]->situacao."<br>";*/

//-------------------------- Parte 2: Converter PHP para JSON --------------------------

//Array simples ------------------------------

$php2json = array("olha só","consegui!");
//var_dump($php2json); //Mostra que é um array com 2 chaves.

$json_str = json_encode($php2json, JSON_UNESCAPED_UNICODE); // Permite acentuação
echo $json_str;

//Array associativo ------------------------------

$php_assoc = array("hoje"=>23,"semana"=>"segunda-feira","amanha"=>24);
//var_dump($php_assoc); //Confirmar que é um array

$json_assoc = json_encode($php_assoc);
echo $json_assoc;

?>