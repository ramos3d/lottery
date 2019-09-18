<?php
namespace App\Brain;
/**
*
*/
trait Data
{
    public function source()
    {
        public $url;
        public $current_draw;
        public $container;

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
}
