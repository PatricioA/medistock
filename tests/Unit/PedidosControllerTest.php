<?php

namespace Tests\Unit;

use App\Pedidos;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PedidosControllerTest extends TestCase
{

    /** @test */
    public function it_can_display_all_pedidos()
    {
        // Arrange
        $pedidos = factory(Pedidos::class, 5)->create();

        // Act
        $response = $this->get('/Pedidos');

        // Assert
        $response->assertStatus(200);
        $response->assertViewIs('pedidos.index');
        $response->assertViewHas('pedidos', function($viewPedidos) use ($pedidos) {
            return $viewPedidos->contains($pedidos->first());
        });
    }

}