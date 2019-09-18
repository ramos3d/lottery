<?php
namespace App\Traits;

/**
 * @var container | array [numero, sorteio]
 */
trait Data
{
    public function dataSource() : array {
        $url = $this->url = "http://lotodicas.com.br/api/lotofacil/";

        //Get Current Draw - numero & sorteio[]
        $json_file = file_get_contents($this->url);
        $json_str = json_decode($json_file, true);
        $this->container = ([
            "draw" =>[
                "numero" => $json_str['numero'],
                "sorteios" =>$json_str['sorteio']
            ],
        ]);
        return $this->container;
    }
}
