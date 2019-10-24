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
        $data = $this->dataSource();

        for ($x = 0; $x< $amount; $x ++) {
            $new_number = $data['numero'] - $x;
            $draw[$x] = $this->dataSource($new_number)['sorteios'];
        }
        return $draw; // json só de [sorteios]
    }

    public function getLastDraw(){
        return $this->dataSource();
    }
}

$obj = new Lottery;
// print($obj->getLastDraw());
$amount = 2;
// print_r($obj->getLastDraw());
//print_r($obj->getLastDraw()); // array: numero  & sorteio
print_r($obj->getByAmount($amount)); // array: numero  & sorteio
