<?php

namespace MTC {

    class Coordenadas
    {
        private $busca;

        public function __construct()
        {
            $this->busca = new BuscaDadosCurl();
        }

        /**
         * @param string $endereco
         * @return array
         */
        public function getCoordenadas(string $endereco)
        {
            $endereco = str_replace(" ", "+", $endereco);
            $output = $this->busca->getDados($endereco);

            $lat = null;
            $long = null;

            if (count($output->results) > 0) {
                $lat = $output->results[0]->geometry->location->lat;
                $long = $output->results[0]->geometry->location->lng;
            }
            return ['lat' => $lat, 'long' => $long];
        }

        /**
         * @param array $coordenadas
         * @return string
         */
        public function getEndereço(array $coordenadas)
        {
            $str = $coordenadas['lat'] . ',' . $coordenadas['long'];
            $output = $this->busca->getDados($str);
            $address = '';
            if (count($output->results) > 0) {
                $address = $output->results[0]->formatted_address;
            }
            return $address;
        }
    }
}