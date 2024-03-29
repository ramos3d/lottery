<?php
namespace App\brain;

/**
* @var number | int;
* @var amount | int;
* @var current_draw | array [nome, sorteio]
*/
class  Lottery
{
    private $url;
    private $current_draw;
    private $container;

    public function __construct(){
        $url = $this->url = "http://lotodicas.com.br/api/lotofacil/";

        //Get Current Draw - numero & sorteio[]
        $json_file = file_get_contents($this->url);
        $json_str = json_decode($json_file, true);
        $this->current_draw = ([
            "numero" => $json_str['numero'],
            "sorteio" =>$json_str['sorteio']
        ]);
        $current_draw = $this->current_draw;

        $this->container = ([
            "url" => $url,
            "draw" =>$current_draw
        ]);
        return $this->container;
    }
    // public function getCurrentDraw(){
    //     $json_file = file_get_contents($this->url);
    //     $json_str = json_decode($json_file, true);
    //     $this->current_draw = ([
    //         "numero" => $json_str['numero'],
    //         "sorteio" =>$json_str['sorteio']
    //     ]);
    //
    //     return $this->current_draw;
    // }
    public function getByAmount($amount){

        print_r($this->container); // [numero] & [sorteio]


        die();

        for ($amount; $amount > 0 ; $amount--) {
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


    }

    public function getLastDraw(){
        $url = $this->url;
        $json_file = file_get_contents($url);
        $json_str = json_decode($json_file, true);
        $number = $json_str['numero'];
        return $number;
    }
}
