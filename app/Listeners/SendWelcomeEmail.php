<?php

namespace App\Listeners;

use App\Events\PedidoRegistered;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendWelcomeEmail
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  PedidoRegistered  $event
     * @return void
     */
    public function handle(PedidoRegistered $event)
    {
        $pedido = $event->pedido;

    // Aquí puedes realizar cualquier lógica adicional antes de enviar el correo

     $pedido->notify(new CreatePedido());
    }
}
