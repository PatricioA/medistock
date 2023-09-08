<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class InsumosTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_activate_an_insumo()
    {
        // Arrange
        // Create an insumo with a non-active state
        $insumo = factory(Insumos::class)->create(['id_estado' => 0]);

        // Act
        // Call the method under test
        $response = $this->call('GET', '/activarIn/'.$insumo->id);

        // Assert
        // Check that the insumo is now active
        $this->assertDatabaseHas('insumos', [
            'id' => $insumo->id,
            'id_estado' => 1,
        ]);

        // Check that the response was successful and contains the correct message
        $response->assertRedirect();
        $response->assertSessionHas('mensaje', 'Insumo se ha activado con éxito');
    }
}
