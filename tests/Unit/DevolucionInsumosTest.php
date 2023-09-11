<?php

namespace Tests\Unit;

use App\Insumos;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DevolucionInsumosTest extends TestCase
{
    
    // public function testDecrementStock()
    // {
    //     $insumo = new Insumos();
    //     $insumo->id_insumos = 22;
    //     $insumo->stock = 10;
    //     $insumo->save();

    //     $result = $insumo->decrement('stock', 5);

    //     $this->assertEquals(5, $result->stock);
    // }

    public function testDecrementStockWithExcessiveQuantity()
    {
        $insumo = new Insumos();
        $insumo->id_insumos = 23;
        $insumo->stock = 10;
        $insumo->save();

        $result = $insumo->decrement('stock', 15);

        $this->assertEquals(10, $result->stock);
        $this->assertEquals('La cantidad ingresada es mayor que el stock actual.', $result->error);
    }

}
