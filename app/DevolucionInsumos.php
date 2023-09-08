<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DevolucionInsumos extends Model
{
    protected $table = 'devolucion_insumos';
    protected $primaryKey = 'id_devolucion';

    protected $fillable = [
        'id_insumo',
        'id_pedido',
        'cantidad_devolucion',
        'observación_devolucion',
        'fecha_devolucion',
        'id_user',
    ];

    public $timestamps = false;
}
