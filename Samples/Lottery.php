<?php
 /*
  _           _   _
 | |         | | | |
 | |     ___ | |_| |_ ___ _ __ _   _
 | |    / _ \| __| __/ _ \ '__| | | |
 | |___| (_) | |_| ||  __/ |  | |_| |
 \_____/\___/ \__|\__\___|_|   \__, |
                               __/ |
                              |___/

 # Project Developed by Marcelo Soares & Hudson Andrade
 # www.ramos3d.com
 # v1.0 2018
 */
 class Lottery
 {
     public function prediction($numero)
     {
         $range = $numero-4;
         $i=1;
         for ($numero; $numero >$range ; $numero--) {
             $json_file = file_get_contents("http://lotodicas.com.br/api/lotofacil/$numero");
             $json_str = json_decode($json_file, true);
             $sorteio = $json_str['sorteio'];
             $numero = $json_str['numero'];
             echo "<p>$numero</p>";
             //print_r ($json_str['sorteio']);
             $array = $json_str['sorteio'];
             $games [$i] = $array;
             $i++;
             print_r ($array);

         }
         //$this->sureRule();
         $this->sureRule($games);
         echo "<br>";
         print_r ($games);
     }

     public function sureRule($games){

     }
 }
 $json_file = file_get_contents("http://lotodicas.com.br/api/lotofacil/");
 $json_str = json_decode($json_file, true);
 $numero = $json_str['numero']; // Número do Jogo
 $class = new Lottery;
 $class->prediction($numero);
