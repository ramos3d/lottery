<?php
namespace App\Traits;

/**
 * @var container | json [numero, sorteio]
 * @var numero | int - Value
 */
trait Data
{
    public function dataSource(&$numero = NULL) : array {
        $url = $this->url = "http://lotodicas.com.br/api/lotofacil/$numero";

        //Get Current Draw - numero & sorteio[]
        $json_file = file_get_contents($this->url);
        $json_str = json_decode($json_file, true);
        $this->container = ([
                "numero" => $json_str['numero'],
                "sorteios" =>$json_str['sorteio']
        ]);
        return $this->container;
    }
}
