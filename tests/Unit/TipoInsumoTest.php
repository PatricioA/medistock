<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\TipoInsumo;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TipoInsumoTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testCreateTipoInsumo()
    {
        $tipoIn = new TipoInsumo();
        $tipoIn->nombre_insumo = 'Test Tipo';
        $tipoIn->indicaciones_insumo = 'Test Indicaciones';
        $tipoIn->id_clasificacion = 1;
        $tipoIn->save();

        $this->assertDatabaseHas('tipo_insumo', [
            'nombre_insumo' => 'Test Tipo',
            'indicaciones_insumo' => 'Test Indicaciones',
            'id_clasificacion' => 1,
        ]);
    }

    public function testCreateTipoInsumoWithInvalidData()
    {
        $tipoIn = new TipoInsumo();
        $tipoIn->nombre_insumo = '';
        $tipoIn->indicaciones_insumo = '';
        $tipoIn->id_clasificacion = 0;
        $tipoIn->save();

        $this->assertDatabaseMissing('tipo_insumo', [
            'nombre_insumo' => '',
            'indicaciones_insumo' => '',
            'id_clasificacion' => 0,
        ]);
    }
}
