<?php
namespace App\Brain;
use App\Traits\Data;
require __DIR__ .'/../../vendor/autoload.php';

/**
* @var number | int;
* @var amount | int;
* @var current_draw | array [nome, sorteio]
*/
class  Lottery
{
    // call the trait containing the data
    use Data;

    public function getByAmount($amount){
        var_dump($amount);

        print_r($this->dataSource());
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

$obj = new Lottery;
// print($obj->getLastDraw());
$amount = 2;
echo "<pre>";
// print_r($obj->getCurrentDraw()); // array: numero  & sorteio
print_r($obj->getByAmount($amount)); // array: numero  & sorteio
