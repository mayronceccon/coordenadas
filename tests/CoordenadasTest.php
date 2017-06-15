<?php

require_once __DIR__ . '/../vendor/autoload.php';

use PHPUnit\Framework\TestCase;
use MTC\Coordenadas;

class CoordenadasTest extends TestCase
{
    protected $coordenadas;

    protected function setUp()
    {
        $this->coordenadas = new Coordenadas();
    }

    public function testBuscaLatitudeLongitude()
    {
        $endereço = 'Rua XV de Novembro, 250 Curitiba PR';
        $latLong = $this->coordenadas->getCoordenadas($endereço);
        $this->assertEquals(array('lat' => -25.4289689, 'long' => -49.2649961), $latLong);
    }

    public function testBuscaEndereço()
    {
        $coordenadas = ['lat' => -25.4289689, 'long' => -49.2649961];
        $endereco = $this->coordenadas->getEndereço($coordenadas);
        $this->assertEquals('Rua XV de Novembro, 250 - Centro, Curitiba - PR, 80020-310, Brazil', $endereco);
    }
}
