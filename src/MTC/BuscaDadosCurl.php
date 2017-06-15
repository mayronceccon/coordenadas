<?php

namespace MTC;

class BuscaDadosCurl implements IBuscaDados
{
    /**
     * @param string $entrada
     * @return mixed
     */
    public function getDados(string $entrada)
    {
        $url = 'http://maps.google.com/maps/api/geocode/json?address='.$entrada.'&sensor=false';
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, True);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl,CURLOPT_USERAGENT,'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.7; rv:7.0.1) Gecko/20100101 Firefox/7.0.1');
        $return = curl_exec($curl);
        curl_close($curl);
        return json_decode($return);
    }
}