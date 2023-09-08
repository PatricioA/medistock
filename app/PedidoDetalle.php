<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PedidoDetalle extends Model
{
    protected $table = 'pedido_detalles';
    protected $primaryKey = 'id_pedido_detalle';

    protected $fillable = [
        'id_pedido',
        'id_insumo',
        'cantidad_producto',

    ];

    public $timestamps = false;
    
    public function pedido(){
        return $this->belongsTo('App\Pedidos','id_pedido');
    }

    public function insumosdetalle(){
        return $this->belongsTo('App\Insumos','id_insumo');
    }
}
