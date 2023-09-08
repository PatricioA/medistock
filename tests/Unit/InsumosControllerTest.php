<?php

namespace Tests\Unit;

use App\Insumos;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class InsumosControllerTest extends TestCase
{
    public function testActivar()
    {
        // Arrange
        $mockInsumo = $this->createMock(Insumos::class);
        $mockInsumo->expects($this->once())
            ->method('findOrFail')
            ->with($this->equalTo(1))
            ->willReturnSelf();
        $mockInsumo->expects($this->once())
            ->method('__set')
            ->with($this->equalTo('id_estado'), $this->equalTo(1));
        $mockInsumo->expects($this->once())
            ->method('save')
            ->willReturn(true);

        // Act
        $controller = new InsumosController();
        $result = $controller->activar(1);

        // Assert
        $this->assertEquals(302, $result->getStatusCode());
        $this->assertEquals('Insumo se ha activado con éxito', $result->getSession()->get('mensaje'));
    }
}
